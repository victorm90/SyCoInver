<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => 'SySInV | ',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => true,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    |
    | Here you can allow or not the use of external google fonts. Disabling the
    | google fonts may be useful if your admin panel internet access is
    | restricted somehow.
    |
    | For detailed instructions you can look the google fonts section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>®SySIn</b>veC',
    'logo_img' => 'vendor/adminlte/dist/img/SysInveC2.png',
    'logo_img_class' => 'brand-image img-circle elevation-5',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    |
    | Here you can setup an alternative logo to use on your login and register
    | screens. When disabled, the admin panel logo will be used instead.
    |
    | For detailed instructions you can look the auth logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'auth_logo' => [
        'enabled' => false,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/SysInveC2.png',
            'alt' => 'Auth Logo',
            'class' => '',
            'width' => 70,
            'height' => 70,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    |
    | Here you can change the preloader animation configuration.
    |
    | For detailed instructions you can look the preloader section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'preloader' => [
        'enabled' => true,
        'img' => [
            'path' => 'vendor/adminlte/dist/img/SysInveC2.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'text' => 'hola',
            'width' => 200,
            'height' => 200,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-info',
    'usermenu_image' => true,
    'usermenu_desc' => true,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => 'font-weight: bold',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-primary elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark navbar-light',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-dark',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => true,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'Busqueda',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,

        ],

        [
            'text'        => 'Nosotros',
            'route'         => 'admin.home',
            'icon'        => 'fas fa-users fa-fw',
            'can'  => 'admin.users.index',
            'topnav_right' => true,

        ],
        [
            'text'        => 'Contactanos',
            'route'         => 'admin.home',
            'icon'        => 'fas fa-email',
            'can'  => 'admin.users.index',
            'topnav_right' => true,
        ],
        [
            'text' => 'Ejecuciones',
            'route'  => 'admin.ejecuciones.index',
            'icon' => 'fas fa-balance-scale',
            'can'  => 'admin.home',
            'active' => ['admin/ejecuciones*'],
            'topnav' => true,
        ],
        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'Busqueda',
        ],
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            'header' => 'PANEL ADMINISTRATIVO',
            'icon'        => 'fas fa-home fa-fw',
            'label' => '3',
            'label_color' => 'danger',

        ],
        [
            'text'        => 'Usuarios',
            'route'         => 'admin.users.index',
            'icon'        => 'fas fa-users fa-fw',
            'can'  => 'admin.users.index',

        ],
        [
            'text'        => 'Roles',
            'route'         => 'admin.roles.index',
            'icon'        => 'fas fa-user-secret',
            'can'  => 'admin.roles.index',

        ],
        [
            'text'        => 'Permisos',
            'route'         => 'admin.permisos.index',
            'icon'        => 'fas fa-key  fa-fw',
            'can'  => 'admin.permisos.index',

        ],

        [
            'text' => 'Logs del Sistema',
            'route'  => 'admin.logs',
            'icon' => ' fas fa-exclamation-triangle',
            'can'  => 'admin.roles.index',
            'active' => ['admin/logs*']
        ],
        [
            'text' => 'Logs Usuarios',
            'route'  => 'admin.log',
            'icon' => ' fas fa-exclamation-circle',
            'can'  => 'admin.roles.index',
            'active' => ['admin/log*']
        ],

        [
            'text' => 'Entidades',
            'route'  => 'admin.entidades.index',
            'icon' => 'fas fa-hotel',
            'can'  => 'admin.home',
            'active' => ['admin/entidades*']
        ],        
        [
            'text'    => 'PANEL CONTRATACION',
            /* 'icon'    => 'fas fa-fw fa-share', */
            'submenu' => [
                [
                    'text' => 'Ejecutores',
                    'route'  => 'admin.ejecutors.index',
                    'icon' => 'fas fa-tools',
                    'can'  => 'admin.home',
                    'active' => ['admin/ejecutors*']
                ],
                [
                    'text' => 'Provincias',
                    'route'  => 'admin.provincias.index',
                    'icon' => 'fas fa-paste fa-bookmark',
                    'can'  => 'admin.home',
                    'active' => ['admin/provincias*']
                ],
                [
                    'text' => 'Tipos de Empresa',
                    'route'  => 'admin.tipos.index',
                    'icon' => 'fas fa-paste fa-bookmark',
                    'can'  => 'admin.home',
                    'active' => ['admin/tipos*']
                ],
                [
                    'text' => 'Servicios',
                    'route'  => 'admin.servicios.index',
                    'icon' => 'fas fa-business-time',
                    'can'  => 'admin.home',
                    'active' => ['admin/servicios*']
                ],
            ],
        ],
        [
            'text'    => 'PANEL EJECUCIONES',
            /* 'icon'    => 'fas fa-fw fa-share', */
            'submenu' => [
                [
                    'text' => 'Instalaciones',
                    'route'  => 'admin.instalaciones.index',
                    'icon' => 'fas fa-landmark',
                    'can'  => 'admin.home',
                    'active' => ['admin/instalaciones*']
                ],
                [
                    'text' => 'Municipios',
                    'route'  => 'admin.municipios.index',
                    'icon' => 'fas fa-paste fa-bookmark',
                    'can'  => 'admin.home',
                    'active' => ['admin/municipios*']
                ],
                [
                    'text' => 'Cadenas Hoteleras',
                    'route'  => 'admin.cadenas.index',
                    'icon' => 'fas fa-paste fa-bookmark',
                    'can'  => 'admin.home',
                    'active' => ['admin/cadenas*']
                ],
            ],
        ],
        [
            'text'    => 'PANEL OBRAS',
            /* 'icon'    => 'fas fa-fw fa-share', */
            'submenu' => [
                [
                    'text' => 'Obras',
                    'route'  => 'admin.obras.index',
                    'icon' => ' 	fas fa-boxes',
                    'can'  => 'admin.home',
                    'active' => ['admin/obras*']
                ],
                [
                    'text' => 'Tipo de Obra',
                    'route'  => 'admin.tipobras.index',
                    'icon' => 'fas fa-paste fa-bookmark',
                    'can'  => 'admin.home',
                    'active' => ['admin.tipobras*']
                ],
                [
                    'text' => 'Codigo de Inversion',
                    'route'  => 'admin.codigo.index',
                    'icon' => 'fas fa-paste fa-bookmark',
                    'can'  => 'admin.home',
                    'active' => ['admin/codigo*']
                ],
                [
                    'text' => 'IMPORTADOR',
                    'route'  => 'admin.importadores.index',
                    'icon' => 'fas fa-paste fa-bookmark',
                    'can'  => 'admin.home',
                    'active' => ['admin/importadores*']
                ],
                [
                    'text' => 'ORGANISMO',
                    'route'  => 'admin.organismos.index',
                    'icon' => 'fas fa-paste fa-bookmark',
                    'can'  => 'admin.home',
                    'active' => ['admin/organismos*']
                ],
                [
                    'text' => 'Gastos',
                    'route'  => 'admin.gastos.index',
                    'icon' => 'fas fa-edit',
                    'can'  => 'admin.home',
                    'active' => ['admin/gastos*']
                ],
            ],
        ],                
        

        

        ['header' => 'PANEL REPORTES'],

        [
            'text' => 'Reportes',
            'route'  => 'admin.reportes',
            'icon' => ' fas fa-boxes',
            'can'  => 'admin.home',
            'active' => ['admin/reportes*']
        ],



        /* [
            'text' => 'Importadores',
            'route'  => 'admin.importadores.index',
            'icon' => 'fas fa-university fa-bookmark',
            'can'  => 'admin.home',
            'active'=> ['admin/importadores*']
        ],
        [
            'text' => 'Organismos',
            'route'  => 'admin.organismos.index',
            'icon' => 'fas fa-university fa-bookmark',
            'can'  => 'admin.home',
            'active'=> ['admin/organismos*']
        ],
        [
            'text' => 'Empresas',
            'route'  => 'admin.empresas.index',
            'icon' => 'fas fa-university fa-bookmark',
            'can'  => 'admin.home',
            'active'=> ['admin/empresas*']
        ],

        ['header' => 'PANEL EJECUCIONES'],
        [
            'text' => 'Instalaciones',
            'route'  => 'admin.instalaciones.index',
            'icon' => 'fa fa-building-o fa-bookmark',
            'can'  => 'admin.home',
            'active'=> ['admin/instalaciones*']
        ],       
        
        

        [
            'text' => 'Desagregaciones',
            'route'  => 'admin.desagregaciones.index',
            'icon' => 'fas fa-university fa-bookmark',
            'can'  => 'admin.home',
            'active'=> ['admin/desagregaciones*']
        ], */




        /* [
            'text'    => 'multilevel',
            'icon'    => 'fas fa-fw fa-share',
            'submenu' => [
                [
                    'text' => 'level_one',
                    'url'  => 'reportes',
                ],
                [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ],
                [
                    'text' => 'level_one',
                    'url'  => '#',
                ],
            ],
        ], */

        /* ['header' => 'labels'],
        [
            'text'       => 'important',
            'icon_color' => 'red',
            'url'        => '#',
        ],
        [
            'text'       => 'warning',
            'icon_color' => 'yellow',
            'url'        => '#',
        ],
        [
            'text'       => 'information',
            'icon_color' => 'cyan',
            'url'        => '#',
        ], */
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],

        'TempusDominusBs4' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/moment/moment.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                ],
            ],
        ],

        'DatatablesPlugins' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/dataTables.buttons.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.bootstrap4.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.html5.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/js/buttons.print.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/jszip/jszip.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/pdfmake.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/pdfmake/vfs_fonts.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/datatables-plugins/buttons/css/buttons.bootstrap4.min.css',
                ],
            ],
        ],

        'Select2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2.all.min.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'livewire' => true,
];
