<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UploadZone extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label = '',
        public string $zoneName = '',
        public string $zoneOwner = "",
        public bool $isMultiple = true,
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.upload-zone');
    }
}
