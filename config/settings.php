<?php
return  [

    /*
     * General settings
     */
    'THEME'                 => env("THEME", 'pinc'),
    'admin_path'            => env('ADMIN_PATH', 'super'),
    'transaction_attempts'  => 3,

    /*
     * Home page settings
     */
    'home' => [
        'title'     => 'Home',
        'desc'      => 'desc',
        'key'       =>'key',
    ],

    /*
     * Articles page settings
     */
    'articles' => [
        'title'             => 'Articles',
        'desc'              => 'desc',
        'key'               => 'key',
        'img_min_height'    => 55,
        'img_min_width'     => 55,
        'img_max_height'    => 282,
        'img_max_width'     => 816,
        'sidebar_count'     => 3,
        'paginate'          => 2,
    ],

    /*
     * Portfolios page settings
     */
    'portfolios' => [
        'title'                 => 'Portfolios',
        'desc'                  => 'desc',
        'key'                   =>'key',
        'img_min_height'        => 175,
        'img_min_width'         => 175,
        'img_max_height'        => 368,
        'img_max_width'         => 770,
        'sidebar_count'         => 3,
        'last_portfolios_count' => 5,
        'paginate'              => 3
    ],

    /*
     * Contacts page settings
     */
    'contacts' => [
        'title'     => 'Portfolios',
        'desc'      => 'desc',
        'key'       =>'key',
    ],

    /*
     * Comments settings
     */
    'comments' => [
        'sidebar_count' => 3,
    ]
];
?>
