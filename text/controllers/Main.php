<?php namespace Gms\Text\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Main Back-end Controller
 */
class Main extends Controller
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

        BackendMenu::setContext('Gms.Text', 'text', 'main');
    }
}
