<?php

namespace App\Http\Controllers\Admin\Seller;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

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
            'url' => ['required','string'],
        ]);

        $seller->name = $request->name;
        $seller->url = $request->url;
        $seller->save();


        return view('sellers.edit', ['seller' => $seller]);
    }
}
