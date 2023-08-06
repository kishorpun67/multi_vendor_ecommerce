<?php 
    use App\Models\Rating;

    function getRating($id) {
        $ratings = Rating::where(['product_id' => $id, 'status'=>1])->get()->toArray(); // get all ratings of particular product

        // get average rating 
        $ratingSum = Rating::where(['product_id' => $id, 'status'=>1])->sum('rating');  
        $ratingCount  = Rating::where(['product_id' => $id, 'status'=>1])->count(); 

        if($ratingCount > 0) {
            $avgRating = round($ratingSum/$ratingCount,2);
            $avgStarRating = round($ratingSum/$ratingCount);
        } else {
            $avgRating = 0 ;
            $avgStarRating = 0;
        }

        $ratingOneStrCount = Rating::where(['product_id' => $id, 'status'=>1, 'rating'=>1])->count();  
        $ratingTwoStrCount = Rating::where(['product_id' => $id, 'status'=>1 ,'rating'=>2])->count();  
        $ratingThreeStrCount = Rating::where(['product_id' => $id, 'status'=>1, 'rating'=>3])->count();  
        $ratingFourStrCount = Rating::where(['product_id' => $id, 'status'=>1, 'rating'=>4])->count();  
        $ratingFiveStrCount = Rating::where(['product_id' => $id, 'status'=>1, 'rating'=>5])->count();  

        return array('ratings'=>$ratings, 'avgRating' => $avgRating, 'avgStarRating' => $avgStarRating , 'ratingCount' => $ratingCount
        , 'ratingOneStrCount' => $ratingOneStrCount, 'ratingTwoStrCount' => $ratingTwoStrCount, 'ratingThreeStrCount' => $ratingThreeStrCount
        , 'ratingFourStrCount' => $ratingFourStrCount, 'ratingFiveStrCount' => $ratingFiveStrCount);
    }