<?php namespace Gms\Landing\Components;

use Cms\Classes\ComponentBase;
use Gms\Landing\Models\Information;

class Informations extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Information',
            'description' => 'Landing information'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun(){
       $this->page['information'] = Information::orderBy('id', 'desc')->get()->first();
    }
}
