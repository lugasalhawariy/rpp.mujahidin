<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRppTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpp', function (Blueprint $table) {
            $table->id();
            // kalo akun user dihapus maka seluruh data RPP milik user akan otomatis di delete.
            $table->integer('user_id');
            $table->integer('sekolah_id');
            $table->foreignId('mapel_id')->constrained('mapel')->onDelete('cascade');

            $table->enum('status', ['progress', 'success', 'failed', 'pending'])->default('progress');

            $table->string('alokasi_waktu')->default('None');
            $table->string('pendekatan')->default('None');
            $table->string('strategi')->default('None');
            $table->string('metode_rpp')->default('None');
            $table->string('teknik_materi')->default('None');
            $table->string('teknik_penilaian')->default('None');
            $table->string('alat')->default('None');
            $table->string('bentuk')->default('None');

            $table->text('kompetensi_dasar')->nullable();
            $table->text('ipk')->nullable(); 
            $table->text('tujuan')->nullable();
            $table->text('materi_rpp')->nullable();
            $table->text('langkah_rpp')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('rpp');
    }
}
