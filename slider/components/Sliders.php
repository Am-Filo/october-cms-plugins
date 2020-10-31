<?php namespace Gms\Slider\Components;

use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use gms\Slider\Models\Slider;

class Sliders extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Слайдер',
            'description' => 'Слайдер для сайта Воздух В Доме'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function getSlides()
    {
        return Slider::orderBy('id', 'desc')->get();
    }
}
