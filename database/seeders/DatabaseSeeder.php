<?php

namespace Database\Seeders;

use App\Models\VendorBussinessDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(AdminSeeder::class);
        // $this->call(VendorsTableSeeder::class);
        // $this->call(VendorsBussinessDetailsTableSeeder::class);
        // $this->call(VendorsBankDetailsTableSeeder::class);
        // $this->call(SectionTableSeeder::class);
        // $this->call(BannersTableSeederphp::class);
        // $this->call(OrderStatusTableSeeder::class);
        $this->call(ItemStatusTableSeeder::class);


    }
}
