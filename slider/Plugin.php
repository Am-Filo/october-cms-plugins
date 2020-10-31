<?php namespace Gms\Slider;

use Backend;
use System\Classes\PluginBase;

/**
 * slider Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Слайдер',
            'description' => 'Слайдер для сайта Воздух В Доме',
            'author'      => 'gms',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Gms\Slider\Components\Sliders' => 'Sliders',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'gms.slider.some_permission' => [
                'tab' => 'slider',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'slider' => [
                'label'       => 'Слайдер',
                'url'         => \Backend::url('gms/slider/sliders'),
                'icon'        => 'icon-list-alt',
                'order'       => 500,
                'sideMenu' => [
                    'slide' => [
                        'label'       => 'Слайды',
                        'icon'        => 'icon-list-alt',
                        'url'         => \Backend::url('gms/slider/sliders'),
                    ],           
                ]

            ]
        ];
    }
}
