<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Resources\SellerResource;
use App\Models\Seller;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SellerApiController extends Controller
{
    public function index()
    {
        $sellers = Seller::all();

        return response()->json(SellerResource::collection($sellers), Response::HTTP_OK);
    }

    public function store(StoreSellerRequest $request){
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();
            $seller = Seller::create([
                'name' => $validatedData['name'],
                'site_link' => $validatedData['site_link'],
            ]);
        
            DB::commit();
    
            return response()->json(['message' => 'Seller created successfully'], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error creating seller'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Seller $seller){
        
        try {
            DB::beginTransaction();

            $seller->delete();

            DB::commit();

            return response()->json(['message' => 'Seller deleted successfully'], Response::HTTP_OK);
        } catch (Exception $e) {
            DB::rollBack();
            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error deleting seller'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
