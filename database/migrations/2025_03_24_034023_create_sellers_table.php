<?php

use App\Models\Seller;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('text')->nullable();
            $table->boolean('has_banner')->nullable();
            $table->boolean('only_logo')->nullable();
            $table->string('site_link')->nullable();
            $table->string('ig_link')->nullable();
            $table->string('wpp_link')->nullable();
            $table->string('tk_link')->nullable();
            $table->string('x_link')->nullable();
            $table->string('ytube_link')->nullable();

            $table->timestamps();
        });

        Seller::create(['name' => 'noscasamos', 'site_link' => 'https://noscasamos.ar/']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
