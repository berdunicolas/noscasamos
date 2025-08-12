<?php

namespace Database\Seeders;

use App\Enums\EventTypeEnum;
use App\Enums\PlanTypeEnum;
use App\Enums\StyleTypeEnum;
use App\Models\Country;
use App\Models\CountryDivision;
use App\Models\Event;
use App\Models\Font;
use App\Models\Invitation;
use App\Models\Seller;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InvitationsPreview extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $font = Font::first()?->name;
        DB::beginTransaction();
        try {
            for($i = 0; $i < 600; $i++){
                dump($i);

                $start = Carbon::create(2024, 1, 1)->timestamp;
                $end = Carbon::create(2025, 7, 1)->timestamp;

                // Timestamp aleatorio entre los dos
                $randomTimestamp = rand($start, $end);


                $countries_code = ['AR', 'AU', 'ES'];

                $country = Country::where('code', $countries_code[random_int(0, 2)])->first();

                $countryDivision = CountryDivision::where('country_code', $country->code)
                    ->whereIn('state_name', ['Zamora', 'Valencia', 'Toledo', 'Tucumán', 'Córdoba', 'Queensland'])
                    ->get();

                $event = [EventTypeEnum::CUMPLE, EventTypeEnum::BODA, EventTypeEnum::QUINCE];
                $plan = [PlanTypeEnum::CLÁSICO, PlanTypeEnum::GOLD, PlanTypeEnum::PLATINO];
                $userId = User::find(random_int(1,2))->id;

                $newEvent = Event::create([
                    'name' => 'Evento' . $i,
                    'event' => $event[random_int(0,2)],
                    'plan' => $plan[random_int(0,2)],
                    'country_id' => $country->id,
                    'country_division_id' => $countryDivision[random_int(0,$countryDivision->count()-1)]->id,
                    'created_by' => $userId,
                    'is_legacy' => false,
                    'created_at' => Carbon::createFromTimestamp($randomTimestamp)->format('Y-m-d H:i:s'),
                ]);

                Invitation::create([
                    'host_names' => null,
                    'path_name' => 'Invitation' . $i,
                    'event_id' => $newEvent->id,
                    'seller_id' => Seller::find(random_int(1,6))->id,
                    'date' => '2025-06-12',
                    'time' => '20:00:00',
                    'time_zone' => null,
                    'duration' => null,
                    'active' => true,
                    'created_by' => $userId,
                    'meta_title' => null,
                    'meta_description' => null,
                    'icon_type' => 'Estatico',
                    'style' => StyleTypeEnum::LIGHT,
                    'font' => $font?? '',
                    'padding' => null,
                    'password' => '',
                    'plain_token' => '',
                    'color' => null,
                    'background_color' => null,
                    'was_disabled' => false,
                    'is_legacy' => false,
                    'created_at' => Carbon::createFromTimestamp($randomTimestamp)->format('Y-m-d H:i:s'),
                ]);
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();

            dump($e);
        }
    }
}
