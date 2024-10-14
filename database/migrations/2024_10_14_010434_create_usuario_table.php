<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('nombres', 255);
            $table->string('apellidos', 255);
            $table->string('email', 255)->nullable();
            $table->string('password', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}
