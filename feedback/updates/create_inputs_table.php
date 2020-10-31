<?php namespace Gms\Feedback\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateInputsTable extends Migration
{
    public function up()
    {
        Schema::create('gms_feedback_inputs', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('is_active');
            $table->string('title');
            $table->text('type');
            $table->text('placeholder');
            $table->string('required');
            $table->text('input_id');
            $table->text('input_class');
            $table->text('mask');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_feedback_inputs');
    }
}
