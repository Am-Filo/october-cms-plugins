<?php namespace Gms\Feedback\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateFeedbackTable extends Migration
{
    public function up()
    {
        Schema::create('gms_feedback_feedback', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('is_active');
            $table->string('title');
            $table->string('submit_text');
            $table->string('script_switch');
            $table->text('submit_scripts');
            $table->string('url_add');
            $table->string('custom_url');
            $table->string('custom_url_text');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_feedback_feedback');
    }
}
