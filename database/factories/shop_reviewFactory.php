<?php

namespace Database\Factories;

use App\Models\shop_review;
use Illuminate\Database\Eloquent\Factories\Factory;

class shop_reviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = shop_review::class;

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
        'shop_brand_id' => $this->faker->randomDigitNotNull,
        'shop_product_id' => $this->faker->randomDigitNotNull,
        'user_company_id' => $this->faker->randomDigitNotNull,
        'rating' => $this->faker->randomDigitNotNull,
        'parent_id' => $this->faker->randomDigitNotNull,
        'rating_option' => $this->faker->word,
        'text' => $this->faker->text,
        'virtues' => $this->faker->word,
        'drawbacks' => $this->faker->word,
        'experience' => $this->faker->word,
        'recommend' => $this->faker->word,
        'anonymous' => $this->faker->word,
        'like' => $this->faker->randomDigitNotNull,
        'dislike' => $this->faker->randomDigitNotNull,
        'photo' => $this->faker->word,
        'user_id' => $this->faker->randomDigitNotNull,
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
