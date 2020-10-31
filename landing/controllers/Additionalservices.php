<?php namespace Gms\Landing\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Additionalservices Back-end Controller
 */
class Additionalservices extends Controller
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

        BackendMenu::setContext('Gms.Landing', 'landing', 'additionalservices');
    }
}
