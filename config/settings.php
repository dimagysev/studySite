<?php
return  [
    'THEME' => env("THEME", 'pinc'),
    'admin_path' => env('ADMIN_PATH', 'super'),
    'unknown_user_avatar_small' => 'users/unknow55.png',
    'unknown_user_avatar' => 'users/unknow.png',
    'home' => [
        'title' => 'Home',
        'desc' => 'desc',
        'key' =>'key',
    ],
    'articles' => [
        'title' => 'Articles',
        'desc' => 'desc',
        'key' =>'key',
        'sidebar_count' => 3,
        'paginate' => 2,
    ],
    'portfolios' => [
        'title' => 'Portfolios',
        'desc' => 'desc',
        'key' =>'key',
        'sidebar_count' => 3,
        'last_portfolios_count'=> 5,
        'paginate' => 3
    ],
    'contacts' => [
        'title' => 'Portfolios',
        'desc' => 'desc',
        'key' =>'key',
    ],
    'comments' => [
        'sidebar_count' => 3,
    ]
];
?>
