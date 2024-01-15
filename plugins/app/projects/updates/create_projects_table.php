<?php

namespace App\Projects\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('app_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('project_id')->unsigned();
            $table->text('title');
            $table->text('description')->nullable();
            $table->boolean('is_done')->default(false);
            $table->text('customer')->nullable();
            $table->json('coworkers')->nullable();
            $table->text('list')->nullable();
            $table->bigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_projects');

    }
}
