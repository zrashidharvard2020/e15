<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Array of customer data to add
        $customers = [
            ['Zahid', 'Dhaka','025'],
            ['Flaming', 'New york','025'],
            ['Sharuv', 'Kalkata','025'],
            ['Rupak', 'Lahore','025'],
            ['Malianga', 'Srilanka','025'],
            ['Clop', 'Dallas','025'],
        ];

        $count = count($customers);

        # Loop through each customer, adding them to the database
        foreach ($customers as $customerData) {
            $customer = new App\Customer();
            
            $customer->created_at = Carbon::now()->subDays($count)->toDateTimeString();
            $customer->updated_at = Carbon::now()->subDays($count)->toDateTimeString();
            $customer->customer_name = $customerData[0];
            $customer->address = $customerData[1];
            $customer->phone_no = $customerData[2];
            
            $customer->save();
            
            $count--;
        }
    }
}
