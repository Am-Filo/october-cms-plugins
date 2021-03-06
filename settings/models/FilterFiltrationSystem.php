<?php namespace Gms\Settings\Models;

use Model;

/**
 * FilterFiltrationSystem Model
 */
class FilterFiltrationSystem extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_settings_filter_filtration_systems';

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
