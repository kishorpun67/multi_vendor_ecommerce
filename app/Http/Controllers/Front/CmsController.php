<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Models\NewslaterSubscriber;

class CmsController extends Controller
{
    public function contact()
    {
        try {
            if(request()->isMethod('post')) {
                $data = request()->all();

                // validation 
                $rules = [
                    'contact_name' =>'required',
                    'contact_email' =>'required|email',
                    'contact_subject' =>'required',
                    'contact_message' =>'required',
                ];
                $customMessages = [
                    'contact_name.required' => 'Name is required !',
                    'contact_email.required' => 'Email is required !',
                    'contact_email.email' => 'Enter Valid is required !',
                    'contact_subject.required' => 'Subject is required !',
                    'contact_message.required' => 'Message is required !',
                ];
                $this->validate(request(), $rules, $customMessages);
                $email = $data['contact_email'];
                unset($data['contact_email']);
                $messageData = [
                    'contact_name' => $data['contact_name'],
                    'contact_email' => $email,
                    'contact_subject' => $data['contact_subject'],
                    'contact_message' => $data['contact_message'],
                ];
                Mail::send('emails.enquiry', $messageData, function($message) use ($email) {
                    $message->to($email)->subject('Enquiry from Kishor Pun website');
                });
                return redirect()->back()->with('success_message', 'Thanks for your query. We will get back to you soon.');
            }
        }
        catch (\InvalidArgumentException $e) {
            return redirect()->back()->with('error_message',  $e->getMessage());

        }
         catch (\Exception $e) {
            return redirect()->back()->with('error_message', 'Failed to send enquiry');
        }

        return view('front.pages.contact');
    }

    public function about()
    {
        return view('front.pages.about');
    }

    public function faq()
    {
        return view('front.pages.faq');
    }

    public function addSubscriberEmail()
    {
        $data = request()->all();
        $countEmail = NewslaterSubscriber::where('email', $data['email'])->count();
        if($countEmail > 0) { 
            return 'exists';
        } else {
            $newSubscriber = new NewslaterSubscriber;
            $newSubscriber->email = $data['email'];
            $newSubscriber->status =1;
            $newSubscriber->save();
            return 'save';
        }
    }
}
