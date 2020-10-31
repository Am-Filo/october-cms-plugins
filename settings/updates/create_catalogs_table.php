<?php namespace Gms\Settings\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateCatalogsTable extends Migration
{
    public function up()
    {
        Schema::create('gms_settings_catalogs', function(Blueprint $table) {
            Schema::dropIfExists('gms_settings_catalogs');
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('price');
            $table->string('count');
            $table->string('slug');
            $table->string('new_swicher');
            $table->string('label_switcher');
            $table->string('short_text');
            $table->string('content');
            $table->string('characteristic');
            $table->string('category_id');
            $table->string('enable');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_settings_catalogs');
    }
}
