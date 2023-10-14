<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nip', 20)->unique();
            $table->foreignId('position_id')->constrained();
            $table->string('departemen', 100);
            $table->string('tanggal_lahir');
            $table->integer('tahun_lahir');
            $table->text('alamat');
            $table->string('nomor_telpon');
            $table->string('agama');
            $table->boolean('status');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
