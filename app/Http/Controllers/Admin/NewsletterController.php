<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewslaterSubscriber;
use Session;
use App\Exports\SubscriberExport;
use Maatwebsite\Excel\Facades\Excel;

class NewsletterController extends Controller
{
    public function subscribers()
    {
        $subscribers = NewslaterSubscriber::get()->toArray();
        return view('admin.subscribers.subscribers', compact('subscribers'));
    }
    public function updateSubscriberStatus(Request $request)
    {
        if($request->ajax()) {
            $data = $request->all();
            $admin =NewslaterSubscriber::where('id', $data['subscriber_id'])->first();

            if($data['status']=="Active") {
                $status = 0;
            }else {
                $status = 1;
            }
            NewslaterSubscriber::where('id', $data['subscriber_id'])->update(['status' => $status]);
            return response()->json(['status' =>$status,'subscriber_id' =>$data['subscriber_id']]);
        }
    }

    public function exportSubscriber()
    {
        return Excel::download(new SubscriberExport, 'subscribers.xlsx');
    }
}
