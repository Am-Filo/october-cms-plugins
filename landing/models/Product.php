<?php namespace Gms\Landing\Models;

use Model;

/**
 * Product Model
 */
class Product extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_landing_products';

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
        'categories' =>[
            'Gms\Landing\Models\Category',
            'table' => 'gms_landing_products_key',
            'order' => 'category_title',
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'preview_img' => 'System\Models\File',
    ];
    public $attachMany = [
        'images' => 'System\Models\File',
    ];
}
