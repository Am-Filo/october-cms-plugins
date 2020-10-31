<?php namespace Gms\Settings\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('gms_settings_categories', function(Blueprint $table) {
            Schema::dropIfExists('gms_settings_categories');
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('short_text');
            $table->string('content');
            $table->string('enable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_settings_categories');
    }
}
