<?php namespace Gms\Landing\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Advantages Back-end Controller
 */
class Advantages extends Controller
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

        BackendMenu::setContext('Gms.Landing', 'landing', 'advantages');
    }
}
