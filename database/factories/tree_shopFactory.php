<?php

namespace Database\Factories;

use App\Models\tree_shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class tree_shopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = tree_shop::class;

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
        'root' => $this->faker->randomDigitNotNull,
        'lft' => $this->faker->randomDigitNotNull,
        'rgt' => $this->faker->randomDigitNotNull,
        'lvl' => $this->faker->randomDigitNotNull,
        'icon' => $this->faker->word,
        'icon_type' => $this->faker->word,
        'activeOrig' => $this->faker->word,
        'selected' => $this->faker->word,
        'disabled' => $this->faker->word,
        'readonly' => $this->faker->word,
        'visible' => $this->faker->word,
        'collapsed' => $this->faker->word,
        'movable_u' => $this->faker->word,
        'movable_d' => $this->faker->word,
        'movable_l' => $this->faker->word,
        'movable_r' => $this->faker->word,
        'removable' => $this->faker->word,
        'removable_all' => $this->faker->word,
        'child_allowed' => $this->faker->word,
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
