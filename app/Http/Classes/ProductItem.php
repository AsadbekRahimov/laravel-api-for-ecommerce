<?php 

namespace app\Http\Classes;

class ProductItem
{
    public $id;
    public $name = 'Product Name';
    public $amount = 0;
    public $status = [];
    public $rating;
    public $reviewCount = 0;
    public $exist = self::exists['yes'];
    public $currency = 'сум';
    public $currencyType = ProductItem::currencyType['after'];
    public $cart_amount;
    public $barcode;
    public $measure = self::measure['kg'];
    public $measureStep = self::measureStep['pcs'];
    public $discount;


    #region Const
    public const currencyType = [
        'before' => 'before',
        'after' => 'after',
    ];


    public const exists = [
        'yes' =>  'В наличии',
        'not' =>  'Нет в наличии',
    ];

    public const statuses = [
        'deal_of_day' => 'deal_of_day',
        'super_offer' => 'super_offer',
        'free_delivery' => 'free_delivery',
        'top_sell' => 'top_sell',
        'new' => 'new',
        'sale' => 'sale',
    ];


    public const measureStep = [
        'pcs' => 1,
        'm' => 0.1,
        'l' => 0.1,
        'kg' => 0.1,
    ];
    public const measure = [
        'pcs' => 'шт',
        'm' => 'м',
        'l' => 'л',
        'kg' => 'кг',
    ];

#endregion
}
