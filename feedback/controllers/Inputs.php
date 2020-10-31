<?php namespace Gms\Feedback\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Inputs Back-end Controller
 */
class Inputs extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Gms.Feedback', 'feedback', 'inputs');
    }
}
