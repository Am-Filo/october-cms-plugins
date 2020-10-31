<?php namespace Gms\Feedback\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('gms_feedback_requests', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_feedback_requests');
    }
}
