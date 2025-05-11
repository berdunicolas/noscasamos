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
            $modules[] = ModuleTypeEnum::getModuleForm($module['name'], $invitation);
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
                if($item == $module['name']){
                    $newOrder[] = $module;
                    break;
                }
            }
        }

        $invitation->modules = $newOrder;
        $invitation->save();

        return response()->json(['message' => 'Order of invitation modules changed successfully'], Response::HTTP_CREATED);
    }

    public function changeModuleStatus(Invitation $invitation, $module, Request $request){
        $modules = $invitation->modules;

        foreach($modules as $index => $invitationModule){
            if($module == $invitationModule['name']){
                $modules[$index]['active'] = $request['active'];
                break;
            }
        }
        $invitation->modules = $modules;
        $invitation->save();
        
        return response()->json(['message' => 'Invitation module activation changed successfully'], Response::HTTP_CREATED);
    }

    public function updateModule(Invitation $invitation, $module, UpdateModuleRequest $request) {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();

            $invitation->modules = ModuleTypeEnum::updateModuleHandle(
                $invitation,
                $module,
                $validatedData
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
}
