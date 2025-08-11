<?php

namespace Modules\ShoppingCart\Enums;

enum StatusOrderEnum: string
{
    case CREATED = 'shopping.status_orders.created';
    case SHIPPING = 'shopping.status_orders.shipping';
    case PAYMENTING = 'shopping.status_orders.paymenting';
    case PAYMENT_COMPLETED = 'shopping.status_orders.payment_completed';
    case PAYMENT_FAILED = 'shopping.status_orders.payment_failed';
    case PROCESSING = 'shopping.status_orders.processing';
    case COMPLETED = 'shopping.status_orders.completed';
    case CANCELED = 'shopping.status_orders.canceled';

    public static function getValue($case)
    {
        return (new \ReflectionEnum(self::class))->getCase($case)->getValue()->value;
    }

    public static function getName($case)
    {
        return (new \ReflectionEnum(self::class))->getCase($case)->getValue()->name;
    }

    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }
}
