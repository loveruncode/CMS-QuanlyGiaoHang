<?php
return [
    'frontend_url' => env('APP_URL'),
    'images' => [
        'favicon' => '/public/assets/images/logo.png',
        'avatar' => '/public/assets/images/avatar-user.png',
        'default' => '/public/assets/images/default-image.png',
        'logo' => '/public/assets/images/logo.png',
        'norecord' => '/public/assets/images/norecord.svg'
    ],
    'format' => [
        'datetime' => 'd-m-Y H:i',
        'date' => 'd-m-Y',
        'position_currency' => 'right'
    ],
    'prefix_url' => [
        'category' => '/category',
        'page' => '/page',
        'post' => '/post',
        'tag' => '/tag'
    ],
    'currency' => 'đ'
];
