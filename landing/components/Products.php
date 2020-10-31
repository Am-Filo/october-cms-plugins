<?php namespace Gms\Landing\Components;

use Cms\Classes\ComponentBase;
use Gms\Landing\Models\Product;
use Gms\Landing\Models\Category;

class Products extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Products',
            'description' => 'View sproduct'
        ];
    }

    public function defineProperties()
    {
        return [
            'maxItems' => [
                'title'       => 'Количество выводимых товаров',
                'description' => 'Введите 0 чтоб выводить все',
                'type'        => 'string',
                'default'     => 10,
                'validationPattern' => '^[0-9]+$',
                'validationMessage' => 'Максимальное количество отзывов могут быть только числовым параматром'
            ],
            'category_ignore' => [
                'title'       => 'игнорировать категории',
                'description' => 'Влючить данный чекбокс чтобы вывести все товары со всех категорий',
                'type'        => 'checkbox',
                'required'    => true
            ],
            'category' => [
                'title'       => 'Категория',
                'description' => 'Выберите выводимый каталог',
                'type'        => 'dropdown',
                'required'    => true
            ]
        ];
    }

    public function getCategoryOptions()
    {
        return Category::lists('category_title', 'id');
    }

    public function onRun()
    {
        $category = $this->property('category');
        $category_ignore = $this->property('category_ignore');

        if( $category_ignore )
        {
            $result = Product::all();
        }
        else{

            if($this->property('maxItems') == 0){
                 $result = Product::whereHas('categories', function($filter) use ($category){
                     $filter->where('id', '=', $category);
                 })->get();
            }
            else{
                $result = Product::whereHas('categories', function($filter) use ($category){
                    $filter->where('id', '=', $category);
                })->take($this->property('maxItems'))->get();
            }            
        }

        $this->page['products'] = $result;
    }

    public function onViewProduct(){

        $product = post('id');
        //dd(Product::where('id','=', $product)->get());
        $result = Product::where('id','=', $product)->get();
        $this->page['sproducts'] = $result;
    }

}