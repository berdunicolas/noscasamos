<?php

namespace App\Http\Controllers;

use App\Enums\ModuleTypeEnum;
use App\Http\Requests\UpdateModuleRequest;
use App\Models\Invitation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class InvitationModuleApiController extends Controller
{
    // Retornara todos los modulos de una invitacion
    public function getInvitationModules(Invitation $invitation) {
        foreach($invitation->modules as $module){
            $modules[] = ModuleTypeEnum::getModuleForm($module['name'], $invitation, $module['display_name']);
        }
    
        return response()->json($modules);
    }

    // Busca un modulo por su nombre 
    public function getModuleByName(string $module) {
        return;
    }

    //  Añade un modulo nuevo una invitacion
    public function addModuleInInvitation(Invitation $invitation, string $module) {
        return;
    }

    // Cambia el orden de los modulos
    // Recibe un array ordenado de los modulos y luego ordena los modulos de la invitacion
    public function changeModolesOrder(Invitation $invitation, Request $request) {

        $order = $request['order'];
        $modules = $invitation->modules;

        $newOrder = [];

        foreach($order as $index => $item) {
            foreach($modules as $module){
                if($item == $module['display_name']){
                    $newOrder[] = $module;
                    break;
                }
            }
        }

        $invitation->modules = $newOrder;
        $invitation->save();

        return response()->json(['message' => 'Order of invitation modules changed successfully'], Response::HTTP_CREATED);
    }

    public function changeModuleStatus(Request $request, Invitation $invitation, string $module, ?string $displayName = null){
        $modules = $invitation->modules;

        foreach($modules as $index => $invitationModule){
            if($displayName === null){
                if($module == $invitationModule['name']){
                    $modules[$index]['active'] = $request['active'];
                    break;
                }
            } else {
                if($module == $invitationModule['name'] && $displayName == $invitationModule['display_name']){
                    $modules[$index]['active'] = $request['active'];
                    break;
                }
            }
        }
        $invitation->modules = $modules;
        $invitation->save();
        
        return response()->json(['message' => 'Invitation module activation changed successfully'], Response::HTTP_CREATED);
    }

    public function updateModule(UpdateModuleRequest $request, Invitation $invitation, string $module, ?string $displayName = null) {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();

            $invitation->modules = ModuleTypeEnum::updateModuleHandle(
                $invitation,
                $module,
                $validatedData,
                $displayName
            );
            $invitation->save();

            DB::commit();
            return response()->json(['message' => 'Module ' . $module . ' updated successfully.'], Response::HTTP_CREATED);
        } catch (Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error updating module.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function availableModules(Invitation $invitation) {
        $modules = ModuleTypeEnum::availableModules($invitation->modules);

        return response()->json($modules);
    }

    public function deleteModule(Invitation $invitation, $module, $displayName = null) {

        $modules = [];

        foreach($invitation->modules as $item){
            if($displayName === null){
                if($item['name'] != $module){
                    $modules[] = $item;
                }
            } else {
                if($item['name'] != $module && $item['display_name'] == $displayName){
                    $modules[] = $item;
                }
            }
        }

        $invitation->modules = $modules;

        return response()->json([
            'message' => 'Module ' . $module . ' deleted successfully.'
        ]);
    }

    public function addModule(Invitation $invitation, Request $request) {
        $modules = $invitation->modules;
        $module = $request->new_module;

        if (in_array($module, [
            ModuleTypeEnum::INFO['name'],
            ModuleTypeEnum::HIGHLIGHTS['name'],
            ModuleTypeEnum::HISTORY['name']
        ])) {
            // Filtramos los módulos existentes con el mismo nombre base
            $settedModules = array_filter($modules, function ($item) use ($module) {
                return $item['name'] === $module;
            });

            // Obtenemos el módulo base
            $newModule = ModuleTypeEnum::getModuleFromArrayByName(ModuleTypeEnum::values(), $module);

            // Generar display_name incremental
            $baseName = $newModule['display_name']; // ej: "Info"
            $nextNumber = 1;

            foreach ($settedModules as $setted) {
                // Coincidencia exacta (ej. "Info")
                if (strcasecmp($setted['display_name'], $baseName) === 0) {
                    $nextNumber = max($nextNumber, 2);
                }

                // Coincidencia con número (ej. "Info 2", "info 3")
                if (preg_match('/^' . preg_quote($baseName, '/') . '\s*(\d+)$/i', $setted['display_name'], $matches)) {
                    $nextNumber = max($nextNumber, ((int) $matches[1]) + 1);
                }
            }

            // Setear el nuevo display_name
            $newModule['display_name'] = $baseName . ($nextNumber > 1 ? ' ' . $nextNumber : '');
            $newModule['on_plan'] = false;
            $newModule['active'] = true;

            $modules[] = $newModule;
        } else {
            foreach($modules as $item){
                if($item['name'] == $module){
                    return response()->json(['message' => 'The module ' . $module . ' already exists.'], Response::HTTP_CONFLICT);
                }
            }
            $newModule = ModuleTypeEnum::getModuleFromArrayByName(ModuleTypeEnum::values(), $module);
            $newModule['on_plan'] = false;
            $newModule['active'] = true;
            $modules[] = $newModule;
        }

        $invitation->modules = $modules;
        $invitation->save();

        return response()->json([
            'message' => 'Module ' . $module . ' added successfully.'
        ]);
    }
}
