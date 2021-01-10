<?php

namespace Database\Factories;

use App\Models\shop_shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

class shop_shipmentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = shop_shipment::class;

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
        'title' => $this->faker->word,
        'title_lang' => $this->faker->word,
        'tranz' => $this->faker->word,
        'accept' => $this->faker->word,
        'active' => $this->faker->word,
        'date' => $this->faker->word,
        'date_deliver' => $this->faker->word,
        'date_deliver_history' => $this->faker->word,
        'shipment_type' => $this->faker->word,
        'shop_courier_id' => $this->faker->randomDigitNotNull,
        'responsible' => $this->faker->randomDigitNotNull,
        'comment' => $this->faker->word,
        'ware_place_ids' => $this->faker->word,
        'user_place_ids' => $this->faker->word,
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
