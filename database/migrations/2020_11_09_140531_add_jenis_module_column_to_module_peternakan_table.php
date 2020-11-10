<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddJenisModuleColumnToModulePeternakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('module_peternakan', function (Blueprint $table) {
            $table->enum('jenis_module', ['hewan_darat', 'hewan_air', 'hewan_amfibi']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('module_peternakan', function (Blueprint $table) {
            //
        });
    }
}
