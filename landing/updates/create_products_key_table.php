<?php namespace Gms\Landing\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProductsKeyTable extends Migration
{
    public function up()
    {
        Schema::create('gms_landing_products_key', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('product_id');
            $table->integer('category_id');
            $table->primary(['product_id','category_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('gms_landing_products_key');
    }
}
