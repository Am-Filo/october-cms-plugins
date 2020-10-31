<?php namespace Gms\Text;

use Backend;
use System\Classes\PluginBase;

/**
 * text Plugin Information File
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
            'name'        => 'text',
            'description' => 'настройка содержимого сайта',
            'author'      => 'gms',
            'icon'        => 'icon-pencil'
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
            'Gms\Text\Components\Mains' => 'Mains',
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
            'gms.text.some_permission' => [
                'tab' => 'text',
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
            'text' => [
                'label'       => 'Тексты',
                'url'         => \Backend::url('gms/text/main'),
                'icon'        => 'icon-list-alt',
                'order'       => 500,
                'sideMenu' => [
                        'main' => [
                            'label'       => 'Главная страница',
                            'icon'        => 'icon-list-alt',
                            'url'         => \Backend::url('gms/text/main'),
                        ],
                        'services' => [
                            'label'       => 'Услуги',
                            'icon'        => 'icon-list-alt',
                            'url'         => \Backend::url('gms/text/services'),
                        ],
                        'contact' => [
                            'label'       => 'Контакты',
                            'icon'        => 'icon-list-alt',
                            'url'         => \Backend::url('gms/text/contacts'),
                        ],
                ]

            ]
        ];
    }
}
