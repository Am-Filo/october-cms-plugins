<?php namespace Gms\Slider\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateSlidersTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('gms_slider_sliders');
        Schema::create('gms_slider_sliders', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('url');
            $table->string('text_url');
            $table->string('main_title');
            $table->string('text');
            $table->string('url-info-text');
            $table->string('url_swicher');
            $table->string('info_enable');
            $table->string('main_enable');
            $table->string('desc_enable');
            $table->string('url-info-enable');
            $table->string('enable');          
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_slider_sliders');
    }
}
