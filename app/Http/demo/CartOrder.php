<?php

/**
 *
 *
 * Author:  Asror Zakirov
 * https://www.linkedin.com/in/asror-zakirov
 * https://github.com/asror-z
 *
 */


namespace zetsoft\dbitem\shop;

/**
 * Class    CartOrderItem
 * @package zetsoft\dbitem\shop
 *
 * Cart item for single market
 */
class CartOrder
{

    public $company_name;
    public $company_image;

    public $distance;
    public $delivery_price;
    public $total_price;

    public $company_url;

    public $company_id;

    /* @var SingleProductItem[] $items*/
    public $items = [];

}
