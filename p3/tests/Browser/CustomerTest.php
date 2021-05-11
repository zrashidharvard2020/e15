<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;

class CustomerTest extends DuskTestCase
{
    use DatabaseMigrations;
    use withFaker;
    
    public function testLoadingCustomerPage()
    {
        $this->browse(function (Browser $browser) {
            $user = User::factory()->create();
            
            $browser->loginAs($user->id)
                    ->visit('/customers')
                    ->assertVisible('@product-heading');
        });
    }

    public function testAddingCustomer()
    {
        $this->browse(function (Browser $browser) {
            
            # Let our cusotmer factory generate a customer for us
            # here we use the `make` method instead of `create`
            # so the data is generated but not actually persisted to the database
            $customer = Customer::factory()->make();
            
            # Create a user to create a new book as
            $user = User::factory()->create();
            
            $browser->loginAs($user->id)
                    ->visit('/customers/create')
                    ->value('@name-input', $customer->customer_name)
                    ->value('@address-input', $customer->address)
                    ->value('@phone-input', $customer->phone_no)
                    ->click('@save-customer')
                    ->assertPathIs('/customers')
                    ->assertVisible('@customer-heading');
        });
    }
}
