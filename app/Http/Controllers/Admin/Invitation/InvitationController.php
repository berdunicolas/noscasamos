<?php

namespace App\Http\Controllers\Admin\Invitation;

use App\Enums\EventTypeEnum;
use App\Enums\FontTypeEnum;
use App\Enums\PlanTypeEnum;
use App\Enums\SpacingTypeEnum;
use App\Enums\StyleTypeEnum;
use App\Handlers\ModuleHandler;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CountryDivision;
use App\Models\Guest;
use App\Models\Invitation;
use App\Models\Seller;
use App\Models\Timezone;
use Illuminate\Contracts\View\View;


class InvitationController extends Controller
{
    public function index(): View
    {
        return view('admin.invitations.index');
    }


    /**
     * Display the registration view.
     */
    public function edit(Invitation $invitation): View
    {
        $invitation->load(['event']);
        $invitation->event->load('country');

        $guests = Guest::where('invitation_id', $invitation->id)->orderBy('created_at', 'desc')->get();

        $countries = Country::where('active', 1)->get();
        $CountryDivision = CountryDivision::where('country_code', $invitation->event->country?->code)->get();
        $timezones = Timezone::all();
        $eventTypes = EventTypeEnum::values();
        $planTypes = PlanTypeEnum::values();
        $styleTypes = StyleTypeEnum::values();
        $spacingTypes = SpacingTypeEnum::values();
        $sellers = Seller::select('id', 'name')->get();
        $fontTypes = FontTypeEnum::values();
        $availableModules = ModuleHandler::availableModules($invitation->modules->map(function ($module) {
            return [
                'type' => $module->type,
                'display_name' => $module->display_name,
            ];
        })->toArray());

        $modules = $invitation->modules()->orderBy('index')->get();

        return view('admin.invitations.edit', [
            'invitation' => $invitation, 
            'countries' => $countries, 
            'countryDivisions' => $CountryDivision,
            'timezones' => $timezones,
            'eventTypes' => $eventTypes,
            'planTypes' => $planTypes,
            'styleTypes' => $styleTypes,
            'spacingTypes' => $spacingTypes,
            'fontTypes' => $fontTypes,
            'sellers' => $sellers,
            'guests' => $guests,
            'availableModules' => $availableModules,
            'modules' => $modules,
        ]);
    }
}
