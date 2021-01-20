<?php

namespace App\Http\Classes;

class HomePage
{

    /**
     * Vars
     *
     * @var string
     * @var string
     */
    public $id;
    public $name;

    /**
     * @var 
     */
    public $bestOffers;

    /**
     * @var CatalogItem[] $bestSeller
     */
    public $bestSellers;
    public $newItems;

    /**
     * @var BannerItem[] $bannerBig
     * 
     */
    public $bannerBig;
    
    public $delayed;

    /**
     * @var BannerItem[] $bannerSecond
     */
    public $bannerSecond;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }
}
