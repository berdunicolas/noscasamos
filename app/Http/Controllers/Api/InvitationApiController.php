<?php

namespace App\Http\Controllers\Api;

use App\Enums\FontTypeEnum;
use App\Enums\ModuleTypeEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Requests\SetConfigInvitationRequest;
use App\Http\Requests\SetStyleInvitationRequest;
use App\Http\Resources\InvitationResource;
use App\Models\Country;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\Plan;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class InvitationApiController extends Controller
{
    public function index(): JsonResponse
    {
        $invitations = Invitation::orderBy('event_id', 'asc')->get();

        return response()->json(InvitationResource::collection($invitations), Response::HTTP_OK);
    }

    public function store(StoreInvitationRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        $plan = collect(ModuleTypeEnum::getModulesByPlan($validatedData['plan']))->map(function ($item) {
            $item['on_plan'] = true;
            $item['active'] = true;

            return $item;
        });

        try {
            DB::beginTransaction();
            $newEvent = Event::create([
                'name' => $validatedData['name'],
                'event' => $validatedData['event'],
                'plan' => $validatedData['plan'],
                'created_by' => auth()->user()->id,
            ]);


            $invitation = Invitation::create([
                'path_name' => $validatedData['name'],
                'event_id' => $newEvent->id,
                'date' => null,
                'time_zone' => null,
                'time' => null,
                'seller_id' => $validatedData['seller'],
                'duration' => 5,
                'active' => true,
                'created_by' => auth()->user()->id,
                'meta_title' => null,
                'meta_description' => null,
                'country_id' => null,
                'country_division' => null,
                'modules' => $plan->toArray()
            ]);

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

            if($request->meta_image){
                $invitation->media('meta_img')->each(function ($media) {
                    $media->delete();
                });

                $invitation->addMedia($request->meta_image, 'meta_img', $invitation->path_name);
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

            if($request->frame_image){
                $invitation->media('frame_img')->each(function ($media) {
                    $media->delete();
                });
                $invitation->addMedia($request->frame_image, 'frame_img', $invitation->path_name);
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

    public function destroy($id){
        $invitation = Invitation::find($id);

        try {
            DB::beginTransaction();

            $invitation->load('event');

            if($invitation->event->invitations()->count() == 1){
                $invitation->event->delete();
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

    public function clone(Invitation $invitation){

        $invitation = new Invitation($invitation->toArray());
        $invitation->path_name = $invitation->path_name . '-clone';
        $invitation->created_by = auth()->user()->id;
        $invitation->save();

        return response()->json([
            'message' => 'Invitation cloned successfully', 
            'data' => new InvitationResource($invitation->refresh())
        ], Response::HTTP_CREATED);
    }
}
