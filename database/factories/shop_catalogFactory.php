<?php

namespace Database\Factories;

use App\Models\shop_catalog;
use Illuminate\Database\Eloquent\Factories\Factory;

class shop_catalogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = shop_catalog::class;

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
        'guid' => $this->faker->word,
        'title' => $this->faker->word,
        'title_lang' => $this->faker->word,
        'tranz' => $this->faker->word,
        'accept' => $this->faker->word,
        'active' => $this->faker->word,
        'user_company_id' => $this->faker->randomDigitNotNull,
        'parent' => $this->faker->randomDigitNotNull,
        'shop_element_id' => $this->faker->randomDigitNotNull,
        'currency' => $this->faker->word,
        'price' => $this->faker->randomDigitNotNull,
        'amount' => $this->faker->randomDigitNotNull,
        'available' => $this->faker->word,
        'price_old' => $this->faker->randomDigitNotNull,
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
