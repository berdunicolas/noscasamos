<?php

namespace App\Http\Controllers;

use App\Enums\ModuleTypeEnum;
use App\Handlers\FootModuleHandler;
use App\Handlers\ModuleHandler;
use App\Handlers\MusicModuleHandler;
use App\Http\Requests\UpdateModuleRequest;
use App\Models\Template;
use App\Models\TemplateModule;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TemplateModuleApiController extends Controller
{
    // Retornara todos los modulos de una invitacion
    public function getTemplateModules(Template $template) {
        foreach($template->modules as $module){
            $modules[] = ModuleHandler::getModuleForm($module);
        }
    
        return response()->json($modules);
    }

    // Cambia el orden de los modulos
    // Recibe un array ordenado de los modulos y luego ordena los modulos de la invitacion
    public function changeModulesOrder(Template $template, Request $request) {

        $order = $request['order'];
        $modules = $template->modules()->get();

        foreach($order as $index => $item) {
            foreach($modules as $module){
                if($item == $module->display_name){
                    $module->index = $index;
                    $module->save();
                    break;
                }
            }
        }

        return response()->json(['message' => 'Order of template modules changed successfully'], Response::HTTP_CREATED);
    }

    public function changeModuleStatus(Request $request, Template $template, TemplateModule $module){

        $module->active = $request['active'];
        $module->save();
        
        return response()->json(['message' => 'Template module activation changed successfully'], Response::HTTP_CREATED);
    }

    public function updateModule(UpdateModuleRequest $request, Template $template, TemplateModule $module) {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();

            $module->data = ModuleHandler::updateModuleHandle($module, $validatedData);
            $module->save();

            DB::commit();
            return response()->json(['message' => 'Module ' . $module->display_name . ' updated successfully.'], Response::HTTP_CREATED);
        } catch (Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error updating module.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function availableModules(Template $template) {
        $modules = ModuleTypeEnum::availableModules($template->modules);

        return response()->json($modules);
    }

    public function deleteModule(Template $template, TemplateModule $module) {
        $module->delete();

        return response()->json([
            'message' => 'Module ' . $module->display_name . ' deleted successfully.'
        ], Response::HTTP_OK);
    }

    public function addModule(Template $template, Request $request) {
        $module = $request->new_module;
        $nextIndex = $template->modules()->where('type', '!=', FootModuleHandler::TYPE->value)->max('index') + 1;
        $newModule = null;

        $baseModule = null;
        $baseName = null;
        $trimName = null;

        if (in_array($module, [
            ModuleTypeEnum::INFO->value,
            ModuleTypeEnum::HIGHLIGHTS->value,
            ModuleTypeEnum::HISTORY->value
        ])) {
            // Filtramos los módulos existentes con el mismo nombre base
            $settedModules = $template->modules()->where('type', $module)->get();

            // Obtenemos el módulo base
            $baseModule = constant('App\Handlers\ModuleHandler::'.$module);

            // Generar display_name incremental
            $baseName = ModuleTypeEnum::getDisplayName($baseModule::TYPE); // ej: "Info"
            $nextNumber = 1;

            foreach ($settedModules as $setted) {
                // Coincidencia exacta (ej. "Info")
                if (strcasecmp($setted->display_name, $baseName) === 0) {
                    $nextNumber = max($nextNumber, 2);
                }

                // Coincidencia con número (ej. "Info 2", "info 3")
                if (preg_match('/^' . preg_quote($baseName, '/') . '\s*(\d+)$/i', $setted->display_name, $matches)) {
                    $nextNumber = max($nextNumber, ((int) $matches[1]) + 1);
                }
            }
            $baseName .= ($nextNumber > 1 ? ' ' . $nextNumber : '');
            $trimName = str_replace(' ', '_', strtolower($baseName));

        } else {
            if($module == ModuleTypeEnum::MUSIC->value){
                $nextIndex = MusicModuleHandler::INDEX;
                $template->modules()
                    ->where('fixed', false)
                    ->increment('index');
            }

            if($template->modules()->where('type', $module)->exists()){
                return response()->json(['message' => 'The module ' . $module . ' already exists.'], Response::HTTP_CONFLICT);
            }

            $baseModule = constant('App\Handlers\ModuleHandler::'.$module);
            $baseName = ModuleTypeEnum::getDisplayName($baseModule::TYPE);
            $trimName = str_replace(' ', '_', strtolower($baseName));
        }

        $newModule = new TemplateModule([
            'type' => $baseModule::TYPE,
            'name' => $trimName,
            'display_name' => $baseName,
            'fixed' => $baseModule::FIXED,
            'active' => false,
            'on_plan' => false,
            'data' => $baseModule::DATA,
            'media_collections' => $baseModule::getMediaCollections($template->id, $trimName),
            'index' => $nextIndex,
        ]);
        $newModule = $template->modules()->create($newModule->toArray());
        $template->save();

        $newModule->deleteUrl = route('api.template.delete-module', ['template' => $template->id, 'module' => $newModule->id]);

        return response()->json([
            'message' => 'Module ' . $module . ' added successfully.',
            'data' => $newModule
        ], Response::HTTP_CREATED);
    }
}
