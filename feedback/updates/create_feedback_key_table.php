<?php namespace Gms\Feedback\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateFeedbackKeyTable extends Migration
{
    public function up()
    {
        Schema::create('gms_feedback_key', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('feedback_id');
            $table->string('input_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_feedback_key');
    }
}
