<?php

namespace App\Http\Controllers\Api;

use App\Enums\ModuleTypeEnum;
use App\Enums\PlanTypeEnum;
use App\Enums\StyleTypeEnum;
use App\Handlers\FootModuleHandler;
use App\Handlers\ModuleHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTemplateRequest;
use App\Http\Requests\UpdateTemplateRequest;
use App\Http\Resources\TemplateResource;
use App\Models\Font;
use App\Models\Template;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TemplateApiController extends Controller
{
    public function index(): JsonResponse
    {
        $templates = Template::all();

        return response()->json(TemplateResource::collection($templates), Response::HTTP_OK);
    }

    public function store(StoreTemplateRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();
            $font = Font::first()?->font_name; 

            $template = Template::create([
                'name' => $validatedData['name'],
                'event' => $validatedData['event'],
                'plan' => PlanTypeEnum::GOLD,
                'duration' => 8,
                'color' => '#E2BF83',
                'background_color' => '#F3F1ED',
                'style' => StyleTypeEnum::LIGHT,
                'font' => $font ?? '',
                'icon_type' => 'Animado',
            ]);

            $modules = collect(ModuleHandler::getHandlersByPlan(PlanTypeEnum::GOLD))
                ->values()
                ->map(function ($handler, $index) use ($template) {
                    $name = ModuleTypeEnum::getDisplayName($handler::TYPE);
                    $trimName = str_replace(' ', '_', strtolower($name));

                    if($handler::TYPE === FootModuleHandler::TYPE){
                        $index = FootModuleHandler::INDEX;
                    }

                    return [
                        'type' => $handler::TYPE,
                        'name' => $trimName,
                        'display_name' => $name,
                        'active' => $handler::ACTIVE,
                        'fixed' => $handler::FIXED,
                        'media_collections' => [],
                        'on_plan' => true,
                        'data' => $handler::DATA,
                        'index' => $index,
                    ];
                });

            $template->modules()->createMany($modules->toArray());
            
            DB::commit();

            return response()->json([
                'message' => 'Template created successfully',
                'data' => new TemplateResource($template),
            ], Response::HTTP_CREATED);

        } catch (Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error creating template'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function update(Template $template, UpdateTemplateRequest $request): JsonResponse
    {
        $validatedData = $request->validated();
        try {
            DB::beginTransaction();
                $template->update($validatedData);
            DB::commit();

            return response()->json([
                'message' => 'Template updated successfully',
                'data' => new TemplateResource($template),
            ], Response::HTTP_CREATED);

        } catch (Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error creating template'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Template $template): JsonResponse
    {
        try {
            DB::beginTransaction();

            $template->delete();

            DB::commit();

            return response()->json(['message' => 'Template deleted successfully'], Response::HTTP_OK);
        } catch (Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error deleting template'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}