<?php

namespace App\Console\Commands;

use App\Enums\EventTypeEnum;
use App\Enums\FontTypeEnum;
use App\Enums\PlanTypeEnum;
use App\Enums\StyleTypeEnum;
use App\Models\Event;
use App\Models\Invitation;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ImportLegacyInvitations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invitations:import-legacy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Importa invitaciones legacy como invitaciones en el sistema Laravel';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $publicPath = public_path();
        $excluidas = ['css', 'js', 'images', 'fonts', 'storage', 'vendor', 'favicon.ico', 'robots.txt']; // Agregá lo que necesites excluir

        $carpetas = File::directories($publicPath);


        DB::beginTransaction();
        try {
            

            $event = Event::firstOrCreate(
                ['name' => 'Invitaciones Legacy'],
                [
                    'event' => EventTypeEnum::CUMPLE,
                    'plan' => PlanTypeEnum::CLÁSICO,
                    'country_id' => null,
                    'country_division_id' => null,
                    'created_by' => null,
                    'is_legacy' => true,
                ]
            );

            foreach ($carpetas as $carpetaPath) {
                $nombre = basename($carpetaPath);

                // Saltar carpetas excluidas
                if (in_array($nombre, $excluidas)) {
                    continue;
                }

                // Verificar si tiene un index.php (requisito mínimo para que sea válida)
                if (!File::exists($carpetaPath . '/index.php')) {
                    $this->warn("Saltando '$nombre' porque no tiene index.php");
                    continue;
                }

                // Evitar duplicados
                if (Invitation::where('path_name', $nombre)->exists()) {
                    $this->info("Ya existe la invitación '$nombre'. Saltando.");
                    continue;
                }

            
                // Crear nueva invitación
                Invitation::create([
                    'host_name' => null,
                    'path_name' => $nombre,
                    'event_id' => $event->id,
                    'seller_id' => null,
                    'date' => null,
                    'time' => null,
                    'time_zone' => null,
                    'duration' => null,
                    'active' => false,
                    'created_by' => null,
                    'meta_title' => null,
                    'meta_description' => null,
                    'icon_type' => 'Estatico',
                    'style' => StyleTypeEnum::LIGHT,
                    'font' => FontTypeEnum::clasic,
                    'padding' => null,
                    'password' => '',
                    'plain_token' => '',
                    'color' => null,
                    'background_color' => null,
                    'was_disabled' => true,
                    'is_legacy' => true,
                ]);

                $this->info("Importada la invitación '$nombre'");
            }

            DB::commit();
            $this->info("✔️ Importación finalizada.");

        } catch (Exception $e) {
            DB::rollBack();
            $this->error($e->getMessage());
        }
    }
}
