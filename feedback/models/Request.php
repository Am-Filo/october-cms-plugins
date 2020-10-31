<?php namespace Gms\Feedback\Models;

use Model;

/**
 * Request Model
 */
class Request extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_feedback_requests';

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
