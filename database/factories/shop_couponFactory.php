<?php

namespace Database\Factories;

use App\Models\shop_coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class shop_couponFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = shop_coupon::class;

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
        'title' => $this->faker->word,
        'title_lang' => $this->faker->word,
        'tranz' => $this->faker->word,
        'accept' => $this->faker->word,
        'active' => $this->faker->word,
        'type' => $this->faker->word,
        'price' => $this->faker->randomDigitNotNull,
        'currency' => $this->faker->word,
        'percent' => $this->faker->randomDigitNotNull,
        'useful_count' => $this->faker->randomDigitNotNull,
        'min_price_order' => $this->faker->randomDigitNotNull,
        'coupon_code' => $this->faker->word,
        'comment' => $this->faker->word,
        'published_at' => $this->faker->date('Y-m-d H:i:s'),
        'expired_at' => $this->faker->date('Y-m-d H:i:s'),
        'status' => $this->faker->word,
        'shop_category_id' => $this->faker->randomDigitNotNull,
        'shop_product_id' => $this->faker->randomDigitNotNull,
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
