<?php

namespace Database\Factories;

use App\Models\shop_order_item;
use Illuminate\Database\Eloquent\Factories\Factory;

class shop_order_itemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = shop_order_item::class;

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
        'tranz' => $this->faker->word,
        'accept' => $this->faker->word,
        'active' => $this->faker->word,
        'shop_order_id' => $this->faker->randomDigitNotNull,
        'ware_id' => $this->faker->randomDigitNotNull,
        'user_company_id' => $this->faker->randomDigitNotNull,
        'shop_catalog_id' => $this->faker->randomDigitNotNull,
        'best_before' => $this->faker->word,
        'ware_return_id' => $this->faker->randomDigitNotNull,
        'amount' => $this->faker->randomDigitNotNull,
        'amount_history' => $this->faker->word,
        'amount_partial' => $this->faker->randomDigitNotNull,
        'amount_return' => $this->faker->word,
        'price' => $this->faker->word,
        'price_all' => $this->faker->randomDigitNotNull,
        'price_all_partial' => $this->faker->word,
        'price_all_return' => $this->faker->word,
        'accepted' => $this->faker->word,
        'check_return' => $this->faker->word,
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
