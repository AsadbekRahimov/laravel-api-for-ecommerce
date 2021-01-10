<?php

namespace Database\Factories;

use App\Models\shop_product;
use Illuminate\Database\Eloquent\Factories\Factory;

class shop_productFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = shop_product::class;

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
        'user_company_id' => $this->faker->randomDigitNotNull,
        'shop_category_id' => $this->faker->randomDigitNotNull,
        'package' => $this->faker->word,
        'shop_option' => $this->faker->word,
        'text' => $this->faker->text,
        'text_lang' => $this->faker->word,
        'image' => $this->faker->word,
        'shop_option_ids' => $this->faker->word,
        'shop_brand_id' => $this->faker->randomDigitNotNull,
        'related' => $this->faker->word,
        'shelf_life' => $this->faker->randomDigitNotNull,
        'shelf_life_unit' => $this->faker->word,
        'weight' => $this->faker->randomDigitNotNull,
        'size' => $this->faker->word,
        'offer' => $this->faker->word,
        'rating' => $this->faker->randomDigitNotNull,
        'measure' => $this->faker->word,
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
