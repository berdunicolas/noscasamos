<?php

namespace App\Http\Controllers\Api;

use App\Enums\FontTypeEnum;
use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;
use App\Enums\StyleTypeEnum;
use App\Handlers\ModuleHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\CloneInvitationRequest;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Requests\SetConfigInvitationRequest;
use App\Http\Requests\SetStyleInvitationRequest;
use App\Http\Resources\InvitationResource;
use App\Models\Country;
use App\Models\Event;
use App\Models\Invitation;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class InvitationApiController extends Controller
{
    public function index(): JsonResponse
    {
        $invitations = Invitation::orderBy('event_id', 'desc')->get();

        return response()->json(InvitationResource::collection($invitations), Response::HTTP_OK);
    }

    public function store(StoreInvitationRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();
            $newEvent = Event::create([
                'name' => $validatedData['name'],
                'event' => $validatedData['event'],
                'plan' => $validatedData['plan'],
                'created_by' => auth()->user()->id,
            ]);

            $token = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);

            $invitation = Invitation::create([
                'host_names' => $validatedData['name'],
                'path_name' => str_replace(' ', '', strtolower($validatedData['name'])),
                'event_id' => $newEvent->id,
                'date' => null,
                'time_zone' => null,
                'time' => '20:00:00',
                'seller_id' => $validatedData['seller'],
                'password' => $token,
                'plain_token' => $token,
                'duration' => 5,
                'active' => true,
                'created_by' => auth()->user()->id,
                'meta_title' => null,
                'meta_description' => null,
                'country_id' => null,
                'country_division' => null,
                'color' => '#E2BF83',
                'background_color' => '#F3F1ED',
                'style' => StyleTypeEnum::LIGHT,
                'font' => FontTypeEnum::deco,
                'icon_type' => 'Animado',
            ]);

            $modules = collect(ModuleHandler::getHandlersByPlan(PlanTypeEnum::from($validatedData['plan'])))
                ->values()
                ->map(function ($handler, $index) use ($invitation) {
                    $name = ModuleTypeEnum::getDisplayName($handler::TYPE);
                    $trimName = str_replace(' ', '_', strtolower($name));

                    return [
                        'type' => $handler::TYPE,
                        'name' => $trimName,
                        'display_name' => $name,
                        'active' => $handler::ACTIVE,
                        'fixed' => $handler::FIXED,
                        'on_plan' => true,
                        'data' => $handler::DATA,
                        'media_collections' => $handler::getMediaCollections($invitation->id, $trimName),
                        'index' => $index,
                    ];
                });
   
            $invitation->modules()->createMany($modules->toArray());

            DB::commit();
    
            return response()->json([
                'message' => 'Invitation created successfully', 
                'data' => new InvitationResource($invitation->refresh())
            ], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error creating invitation'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function setConfig(SetConfigInvitationRequest $request, Invitation $invitation){
        
        try {
            DB::beginTransaction();

            $event = $invitation->event()->first();

            $country = Country::where('code', $request->country)->first();

            $event->event = $request->event;
            $event->plan = $request->plan;
            $event->country_id = $country?->id;
            $event->country_division_id = $request->country_division;
            $event->save();
            
            $invitation->seller_id = $request->seller;
            $invitation->host_names = $request->host_names;
            $invitation->path_name = $request->path_name;
            $invitation->active = $request->active;
            $invitation->date = $request->date;
            $invitation->time = $request->time;
            $invitation->time_zone = $request->time_zone;
            $invitation->duration = $request->duration;
            $invitation->meta_title = $request->meta_title;
            $invitation->meta_description = $request->meta_description;
            $invitation->save();

            if($request->meta_img){
                $invitation->media('meta_img')->each(function ($media) {
                    $media->delete();
                });

                $invitation->addMedia($request->meta_img, 'meta_img', $invitation->id);
            }
            
            DB::commit();

            return response()->json(['message' => 'Invitation config set successfully'], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error updating invitation'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function setStyle(SetStyleInvitationRequest $request, Invitation $invitation){
        
        try {
            DB::beginTransaction();

            $invitation->style = $request->style;
            $invitation->color = $request->color;
            $invitation->icon_type = $request->icon_type;
            $invitation->background_color = $request->background_color;
            $invitation->padding = $request->padding;
            $invitation->font = $request->font;
            $invitation->save();


            if(!isset($request->frame_image)){
                $invitation->media('frame_img')->each(function ($media) {
                    $media->delete();
                });
            }elseif(!is_string($request->frame_image)){
                $invitation->media('frame_img')->each(function ($media) {
                    $media->delete();
                });
                $invitation->addMedia($request->frame_image, 'frame_img', $invitation->id);
            }
        
            DB::commit();

            return response()->json(['message' => 'Invitation style set successfully'], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error updating invitation'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Invitation $invitation): JsonResponse{
        try {
            DB::beginTransaction();

            $invitation?->media()?->each(function ($media) {
                $media->delete();
            });

            $invitation?->modules()->each(function ($module) {
                $module?->media()?->each(function ($media) {
                    $media->delete();
                });
                $module->delete();
            });

            $folderPath = "{$invitation->id}";
            if (Storage::exists($folderPath)) {
                Storage::deleteDirectory($folderPath);
            }

            $invitation->load('event');
            $event = $invitation->event;

            if($event->invitations()->count() == 1){
                $event->delete();
            }

            $invitation->delete();

            DB::commit();

            return response()->json(['message' => 'Invitation deleted successfully'], Response::HTTP_OK);
        } catch (Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error deleting invitation'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function changeStatus(Invitation $invitation, Request $request){

        $validated = $request->validate([
            "active" => "required|boolean"
        ]);

        $invitation->active = $validated['active'];
        $invitation->save();

        return response()->json(['message' => 'Invitation activation changed successfully'], Response::HTTP_CREATED);
    }

    public function clone(Invitation $invitation, CloneInvitationRequest $request){
        $token = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);

        DB::beginTransaction();
        try {
            $newInvitation = new Invitation($invitation->toArray());
            $newInvitation->path_name = $request->path_name;
            $newInvitation->password = $token;
            $newInvitation->plain_token = $token;
            $newInvitation->created_by = auth()->user()->id;
            $newInvitation->save();

            $modules = $invitation->modules()->get();
            $modules->each(function ($module) use ($newInvitation) {
                $handler = constant('App\Handlers\ModuleHandler::' . $module->type->value);

                $newModule = new \App\Models\InvitationModule([
                    'type' => $module->type,
                    'name' => $module->name,
                    'display_name' => $module->display_name,
                    'fixed' => $module->fixed,
                    'active' => $module->active,
                    'on_plan' => $module->on_plan,
                    'data' => $module->data,
                    'media_collections' => $handler::getMediaCollections($newInvitation->id, $module->name),
                    'index' => $module->index,
                ]);

                $newModule = $newInvitation->modules()->create($newModule->toArray());

                $handler::cloneMedia($module, $newModule);
                $newModule->save();
            });

            $invitation->media()->get()->each(function ($media) use ($newInvitation) {
                $file = $media->getFile();
                if ($file) {
                    $newInvitation->addMedia($file, $media->collection_name, $newInvitation->id);
                }
            });

            DB::commit();

            return response()->json([
                'message' => 'Invitation cloned successfully', 
                'data' => new InvitationResource($newInvitation->refresh())
            ], Response::HTTP_CREATED);
        } catch (Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error cloning invitation'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
