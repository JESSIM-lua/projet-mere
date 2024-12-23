<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShoppingList; // Add this line to import the correct class namespace

class ShoppingListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        ShoppingList::create([
            'title' => 'Courses du Week-end',
            'items' => 'Pommes, Bananes, Lait'
        ]);
    }
    
}
