<?php

namespace App\View\Components\Table;

use App\Models\Template;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class ConfirmCloneModal extends Component
{
    public Collection $templates;
    /**
     * Create a new component instance.
     */
    public function __construct(){
        $this->templates = Template::get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.confirm-clone-modal');
    }
}
