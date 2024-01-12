<?php

namespace App\Tasks\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('app_tasks', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('task_id');
            $table->string('task_name', 255)->nullable(false);
            $table->text('description')->nullable();
            $table->integer('project_id')->unsigned()->nullable();
            $table->integer('subscribers_user_id')->unsigned()->nullable();
            $table->boolean('is_completed')->default(false);
            $table->date('planned_start')->nullable();
            $table->date('planned_end')->nullable();
            $table->time('planned_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_tasks');
    }
}
