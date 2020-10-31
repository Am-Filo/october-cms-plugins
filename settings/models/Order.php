<?php namespace Gms\Settings\Models;

use Model;
use Gms\Settings\Models\Catalog as ShopProduct;
/**
 * Order Model
 */
class Order extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_settings_orders';

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
        'product' => [
			'Gms\Settings\Models\Catalog',
			'table' => 'gms_settings_order_p',
			'order'=> 'id'
        ],
        'product_in_order' => [
          'Gms\Settings\Models\UserOrder',
          'table' => 'gms_settings_order_prod',
          'order' => 'id'
        ]
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];

    public function getListsOptions()
    {
        $model = Category::lists('title', 'id');
        return $model;
    }
}
