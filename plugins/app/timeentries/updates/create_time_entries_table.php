<?php namespace App\Timeentries\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTimeEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('app_timeentries', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('entry_id');
            $table->bigInteger('user_id');
            $table->dateTime('start_time')->nullable();
            $table->dateTime('end_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('app_timeentries');
    }
}
