<?php namespace Gms\Feedback\Models;

use Model;

/**
 * Feedback Model
 */
class Feedback extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_feedback_feedback';

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
        'inputs' => [
          'Gms\Feedback\Models\Input',
          'table' => 'gms_feedback_key',
          'order' => 'id'
        ],
        'mails' => [
          'Gms\Feedback\Models\Send',
          'table' => 'gms_send_key',
          'order' => 'id'
        ],
    ];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [];
    public $attachMany = [];
}
