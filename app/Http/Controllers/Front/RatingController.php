<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
class RatingController extends Controller
{
   
    public function addRating()
    {
        // checko user login or not 
        if(!auth()->check()) {
            return redirect()->back()->with('error_message', 'Please login to rate ths product.');
        }
        if(request()->isMethod('POST')) {
            $data = request()->all();

            // check if user already rate this product 
            $countRate = Rating::where(['product_id' => $data['product_id'], 'user_id' => auth()->user()->id])->count();
            if($countRate > 0) {
                return redirect()->back()->with('error_message', 'Your rating is already exist for this product.');
            }
            if(empty($data['rate'])) {
                return redirect()->back()->with('error_message', 'Pleas add rating for this product.');
            }
            $rating = new Rating();
            $rating->user_id = auth()->user()->id;
            $rating->product_id = $data['product_id'];
            $rating->review = $data['review'];
            $rating->rating = $data['rate'];
            $rating->status = 0;
            $rating->save();
            return redirect()->back()->with('success_message', 'Your review has been submitted successfully');
        }
    }
    
}
