<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $navBarSelected,
        public bool $datatable = false,
        public string $dataTableName = '',
        public array $cssStyles = [],
        public array $jsScripts = [],
        public bool $overflowHidden = false,
        public string $pageTabTitle = '',
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.layout');
    }
}
