<?php 

namespace app\Http\Classes;

class ProductItem
{
    public $id;
    public $name = 'Product Name';
    public $image;
    public $amount;
    // public $discount;
    public $tags;
    public $rating;
    public $current_price;
    public $old_price;
    public $currency = 'сум';
    public $currencyType = ProductItem::currencyType['after'];
    public $measure = self::measure['kg'];
    // public $measureStep = self::measureStep['pcs'];
    
    #region Const
    public const currencyType = [
        'before' => 'before',
        'after' => 'after',
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
