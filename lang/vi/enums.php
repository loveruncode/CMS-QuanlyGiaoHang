<?php

use App\Enums\Admin\AdminRoles;
use App\Enums\DefaultStatus;
use App\Enums\User\{UserGender};
use App\Enums\Customer\CustomerType;
use App\Enums\Order\OrderStatus;
use App\Enums\Order\OrderType;
use App\Enums\Order\PaymentMethod;
use App\Enums\Order\PaymentStatus;

return [
    AdminRoles::class => [
        AdminRoles::SuperAdmin->value => 'Dev',
        AdminRoles::Admin->value => 'Admin',
    ],
    UserGender::class => [
        UserGender::Male->value => 'Nam',
        UserGender::Female->value => 'Nữ',
        UserGender::Other->value => 'Khác',
    ],
    DefaultStatus::class => [
        DefaultStatus::Published->value => 'Đã xuất bản',
        DefaultStatus::Draft->value => 'Bản nháp'
    ],
    CustomerType::class => [
        CustomerType::Debt->value => 'Công nợ',
        CustomerType::Cash->value => 'Tiền mặt'
    ],
    OrderType::class => [
        OrderType::Normal->value => 'Đơn thường',
        OrderType::Group->value => 'Gộp đơn'
    ],
    PaymentMethod::class => [
        PaymentMethod::COD->value => 'Thanh toán khi nhận hàng',
        PaymentMethod::BankTransfer->value => 'Chuyển khoản',
        PaymentMethod::Online->value => 'Thanh toán online'
    ],
    OrderStatus::class => [
        OrderStatus::Processing->value => 'Đang xử lý',
        OrderStatus::Processed->value => 'Đã giao',
        OrderStatus::Completed->value => 'Đã hoàn thành',
        OrderStatus::Cancelled->value => 'Đã hủy'
    ],
    PaymentStatus::class => [
        PaymentStatus::UnPaid->value => 'Chưa thanh toán',
        PaymentStatus::WaitingConfirm->value => 'Chờ xác nhận',
        PaymentStatus::Paid->value => 'Đã thanh toán',
        PaymentStatus::Cancelled->value => 'Đã hủy'
    ]
];