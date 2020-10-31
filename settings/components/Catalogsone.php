<?php namespace Gms\Settings\Components;

use Cms\Classes\Page;
use Mail;
use Cms\Classes\ComponentBase;
use Gms\Settings\Models\Catalog;
use Gms\Settings\Models\Category;
use Illuminate\Support\Facades\DB;

class Catalogsone extends ComponentBase
{

    public $slug;
    public $catcalone;
    
    public function componentDetails()
    {
        return [
            'name'        => 'Вывод одного товара',
            'description' => 'Выводим 1 товар из выбранной категории'
        ];
    }

    public function defineProperties()
    {
        return [
        'slug' => [
                'title'       => 'Slug',
                'description' => 'Введите переменную',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
            ],
        ];
    }

    public function getImages()
    {
        return Catalog::orderBy('id', 'desc')->get();
    }

    public function GetCategoryes()
    {
        $slug = $this->property('slug');
        $catid = Db::select('select category_id from gms_settings_catalogs where slug = ?', [$slug]);
        foreach ($catid as $catidw) {        
            $catcatl = Category::where('id', $catidw->category_id)->first();
            if (!$catcatl) {
                $this->controller->setStatusCode(404);
                return $this->controller->run('404');
            }  return $catcatl;
        }
    }
    
    public function onSendMail(){
      
      Mail::sendTo('info@vozduhvdome.su', 'gms.settings::mail.ordersendFMail', [
            'name'  => post('name'),
            'tel'  => post('telephone'),
            'id'  => post('id'),
            'title' => post('title'),
            'url' => post('url'),
            'ip'  => $_SERVER['REMOTE_ADDR'],
        ]);
      
      $this->page['success_form_ct'] = 1;
        return [
                    '#forder' => $this->renderPartial('site/forder')
                ];
    }

    public function onRun()
    {
        $slug = $this->property('slug');

        $catcalone = Catalog::where('slug', $slug)->first();
        if (!$catcalone) {
            $this->controller->setStatusCode(404);
            return $this->controller->run('404');
        } $this->page['catcalone'] = $catcalone;
    }

}
