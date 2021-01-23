<?php

namespace App\Http\Classes;

class HomePage extends Page
{   
    /**
     * @var CatalogComponent[] $catalogs_component
     * 
     */
    // public $catalogs_component;
    /**
     * @var BannerItem[] $banners_component
     */
    public $banners_component;
    /**
     * @var ProductItem[] $products_component
     */
    public $products_component;
    /**
     * @var MarketComponent[] $markets_component
     */
    public $markets_component;
    
    /**
     * @var CategoryComponent[] $banners_component
     */
    public $categories_component;

    public function __construct()
    {
        $this->meta="";
        $this->title="Home Page";
        $this->lang="en";
    }


}
