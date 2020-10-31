<?php namespace Gms\Settings\Models;

use Model;

/**
 * FilterAirHeating Model
 */
class FilterAirHeating extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_settings_filter_air_heatings';

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
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
