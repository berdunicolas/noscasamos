<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

class SellerController extends Controller
{
    public function index(): View{
        return view('sellers.index');
    }

    public function edit(Seller $seller): View{
        return view('sellers.edit', ['seller' => $seller]);
    }

    public function update(Seller $seller, Request $request): View
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'text' => ['string'],
            'has_banner' => ['nullable', 'string'],
            'only_logo' => ['nullable', 'string'],
            'site_link' => ['nullable', 'string'],
            'ig_link' => ['nullable', 'string'],
            'wpp_link' => ['nullable', 'string'],
            'tk_link' => ['nullable', 'string'],
            'x_link' => ['nullable', 'string'],
            'ytube_link' => ['nullable', 'string'],
            'background' => [
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
            'logo_image' => [
                    File::image()
                    ->types(['jpeg', 'png', 'jpg'])
                    ->max(2048)
                ],
        ]);

        $seller->name = $request->name;
        $seller->text = $request->text;
        $seller->has_banner = $request->has_banner;
        $seller->only_logo = $request->only_logo;
        $seller->site_link = $request->site_link;
        $seller->ig_link = $request->ig_link;
        $seller->wpp_link = $request->wpp_link;
        $seller->tk_link = $request->tk_link;
        $seller->x_link = $request->x_link;
        $seller->ytube_link = $request->ytube_link;
        $seller->save();


        if(isset($request['background'])){ 
            $seller->media('banner_bg')->each(function ($media) {
                $media->delete();
            });
            $seller->addMedia($request['background'], 'banner_bg', 'seller/'.$seller->name);
        }
        if(isset($request['logo_image'])){ 
            $seller->media('banner_logo')->each(function ($media) {
                $media->delete();
            });
            $seller->addMedia($request['logo_image'], 'banner_logo', 'seller/'.$seller->name);
        }

        return view('sellers.edit', ['seller' => $seller]);
    }
}
