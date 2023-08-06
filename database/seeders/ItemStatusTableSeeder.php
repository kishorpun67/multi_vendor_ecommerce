<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemStatus;

class ItemStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $orderStatusRecords = [
            ['id'=>1, 'name'=>'Pending', 'status'=>1],
            ['id'=>2, 'name'=>'In Process', 'status'=>1],
            ['id'=>3, 'name'=>'Shipped', 'status'=>1],
            ['id'=>4, 'name'=>'Delivered', 'status'=>1],
        ];
        ItemStatus::insert($orderStatusRecords);
    }
}
