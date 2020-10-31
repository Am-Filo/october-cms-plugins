<?php namespace Gms\Landing\Models;

use Model;

/**
 * Feedback Model
 */
class Feedback extends Model
{
    /**
     * @var string The database table used by the model.
     */
    public $table = 'gms_landing_feedback';

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
