<?php

namespace App\View\Components\Modules;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GiftsModule extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $module,
        public ?string $style,
        public ?string $color,
        public ?string $icontype,
        public ?string $marco,
        public ?string $padding,
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('invitations.modules.gifts');
    }
}
