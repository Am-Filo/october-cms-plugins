<?php namespace Gms\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateAdditionalservicesTable extends Migration
{
    public function up()
    {
        Schema::create('gms_landing_additionalservices', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->string('is_active');
            $table->string('switch_add');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_landing_additionalservices');
    }
}
