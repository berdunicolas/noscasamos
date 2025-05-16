<?php

use App\Models\Timezone;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Time;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timezones', function (Blueprint $table) {
            $table->id();
            $table->string('timezone')->unique();
            $table->string('carbon_format')->unique();
            $table->string('UTC_format');
        });

        Timezone::insert([
            ['timezone' => 'Argentina/Buenos Aires', 'carbon_format' => 'America/Argentina/Buenos_Aires', 'UTC_format' => 'UTC−03:00'],
            ['timezone' => 'Australia/Sydney',     'carbon_format' => 'Australia/Sydney',     'UTC_format' => 'UTC+10:00 / +11:00 (DST)'],
            ['timezone' => 'Australia/Melbourne',  'carbon_format' => 'Australia/Melbourne',  'UTC_format' => 'UTC+10:00 / +11:00 (DST)'],
            ['timezone' => 'Australia/Brisbane',   'carbon_format' => 'Australia/Brisbane',   'UTC_format' => 'UTC+10:00'],
            ['timezone' => 'Australia/Adelaide',   'carbon_format' => 'Australia/Adelaide',   'UTC_format' => 'UTC+09:30 / +10:30 (DST)'],
            ['timezone' => 'Australia/Darwin',     'carbon_format' => 'Australia/Darwin',     'UTC_format' => 'UTC+09:30'],
            ['timezone' => 'Australia/Perth',      'carbon_format' => 'Australia/Perth',      'UTC_format' => 'UTC+08:00'],
            ['timezone' => 'Chile/Santiago',     'carbon_format' => 'America/Santiago',     'UTC_format' => 'UTC−04:00 / −03:00 (DST)'],
            ['timezone' => 'Colombia/Bogota',       'carbon_format' => 'America/Bogota',       'UTC_format' => 'UTC−05:00'],
            ['timezone' => 'Ecuador/Guayaquil',    'carbon_format' => 'America/Guayaquil',    'UTC_format' => 'UTC−05:00'],
            ['timezone' => 'Pacific/Galapagos',    'carbon_format' => 'Pacific/Galapagos',    'UTC_format' => 'UTC−06:00'],
            ['timezone' => 'Guatemala/Guatemala',    'carbon_format' => 'America/Guatemala',    'UTC_format' => 'UTC−06:00'],
            ['timezone' => 'Honduras/Tegucigalpa',  'carbon_format' => 'America/Tegucigalpa',  'UTC_format' => 'UTC−06:00'],
            ['timezone' => 'México/Ciudád de México',  'carbon_format' => 'America/Mexico_City',  'UTC_format' => 'UTC−06:00'],
            ['timezone' => 'México/Cancun',       'carbon_format' => 'America/Cancun',       'UTC_format' => 'UTC−05:00'],
            ['timezone' => 'México/Chihuahua',    'carbon_format' => 'America/Chihuahua',    'UTC_format' => 'UTC−07:00'],
            ['timezone' => 'México/Tijuana',      'carbon_format' => 'America/Tijuana',      'UTC_format' => 'UTC−08:00'],
            ['timezone' => 'Nicaragua/Managua',      'carbon_format' => 'America/Managua',      'UTC_format' => 'UTC−06:00'],
            ['timezone' => 'Paraguay/Asuncion',     'carbon_format' => 'America/Asuncion',     'UTC_format' => 'UTC−04:00 / −03:00 (DST)'],
            ['timezone' => 'Perú/Lima',         'carbon_format' => 'America/Lima',         'UTC_format' => 'UTC−05:00'],
            ['timezone' => 'España/Madrid',        'carbon_format' => 'Europe/Madrid',        'UTC_format' => 'UTC+01:00 / +02:00 (DST)'],
            ['timezone' => 'España/Canary',      'carbon_format' => 'Atlantic/Canary',      'UTC_format' => 'UTC+00:00 / +01:00 (DST)'],
            ['timezone' => 'EEUU/New_York',     'carbon_format' => 'America/New_York',     'UTC_format' => 'UTC−05:00 / −04:00 (DST)'],
            ['timezone' => 'EEUU/Chicago',      'carbon_format' => 'America/Chicago',      'UTC_format' => 'UTC−06:00 / −05:00 (DST)'],
            ['timezone' => 'EEUU/Denver',       'carbon_format' => 'America/Denver',       'UTC_format' => 'UTC−07:00 / −06:00 (DST)'],
            ['timezone' => 'EEUU/Los Angeles',  'carbon_format' => 'America/Los_Angeles',  'UTC_format' => 'UTC−08:00 / −07:00 (DST)'],
            ['timezone' => 'EEUU/Anchorage',    'carbon_format' => 'America/Anchorage',    'UTC_format' => 'UTC−09:00 / −08:00 (DST)'],
            ['timezone' => 'EEUU/Honolulu',     'carbon_format' => 'Pacific/Honolulu',     'UTC_format' => 'UTC−10:00'],
            ['timezone' => 'Uruguay/Montevideo',   'carbon_format' => 'America/Montevideo',   'UTC_format' => 'UTC−03:00'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timezones');
    }
};
