<?php namespace Gms\Settings\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateUserOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('gms_settings_user_orders', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_settings_user_orders');
    }
}
