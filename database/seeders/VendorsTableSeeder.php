<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendorRecords =[
            'name' => 'Jhon', 'address' => 'Kathmandu', 'city' => 'Kathmandu', 'state' => 'Kathmandu', 'country' => 'Nepal', 
            'pincode' =>'1991010', 'mobile'=>'980000', 'email'=>'johann@gmail.com', 'status'=>0
        ];
        Vendor::create($vendorRecords);
    }
}
