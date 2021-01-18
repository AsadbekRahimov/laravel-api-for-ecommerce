<?php


namespace zetsoft\dbitem\shop;


use zetsoft\models\shop\ShopCatalog;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\Az;

class ProductItem
{
#region Vars

    /**
     * @var
     * ID
     */
    public $id;
    public $catalogId;
    public $name = 'Product Name';
    public $amount = 0;
    public $status = [];
    public $categoryId;
    public $categoryName;
    public $categoryUrl;
    public $title;
    public $text;
    public $brand;
    public $brandImage;
    public $rating;
    public $reviewCount = 0;
    public $exist = self::exists['yes'];
    public $url;
    public $images = [];
    public $is_multi;
    public $in_wish;
    public $in_compare;
    public $currency = 'сум';
    public $currencyType = ProductItem::currencyType['after'];
    public $cart_amount;
    public $items = [];
    public $barcode;
    public $measure = self::measure['kg'];
    public $measureStep = self::measureStep['pcs'];
    public $discount;
    /**
     * @var PropertyItem[] array
     */
    public $properties = [];
    /**
     * @var PropertyItem[] array
     */
    public $allProperties = [];
#endregion

#region Const
    public const currencyType = [
        'before' => 'before',
        'after' => 'after',
    ];


    public const exists = [
        'yes' => Azl . 'В наличии',
        'not' => Azl . 'Нет в наличии',
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
        'pcs' => Azl . 'шт',
        'm' => Azl . 'м',
        'l' => Azl . 'л',
        'kg' => Azl . 'кг',
    ];

#endregion



#region Constr
    public function __construct()
    {
        $session_currency = Az::$app->cores->session->get('currency');
        switch ($session_currency) {

            case ShopCatalog::currency['USD']:
                $this->currencyType = self::currencyType['before'];
                $this->currency = Az::l('$');
                break;

            case ShopCatalog::currency['EUR']:
                $this->currencyType = self::currencyType['before'];
                $this->currency = Az::l('‎€');
                break;

            case ShopCatalog::currency['RUB']:
                $this->currencyType = self::currencyType['after'];
                $this->currency = Az::l('₽');
                break;

            case ShopCatalog::currency['JPY']:
                $this->currencyType = self::currencyType['before'];
                $this->currency = Az::l('¥');
                break;

            case ShopCatalog::currency['GBP']:
                $this->currencyType = self::currencyType['before'];
                $this->currency = Az::l('￡');
                break;

            case ShopCatalog::currency['CAD']:
                $this->currencyType = self::currencyType['before'];
                $this->currency = Az::l('C$');
                break;

            case ShopCatalog::currency['BHD']:
                $this->currencyType = self::currencyType['before'];
                $this->currency = Az::l('BHD');
                break;
                
            default:
                $this->currencyType = self::currencyType['after'];
                $this->currency = Az::l('cум');
                break;

        }
    }
#endregion

}






