<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $productsByCategory = [
            'health' => [
                'Band-Aids',
                'Johnson’s Baby Powder',
                'Tylenol'
            ],
            'tech' => [
                'GoPro Action Camera',
                'FitBit Fitness Watch',
                'Nintendo Switch'
            ],
            'books' => [
                'The Martian',
                'The Great Gatsby',
                'Joy Luck Club'
            ]
        ];

        foreach($productsByCategory as $categoryName => $products) {
            $newCategory = new Category();
            $newCategory->name = $categoryName;
            $newCategory->save();
        
            foreach($products as $product) {
                $newProduct = new Product();
                $newProduct->name = $product;
                $newProduct->category()->associate($newCategory);
                $newProduct->save();
            }
        }

        dump(Category::all()->toArray());
        dump(Product::all()->toArray());
    }
}
