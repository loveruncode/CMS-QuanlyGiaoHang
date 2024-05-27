<?php

return [
    'slider' => [
        'name' => [
            'title' => 'name',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'plain_key' => [
            'title' => 'keyIdentity',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'status',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'items' => [
            'title' => 'sliderItem',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'slider_item' => [
        'title' => [
            'title' => 'name',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'image' => [
            'title' => 'image',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'position' => [
            'title' => 'position',
            'orderable' => false,
            'width' => '150px',
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'page' => [
        'title' => [
            'title' => 'title',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => true
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'customer' => [
        'fullname' => [
            'title' => 'fullname',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'phone' => [
            'title' => 'phone',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'type' => [
            'title' => 'type',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'fulladdress' => [
            'title' => 'Địa chỉ',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => true
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'order' => [
        'checkbox' => [
            'title' => 'choose',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
            'width' => '10px',
            'footer' => '<input type="checkbox" class="check-all" />',
        ],
        'id' => [
            'title' => 'Mã đơn',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'type' => [
            'title' => 'Loại đơn',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'customer_receiver_id' => [
            'title' => 'Khách hàng',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'driver_id' => [
            'title' => 'driver',
            'orderable' => false,
            'visible' => true,
            'addClass' => 'text-center align-middle'
        ],
        'goods_content' => [
            'title' => 'Nội dung hàng hóa',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'text-center align-middle'
        ],
        'total_amount' => [
            'title' => 'Số lượng',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'fee' => [
            'title' => 'Cước phí',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'status' => [
            'title' => 'status',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
            'visible' => true
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'tag' => [
        'name' => [
            'title' => 'name',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'status',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => false
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'category' => [
        'name' => [
            'title' => 'name',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'status',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'post' => [
        'feature_image' => [
            'title' => 'image',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'title' => [
            'title' => 'title',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'status' => [
            'title' => 'status',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'categories' => [
            'title' => 'category',
            'orderable' => false,
            'addClass' => 'align-middle'
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'addClass' => 'align-middle',
            'visible' => false
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center align-middle'
        ],
    ],
    'admin' => [
        'checkbox' => [
            'title' => 'choose',
            'orderable' => false,
            'addClass' => 'text-center',
            'width' => '10px',
            'footer' => '<input type="checkbox" class="check-all" />',
        ],
        'fullname' => [
            'title' => 'fullname',
            'orderable' => false
        ],
        'phone' => [
            'title' => 'phone',
            'orderable' => false
        ],
        'email' => [
            'title' => 'email',
            'orderable' => false,
        ],
        'roles' => [
            'title' => 'role',
            'orderable' => false,
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'visible' => false
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
    // Drivver
    'driver' => [
        'id' => [
            'title' => 'Mã đơn',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'type' => [
            'title' => 'Loại đơn',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'customer_receiver_id' => [
            'title' => 'Khách hàng',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
        ],
        'goods_content' => [
            'title' => 'Nội dung hàng hóa',
            'orderable' => false,
            'visible' => false,
            'addClass' => 'text-center align-middle'
        ],
        'total_amount' => [
            'title' => 'Số lượng',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'fee' => [
            'title' => 'Cước phí',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'status' => [
            'title' => 'status',
            'orderable' => false,
            'addClass' => 'text-center align-middle'
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'addClass' => 'text-center align-middle',
            'visible' => true
        ],
    ],
    //
    'user' => [
        'username' => [
            'title' => 'username',
            'orderable' => false,
            'visible' => false
        ],
        'fullname' => [
            'title' => 'fullname',
            'orderable' => false
        ],
        'email' => [
            'title' => 'email',
            'orderable' => false,
        ],
        'phone' => [
            'title' => 'phone',
            'orderable' => false
        ],
        'gender' => [
            'title' => 'gender',
            'orderable' => false,
            'visible' => false
        ],
        'created_at' => [
            'title' => 'createdAt',
            'orderable' => false,
            'visible' => false
        ],
        'action' => [
            'title' => 'action',
            'orderable' => false,
            'exportable' => false,
            'printable' => false,
            'addClass' => 'text-center'
        ],
    ],
];
