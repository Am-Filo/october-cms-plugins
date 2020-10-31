<?php namespace Gms\Landing\Models;

use Model;

/**
 * Additionalservice Model
 */
class Additionalservice extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_landing_additionalservices';

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
    public $attachOne = [
        'additional_image' => 'System\Models\File',
    ];
    public $attachMany = [];
}
