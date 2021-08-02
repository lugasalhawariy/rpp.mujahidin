<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('username')->unique()->nullable();
            $table->integer('sekolah_id')->nullable();
            $table->string('no_telp')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nbm_guru')->nullable();
            $table->string('nip_guru')->nullable();
            $table->text('alamat')->nullable();
            $table->longText('riwayat_pendidikan')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
