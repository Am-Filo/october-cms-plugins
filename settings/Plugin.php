<?php namespace Gms\Settings;

use Backend;
use System\Classes\PluginBase;

/**
 * settings Plugin Information File
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
            'name'        => 'settings',
            'description' => 'Настройки сайта',
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
        return ['Gms\Settings\Components\Catalogs' => 'Catalogs',
                'Gms\Settings\Components\Categorys' => 'Category',
                'Gms\Settings\Components\Catalogsone' => 'Catalogsone'
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
            'gms.settings.some_permission' => [
                'tab' => 'settings',
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
            'settings' => [
                'label'       => 'Настройки',
                'url'         => \Backend::url('gms/settings/catalogs'),
                'icon'        => 'icon-list-alt',
                'order'       => 500,
                'sideMenu' => [
                        'post' => [
                            'label'       => 'Товары',
                            'icon'        => 'icon-list-alt',
                            'url'         => \Backend::url('gms/settings/catalogs'),
                        ],
                        'categorys' => [
                            'label'       => 'Категории',
                            'icon'        => 'icon-list-alt',
                            'url'         => \Backend::url('gms/settings/categorys'),
                        ],
                        'Orders' => [
                            'label'       => 'Заказы',
                            'icon'        => 'icon-list-alt',
                            'url'         => \Backend::url('gms/settings/orders'),
                        ]
                ]

            ]
        ];
    }
}
