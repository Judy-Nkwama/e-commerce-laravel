<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use \App\Models\User;
use App\Models\Products;
use App\Models\UserAddress;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'firstname' => 'Judy',
            'lastname' => 'Nkwama',
            'is_admin' => 1,
            'password' => bcrypt("1234"),
            'email' => 'nkwamajudy@gmail.com',
        ]);

        $noe = User::create([
            'firstname' => 'Aklıme',
            'lastname' => 'Şahın',
            'password' => bcrypt("1234"),
            'email' => 'aklime@gmail.com',
        ]);
        
        UserAddress::create([
            "user_id" => $noe["id"],
            "address" => "Milano 32 naploi",
            "city" => "Kocaeli",
            "zip" => "41000"
        ]);

        Products::create([
            "title" => "Ya maddo",
            "description" => "Introducing our latest addition to the collection, the African traditional t-shirt. Made with the finest African fabric and tailored to perfection, this t-shirt is a must-have for anyone who loves traditional African fashion. With its vibrant colors and intricate patterns, this t-shirt is perfect for any occasion, whether you're dressing up or down. The lightweight fabric and comfortable fit make it ideal for hot summer days, and the breathable material ensures that you stay cool and comfortable all day long. Order yours today and step out in style with this beautiful African traditional t-shirt.",
            "bg_image_link" => "products_image/9jyxUPIvSMuIOOgqaNvGp0HQtzhxiiiqZrBZzJLj.jpg",
            "tags_string" => "Erkek,Kadın",
            "price" => 250,
            "quantity" => 10
        ]);
    }
}
