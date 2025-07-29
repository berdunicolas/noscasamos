<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
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

    public function store(StoreSellerRequest $request) {
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

    public function update(UpdateSellerRequest $request, Seller $seller) {
        $validatedData = $request->validated();

        try {
            DB::beginTransaction();
            $seller->name = $validatedData["name"];
            $seller->text = $validatedData["text"];
            $seller->has_banner = $validatedData["has_banner"];
            $seller->only_logo = $validatedData["only_logo"];
            $seller->site_link = $validatedData["site_link"];
            $seller->ig_link = $validatedData["ig_link"];
            $seller->wpp_link = $validatedData["wpp_link"];
            $seller->tk_link = $validatedData["tk_link"];
            $seller->x_link = $validatedData["x_link"];
            $seller->ytube_link = $validatedData["ytube_link"];
    
            $seller->media()->each(function ($media) {
                $media->delete();
            });

            if(isset($request['banner_bg'])){ 
                $seller->addMedia($request['banner_bg'], 'banner_bg', 'seller/'.$seller->name);
            }
            if(isset($request['banner_logo'])){ 
                $seller->addMedia($request['banner_logo'], 'banner_logo', 'seller/'.$seller->name);
            }
            $seller->save();
            DB::commit();

            return response()->json(['message' => 'Seller updated successfully'], Response::HTTP_CREATED);
        } catch (Exception $e) {
            DB::rollback();

            if (config('app.debug')) {
                return response()->json(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
            return response()->json(['message' => 'Error updating seller'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function destroy(Seller $seller) {
        
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
