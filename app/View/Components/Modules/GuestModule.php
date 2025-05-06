<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GuestModule extends Component
{
    public string $guestN;
    public string $guestC;

    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $module
    )
    {
        $this->guestN = isset($_GET['n']) ? $_GET['n'] : "";
        $this->guestC = isset($_GET['c']) ? $_GET['c'] : "";
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.guest');
    }
}
