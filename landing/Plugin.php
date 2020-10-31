<?php namespace Gms\Landing;

use Backend;
use System\Classes\PluginBase;

/**
 * landing Plugin Information File
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
            'name'        => 'Landing page',
            'description' => 'GMS plugin for landing page',
            'author'      => 'GMS',
            'icon'        => 'icon-cogs'
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
        //return []; // Remove this line to activate

        return [
            'Gms\Landing\Components\Products' => 'products',
            'Gms\Landing\Components\Categories' => 'categories',
            'Gms\Landing\Components\Informations' => 'informations',
            'Gms\Landing\Components\Additionalservices' => 'additionalservices',
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
            'gms.landing.some_permission' => [
                'tab' => 'landing',
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
        //return []; // Remove this line to activate

        return [
            'landing' => [
                'label'       => 'Landing',
                'url'         => Backend::url('gms/landing/products'),
                'icon'        => 'icon-btc',
                'permissions' => ['gms.landing.*'],
                'order'       => 500,
                'sideMenu' => [
                    'product' => [
                        'label'       => 'Товары',
                        'icon'        => 'icon-cubes',
                        'url'         => \Backend::url('gms/landing/products'),
                    ],
                    'category' => [
                        'label'       => 'Категории',
                        'icon'        => 'icon-list-alt',
                        'url'         => \Backend::url('gms/landing/categories'),
                    ],   
                    'information' => [
                        'label'       => 'Информация',
                        'icon'        => 'icon-list-alt',
                        'url'         => \Backend::url('gms/landing/informations'),
                    ],
                    'additionalservices' => [
                        'label'       => 'Дополнительные сервисы',
                        'icon'        => 'icon-list-alt',
                        'url'         => \Backend::url('gms/landing/additionalservices'),
                    ],
                ],
            ],
        ];
    }
}
