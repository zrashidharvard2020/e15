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
            ['Zahid Rashid', '5313 Serene Hills Drive, Austin, TX 78733','5129477936'],
            ['Mike Tyson', '100 N Lake Hills Drive','5129477937'],
            ['Sarita Rashid', '6819 Telluride Trail, Austin, TX 78749','5129478938'],
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
