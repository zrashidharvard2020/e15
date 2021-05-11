<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ProductTest extends DuskTestCase
{
    use DatabaseMigrations;
    use withFaker;
    
    public function testLoadingProductPage()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            
            $browser->loginAs($user->id)
                    ->visit('/products')
                    ->assertVisible('@product-heading');
        });
    }

    public function testAddingProduct()
    {
        $this->browse(function (Browser $browser) {
            
            # Let our product factory generate a product for us
            # here we use the `make` method instead of `create`
            # so the data is generated but not actually persisted to the database
            $product = Product::factory()->make();
            
            # Create a user to create a new book as
            $user = User::factory()->create();
            
            $browser->loginAs($user->id)
                    ->visit('/products/create')
                    ->value('@name-input', $product->product_name)
                    ->value('@price-input', $product->unit_price)
                    ->click('@save-product')
                    ->assertPathIs('/products')
                    ->assertVisible('@product-heading');
        });
    }
}
