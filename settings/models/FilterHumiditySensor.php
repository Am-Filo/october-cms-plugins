<?php namespace Gms\Settings\Models;

use Model;

/**
 * FilterHumiditySensor Model
 */
class FilterHumiditySensor extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_settings_filter_humidity_sensors';

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
