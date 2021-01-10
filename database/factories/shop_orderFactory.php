<?php

namespace Database\Factories;

use App\Models\shop_order;
use Illuminate\Database\Eloquent\Factories\Factory;

class shop_orderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = shop_order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sort' => $this->faker->randomDigitNotNull,
        'name' => $this->faker->word,
        'name_lang' => $this->faker->word,
        'code' => $this->faker->word,
        'tranz' => $this->faker->word,
        'accept' => $this->faker->word,
        'active' => $this->faker->word,
        'number' => $this->faker->word,
        'user_id' => $this->faker->randomDigitNotNull,
        'parent' => $this->faker->randomDigitNotNull,
        'children' => $this->faker->randomDigitNotNull,
        'contact_name' => $this->faker->word,
        'status_universal' => $this->faker->word,
        'contact_phone' => $this->faker->word,
        'add_contact_phone' => $this->faker->word,
        'date' => $this->faker->word,
        'comment_user' => $this->faker->word,
        'responsible' => $this->faker->randomDigitNotNull,
        'place_adress_id' => $this->faker->randomDigitNotNull,
        'place_region_id' => $this->faker->randomDigitNotNull,
        'distance' => $this->faker->randomDigitNotNull,
        'user_company_ids' => $this->faker->word,
        'operator' => $this->faker->randomDigitNotNull,
        'comment_agent' => $this->faker->word,
        'tasks' => $this->faker->word,
        'source' => $this->faker->randomDigitNotNull,
        'source_type' => $this->faker->word,
        'called_time' => $this->faker->date('Y-m-d H:i:s'),
        'shop_reject_cause_id' => $this->faker->randomDigitNotNull,
        'cpas_track' => $this->faker->word,
        'status_client' => $this->faker->word,
        'status_client_history' => $this->faker->word,
        'status_callcenter' => $this->faker->word,
        'status_callcenter_history' => $this->faker->word,
        'status_autodial' => $this->faker->word,
        'status_logistics' => $this->faker->word,
        'status_logistics_history' => $this->faker->word,
        'status_accept' => $this->faker->word,
        'status_accept_history' => $this->faker->word,
        'status_deliver' => $this->faker->word,
        'status_deliver_history' => $this->faker->word,
        'date_deliver' => $this->faker->word,
        'time_deliver' => $this->faker->word,
        'date_approve' => $this->faker->date('Y-m-d H:i:s'),
        'date_return' => $this->faker->word,
        'delayed_deliver_date' => $this->faker->word,
        'shop_delay_id' => $this->faker->randomDigitNotNull,
        'shop_delay_cause_id' => $this->faker->randomDigitNotNull,
        'packaging' => $this->faker->randomDigitNotNull,
        'labelled' => $this->faker->word,
        'fragile' => $this->faker->word,
        'weight' => $this->faker->randomDigitNotNull,
        'weight_plan' => $this->faker->randomDigitNotNull,
        'volume' => $this->faker->randomDigitNotNull,
        'shop_shipment_id' => $this->faker->randomDigitNotNull,
        'price' => $this->faker->word,
        'prepayment' => $this->faker->word,
        'deliver_price' => $this->faker->randomDigitNotNull,
        'total_price' => $this->faker->word,
        'shop_coupon_id' => $this->faker->randomDigitNotNull,
        'shop_channel_id' => $this->faker->randomDigitNotNull,
        'payment_type' => $this->faker->word,
        'additional_payment_type' => $this->faker->word,
        'additional_deliver' => $this->faker->randomDigitNotNull,
        'additional_received_money' => $this->faker->word,
        'accepted' => $this->faker->word,
        'shop_element_ids' => $this->faker->word,
        'ware_ids' => $this->faker->word,
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_by' => $this->faker->randomDigitNotNull,
        'deleted_text' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'modified_at' => $this->faker->date('Y-m-d H:i:s'),
        'created_by' => $this->faker->randomDigitNotNull,
        'modified_by' => $this->faker->randomDigitNotNull
        ];
    }
}
