<?php namespace Gms\Feedback\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSendKeyTable extends Migration
{
    public function up()
    {
        Schema::create('gms_send_key', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('feedback_id');
            $table->string('send_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_send_key');
    }
}
