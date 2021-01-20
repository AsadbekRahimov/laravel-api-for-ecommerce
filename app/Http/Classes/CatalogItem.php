<?php

namespace App\Http\Classes;

class CatalogItem 
{
    public $id;
    public $name;
    /**
     * @var BannerItem[] $banners
     */
    public $banners;
    /**
     * @var ProductItem[] $products
     */
    public $products;
}
