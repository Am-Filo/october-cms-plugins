<?php namespace Gms\Feedback\Models;

use Model;

/**
 * Send Model
 */
class Send extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_feedback_sends';

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
        'feedback_mails' => [
              'Gms\Feedback\Models\Feedback',
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
