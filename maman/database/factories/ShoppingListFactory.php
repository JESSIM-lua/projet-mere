<?php

namespace Database\Factories;

use App\Models\ShoppingList;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShoppingListFactory extends Factory
{
    protected $model = ShoppingList::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'items' => $this->faker->words(5, true),
        ];
    }
}
