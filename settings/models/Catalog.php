<?php namespace Gms\Settings\Models;

use Model;
use gms\Settings\Models\FilterSurfaceTemperature;
use gms\Settings\Models\FilterFiltrationSystem;
use gms\Settings\Models\FilterHumiditySensor;
use gms\Settings\Models\FilterHumidityTimer;
use gms\Settings\Models\FilterManufacturer;
use gms\Settings\Models\FilterPerformance;
use gms\Settings\Models\FilterAirHeating;
use gms\Settings\Models\FilterSilent;
use gms\Settings\Models\FilterColour;
use gms\Settings\Models\FilterPower;
use gms\Settings\Models\FilterType;
use gms\Settings\Models\Category;

/**
 * Catalog Model
 */
class Catalog extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_settings_catalogs';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [];

    /**
     * @var array Relations
     */

    public function getListsFilterAirHeating()
    { 
        $model = FilterAirHeating::lists('info', 'id');
        return $model;
    }
    public function getListsFilterSurfaceTemperature()
    { 
        $model = FilterSurfaceTemperature::lists('info', 'id');
        return $model;
    }
    public function getListsFilterFiltrationSystem()
    { 
        $model = FilterFiltrationSystem::lists('info', 'id');
        return $model;
    } 
    public function getListsFilterHumiditySensor()
    { 
        $model = FilterHumiditySensor::lists('info', 'id');
        return $model;
    } 
    public function getListsFilterHumidityTimer()
    { 
        $model = FilterHumidityTimer::lists('info', 'id');
        return $model;
    } 
    public function getListsFilterManufacturer()
    { 
        $model = FilterManufacturer::lists('info', 'id');
        return $model;
    } 
    public function getListsFilterPerformance()
    { 
        $model = FilterPerformance::lists('info', 'id');
        return $model;
    } 
    public function getListsFilterSilent()
    { 
        $model = FilterSilent::lists('info', 'id');
        return $model;
    } 
    public function getListsFilterColour()
    { 
        $model = FilterColour::lists('info', 'id');
        return $model;
    } 
    public function getListsFilterPower()
    { 
        $model = FilterPower::lists('info', 'id');
        return $model;
    }
    public function getListsFilterType()
    { 
        $model = FilterType::lists('info', 'id');
        return $model;
    }
  
    public function getListsOptions()
    { 
        $model = Category::lists('title', 'id');
        return $model;
    } 


    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = ['category' => ['gms\Settings\Models\Category']];
    public $belongsToMany = [
      'discount_product' => [
			'Gms\Settings\Models\DiscountProduct',
			'table' => 'gms_settings_discount_product_p',
			'order'=> 'id'
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'pl_1_file' => ['System\Models\File'],
        'pl_2_file' => ['System\Models\File'],
        'pl_3_file' => ['System\Models\File'],
        'pl_4_file' => ['System\Models\File']
    ];
    public $attachMany = ['attachments' => ['System\Models\File']];
}
