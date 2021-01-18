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

class HomeItem extends PageItem
{


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

    public $name;
    public $exists;
    public $title;
    public $partnum;

}
