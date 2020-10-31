<?php namespace Gms\Feedback;

use Backend;
use System\Classes\PluginBase;

/**
 * feedback Plugin Information File
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
            'name'        => 'Feedback',
            'description' => 'Feedback landing',
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
        //return []; // Remove this line to activate

        return [
            'Gms\Feedback\Components\Feedbacks' => 'feedbacks',
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
            'gms.feedback.some_permission' => [
                'tab' => 'feedback',
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
            'feedback' => [
                'label'       => 'Feedback',
                'url'         => Backend::url('gms/feedback/requests'),
                'icon'        => 'icon-leaf',
                'permissions' => ['gms.feedback.*'],
                'order'       => 500,
                'sideMenu' => [
                    'request' => [
                        'label'       => 'Заявки',
                        'icon'        => 'icon-cubes',
                        'url'         => \Backend::url('gms/feedback/requests'),
                    ],
                    'feedback' => [
                        'label'       => 'формы',
                        'icon'        => 'icon-list-alt',
                        'url'         => \Backend::url('gms/feedback/feedbacks'),
                    ],
                ],
            ],
        ];
    }
}
