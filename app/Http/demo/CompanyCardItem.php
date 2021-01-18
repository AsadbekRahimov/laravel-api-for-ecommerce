<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * Date:    07.06.2019
 * https://www.linkedin.com/in/asror-zakirov
 * https://www.facebook.com/asror.zakirov
 * https://github.com/asror-z
 *
 */

namespace zetsoft\dbitem\shop;

use zetsoft\models\shop\ShopProduct;

class CompanyCardItem
{
    public $id;
    public $catalogId;
    public $name;
    public $amount = 0;
    public $title;       //qisqacha ma'lumot uchun
    public $url;
    public $visible = true;
    public $image;
    public $new_price;
    public $price_old;
    public $currency = '$';
    public $currencyType = ProductItem::currencyType['before'];
    public $cart_amount = 0;
    public $reviewCount = 0;

    public $delivery_type;
    public $delivery_price;

    public $measure = ProductItem::measure['pcs'];
    public $measureStep = ProductItem::measureStep['pcs'];
}











