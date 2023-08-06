<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\VendorBankDetail;
class VendorsBankDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $vendorRecords =[
            'vendor_id' => 1, 'account_holder_name' => 'Kishor Pun', 'bank_name' => 'Prabhu Bank', 
            'account_number' =>'09987364734673', 'bank_ifsc_code' => '75485948598898',
        ];
        VendorBankDetail::create($vendorRecords);
    }
}
