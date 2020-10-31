<?php namespace Gms\Text\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateMainsTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('gms_text_mains');
        Schema::create('gms_text_mains', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_text_mains');
    }
}
