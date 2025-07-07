<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllCache extends Command
{
    protected $signature = 'cache:clear-all';
    protected $description = 'Elimina toda la caché: config, route, view, application';

    public function handle(): int
    {
        $this->info('Limpiando toda la caché...');

        $this->call('cache:clear');
        $this->call('config:clear');
        $this->call('route:clear');
        $this->call('view:clear');
        $this->call('event:clear'); // Si estás cacheando eventos

        $this->info('✔ Toda la caché fue eliminada correctamente.');

        return Command::SUCCESS;
    }
}
