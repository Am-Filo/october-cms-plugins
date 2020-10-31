<?php namespace Gms\Slider\Models;

use Model;

/**
 * Slider Model
 */
class Slider extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_slider_sliders';

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
    public $attachOne = ['attachment' => ['System\Models\File']];
    public $attachMany = [];
}
