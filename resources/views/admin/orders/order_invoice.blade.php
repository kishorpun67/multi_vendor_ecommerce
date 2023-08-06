<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<style>
    .invoice-title h2, .invoice-title h3 {
        display: inline-block;
    }

    .table > tbody > tr > .no-line {
        border-top: none;
    }

    .table > thead > tr > .no-line {
        border-bottom: none;
    }

    .table > tbody > tr > .thick-line {
        border-top: 2px solid;
    }
</style>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Order # {{$orderDetails['id']}}
					@php echo DNS1D::getBarcodeHTML($orderDetails['id'], 'C39'); @endphp
				</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
                        {{$userDetails['name']}}<br>
                        {{ !empty($userDetails['address']) ? $userDetails['address'] : '' }} <br>
                        {{ !empty($userDetails['city'])? $userDetails['city']:  ''}} <br>
                        {{ !empty($userDetails['state'])? $userDetails['state']:  ''}} <br>
                        {{ !empty($userDetails['country'])? $userDetails['country']:  ''}} <br>
                        {{ !empty($userDetails['pincode'])? $userDetails['pincode']:  ''}} <br>
                        {{ !empty($userDetails['mobile'])? $userDetails['mobile']:  ''}} <br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
                        {{$orderDetails['name']}}<br>
                        {{ !empty($orderDetails['address']) ? $orderDetails['address'] : '' }} <br>
                        {{ !empty($orderDetails['city'])? $orderDetails['city']:  ''}} <br>
                        {{ !empty($orderDetails['state'])? $orderDetails['state']:  ''}} <br>
                        {{ !empty($orderDetails['country'])? $orderDetails['country']:  ''}} <br>
                        {{ !empty($orderDetails['pincode'])? $orderDetails['pincode']:  ''}} <br>
                        {{ !empty($orderDetails['mobile'])? $orderDetails['mobile']:  ''}} <br>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					{{$orderDetails['payment_method']}}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Order Date:</strong><br>
    					{{date('y-m-d h:i:s', strtotime($orderDetails['created_at']))}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Product Code</strong></td>
        							<td class="text-center"><strong>Size</strong></td>
        							<td class="text-center"><strong>Color</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>

        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
								@php $sub_total = 0; @endphp
								@foreach ($orderDetails['orders_products'] as $product)
									<tr>
										<td>{{$product['product_code']}} @php echo DNS1D::getBarcodeHTML($product['product_code'], 'C39'); @endphp</td>
										<td class="text-center">{{$product['product_size']}}</td>
										<td class="text-center">{{$product['product_color']}}</td>
										<td class="text-center">{{env('PRICE')}}{{$product['product_price']}}</td>
										<td class="text-center">{{$product['product_qty']}}</td>

										<td class="text-right">{{env('PRICE')}}{{$product['product_price'] * $product['product_qty'] }}</td>
									</tr>
									@php $sub_total = $sub_total +($product['product_price'] * $product['product_qty']); @endphp

								@endforeach

								<tr>
    								<td class="line"></td>
    								<td class="line"></td>
									<td class="line"></td>
    								<td class="line"></td>
    								<td class="line text-center"><strong>Sub Total</strong></td>
    								<td class="line text-right">{{env('PRICE')}}{{$sub_total}}</td>
    							</tr>
								<tr>
    								<td class="line"></td>
    								<td class="line"></td>
    								<td class="line"></td>
    								<td class="line"></td>
    								<td class="line text-center"><strong>Discount</strong></td>
    								<td class="line text-right">{{env('PRICE')}}{{$orderDetails['coupon_amount'] ?? 0}}</td>
    							</tr>
    							<tr>
    								<td class="line"></td>
    								<td class="line"></td>
    								<td class="line"></td>
    								<td class="line"></td>
    								<td class="line text-center"><strong>Shipping</strong></td>
    								<td class="line text-right">{{env('PRICE')}}{{$orderDetails['shipping_charges']}}</td>
    							</tr>
    							<tr>
    								<td class="line"></td>
    								<td class="line"></td>
    								<td class="line"></td>
    								<td class="line"></td>
    								<td class="line text-center"><strong>Grand Total</strong></td>
    								<td class="line text-right">{{env('PRICE')}}{{$orderDetails['grand_total']}}
										<br>
										@if ($orderDetails['payment_method'] == 'COD')
											<font color="red">(Already Paid)</font>
											
										@endif
									</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>