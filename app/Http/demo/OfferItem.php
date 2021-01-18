<?php


namespace zetsoft\dbitem\shop;


use zetsoft\system\Az;

class OfferItem
{

#region Vars

    /*
     *   $list_offer['offer'] = collect($catalog_offer->offer)->where('offer', $status)->where('end', $date_condition, $date);
                $list_offer['id'] = $catalog_offer->id;
                $list_offer['code'] = $catalog_offer->code;
                $list_offer['user_company_id'] = $catalog_offer->user_company_id;
                $list_offer['shop_element_id'] = $catalog_offer->shop_element_id;
                $list_offer['amount'] = $catalog_offer->amount;
                $list_offer['price'] = $catalog_offer->price;
                $list_offer['price_old'] = $catalog_offer->price_old;
                $list_offer['currency'] = $catalog_offer->currency;
                $list_offer['available'] = $catalog_offer->available;
     * */

    public $order_number;
    public $created_at;
    public $sum;
    public $current_order_element_items = [];


#endregion


}






