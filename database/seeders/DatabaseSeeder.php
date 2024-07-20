<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Toy;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //admin
        User::create([
            'firstName' => 'Admin',
            'lastName' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('Admin123'),
            'money' => 0
        ]);

        //user
        User::create([
            'firstName' => 'User',
            'lastName' => 'User',
            'email' => 'test@gmail.com',
            'role' => 'user',
            'password' => Hash::make('Test1234'),
            'money' => 0
        ]);

        // Define the categories as a simple array of strings
        $categories = ['Outfits', 'Accessories', 'Soft Toys', 'Hard Toys'];

        // Seed the categories into the database
        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
            ]);
        }


        Toy::create([
            'category_id' => 3,
            'image' => '1721452912_product-item1.png',
            'name' => 'Sheep Doll',
            'description' => 'Ini adalah sebuah boneka domba',
            'stock' => 100,
            'price' => 13
        ]);

        Toy::create([
            'category_id' => 3,
            'image' => '1721365078_product-item2.png',
            'name' => 'Bear Doll',
            'description' => 'Ini adalah sebuah boneka beruang',
            'stock' => 100,
            'price' => 15
        ]);

        Toy::create([
            'category_id' => 2,
            'image' => '1721365152_product-item3.png',
            'name' => 'Bunny Key Chain',
            'description' => 'Ini adalah gantungan kunci kelinci',
            'stock' => 1000,
            'price' => 5
        ]);

        Toy::create([
            'category_id' => 3,
            'image' => '1721365193_product-item4.png',
            'name' => 'Alpaca Doll',
            'description' => 'Boneka Alpaca',
            'stock' => 100,
            'price' => 30
        ]);

        Toy::create([
            'category_id' => 1,
            'image' => '1721365272_product-item5.png',
            'name' => 'Pink Strip Shirt',
            'description' => 'Baju',
            'stock' => 200,
            'price' => 15
        ]);

        Toy::create([
            'category_id' => 1,
            'image' => '1721365308_product-item6.png',
            'name' => 'Grey Sweater',
            'description' => 'Sweater Abu',
            'stock' => 300,
            'price' => 15
        ]);

        Toy::create([
            'category_id' => 1,
            'image' => '1721365334_product-item7.png',
            'name' => 'Pink Shirt',
            'description' => 'Baju Pink',
            'stock' => 200,
            'price' => 20
        ]);

        Toy::create([
            'category_id' => 1,
            'image' => '1721365387_product-item8.png',
            'name' => 'Grey Strip Sweater',
            'description' => 'Sweater Abu',
            'stock' => 200,
            'price' => 25
        ]);
    }
}
