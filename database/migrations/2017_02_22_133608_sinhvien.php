<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sinhvien extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinhvien', function ($table) {
            $table->string('mssv',8);
            $table->string('hoten');
            $table->string('sdt',11);
            $table->string('ngsinh', 10);
            $table->boolean('dangki');
            $table->primary('mssv');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sinhvien');    
    }
}
