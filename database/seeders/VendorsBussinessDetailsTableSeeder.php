<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorBussinessDetail;

class VendorsBussinessDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vendoerRecords = [
                'id' => 1,
                'vendor_id' => 1,
                'shop_name' => 'Rara Soft',
                'shop_address' => 'Kathmandu',
                'shop_city' => 'Kathmandu',
                'shop_state' => 'Kathmandu',
                'shop_country' => 'Nepal',
                'shop_pincode' => '0033884',
                'shop_mobile' => '9866655555',
                'shop_website' => 'shop.com',
                'shop_email' => 'shop@shop.com',
                'address_proof' => 'hello',
                'shop_proof_image' => '',
                'bussiness_license_number' => '78734837',
                'pan_number' => '354343',


        ];
        VendorBussinessDetail::create($vendoerRecords);
    }
}
