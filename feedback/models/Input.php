<?php namespace Gms\Feedback\Models;

use Model;

/**
 * Input Model
 */
class Input extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_feedback_inputs';

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
        'feedback' => [
          'Gms\Feedback\Models\Feedback',
          'table' => 'gms_feedback_key',
          'order' => 'id'
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
