<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserApiController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::with('roles')->get();

        return response()->json(UserResource::collection($users), Response::HTTP_OK);
    }

    public function store(StoreUserRequest $request): JsonResponse
    {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
            ]);
    
            $user->assignRole($validatedData['role']);
    
            event(new Registered($user));
            DB::commit();
    
            return response()->json(['message' => 'User created successfully'], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error creating user'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }
}
