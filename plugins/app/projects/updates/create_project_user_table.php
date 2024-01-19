<?php

namespace App\Projects\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectUserTable extends Migration
{
    public function up()
    {
        Schema::create('app_project_user', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('project_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->primary(['project_id', 'user_id']);


            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_project_user');
    }
}