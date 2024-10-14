<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoTable extends Migration
{
    public function up()
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->increments('departamento_id');
            $table->string('depto', 100);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('departamento');
    }
}
