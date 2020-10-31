<?php namespace Gms\Settings\Components;
use Flash;
use Cms\Classes\ComponentBase;
use Gms\Settings\Models\Catalog;
use Gms\Settings\Models\Category;
use Illuminate\Support\Facades\DB;

class Categorys extends ComponentBase
{
  
    public function componentDetails()
    {
        return [
            'name'        => 'Каталог',
            'description' => 'Вывод каталогов\каталога'
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
  
    public function onStartFilter()
    {
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $refresh = post('name');
        $wherereq = '';
        $manufacturer =  post('manufacturer');
        $performance =  post('performance');
        $filtration_system =  post('filtration_system');
        $air_heating =  post('air_heating');
        $silent =  post('silent');
        $humidity_sensor =  post('humidity_sensor');
        $humidity_timer =  post('humidity_timer');
        $type =  post('type');
        $colour =  post('colour');
        $surface_temperature =  post('surface_temperature');
        $power =  post('power');
        if( $refresh == 1 ) return 0;
        if( $manufacturer !=0 ) $wherereq = $wherereq.'enable_manufacturer = 1 AND filter_manufacturer = '.$manufacturer.' AND ';
        if( $performance !=0 ) $wherereq = $wherereq.'enable_performance = 1 AND filter_performance = '.$performance.' AND ';
        if( $filtration_system !=0 ) $wherereq = $wherereq.'enable_filtration_system = 1 AND filter_filtration_system = '.$filtration_system.' AND ';
        if( $air_heating !=0 ) $wherereq = $wherereq.'enable_air_heating = 1 AND filter_air_heating = '.$air_heating.' AND ';
        if( $silent !=0 ) $wherereq = $wherereq.'enable_silent = 1 AND filter_silent = '.$silent.' AND ';
        if( $humidity_sensor !=0 ) $wherereq = $wherereq.'enable_humidity_sensor = 1 AND filter_humidity_sensor = '.$humidity_sensor.' AND ';
        if( $humidity_timer !=0 ) $wherereq = $wherereq.'enable_humidity_timer = 1 AND filter_humidity_timer = '.$humidity_timer.' AND ';
        if( $type !=0 ) $wherereq = $wherereq.'enable_type = 1 AND filter_type = '.$type.' AND ';
        if( $colour !=0 ) $wherereq = $wherereq.'enable_colour = 1 AND filter_colour = '.$colour.' AND ';
        if( $surface_temperature !=0 ) $wherereq = $wherereq.'enable_surface_temperature = 1 AND filter_surface_temperature = '.$surface_temperature.' AND ';
        if( $power !=0 ) $wherereq = $wherereq.'enable_power = 1 AND filter_power = '.$power.' AND ';

        if( $manufacturer !=0 or $performance !=0 or $filtration_system !=0 or $air_heating !=0 or $silent !=0 or $humidity_sensor !=0 or $humidity_timer !=0 or $type !=0 or $colour !=0 or $surface_temperature !=0 or $power !=0)
        {

          $wherereq1 = substr($wherereq, 0, -4);
          $model = Db::select('select * from gms_settings_catalogs where '.$wherereq1);
          $this->page['catfilter'] = $model;
          return $model;

        }
    }
  
    public function GetCategory()
    {      
        $slug = $this->property('slug');
        $count = Category::where('slug', $slug)->first();
        if (!$count) {
            $this->controller->setStatusCode(404);
            return $this->controller->run('404');
        }  return $count;
    }

    public function ViewProducts()
    {
        $slug = $this->property('slug');
        
        $catid = Db::select('select id from gms_settings_categories where slug = ?', [$slug]);
        foreach ($catid as $catidw) {        
            $this->page['catcalslug'] = $slug;
            $catcatl = Catalog::where('category_id', $catidw->id)->get();
            if (!$catcatl) {
                $this->controller->setStatusCode(404);
                return $this->controller->run('404');
            }  return $catcatl;
        }
    }
  
    public function getListsFilterAirHeating()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_air_heating_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_air_heating_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_air_heatings')->whereIn('id', $array)->get();

        return $model;
    }
  
    public function getListsFilterSurfaceTemperature()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_surface_temperature_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_surface_temperature_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_surface_temperatures')->whereIn('id', $array)->get();
        return $model;
    }
  
    public function getListsFilterFiltrationSystem()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_filtration_system_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_filtration_system_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_filtration_systems')->whereIn('id', $array)->get();
        return $model;
    } 
  
    public function getListsFilterHumiditySensor()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_humidity_sensor_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_humidity_sensor_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_humidity_sensors')->whereIn('id', $array)->get();
        return $model;
    } 
  
    public function getListsFilterHumidityTimer()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_humidity_timer_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_humidity_timer_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_humidity_timers')->whereIn('id', $array)->get();
        return $model;
    }
  
    public function getListsFilterManufacturer()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_manufacturer_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_manufacturer_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_manufacturers')->whereIn('id', $array)->get();
        return $model;
    } 
  
    public function getListsFilterPerformance()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_performance_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_performance_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_performances')->whereIn('id', $array)->get();
        return $model;
    } 
  
    public function getListsFilterSilent()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_silent_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_silent_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_silents')->whereIn('id', $array)->get();
        return $model;
    } 
  
    public function getListsFilterColour()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_colour_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_colour_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_colours')->whereIn('id', $array)->get();
        return $model;
    } 
  
    public function getListsFilterPower()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_power_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_power_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_powers')->whereIn('id', $array)->get();
        return $model;
    }
  
    public function getListsFilterType()
    { 
        $catid = Db::table('gms_settings_categories')->where('slug', $this->property('slug'))->pluck('id');
        $filterid = Db::table('gms_settings_filter_type_p')->where('category_id', $catid)->get();
        $i=0;$array=[];
        foreach ($filterid as $key => $value)
        {
          $array = array_add($array,$i, $value->filter_type_id);
          $i=$i+1;
        }
        $model = Db::table('gms_settings_filter_types')->whereIn('id', $array)->get();
        return $model;
    }
}
