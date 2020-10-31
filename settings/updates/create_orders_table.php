<?php namespace Gms\Settings\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('gms_settings_orders', function(Blueprint $table) {
            Schema::dropIfExists('gms_settings_orders');
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('order_id');
            $table->string('user_id');
            $table->string('count');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_settings_orders');
    }
}
