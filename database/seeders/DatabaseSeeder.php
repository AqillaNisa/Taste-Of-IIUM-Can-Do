<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Food;
use App\Models\Stall;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin User',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        $stalls = [
            [
                'name' => 'Al-Baik Shawarma',
                'mahallah' => 'Ali',
                'opening_hours' => '8 AM - 10 PM',
                'food_type' => 'Middle Eastern',
                'menu_items' => 'Shawarma, Nasi Lemak, Chicken Wrap',
            ],
            [
                'name' => 'K-Noodle Corner',
                'mahallah' => 'Faruq',
                'opening_hours' => '10 AM - 9 PM',
                'food_type' => 'Korean Cuisine',
                'menu_items' => 'Ramly Burger, Korean Fried Chicken, Noodles',
            ],
            [
                'name' => 'Korean Fried Chicken',
                'mahallah' => 'Aminah',
                'opening_hours' => '10 AM - 9 PM',
                'food_type' => 'Dessert',
                'menu_items' => 'Korean Fried Chicken, Bingsu, Fries',
            ],
        ];

        foreach ($stalls as $stallData) {
            $stall = Stall::updateOrCreate(
                ['name' => $stallData['name']],
                $stallData
            );

            Food::updateOrCreate(
                ['name' => $stallData['menu_items'], 'stall_id' => $stall->id],
                [
                    'category' => $stall->food_type,
                    'price' => 8.50,
                    'description' => 'Popular item from '.$stall->name,
                ]
            );
        }
    }
}
