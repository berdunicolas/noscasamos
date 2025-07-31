<?php

namespace App\Http\Controllers\Admin\Template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TemplateController extends Controller
{
    public function index(): View
    {
        return view('admin.templates.index');
    }

    public function edit(): View
    {
        return view();
    }
}
