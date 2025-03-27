<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInvitationRequest;
use App\Http\Resources\InvitationResource;
use App\Models\Invitation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;


class InvitationApiController extends Controller
{
    public function index(): JsonResponse
    {
        $invitations = Invitation::all();

        return response()->json(InvitationResource::collection($invitations), Response::HTTP_OK);
    }

    public function store(StoreInvitationRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();
            $invitation = Invitation::create([
                'event' => $validatedData['event'],
                'name' => $validatedData['name'],
                'seller_id' => null,
                'plan' => $validatedData['plan'],
                'date' => $validatedData['date'],
                'time' => null,
                'time_zone' => null,
                'duration' => null,
                'active' => true,
                'created_by' => auth()->user()->id,
                'path_name' => $validatedData['name'],
                'meta_title' => null,
                'meta_description' => null,
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

    public function destroy($id){
        $invitation = Invitation::find($id);
        $invitation->delete();
        return response()->json(['message' => 'Invitation deleted successfully'], Response::HTTP_OK);
    }
}
