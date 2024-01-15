<?php

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('app_tasks', function (Blueprint $table) {
            $table->increments('task_id')->unsigned();
            $table->string('task_name');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('subscribers_user_id')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->unsignedBigInteger('created_by');
            $table->timestamp('planned_start')->nullable();
            $table->timestamp('planned_end')->nullable();
            $table->integer('planned_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_tasks');
    }
}
