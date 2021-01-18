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
use zetsoft\models\shop\ShopCatalog;
use zetsoft\system\actives\ZActiveQuery;
use zetsoft\system\actives\ZActiveRecord;
use zetsoft\system\Az;
use zetsoft\dbitem\shop\ProductItem;


class SingleProductItem  extends ProductItem
{

    public $price_old;
    public $new_price;
    public $is_multi = false;
    public $discount;
    public $company_id;
    public $company_name;
    public $company_image;
    public $company_url;


}






