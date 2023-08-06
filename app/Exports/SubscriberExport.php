<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\NewslaterSubscriber;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubscriberExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // file exporting subscribers 
        return NewslaterSubscriber::all();
    }

    public function headings(): array {
        return ['id','email', 'status', 'created_at', 'update_at'];
    }
}
