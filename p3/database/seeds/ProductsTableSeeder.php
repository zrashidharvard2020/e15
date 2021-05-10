<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Array of product data to add
        $products = [
            ['Potato', 2.00],
            ['Banana', 1.00],
            ['Apple', 5.40],
            ['Mango', 4.30],
            ['Lychee', 2.00],
            ['dragon fruit', 6.00],
        ];

        $count = count($products);

        # Loop through each product, adding them to the database
        foreach ($products as $productData) {
            $product = new App\Product();
            
            $product->created_at = Carbon::now()->subDays($count)->toDateTimeString();
            $product->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
            $product->product_name = $productData[0];
            $product->unit_price = $productData[1];
            
            $product->save();
            
            $count--;
        }
    }
}
