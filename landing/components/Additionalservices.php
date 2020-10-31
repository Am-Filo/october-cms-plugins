<?php namespace Gms\Landing\Components;

use Cms\Classes\ComponentBase;
use Gms\Landing\Models\Additionalservice;


class Additionalservices extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'AdditionalServices',
            'description' => 'Services'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun(){
        $this->page['addtitional_items'] = Additionalservice::orderBy('id', 'desc')->get();
    }
}
