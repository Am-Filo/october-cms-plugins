<?php namespace Gms\Landing\Models;

use Model;

/**
 * Information Model
 */
class Information extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_landing_information';

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
        'logo_head' => 'System\Models\File',
        'logo_bottom' => 'System\Models\File',
        'download_catalog' => 'System\Models\File',
        'top_img_form' => 'System\Models\File',
    ];
    public $attachMany = [];
}
