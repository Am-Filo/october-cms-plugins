<?php namespace Gms\Landing\Components;


use Flash;
use Cms\Classes\ComponentBase;
use Gms\Landing\Models\Category;
use Gms\Landing\Models\Product;

class Categories extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Category',
            'description' => 'View all categorys'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

    public function viewCategory(){
        return Category::orderBy('id', 'desc')->get();
    }

    public function onViewProducts(){

        $category = post('id');
        
        // return Product::whereHas('categories', function($filter) use ($category){
        //          $filter->where('id', '=', $category);
        //      })->get();

        if($category == 0)
             $this->page['products'] = Product::all();
        else{
        $this->page['products'] = Product::whereHas('categories', function($filter) use ($category){
                 $filter->where('id', '=', $category);
             })->get();
        }
        return [
            '#modalst' => $this->renderPartial('modaljs'),
        ];
    }

}
