<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEnvioToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('colonia_envio')->nullable()->after('photo');
            $table->string('localidad_envio')->nullable()->after('colonia_envio');
            $table->string('municipio_envio')->nullable()->after('localidad_envio');
            $table->string('estado_envio')->nullable()->after('municipio_envio');

            $table->string('rc_fiscal')->nullable()->after('estado_envio');
            $table->string('calle_fiscal')->nullable()->after('rc_fiscal');
            $table->string('numero_interior')->nullable()->after('calle_fiscal');
            $table->string('numero_exterior')->nullable()->after('numero_interior');
            $table->string('colonia_fiscal')->nullable()->after('numero_exterior');
            $table->string('codigo_postal')->nullable()->after('colonia_fiscal');
            $table->string('localidad_fiscal')->nullable()->after('codigo_postal');
            $table->string('regimen_fiscal')->nullable()->after('localidad_fiscal');

            $table->string('cp_envio')->nullable()->after('regimen_fiscal');
            $table->string('referencia_direccion')->nullable()->after('cp_envio');
            $table->string('clave_pais')->nullable()->after('referencia_direccion');
            $table->string('forma_pago_sat')->nullable()->after('clave_pais');
            $table->string('referencia_direccion_envio')->nullable()->after('forma_pago_sat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
