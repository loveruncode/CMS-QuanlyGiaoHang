<?php

return [
    [
        'title' => 'Dashboard',
        'routeName' => 'admin.dashboard',
        'icon' => '<i class="ti ti-home"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin,
            App\Enums\Admin\AdminRoles::Driver,
            App\Enums\Admin\AdminRoles::Employee
        ],
        'sub' => []
    ],
    // [
    //     'title' => 'page',
    //     'routeName' => null,
    //     'icon' => '<i class="ti ti-notebook"></i>',
    //     'roles' => [],
    //     'sub' => [
    //         [
    //             'title' => 'add',
    //             'routeName' => 'admin.page.create',
    //             'icon' => '<i class="ti ti-plus"></i>',
    //             'roles' => [
    //                 App\Enums\Admin\AdminRoles::SuperAdmin,
    //                 App\Enums\Admin\AdminRoles::Admin
    //             ],
    //         ],
    //         [
    //             'title' => 'list',
    //             'routeName' => 'admin.page.index',
    //             'icon' => '<i class="ti ti-list"></i>',
    //             'roles' => [],
    //         ]
    //     ]
    // ],
    [
        'title' => 'customer',
        'routeName' => null,
        'icon' => '<i class="ti ti-notebook"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin
        ],
        'sub' => [
            [
                'title' => 'add',
                'routeName' => 'admin.customer.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [
                    // App\Enums\Admin\AdminRoles::SuperAdmin,
                    // App\Enums\Admin\AdminRoles::Admin
                ],
            ],
            [
                'title' => 'list',
                'routeName' => 'admin.customer.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [
                    // App\Enums\Admin\AdminRoles::SuperAdmin,
                    // App\Enums\Admin\AdminRoles::Admin
                ],
            ],
        ]
    ],
    [
        'title' => 'order',
        'routeName' => null,
        'icon' => '<i class="ti ti-notebook"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin,
            App\Enums\Admin\AdminRoles::Employee,
            App\Enums\Admin\AdminRoles::Driver,
        ],
        'sub' => [
            [
                'title' => 'add',
                'routeName' => 'admin.order.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [
                    App\Enums\Admin\AdminRoles::SuperAdmin,
                    App\Enums\Admin\AdminRoles::Admin,
                    App\Enums\Admin\AdminRoles::Employee,
                ],
            ],
            [
                'title' => 'list',
                'routeName' => 'admin.order.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [
                    App\Enums\Admin\AdminRoles::SuperAdmin,
                    App\Enums\Admin\AdminRoles::Admin,
                    App\Enums\Admin\AdminRoles::Employee,
                ],
            ],
            [
                'title' => 'orderDriver',
                'routeName' => 'admin.driver.index',
                'icon' => '<i class="ti ti-truck-delivery"></i>',
                'roles' => [App\Enums\Admin\AdminRoles::Driver],
            ],
        ]
    ],
    // [
    //     'title' => 'Blog',
    //     'routeName' => null,
    //     'icon' => '<i class="ti ti-article"></i>',
    //     'roles' => [],
    //     'sub' => [
    //         [
    //             'title' => 'addPost',
    //             'routeName' => 'admin.blog.post.create',
    //             'icon' => '<i class="ti ti-plus"></i>',
    //             'roles' => [
    //                 App\Enums\Admin\AdminRoles::SuperAdmin,
    //                 App\Enums\Admin\AdminRoles::Admin
    //             ],
    //         ],
    //         [
    //             'title' => 'post',
    //             'routeName' => 'admin.blog.post.index',
    //             'icon' => '<i class="ti ti-list"></i>',
    //             'roles' => [],
    //         ],
    //         [
    //             'title' => 'category',
    //             'routeName' => 'admin.blog.category.index',
    //             'icon' => '<i class="ti ti-list"></i>',
    //             'roles' => [
    //                 App\Enums\Admin\AdminRoles::SuperAdmin,
    //                 App\Enums\Admin\AdminRoles::Admin
    //             ],
    //         ],
    //         [
    //             'title' => 'tag',
    //             'routeName' => 'admin.blog.tag.index',
    //             'icon' => '<i class="ti ti-list"></i>',
    //             'roles' => [
    //                 App\Enums\Admin\AdminRoles::SuperAdmin,
    //                 App\Enums\Admin\AdminRoles::Admin
    //             ],
    //         ]
    //     ]
    // ],
    // [
    //     'title' => 'slider',
    //     'routeName' => null,
    //     'icon' => '<i class="ti ti-slideshow"></i>',
    //     'roles' => [],
    //     'sub' => [
    //         [
    //             'title' => 'add',
    //             'routeName' => 'admin.slider.create',
    //             'icon' => '<i class="ti ti-plus"></i>',
    //             'roles' => [],
    //         ],
    //         [
    //             'title' => 'list',
    //             'routeName' => 'admin.slider.index',
    //             'icon' => '<i class="ti ti-list"></i>',
    //             'roles' => [],
    //         ],
    //     ]
    // ],
    // [
    //     'title' => 'user',
    //     'routeName' => null,
    //     'icon' => '<i class="ti ti-users"></i>',
    //     'roles' => [
    //         App\Enums\Admin\AdminRoles::SuperAdmin,
    //         App\Enums\Admin\AdminRoles::Admin
    //     ],
    //     'sub' => [
    //         [
    //             'title' => 'add',
    //             'routeName' => 'admin.user.create',
    //             'icon' => '<i class="ti ti-plus"></i>',
    //             'roles' => [],
    //         ],
    //         [
    //             'title' => 'list',
    //             'routeName' => 'admin.user.index',
    //             'icon' => '<i class="ti ti-list"></i>',
    //             'roles' => [],
    //         ],
    //     ]
    // ],
    [
        'title' => 'admin',
        'routeName' => null,
        'icon' => '<i class="ti ti-user-cog"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin,
        ],
        'sub' => [
            [
                'title' => 'add',
                'routeName' => 'admin.admin.create',
                'icon' => '<i class="ti ti-plus"></i>',
                'roles' => [],
            ],
            [
                'title' => 'list',
                'routeName' => 'admin.admin.index',
                'icon' => '<i class="ti ti-list"></i>',
                'roles' => [],
            ],
        ]
    ],
    // [
    //     'title' => 'orderDriver',
    //     'routeName' => null,
    //     'icon' => '<i class="ti ti-package"></i>',
    //     'roles' => [
    //         App\Enums\Admin\AdminRoles::SuperAdmin,
    //         App\Enums\Admin\AdminRoles::Admin,
    //         App\Enums\Admin\AdminRoles::Driver
    //     ],
    //     'sub' => [
    //         [
    //             'title' => 'listOrder',
    //             'routeName' => 'admin.driver.order',
    //             'icon' => '<i class="ti ti-list"></i>',
    //             'roles' => [],
    //         ],
    //         [
    //             'title' => 'delivery',
    //             'routeName' => null,
    //             'icon' => '<i class="ti ti-truck-delivery"></i>',
    //             'roles' => [],
    //         ],
    //     ]
    // ],
    [
        'title' => 'setting',
        'routeName' => null,
        'icon' => '<i class="ti ti-settings"></i>',
        'roles' => [
            App\Enums\Admin\AdminRoles::SuperAdmin,
            App\Enums\Admin\AdminRoles::Admin,
        ],
        'sub' => [
            [
                'title' => 'generate',
                'routeName' => 'admin.setting.general',
                'icon' => '<i class="ti ti-tool"></i>',
                'roles' => [],
            ],
            [
                'title' => 'bankAccount',
                'routeName' => 'admin.setting.bank',
                'icon' => '<i class="ti ti-credit-card"></i>',
                'roles' => [],
            ],
            [
                'title' => 'socialNetwork',
                'routeName' => 'admin.setting.social-network',
                'icon' => '<i class="ti ti-world"></i>',
                'roles' => [],
            ],
        ],
    ],
];
