<?php

namespace App\Http\Controllers\Admin\Template;

use App\Enums\EventTypeEnum;
use App\Enums\PlanTypeEnum;
use App\Enums\StyleTypeEnum;
use App\Handlers\ModuleHandler;
use App\Http\Controllers\Controller;
use App\Models\Font;
use App\Models\Template;
use Illuminate\View\View;

class TemplateController extends Controller
{
    public function index(): View
    {
        return view('admin.templates.index');
    }

    public function edit(Template $template): View
    {
        $eventTypes = EventTypeEnum::values();
        $planTypes = PlanTypeEnum::values();
        $styleTypes = StyleTypeEnum::values();
        $fonts = Font::get();
        $modules = $template->modules()->orderBy('index')->get();
        $availableModules = ModuleHandler::availableModules($modules->map(function ($module) {
            return [
                'type' => $module->type,
                'display_name' => $module->display_name,
            ];
        })->toArray());

        return view('admin.templates.edit', compact('template', 'eventTypes', 'planTypes', 'fonts', 'styleTypes', 'modules', 'availableModules'));
    }
}
