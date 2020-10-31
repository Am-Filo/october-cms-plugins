<?php namespace Gms\Settings\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Filter Manufacturers Back-end Controller
 */
class FilterManufacturers extends Controller
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

        BackendMenu::setContext('Gms.Settings', 'settings', 'filtermanufacturers');
    }
}
