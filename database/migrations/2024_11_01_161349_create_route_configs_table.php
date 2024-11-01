<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('route_configs', function (Blueprint $table) {
            $table->id();
            $table->string('server_ip');
            $table->string('mac_address');
            $table->string('service_name');
            $table->unsignedBigInteger('service_port');
            $table->timestamps();
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_configs');
    }
};
