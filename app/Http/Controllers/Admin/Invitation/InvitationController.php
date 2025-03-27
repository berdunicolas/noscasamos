<?php

namespace App\Http\Controllers\Admin\Invitation;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Contracts\View\View;


class InvitationController extends Controller
{
    public function index(): View
    {
        return view('admin.invitations.index');
    }
}
