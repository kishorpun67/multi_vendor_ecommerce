<?php 
    use App\Models\Cart;
        function getCartItems() {
            if(auth()->check()) {
                $totalCartItem = Cart::where('user_id', auth()->user()->id)->sum('quantity');
            } else {
                $totalCartItem = Cart::where('session_id', Session::get('session_id'))->sum('quantity');

            }

            return $totalCartItem;
        }
