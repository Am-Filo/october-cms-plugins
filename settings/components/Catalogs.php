<?php namespace Gms\Settings\Components;

use Session;
use Mail;
use Flash;
use Cms\Classes\Page;
use Cms\Classes\ComponentBase;
use Cms\Classes\Settings;
use Illuminate\Support\Facades\DB;
use Backend\Models\BrandSettings;
use Gms\Settings\Models\Catalog;
use Gms\Settings\Models\Category;
use Gms\Settings\Models\Catalog as ShopProduct;
use Gms\Settings\Models\Order as Orders;
use Gms\Settings\Models\DiscountProduct as Discount;

class Catalogs extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name'        => 'Вывод товаров по каталогам',
            'description' => 'Добавьте данный компонент на страницу, затем выберите раздел в настройках компонента'
        ];
    }

    public function defineProperties()
    {
        return [
        'slug' => [
                'title'       => 'Slug',
                'description' => 'Введите переменную для постов',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
            ],
        'catId' => [
                'title'       => 'Id категории',
                'description' => 'Выберите категорию',
                'type'        => 'dropdown',
                'default'     => '1'
            ]
        ];
    }

    public function getcatIdOptions()
    {
        $model = Category::lists('title', 'id');
        return $model;
    }

    public function GetProducts()
    {
        return Catalog::orderBy('id', 'desc')->get();
    }
  
    public function GetCategory()
    {
        $catId = $this->property('catId');

        $catId = $this->property('catId');
        $count = Category::where('id', $catId)->first();
        if (!$count) {
            $this->controller->setStatusCode(404);
            return $this->controller->run('404');
        }  return $count;
    }

     public function ViewProducts()
    {
        $catId = $this->property('catId');
        $catcatl = Catalog::where('category_id', $catId)->get();
        if (!$catcatl) {
            $this->controller->setStatusCode(404);
            return $this->controller->run('404');
        }  return $catcatl;
    }
    
    public function onFroget()
    {
        Session::flush();
        Session::regenerate();
        $value = Session::get('products');

        $this->page['result'] =  count($value);
    }

    public function onFAdd()
    {
      $id = post('id');
      $quantity = post('quantity');
      $add = 'products.'.$id;
      $addq='.quant';
      $addp='.price';
      $adds='.sale';
      $salepersent=0;
      $flag=false;
      if(empty($quantity) || $quantity == 0){
        $quantity = 1;
      }
      $productinbskt = ShopProduct::find($id);
      $priceprod = $productinbskt->price;

      $model=Db::table('gms_settings_discount_product_p')->where('catalog_id', '=', $id)->get();

      if (Session::has($add))
      {
        $value = Session::get($add.$addq)+$quantity;
        
        if($model)
        {
          foreach ($model as $models)
          {
            $model2=Db::table('gms_settings_discount_products')->where('id', '=', $models->discount_product_id)->get();
            
            if($model2)
            {
              foreach ($model2 as $modelp)
              {
                if($modelp->counts <= $value)
                {
                  $skidprod = ($productinbskt->price * $modelp->sale)/100;
                  $priceprod = $productinbskt->price - $skidprod;
                  $salepersent = $modelp->sale;
                  $this->page['pcount'] = $modelp->counts;
                  $this->page['persent'] = $modelp->sale;
                  $flag=true;
                }
              }
            }
          }
        }
        Session::put($add.$addq,$value);
        Session::put($add.$addp,$priceprod);
        Session::put($add.$adds,$salepersent);
      }
      else
      {
        if($model)
        {
          foreach ($model as $models)
          {
            $model2=Db::table('gms_settings_discount_products')->where('id', '=', $models->discount_product_id)->get();
            
            if($model2)
            {
              foreach ($model2 as $modelp)
              {
                if($modelp->counts <= $quantity)
                {
                  $skidprod = ($productinbskt->price * $modelp->sale)/100;
                  $priceprod = $productinbskt->price - $skidprod;
                  $salepersent = $modelp->sale;
                  $this->page['pcount'] = $modelp->counts;
                  $this->page['persent'] = $modelp->sale;
                  $flag=true;
                }
              }
            }
          } 
        }
        Session::put($add.$addq,$quantity);
        Session::put($add.$addp,$priceprod);
        Session::put($add.$adds,$salepersent);
      }

      $this->page['result'] = count(Session::get('products'));
      
      if($flag == true)
      {
        $this->page['rezpr'] = 1;
        $this->page['priskid'] = $priceprod;
        return
        [
          '#prprod' => $this->renderPartial('site/pricepr'),
        ];
      }
    }

    public function onViewBasket()
    {
        $price = 0;
        $arrBsk = Session::get('products');
        $i = 0;
        $array = array();
      
        if($arrBsk)
        {

            foreach ($arrBsk as $key => $value)
            {
              
              $i=$i+1;
              $productinbskt = ShopProduct::find($key);
              
              echo '<tr> 
                            <th scope="row">'.$i.'</th>
                            <td class="hidden-xs" style="vertical-align: middle;width:10%;">
                                <img width="100%" alt="'.$productinbskt->title.'" src="'.$productinbskt->attachments[0]->path.'">
                            </td>
                            <td style="vertical-align: middle;">
                                '.$productinbskt->title.'
                            </td>
                            <td style="vertical-align: middle;">
                             '.$value['quant'].'
                             </td>
                             <td style="vertical-align: middle;">
                                '.$value['price'].'
                            </td>
                            <td style="vertical-align: middle;">
                                '.$value['price']*$value['quant'].'
                            </td>
                            <td style="vertical-align: middle; width: 10%;text-align: center;">

                                <a data-request-update="\'modal/modal_basket\': \'#mod\'" data-request-data="id: '.$productinbskt->id.'" data-request="Catalogs::onDeleteBasket" data-attach-loading style="float: none;"" class="close" aria-hidden="true">X</a>
                            </td>
                            ';

                        $price=$price+$value['price']*$value['quant'];
            }
          
          echo '<div class="col-md-12" style="padding: 0px 10 30px 10;"> <h2>Заказ на сумму: <span class="basket">'.$price.' руб.<span></h2></div>';
        }

    }
  
    public function onSendMail1(){
      
      Mail::sendTo('info@vozduhvdome.su', 'gms.settings::mail.ordersendMail', [
            'name'  => post('name'),
            'tel'  => post('telephone'),
            'email'  => post('email'),
            'ip'  => $_SERVER['REMOTE_ADDR'],
        ]);
      
      $this->page['success_form'] = 1;
        return [
                    '#order' => $this->renderPartial('modal/form_order')
                ];
    }
    public function onSendMail2(){
      
      Mail::sendTo('info@vozduhvdome.su', 'gms.settings::mail.ordersendMail2', [
            'name'  => post('name'),
            'tel'  => post('telephone'),
            'ip'  => $_SERVER['REMOTE_ADDR'],
        ]);
      
      $this->page['success_form_btm'] = 1;
        return [
                    '#getorder' => $this->renderPartial('site/formajax')
                ];
    }
  
    public function onComplete(){

        $name = post('name');
        $tel = post('telephone');
        $email = post('email');
        $user_ip = $_SERVER['REMOTE_ADDR'];
        //$stamp = date("Ymdhis");
        //$order_id = $stamp-$user_ip;
        //$order_id = str_replace(".", "", $order_id);
        //echo($order_id);
        $order_id = rand(1,55555);//неоптимально
        //$order_id=round(microtime(true) * 1000);
        /*
        $random_id_length = 2; 
        $order_id = '';
      
        do {
            $bytes = random_bytes($random_id_length);
            $order_id .= str_replace(
                ['.','/','='], 
                '',
                base64_encode($bytes)
            );
        } while (strlen($order_id) < $random_id_length);
        */
        $price = 0;
        $arrBsk = Session::get('products');
      
        if($arrBsk)
        {
            foreach ($arrBsk as $key => $value) 
            {  
                $price=$price+$value['price']*$value['quant'];
            }
          
            DB::insert('insert into gms_settings_orders (order_id,user_id,tel,count,sum,status) values (?, ?, ?, ?, ?, ?)', [$order_id, $name, $tel, count(Session::get('products')),$price,'Новая заявка']);
            $getId = DB::table('gms_settings_orders')->where('order_id', $order_id)->pluck('id');
      
            foreach ($arrBsk as $key => $value) 
            {
                $productinbskt = ShopProduct::find($key);
                $psale=($productinbskt->price * $value['sale'])/100;
                Db::insert('insert into gms_settings_order_p (order_id,catalog_id,value) values (?,?,?)', [$getId, $productinbskt->id, $value['quant']]);
                Db::insert('insert into gms_settings_user_orders (title, count_prod, main_price, price, sale, price_sale) values (?,?,?,?,?,?)',[$productinbskt->title,$value['quant'],$productinbskt->price,$value['price'],$value['sale'],$psale]);
                $getId_ord = DB::table('gms_settings_user_orders')->where('title', $productinbskt->title)->pluck('id');
                Db::insert('insert into gms_settings_order_prod (order_id,	user_order_id) values (?,?)', [$getId,$getId_ord]);
            }
        }

        Mail::sendTo(post('email'), 'gms.settings::mail.orderconfirm', [
            'name'  => post('name'),
            'tel'  => post('telephone'),
            'order'  => $order_id,
            'count' => count(Session::get('products')),
            'total' => $price,
        ]);

        Mail::sendTo('info@vozduhvdome.su', 'gms.settings::mail.orderconfirm_admin', [
            'name'  => post('name'),
            'tel'  => post('telephone'),
            'email'  => post('email'),
            'order'  => $order_id,
            'count' => count(Session::get('products')),
            'ip' => $_SERVER['REMOTE_ADDR'],
            'total' => $price,
            'idOrder' => $getId,
        ]);

        Session::flush();
        $this->page['success'] = 1;
        return [
                    '#checku' => $this->renderPartial('modal/order_chekout')
                ];
        
    }

    public function onDeleteBasket(){

        $id = post('id');
        $add='products.'.$id;

        Session::forget($add);
      
        $Spcount = count(Session::get('products'));
        $this->page['result'] = $Spcount;
        return [
                    '#basket' => $this->renderPartial('bskt')
                ];

    }

    public function onRun()
    {
        $Spcount = count(Session::get('products'));
        $this->page['result'] = $Spcount;
    }

}
