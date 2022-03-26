<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->integer('ruangId');
            $table->integer('kodeBarang');
            $table->string('namaBarang');
            $table->enum('jenisBarang',['elektronik','nonelektronik']);
            $table->enum('kondisi',['bagus','rusak']);
            $table->string('statusPerbaikan');
            $table->string('merk');
            $table->string('asalPerolehan');
            $table->string('bahan');
            $table->bigInteger('harga');
            $table->string('foto')->nullable();
            $table->text('catatan');
            $table->date('waktuMasuk');

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
        Schema::dropIfExists('barangs');
    }
}
