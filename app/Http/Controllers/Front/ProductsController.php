<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Models\ProductsFilter;
use App\Models\ProductsAttribute;
use App\Models\Vendor;
use App\Models\RecentlyViewedProduct;
use Session;
use App\Models\Cart;
use App\Models\User;
use App\Models\Coupon;
use Auth;
use DB;
use View;
use App\Models\Country;
use App\Models\DeliveryAddress;
use App\Models\Order;
use App\Models\OrdersProduct;
use Mail;
use App\Models\ShippingCharge;
use App\Models\PinCode;
use App\Models\Rating;

class ProductsController extends Controller
{
    public function listing($url = null) 
    {
        if(request()->ajax()) {
            $data = request()->all();
            $url = $data['url']; 
            $sort = $data['sort'];
            $categoryCount = Category::where(['url' => $url, 'status'=>1])->count();
            if($categoryCount > 0) {
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])
                ->where('status', 1);
                // checking of dynamic filter 
                $productsFilters = ProductsFilter::productFilters();
                foreach ($productsFilters as $filter) {
                    if(isset($filter['filter_column']) && isset($data[$filter['filter_column']]) &&
                    !empty($filter['filter_column']) && !empty($data[$filter['filter_column']])) {
                        $categoryProducts->whereIn($filter['filter_column'], $data[$filter['filter_column']]); 
                    }
                }
                // check for size
                if(isset($data['size']) && !empty($data['size'])) {
                    $productIds = ProductsAttribute::select('product_id')->whereIn('size', $data['size'])->get()->toArray();
                    $categoryProducts->whereIn('id', $productIds);
                }
                // check for color
                if(isset($data['color']) && !empty($data['color'])) {
                    $categoryProducts->whereIn('product_color', $data['color']);
                }

                // check for brand 
                if(isset($data['brand']) && !empty($data['brand'])) {
                    $categoryProducts->whereIn('brand_id', $data['brand']);
                }
                // check for price 
                if(isset($data['price']) && !empty($data['price'])) {
                    foreach( $data['price'] as $price) {
                        $priceArr = explode('-', $price);
                        $productIds[] = Product::select('id')->whereBetween('product_price', [$priceArr[0], $priceArr[1]])
                        ->pluck('id')->toArray();
                    }
                    $productIds = call_user_func_array('array_merge', $productIds);
                    $categoryProducts->whereIn('products.id', $productIds);
                }
                // checking for sort 
                if(isset($sort) && !empty($sort)) {
                    if($sort == "product_latest") {
                        $categoryProducts->orderby('products.id', 'Desc');
                    } elseif ($sort == "product_lowest") {
                        $categoryProducts->orderby('products.product_price', 'Asc');
                    } elseif ($sort == "product_highest") {
                        $categoryProducts->orderby('products.product_price', 'Desc');
                    } elseif ($sort == "name_z_a") {
                        $categoryProducts->orderby('products.product_name', 'Desc');
                    } elseif ($sort == "name_a_z") {
                        $categoryProducts->orderby('products.product_name', 'Asc');
                    }
                }
                $categoryProducts = $categoryProducts->paginate(30);
                return view('front.products.ajax_products_listing')->with(compact('categoryProducts'));
            }else {
                abort(404);
            }

        }else{
            if(isset($_REQUEST['search']) && !empty($_REQUEST['search'])) {
                $data = request()->all();
                if($data['search'] == 'new-arrivals') {
                    $categoryDetails['brandscrumbs'] = 'New Arrival Products';
                    $categoryDetails['categoryDetails']['category_name'] = 'New Arrival Products';
                    $categoryDetails['categoryDetails']['description'] = 'New Arrival Products';
                    $categoryProducts = Product::with('brand')
                    ->join('categories', 'categories.id','=','products.category_id')
                    ->where('products.status', 1)->orderBy('products.id', 'Desc');
                } else if($data['search'] == 'best-sellers') {
                    $categoryDetails['brandscrumbs'] = 'Best Seller Products';
                    $categoryDetails['categoryDetails']['category_name'] = 'Best Seller Products';
                    $categoryDetails['categoryDetails']['description'] = 'Best Seller Products';
                    $categoryDetails['categoryDetails']['url'] = 'best-sellers';
                    $categoryProducts = Product::with('brand')
                    ->join('categories', 'categories.id','=','products.category_id')
                    ->where('products.status', 1)->where('products.is_best_seller', 'Yes');
                } else if($data['search'] == 'featured') {
                    $categoryDetails['brandscrumbs'] = 'Featured Products';
                    $categoryDetails['categoryDetails']['category_name'] = 'Featured Products';
                    $categoryDetails['categoryDetails']['description'] = 'Featured Products';
                    $categoryProducts = Product::with('brand')
                    ->join('categories', 'categories.id','=','products.category_id')
                    ->where('products.status', 1)->where('products.is_featured', 'Yes');
                }
                else if($data['search'] == 'discounted') {
                    $categoryDetails['brandscrumbs'] = 'Discounted Products';
                    $categoryDetails['categoryDetails']['category_name'] = 'Discounted Products';
                    $categoryDetails['categoryDetails']['description'] = 'Discounted Products';
                    $categoryProducts = Product::with('brand')
                    ->join('categories', 'categories.id','=','products.category_id')
                    ->where('products.status', 1)->where('products.product_discount','>', 10);
                }
                else{
                    $categoryDetails['brandscrumbs'] = $data['search'];
                    $categoryDetails['categoryDetails']['category_name'] = $data['search'];
                    $categoryDetails['categoryDetails']['description'] = "Search Product for ".  $data['search'];
                    $serchProducts = $data['search'];
                    $categoryProducts = Product::with('brand')->join('categories', 'categories.id','=','products.category_id')
                    ->where(function($query) use($serchProducts) {
                        $query->where('products.product_name','like', "%". $serchProducts. "%")
                        ->orWhere('products.product_code','like', "%". $serchProducts. "%")
                        ->orWhere('products.product_color','like', "%". $serchProducts. "%")
                        ->orWhere('products.description','like', "%". $serchProducts. "%")
                        ->orWhere('categories.category_name','like', "%". $serchProducts. "%");
                    })->where('products.status', 1);
                }
                if(isset($_REQUEST['section_id']) && !empty($_REQUEST['section_id'])) {
                    $categoryProducts = $categoryProducts->where('products.section_id', $_REQUEST['section_id']);
                }
                $categoryProducts = $categoryProducts->get()->toArray();
                return view('front.products.listing')->with(compact('categoryProducts', 'categoryDetails'));

            }
            $categoryCount = Category::where(['url' => $url, 'status'=>1])->count();
            if($categoryCount > 0) {
                $categoryDetails = Category::categoryDetails($url);
                $categoryProducts = Product::with('brand')->whereIn('category_id', $categoryDetails['catIds'])
                ->where('status', 1);
                $categoryProducts = $categoryProducts->paginate(30);
                $metaTitle = $categoryDetails['categoryDetails']['meta_title'];
                $metaKeywords = $categoryDetails['categoryDetails']['meta_keywords'];
                $metaDescription = $categoryDetails['categoryDetails']['meta_description'];
                return view('front.products.listing')->with(compact('categoryProducts', 'categoryDetails', 'url', 'metaTitle', 'metaDescription','metaKeywords'));
            }else {
                abort(404);
            }
        }

    }
    
    public function vendorListing($vendor_id) {
        $vendorShop = Vendor::vendorShop($vendor_id);
        // get vendor product 
        $vendorProducts = Product::with('brand')->where('vendor_id', $vendor_id)->where('status', 1);
        $vendorProducts = $vendorProducts->paginate(30);
        return view('front.products.vendor_products_listing')->with(compact('vendorProducts', 'vendorShop'));
    }

    public function detail($id=null)
    {
        $productDetails = Product::with(['category', 'vendor'=> function($query) {
            // $query->select('id',' name');
        } ,'brand','attributes'=>function($query){
            $query->where('stock', '>', '0')->where('status', 1);
        }, 'images'])->where(['id' => $id, 'status'=>1])->first()->toArray();
        $categoryDetails = Category::categoryDetails($productDetails['category']['url']);
        $totalStock = ProductsAttribute::where(['product_id'=>$productDetails['id'], 'status'=>1])->sum('stock');

        // get similar proucts
       $similarProuducts = Product::with('brand')->where('category_id', $productDetails['category']['id'])->inRandomOrder()
        ->where('status', 1)->where('id', '!=', $id)->limit(6)->get()->toArray();


        // set session for recently view product
        if(empty(Session::get('session_id'))){
            $session_id = md5(uniqid(mt_rand(), true));
        }else {
            $session_id = Session::get('session_id');

        }
        Session::put('session_id', $session_id);

        // inssert  product in table if not already exists 
        $countRecentlyViewedProducts = RecentlyViewedProduct::where(['product_id' => $id, 'session_id' => $session_id])->count();
        if($countRecentlyViewedProducts == 0) {
            $newRecentlyViewedProduct = new RecentlyViewedProduct();
            $newRecentlyViewedProduct->product_id =$id;
            $newRecentlyViewedProduct->session_id = $session_id;
            $newRecentlyViewedProduct->save();
        }

        // get recenty viewed items 
        $recentProductsIds = RecentlyViewedProduct::select('product_id')->where('product_id', '!=', $id)->where('session_id', Session::get('session_id'))->pluck('product_id')->toArray();
        $recentViewProducts = Product::with('brand')->whereIn('id', $recentProductsIds)->where('status', 1)
        ->inRandomOrder()->limit(4)->get()->toArray();

        // get  group products (Products COlor)
        $groupProducts = array();
        if(!empty($productDetails['group_code'])) {
            $groupProducts = Product::select('id', 'product_image')->where('id', '!=', $id)->where([
                'group_code' => $productDetails['group_code'], 'status' =>1])->get()->toArray();
        }

        // ratings 
        $ratings = Rating::with('user')->where(['product_id'=>$id, 'status' =>1])->get()->toArray();

        // met tag 
        $metaTitle = $productDetails['meta_title'];
        $metaKeywords = $productDetails['meta_keywords'];
        $metaDescription = $productDetails['meta_description'];
        return view('front.products.detail', compact('productDetails','groupProducts', 'categoryDetails', 'totalStock', 'similarProuducts', 
        'recentViewProducts', 'metaTitle', 'metaDescription','metaKeywords', 'ratings'));
    }

    public function checkPincode()
    {
        if(request()->ajax()) {
            $data = request()->all();
            $codPincodeCount = PinCode::where('pincode', $data['pincode'])->count();
            if($codPincodeCount == 0) {
                echo 'This pincode is not available for delivery';
            } else {
                echo 'This pincode is available for delivery';
            }
        }
    }


    public function getProductPrice()
    {
        if(request()->ajax()) {
            $data =  request()->all();
            $getDiscountAttributePrice = Product::getDiscountAttributePrice($data['product_id'], $data['size']);
            return response()->json($getDiscountAttributePrice);

        }
    }

    public function addCart() 
    {
        Session::forget('couponAmount');
        Session::forget('couponCode');
        $data = request()->all();
        // check product stock is available
        $getProductStock = ProductsAttribute::isStockAvailable($data['product_id'], $data['size']);
        if(($data['quantity']) > ($getProductStock['stock']) ) {
            return redirect()->back()->with('error_message', 'Requrired Quantity is not available!');
        }

        // generate sesssion if not exists
        $session_id = Session::get('session_id');
        if ( empty( $session_id) ) {
            $session_id = Session::getId();
            Session::put('session_id', $session_id);
        }

        // check product is exist or not in cart
        if(Auth::check()) {
            // user is logged in 
            $user_id = Auth::user()->id;
            $catCount = Cart::where(['user_id'=>$user_id, 'product_id'=>$data['product_id'], 'size'=> $data['size']])->count();
        }else {
            // if user is not logged in
            $session_id = Session::get('session_id');
            $catCount = Cart::where(['session_id'=>$session_id, 'product_id'=>$data['product_id'], 'size'=> $data['size']])->count();
        }
        if($catCount > 0) { 
            return redirect()->back()->with('error_message', 'Product is already exists <a href="'.route('cart').'">View Cart</a>');
        }

        // save produuct in carts table 
        $item = new Cart();
        $item->session_id = $session_id;
        if(auth()->check()) {
            $item->user_id = auth()->user()->id;
        }
        $item->product_id = $data['product_id'];
        $item->size = $data['size'];
        $item->quantity = $data['quantity'];
        $item->save();
        return redirect()->back()->with('success_message', 'Product has been added in Cart <a href="'.route('cart').'">View Cart</a>');

    }

    public function cart()
    {
        // get cart item 
        $getCartItems = Cart::getCartItems();

        // meta tags
        $metaTitle = "Shopping Cart - E-com  Website";
        $metaKeywords="View Shopping cart of E-com Website";
        $metaDescription ="shopping cart, e-com webiste";
        return view('front.products.cart', compact('getCartItems', 'metaTitle','metaDescription','metaKeywords'));    
    }

    public function updateCartItemQty()
    {
        $data = request()->all();
        Session::forget('couponAmount');
        Session::forget('couponCode');
        // get cart item 
        $getCartItems = Cart::getCartItems();

        // auth check  
        if(auth()->check()) {
            // if user logged in / pick auth id of the user 
            $cartDetails = Cart::where(['user_id'=> auth()->user()->id, 'id'=>$data['cart_id']])->first()->toArray();
        } else {
            // if usern not logged in / pick session id of the user 
            $cartDetails = Cart::where(['session_id'=> Session::get('session_id'), 'id'=>$data['cart_id']])->first()->toArray();
        }
        // get available product stock 
        $availableSizes = ProductsAttribute::where(['product_id'=>$cartDetails['product_id'], 
        'size'=>$cartDetails['size'],'status'=>1])->count();
        if($availableSizes == 0) {
            return response()->json([
                'status' =>false, 
                'message'=>'Product size is not available',
                'view'=>(String)View::make('front.products.cart_item')
                ->with(compact('getCartItems')),
                'headerview'=>(String)View::make('front.layout.header_cart_items')
                ->with(compact('getCartItems'))            
            ]);
        }
        $availableStock = ProductsAttribute::where(['product_id'=>$cartDetails['product_id'], 
        'size'=>$cartDetails['size'],'status'=>1])->first()->toArray();  
        
        if($data['new_qty'] > $availableStock['stock']) {
            return response()->json([
                'status' =>false, 
                'message'=>'Product Stock is not available',
                'view'=>(String)View::make('front.products.cart_item')
                ->with(compact('getCartItems')),
                'headerview'=>(String)View::make('front.layout.header_cart_items')
                ->with(compact('getCartItems'))            
            ]);
    
        } 
        // update cart qty 
        if(auth()->check()) {
            Cart::where(['id'=>$data['cart_id'], 'user_id'=>auth()->user()->id])->update(['quantity' => $data['new_qty']]);
        } else {
            Cart::where(['id'=>$data['cart_id'], 'session_id'=>Session::get('session_id')])->update(['quantity' => $data['new_qty']]);
        }
        $getCartItems = Cart::getCartItems(); //cart item 
        return response()->json([
            'status' =>true, 
            'totalCartItems'=>getCartItems(),
            'view'=>(String)View::make('front.products.cart_item')
            ->with(compact('getCartItems')),
            'headerview'=>(String)View::make('front.layout.header_cart_items')
            ->with(compact('getCartItems'))
        ]);

    }

    public function deleteCart()
    {
        $data = request()->all();
        Session::forget('couponAmount');
        Session::forget('couponCode');
        // update cart qty 
        if(auth()->check()) {
            Cart::where(['id'=>$data['cart_id'], 'user_id'=>auth()->user()->id])->delete();
        } else {
            Cart::where(['id'=>$data['cart_id'], 'session_id'=>Session::get('session_id')])->delete();
        }
        // get cart item 
        $getCartItems = Cart::getCartItems();
        return response()->json([
            'status' =>true, 
            'totalCartItems'=>getCartItems(),
            'view'=>(String)View::make('front.products.cart_item')
            ->with(compact('getCartItems')),
            'headerview'=>(String)View::make('front.layout.header_cart_items')
            ->with(compact('getCartItems'))
        ]);
    }

    public function applyCoupon()
    {
        if(request()->ajax()) {
            $data = request()->all();
            Session::forget('couponAmount');
            Session::forget('couponCode');
            // get cart item 
            $getCartItems = Cart::getCartItems();

            if(count($getCartItems) == 0) {
                return response()->json([
                    'status' =>false, 
                    'message' => 'Please add item to cart first.',
                    'totalCartItems'=>getCartItems(),
                    'view'=>(String)View::make('front.products.cart_item')
                    ->with(compact('getCartItems')),
                    'headerview'=>(String)View::make('front.layout.header_cart_items')
                    ->with(compact('getCartItems'))
                ]);
            }

            $countCoupon = Coupon::where('coupon_code', $data['coupon_code'])->count(); // check coupon is available or not
            if($countCoupon == 0) { 
                return response()->json([
                    'status' =>false, 
                    'message' => 'Coupon is not valid!',
                    'totalCartItems'=>getCartItems(),
                    'view'=>(String)View::make('front.products.cart_item')
                    ->with(compact('getCartItems')),
                    'headerview'=>(String)View::make('front.layout.header_cart_items')
                    ->with(compact('getCartItems'))
                ]); 
            } else {
                // get coupon details 
                $couponDetails = Coupon::where('coupon_code', $data['coupon_code'])->first()->toArray();

                // check if coupon is active  
                if($couponDetails['status'] == 0 ) {
                    $message = 'The coupon is not active';
                }
                
                // check if coupon is expired
                $expiryDate = $couponDetails['expiry_date'];
                $currentDate = date('Y-m-d');
                if($expiryDate < $currentDate) {
                    $message = 'The Coupon is expired';
                }

                // get all  selected coupon categories and convert to aray
                $catAttr = explode(',', $couponDetails['categories']);

                // check if any cart item not belong to coupon category
                $total_amount = 0;
                foreach ($getCartItems as $item) {
                    if(!in_array($item['product']['category_id'], $catAttr)) {
                        $message = 'This coupon code is not for one of the selected products.';
                    }
                    $attrPrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                    $total_amount = $total_amount +($attrPrice['final_price'] * $item['quantity']);
                }

                // check if coupon is from selected users 
                // get all selected user from coupon  and conver to array 
                $uersAttr = explode(',', $couponDetails['users']);

                // get user id's of all selected users
                $getUserIds = User::select('id')->whereIn('email', $uersAttr)->pluck('id')->toArray();
                // foreach ($uersAttr as $user) {
                //     $getUserId = User::select('id')->where('email', $user)->first()->toArray();
                //     $getUserIds[] = $getUserId['id'];
                // }
                // return gettype($getUserIds);

                // check if any cart item not belong to user
                foreach ($getCartItems as $item) {
                    if(count($uersAttr)>0) {
                        if(!in_array($item['user_id'], $getUserIds)) {
                            $message = 'This coupon not for you.';
                        }                 
                    }
                }

                // check if coupon belongs to vendor products 
                if($couponDetails['vendor_id'] > 0) {
                    $productIds = Product::select('id')->where('vendor_id', $couponDetails['vendor_id'])->pluck('id')->toArray();
                    foreach ($getCartItems as $item) {
                        if(!in_array($item['product']['id'], $productIds)) {
                            $message = 'This coupon not for you. vendor';
                        }   
                    }
                }
                // check if coupon is for single time
                if($couponDetails['coupon_type'] == 'Single Time') {
                    // check in order table if already avalled by the user
                    $couponCount = Order::where(['coupon_code'=> $data['coupon_code'], 'user_id'=>auth()->user()->id])->count();
                    if ($couponCount>0) {
                        $message = 'This coupon is already avalled by you.';
                    }
                }

                // if error message is there 
                if(isset($message)) {
                    return response()->json([
                        'status' =>false, 
                        'message' => $message,
                        'totalCartItems'=>getCartItems(),
                        'view'=>(String)View::make('front.products.cart_item')
                        ->with(compact('getCartItems')),
                        'headerview'=>(String)View::make('front.layout.header_cart_items')
                        ->with(compact('getCartItems'))
                    ]);
                } else {
                    // Coupon code is correct 
                    //chekc if coupon amount type is fixed or percentage
                    if ($couponDetails['amount_type'] == 'Fixed') { 
                        $couponAmount = $couponDetails['amount'];
                    } else {
                        $couponAmount = $total_amount * ($couponDetails['amount']/100);
                    }
                    // return $couponAmount;
                    $grandTotalAmount = $total_amount - $couponAmount;

                    // add coupon  code & amount in session  variables 
                    Session::put('couponAmount', $couponAmount);
                    Session::put('couponCode', $data['coupon_code']);

                    $message = 'Coupon Code sucessfully applied. You are availing discount!';

                    return response()->json([
                        'status' =>true, 
                        'message' => $message,
                        'couponAmount'=>$couponAmount,
                        'grandTotalAmount'=>$grandTotalAmount,
                        'totalCartItems'=>getCartItems(),
                        'view'=>(String)View::make('front.products.cart_item')
                        ->with(compact('getCartItems')),
                        'headerview'=>(String)View::make('front.layout.header_cart_items')
                        ->with(compact('getCartItems'))
                    ]);
                }
            }
        }
    }

    public function checkout()
    {
        $user_id = Auth::user()->id;
        $countries = Country::get();
        $getCartItems = Cart::getCartItems(); // get cart items

        if(count($getCartItems) == 0) {
            return redirect()->back()->with('error_message', 'Shopping cart is empty! Please add products to checkout.');
        }
        // calculate total 
        $total_price = 0;
        $total_weight = 0;
        foreach ($getCartItems as $item) {
            $attrPrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
            $total_price = $total_price + ($attrPrice['final_price']*$item['quantity']);
            $total_weight = $total_weight + ($item['product']['product_weight']*$item['quantity']);
        }
        $deliveryAddress = DeliveryAddress::deliveryAddress();
        foreach($deliveryAddress as  $key => $value) {
            $shippingCharges = ShippingCharge::getShippingCharges($total_weight, $value['country']);
            $deliveryAddress[$key]['shippng_charges'] = $shippingCharges;

            // COD Pincode is Available or not 
            $deliveryAddress[$key]['codpincodeCount'] = PinCode::where('pincode', $value['pincode'])->count();

        }
        if(request()->isMethod('post')) {
            $data = request()->all();
        
            // website security 
            foreach($getCartItems as $item) {
                // Prevent disable product  
                $productStatus = Product::getProductStatus($item['product_id']);
                if ($productStatus == 0) {
                    Product::deleteCartProduct($item['product_id']);
                    return to_route('cart')->with('error_message', 'One of the product is disabled! Please try again.');
                }

                // prevent sold out product to order 
                $getProductStock = ProductsAttribute::isStockAvailable($item['product_id'], $item['size']);
                if ($getProductStock['stock'] ==  0) {
                    Product::deleteCartProduct($item['product_id']);
                    return to_route('cart')->with('error_message', 'One of the product is sold out! Please try again.');
                }
                if($getProductStock['stock']< $item['quantity']) {
                    Product::deleteCartProduct($item['product_id']);
                    return to_route('cart')->with('error_message', 'One of the product required quantiy is not available! Please try again.');
                }

                // prevent disable product attribute status 
                $getAttributStatus = Product::getAttributStatus($item['product_id'], $item['size']);
                if ($getAttributStatus == 0) {
                    Product::deleteCartProduct($item['product_id']);
                    return to_route('cart')->with('error_message', 'One of the product attribute is disabled! Please try again.');
                }

                // prevent disable category status 
                $categoryStatus = Product::getCategoryStatus($item['product']['category_id']);
                if ($categoryStatus == 0) {
                    $message= $item['product']['product_name']." with ". $item['size']. " Size is not available.
                     Please remove from the cart and choose some anothr product.";
                    return to_route('cart')->with('error_message', $message);
                }

            }

            if(empty($data['address_id'])) { 
                return redirect()->back()->with('error_message', 'Please select delivery address.');
            }
            if(empty($data['payment-method'])) { 
                return redirect()->back()->with('error_message', 'Please select payment method.');
            }
            if(empty($data['accept'])) { 
                return to_route('cart')->with('error_message', 'Please accept terms and conditions.');
            }

            // get delivery address form addres_id  
            $deliveryAddress = DeliveryAddress::where('id', $data['address_id'])->first()->toArray();

            //set payment mothod as cod is selected from user otherwise  set as prepaid 
            if($data['payment-method'] == 'COD') {
                $payment_method = 'COD';
                $order_status = 'New';
            } else {
                $payment_method = 'Prepaid';
                $order_status = 'Pending';
            }

            // fetch order total 
            $total_price = 0;
            foreach ($getCartItems as $item) {
                $getDiscountPrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                $total_price = $total_price + $getDiscountPrice['final_price']*$item['quantity'] ;
            }

            // calculate shipping charges
            $shipping_charges = 0;

            // get shipping charges 
            $shipping_charges = ShippingCharge::getShippingCharges($total_weight, $deliveryAddress['country']);

            // calculate gand total 
            $grand_total = $total_price + $shipping_charges - Session::get('couponAmount');

            // insert grand total in session variable 
            Session::put('grandTotal', $grand_total);

            DB::beginTransaction();
            // insert order details
            $order = new Order;
            $order->user_id = $user_id;
            $order->name = $deliveryAddress['name'];
            $order->address = $deliveryAddress['address'];
            $order->city = $deliveryAddress['city'];
            $order->state = $deliveryAddress['state'];
            $order->country = $deliveryAddress['country'];
            $order->pincode = $deliveryAddress['pincode'];
            $order->mobile = $deliveryAddress['mobile'];
            $order->email = auth()->user()->email;
            $order->shipping_charges = $shipping_charges;
            $order->coupon_code = Session::get('couponCode');
            $order->coupon_amount = Session::get('couponAmount');
            $order->order_status = $order_status;
            $order->payment_method = $payment_method;
            $order->payment_geteway = $data['payment-method'];
            $order->grand_total = $grand_total;
            $order->save();

            $order_id = DB::getPdo()->lastInsertId(); // get last inserted order id

            $total_price = 0;
            foreach ($getCartItems as $item) {
                $cartItem = new OrdersProduct();
                $cartItem->order_id =$order_id;
                $cartItem->user_id = $user_id;
                $getProductDetails = Product::select('product_code', 'product_name', 'product_color', 'admin_id', 
                'vendor_id')->where('id', $item['product_id'])->first()->toArray();
                $cartItem->admin_id = $getProductDetails['admin_id'];
                $cartItem->vendor_id = $getProductDetails['vendor_id'];
                $cartItem->product_id = $item['product_id'];
                $cartItem->product_code = $getProductDetails['product_code'];
                $cartItem->product_name = $getProductDetails['product_name'];
                $cartItem->product_code = $getProductDetails['product_code'];
                $cartItem->product_color = $getProductDetails['product_color'];
                $cartItem->product_size = $item['size'];
                $getDiscountPrice = Product::getDiscountAttributePrice($item['product_id'], $item['size']);
                $cartItem->product_price = $getDiscountPrice['final_price'];
                $cartItem->product_qty = $item['quantity'];
                $cartItem->save();

                //reduce stock scripts starts 
                $getProductStock = ProductsAttribute::isStockAvailable($item['product_id'], $item['size']);
                $newStock = $getProductStock['stock'] - $item['quantity'];
                ProductsAttribute::where(['product_id' => $item['product_id'], 'size' => $item['size']])->update(['stock'=>$newStock]);
                
            }
            Session::put('orderId', $order_id); // insert order id in session 
            DB::commit();
            $orderDetails = Order::with('orders_products')->where('id', $order_id)->first()->toArray();
            if ($data['payment-method'] == 'COD') {
                // Send order email 
                $email = auth()->user()->email;
                $messageData = [
                    'email' =>   $email ,
                    'name' => auth()->user()->name,
                    'order_id' => $order_id,
                    'orderDetails' => $orderDetails,
                ];
                
                // Mail::send('emails.order', $messageData, function($message) use($email){
                //     $message->to($email)->subject('Order Placed');
                // });

                // send order sms 

            } else {
                // Send order email 

                // send order sms 
            }
            
            // send confirmation email 

            return to_route('thanks');
        }

        // meta tags
        $meta_title = "Checkout - E-com  Website";
        $meta_keywords="View checkout cart of E-com Website";
        $meta_description ="checkout, e-com webiste";
        
        return view('front.products.checkout', compact('deliveryAddress', 'getCartItems', 'countries', 'total_price'));
    }

    public function thanks() 
    {
        if(Session::has('orderId')) {
            Cart::where('user_id', auth()->user()->id)->delete();
            return view('front.products.thanks');
        } else {
            return to_route('cart')->with('error_message', 'Your order has not placed');
        }
    }
}
