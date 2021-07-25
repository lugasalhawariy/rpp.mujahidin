<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('username')->nullable();
            $table->integer('sekolah_id')->nullable();
            $table->string('no_telp')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nbm_guru')->nullable();
            $table->string('nip_guru')->nullable();
            $table->text('alamat')->nullable();
            $table->longText('riwayat_pendidikan')->nullable();
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
