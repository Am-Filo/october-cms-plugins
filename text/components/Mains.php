<?php namespace Gms\Text\Components;

use Cms\Classes\ComponentBase;
use Gms\Text\Models\Main;

class Mains extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Main Component',
            'description' => 'No description provided yet...'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function onRun()
    {
        $catcalone = Main::where('id', 1)->first();
        if (!$catcalone) {
            $this->controller->setStatusCode(404);
            return $this->controller->run('404');
        } $this->page['catcalone'] = $catcalone;
    }
}
