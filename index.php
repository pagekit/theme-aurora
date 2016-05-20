<?php

return [

    'name' => 'theme-aurora',

    /**
     * Menu positions
     */
    'menus' => [

        'main' => 'Main',
        'offcanvas' => 'Offcanvas',
        'footer' => 'Footer'

    ],

    /**
     * Widget positions
     */
    'positions' => [

        'toolbar' => 'Toolbar',
        'navbar' => 'Navbar',
        'hero' => 'Hero',
        'content_top' => 'Content Top',
        'top' => 'Top A',
        'top_b' => 'Top B',
        'top_c' => 'Top C',
        'top_d' => 'Top D',
        'sidebar' => 'Sidebar',
        'bottom' => 'Bottom A',
        'bottom_b' => 'Bottom B',
        'bottom_c' => 'Bottom C',
        'bottom_d' => 'Bottom D',
        'content_bottom' => 'Content Bottom',
        'footer' => 'Footer',
        'sidebar_menu' => 'Sidebar Menu',
        'sidebar_main' => 'Sidebar Main',
        'sidebar_social' => 'Sidebar Social',
        'offcanvas' => 'Offcanvas'

    ],

    /**
     * Node defaults
     */
    'node' => [

        'title_hide' => false,
        'title_large' => false,
        'alignment' => '',
        'html_class' => '',
        'sidebar_first' => false,
        'hero_image' => '',
        'hero_viewport' => '',
        'hero_contrast' => '',
        'hero_parallax' => '',
        'content_top_padding' => true,
        'content_bottom_padding' => true

    ],

    /**
     * Widget defaults
     */
    'widget' => [

        'title_hide' => false,
        'title_size' => 'uk-panel-title',
        'alignment' => '',
        'html_class' => '',
        'panel' => ''

    ],

    /**
     * Settings url
     */
    'settings' => '@site/settings#site-theme',

    /**
     * Configuration defaults
     */
    'config' => [

        'style' => '',
        'logo_small' => '',
        'logo_offcanvas' => '',
        'section_divider' => true,
        'sidebar_width' => '40',
        'sidebar_parallax' => true,
        'sidebar_fixed' => true,
        'totop_scroller' => true

    ],

    /**
     * Events
     */
    'events' => [

        'view.system/site/admin/settings' => function ($event, $view) use ($app) {
            $view->script('site-theme', 'theme:app/bundle/site-theme.js', 'site-settings');
            $view->data('$theme', $this);
        },

        'view.system/site/admin/edit' => function ($event, $view) {
            $view->script('node-theme', 'theme:app/bundle/node-theme.js', 'site-edit');
        },

        'view.system/widget/edit' => function ($event, $view) {
            $view->script('widget-theme', 'theme:app/bundle/widget-theme.js', 'widget-edit');
        },

        /**
         * Custom markup calculations based on theme settings
         */
        'view.layout' => function ($event, $view) use ($app) {

            if ($app->isAdmin()) {
                return;
            }

            $params = $view->params;

            $classes = [
                'navbar' => 'tm-navbar',
                'hero' => '',
                'parallax' => ''
            ];

            $sticky = [
                'media' => 767,
                'showup' => false,
                'animation' => 'uk-animation-slide-top'
            ];

            if ($params['hero_viewport']) {
                $classes['hero'] = 'tm-hero-height';
            }

            if ($params['hero_parallax'] && $view->position()->exists('hero') && $params['hero_image']) {
                $classes['parallax'] = 'data-uk-parallax="{bg: \'-400\'}"';
            }

            if ($params['hero_contrast'] && $params['hero_image']) {
                $classes['hero'] .= ' uk-contrast';
            }

            $classes['sticky'] = 'data-uk-sticky=\''.json_encode($sticky).'\'';

            if ($params['section_divider']) {
                $classes['body'][] = 'tm-section-divider';
            }

            if ($params['sidebar_width']) {
                $classes['body'][] = 'tm-sidebar-width-'.$params['sidebar_width'];
            }

            if ($params['sidebar_parallax']) {
                $classes['body'][] = 'tm-sidebar-parallax';
            }

            if ($params['sidebar_fixed']) {
                $classes['body'][] = 'tm-sidebar-background-fixed';
            }

            if (key_exists('body', $classes)) {
                $classes['body'] = sprintf('class="%s"', trim(implode(' ', $classes['body'])));
            }

            $params['classes'] = $classes;
        },

        'view.system/site/widget-menu' => function ($event, $view) {

            if ($event['widget']->position == 'navbar') {
                $event->setTemplate('menu-navbar.php');
            }

        }

    ]

];
