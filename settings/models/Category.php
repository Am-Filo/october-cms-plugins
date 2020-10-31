<?php namespace Gms\Settings\Models;

use Model;

/**
 * Category Model
 */
class Category extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_settings_categories';

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
    public $hasOne = [];
    public $hasMany = [];
    public $belongsTo = [];
    public $belongsToMany = [
      'filter_manufacturer' => [
			'Gms\Settings\Models\FilterManufacturer',
			'table' => 'gms_settings_filter_manufacturer_p',
			'order'=> 'id'
        ],
      'filter_performance' => [
			'Gms\Settings\Models\FilterPerformance',
			'table' => 'gms_settings_filter_performance_p',
			'order'=> 'id'
        ],
      'filter_filtration_system' => [
			'Gms\Settings\Models\FilterFiltrationSystem',
			'table' => 'gms_settings_filter_filtration_system_p',
			'order'=> 'id'
        ],
      'filter_air_heating' => [
			'Gms\Settings\Models\FilterAirHeating',
			'table' => 'gms_settings_filter_air_heating_p',
			'order'=> 'id'
        ],
      'filter_silent' => [
			'Gms\Settings\Models\FilterSilent',
			'table' => 'gms_settings_filter_silent_p',
			'order'=> 'id'
        ],
      'filter_humidity_sensor' => [
			'Gms\Settings\Models\FilterHumiditySensor',
			'table' => 'gms_settings_filter_humidity_sensor_p',
			'order'=> 'id'
        ],
      'filter_humidity_timer' => [
			'Gms\Settings\Models\FilterHumidityTimer',
			'table' => 'gms_settings_filter_humidity_timer_p',
			'order'=> 'id'
        ],
      'filter_type' => [
			'Gms\Settings\Models\FilterType',
			'table' => 'gms_settings_filter_type_p',
			'order'=> 'id'
        ],
      'filter_colour' => [
			'Gms\Settings\Models\FilterColour',
			'table' => 'gms_settings_filter_colour_p',
			'order'=> 'id'
        ],
      'filter_surface_temperature' => [
			'Gms\Settings\Models\FilterSurfaceTemperature',
			'table' => 'gms_settings_filter_surface_temperature_p',
			'order'=> 'id'
        ],
      'filter_power' => [
			'Gms\Settings\Models\FilterPower',
			'table' => 'gms_settings_filter_power_p',
			'order'=> 'id'
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
