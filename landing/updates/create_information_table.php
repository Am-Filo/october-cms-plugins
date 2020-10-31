<?php namespace Gms\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateInformationTable extends Migration
{
    public function up()
    {
        Schema::create('gms_landing_information', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title');
            $table->string('phone');
            $table->string('phone_tag');
            $table->string('time_visit');
            $table->string('slogan');
            $table->string('icons_form_top');
            $table->string('icons_garanty');
            $table->string('get_kitchen');
            $table->string('switch_download');
            $table->string('download_text_catalog');
            $table->string('map_h_text');
            $table->string('map');
            $table->string('zamer_switch');
            $table->string('zamer_name');
            $table->string('credit_switch');
            $table->string('rasschet_switch');
            $table->string('get_house_info');
            $table->string('icons_map_bot');
            $table->string('add_services_txt');
            $table->string('footer_adress');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_landing_information');
    }
}
