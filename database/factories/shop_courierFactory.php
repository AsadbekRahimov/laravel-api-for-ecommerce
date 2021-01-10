<?php

namespace Database\Factories;

use App\Models\shop_courier;
use Illuminate\Database\Eloquent\Factories\Factory;

class shop_courierFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = shop_courier::class;

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
        'guid' => $this->faker->word,
        'title' => $this->faker->word,
        'title_lang' => $this->faker->word,
        'tranz' => $this->faker->word,
        'accept' => $this->faker->word,
        'active' => $this->faker->word,
        'delivery_price' => $this->faker->randomDigitNotNull,
        'award_order' => $this->faker->randomDigitNotNull,
        'award_return' => $this->faker->randomDigitNotNull,
        'award_exchange' => $this->faker->randomDigitNotNull,
        'bonus' => $this->faker->randomDigitNotNull,
        'deposit' => $this->faker->randomDigitNotNull,
        'status' => $this->faker->word,
        'rating' => $this->faker->randomDigitNotNull,
        'place_region_ids' => $this->faker->word,
        'region_form' => $this->faker->word,
        'user_company_id' => $this->faker->randomDigitNotNull,
        'user_id' => $this->faker->randomDigitNotNull,
        'auto_id' => $this->faker->randomDigitNotNull,
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
