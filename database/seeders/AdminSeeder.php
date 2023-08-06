<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

use function PHPSTORM_META\type;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = [
        //     'name' => 'Kishor Pun Magar',
        //     'type' => 'admin',
        //     'vendor_id' =>0,
        //     'email' => 'super@admin.com',
        //     'number' => '98000000000000',
        //     'password' => '$2y$10$hm9p6icymEW9jLi9zDSQGO4jufJsc/RiZjnUh8/I9WA7UEuEf4Vzi',
        //     'image' => '',
        //     'status' => 1,
        // ];
        $admin = [
            'name' => 'Jhoan Cena',
            'type' => 'vendor',
            'vendor_id' =>1,
            'email' => 'johan@admin.com',
            'number' => '98000000000000',
            'password' => '$2y$10$hm9p6icymEW9jLi9zDSQGO4jufJsc/RiZjnUh8/I9WA7UEuEf4Vzi',
            'image' => '',
            'status' =>0,
        ];
        Admin::create($admin);
    }
}
