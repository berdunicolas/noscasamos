<?php

namespace App\View\Components\Admin\Users;

use App\Models\Role;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewUserModal extends Component
{
    public $roles;

    /**
     * Create a new component instance.
     */
    public function __construct() {
        $this->roles = Role::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.users.new-user-modal');
    }
}
