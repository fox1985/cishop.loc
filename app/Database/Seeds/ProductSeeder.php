<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ProductSeeder extends Seeder
{
    public function run()
    {
        /*$data = [
            [
                'category_id' => 1,
                'title' => 'Product 3',
                'slug' => 'product-3',
                'price' => 100,
                'old_price' => 120,
                'status' => 1,
                'hit' => 0,
                'excerpt' => 'Lorem ipsum...',
                'content' => 'Lorem ipsum...',
                'description' => 'Description...',
                'keywords' => 'keywords...',
            ],
            [
                'category_id' => 1,
                'title' => 'Product 4',
                'slug' => 'product-4',
                'price' => 100,
                'old_price' => 120,
                'status' => 1,
                'hit' => 0,
                'excerpt' => 'Lorem ipsum...',
                'content' => 'Lorem ipsum...',
                'description' => 'Description...',
                'keywords' => 'keywords...',
            ]
        ];*/
        $faker = Factory::create();
        $data = [];
        for ($i = 1; $i <= 100; $i++) {
            $data[$i] = [
                'category_id' => rand(1, 4),
                'title' => "Product {$i}",
                'slug' => "product-{$i}",
                'price' => $price = rand(100, 1000),
                'old_price' => ($price < 500) ? ($price + rand(10, 100)) : 0,
                'status' => 1,
                'hit' => 0,
                'excerpt' => $faker->sentence(),
                'content' => $faker->paragraphs(5, true),
                'description' => 'description...',
                'keywords' => 'keywords...',
            ];
        }

        // Simple Queries
        //$this->db->query("INSERT INTO users (username, email) VALUES(:username:, :email:)", $data);

        // Using Query Builder
//        $this->db->table('product')->insert($data);
        $this->db->table('product')->insertBatch($data);
    }
}
