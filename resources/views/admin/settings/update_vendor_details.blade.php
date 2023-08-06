@extends('admin.layout.admin_layout')
@section('content')
@if ($slug=="personal")
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">  
      <div class="card-body">
        <h4 class="card-title">Vendor Details</h4>
        <p class="card-description">
          Update Vendor Detail
        </p>
        <form class="forms-sample" method="POST" action="{{route('admin.update.vendor.details', $slug)}}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Vendor Username/Email</label>
                <input type="text" class="form-control" id="" placeholder="Username" readonly value="{{auth("admin")->user()->email}}" >
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" autocomplete="off" value="{{$vendorDetails['name']}}">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address" autocomplete="off" value="{{$vendorDetails['address']}}">
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="City" autocomplete="off" value="{{$vendorDetails['city']}}">
              </div>
              <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" name="state" id="state" placeholder="State" autocomplete="off" value="{{$vendorDetails['state']}}">
              </div> 
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="country">Country </label>
                <select name="country" id="" class="form-control">
                  <option value="">Select</option>
                  @foreach ($countries as $item)
                    <option value="{{$item->nicename}}"
                      @if (!empty($vendorDetails['country']) && $vendorDetails['country']==$item->nicename)
                        selected=""  
                      @endif>{{$item->nicename}}</option>                      
                  @endforeach
                </select>              
              </div>          
              <div class="form-group">
                <label for="pincode">Pincode</label>
                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" autocomplete="off" value="{{$vendorDetails['pincode']}}">
              </div>
              <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" autocomplete="off" value="{{$vendorDetails['mobile']}}">
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" name="image" id="image" >
                <br>
                @if (auth('admin')->user()->image)
                 <a href="{{asset(auth('admin')->user()->image)}}" >View</a>
                @endif
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@elseif($slug=="business")
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">  
      <div class="card-body">
        <h4 class="card-title">Vendor Details</h4>
        <p class="card-description">
          Update Bussiness Details
        </p>
        <form class="forms-sample" method="POST" action="{{route('admin.update.vendor.details', $slug)}}" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Vendor Username/Email</label>
                <input type="text" class="form-control" id="" placeholder="Username" readonly value="{{auth("admin")->user()->email}}" >
              </div>
              <div class="form-group">
                <label for="shop_name">Shop Name</label>
                <input type="text" class="form-control" name="shop_name" id="shop_name" placeholder="Shop Name" autocomplete="off" 
                @if(!empty($vendorBussinessDetails['shop_name']))
                  value="{{$vendorBussinessDetails['shop_name']}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_address">Shop Address</label>
                <input type="text" class="form-control" name="shop_address" id="shop_address" placeholder="Shop Address" autocomplete="off" 
                @if(!empty($vendorBussinessDetails['shop_address']))
                  value="{{$vendorBussinessDetails['shop_address']}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_city">Shop City</label>
                <input type="text" class="form-control" name="shop_city" id="shop_city" placeholder="Shop City" autocomplete="off" 
                @if(!empty($vendorBussinessDetails['shop_city']))
                  value="{{$vendorBussinessDetails['shop_city']}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_state">Shop State</label>
                <input type="text" class="form-control" name="shop_state" id="shop_state" placeholder="Shop State" autocomplete="off" 
                @if(!empty($vendorBussinessDetails['shop_state']))
                  value="{{$vendorBussinessDetails['shop_state']}}"
                @endif>
              </div> 
              <div class="form-group">
                <label for="shop_country">Shop Country</label>
                <select name="shop_country" id="" class="form-control">
                  <option value="">Select</option>
                  @foreach ($countries as $item)
                    <option value="{{$item->nicename}}"
                      @if (!empty($vendorBussinessDetails['shop_country']) && $vendorBussinessDetails['shop_country']==$item->nicename)
                        selected=""  
                      @endif>{{$item->nicename}}</option>                      
                  @endforeach
                </select>              
              </div>          
              <div class="form-group">
                <label for="shop_pincode">Shop Pincode</label>
                <input type="text" class="form-control" name="shop_pincode" id="shop_pincode" placeholder="Shop Pincode" autocomplete="off" 
                @if(!empty($vendorBussinessDetails['shop_pincode']))
                  value="{{$vendorBussinessDetails['shop_pincode']}}"
                @endif>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="shop_mobile">Shop Mobile</label>
                <input type="text" class="form-control" name="shop_mobile" id="shop_mobile" placeholder="Shop Mobile" autocomplete="off" 
                @if(!empty($vendorBussinessDetails['shop_mobile']))
                  value="{{$vendorBussinessDetails['shop_mobile']}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_website">Shop Websit(link)</label>
                <input type="text" class="form-control" name="shop_website" id="shop_website" placeholder="Shop Website" autocomplete="off" 
                @if(!empty($vendorBussinessDetails['shop_website']))
                  value="{{$vendorBussinessDetails['shop_website']}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_email">Shop Email</label>
                <input type="text" class="form-control" name="shop_email" id="shop_email" placeholder="Shop Email" autocomplete="off" 
                @if(!empty($vendorBussinessDetails['shop_email']))
                  value="{{$vendorBussinessDetails['shop_email']}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="bussiness_license_number">Bussiness License Number</label>
                <input type="text" class="form-control" name="bussiness_license_number" id="bussiness_license_number"  autocomplete="off" 
                @if(!empty($vendorBussinessDetails['bussiness_license_number']))
                  value="{{$vendorBussinessDetails['bussiness_license_number']}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="pan_number">PAN Number</label>
                <input type="text" class="form-control" name="pan_number" id="pan_number" autocomplete="off" 
                @if(!empty($vendorBussinessDetails['pan_number']))
                  value="{{$vendorBussinessDetails['pan_number']}}"
                @endif>
              </div>
              <div class="form-group">
                <label for="address_proof">Address Proof</label>
                <select name="address_proof" id="address_proof" class="form-control">
                  <option value="Citizenship" 
                  @if (!empty($vendorBussinessDetails['address_proof']) && $vendorBussinessDetails['address_proof']=="Citizenship")
                    slected="" @endif>Citizenship</option>
                  <option value="Passport" @if (!empty($vendorBussinessDetails['address_proof']) && $vendorBussinessDetails['address_proof']=="Passport")
                  slected="" @endif>Passport</option>
                  <option value="Driving License"@if (!empty($vendorBussinessDetails['address_proof']) && $vendorBussinessDetails['address_proof']=="Driving License")
                  slected="" @endif>Driving License</option>
                  <option value="PAN"@if (!empty($vendorBussinessDetails['address_proof']) && $vendorBussinessDetails['address_proof']=="PAN")
                  slected="" @endif>PAN</option>
                  <option value="Voting Card"@if (!empty($vendorBussinessDetails['address_proof']) && $vendorBussinessDetails['address_proof']=="Voting Card")
                  slected="" @endif >Voting Card</option>
                </select>
              </div>
              <div class="form-group">
                <label for="address_proof_image">Address Proof Image</label>
                <input type="file" name="address_proof_image" id="address_proof_image" class="form-control">
                <br>
                @if (!empty($vendorBussinessDetails['address_proof_image']))
                  <a href="{{asset($vendorBussinessDetails['address_proof_image'])}}">View</a>
                @endif
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

@elseif($slug=="bank")
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">  
      <div class="card-body">
        <h4 class="card-title">Vendor Details</h4>
        <p class="card-description">
          Update Bank details
        </p>
        <form class="forms-sample" method="POST" action="{{route('admin.update.vendor.details', $slug)}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="email">Vendor Username/Email</label>
            <input type="text" class="form-control" id="" placeholder="Username" readonly value="{{auth("admin")->user()->email}}" >
          </div>
          <div class="form-group">
            <label for="account_holder_name">Account Holder Name</label>
            <input type="text" class="form-control" name="account_holder_name" id="account_holder_name" placeholder="Account Holder Name" autocomplete="off"
            @if(!empty($vendorBankDetails['account_holder_name']))
              value="{{$vendorBankDetails['account_holder_name']}}"
            @endif>
          </div>
          <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input type="text" class="form-control" name="bank_name" id="bank_name" placeholder="Bank Name" autocomplete="off"
            @if(!empty($vendorBankDetails['bank_name']))
              value="{{$vendorBankDetails['bank_name']}}"
            @endif>
          </div>
          <div class="form-group">
            <label for="account_number">Account Number</label>
            <input type="text" class="form-control" name="account_number" id="account_number" placeholder="account_number" autocomplete="off"
            @if(!empty($vendorBankDetails['account_number']))
              value="{{$vendorBankDetails['account_number']}}"
            @endif>
          </div>
          <div class="form-group">
            <label for="bank_ifsc_code">Bank IFSC Code</label>
            <input type="text" class="form-control" name="bank_ifsc_code" id="bank_ifsc_code" placeholder="Bank IFSC Code" autocomplete="off"
            @if(!empty($vendorBankDetails['bank_ifsc_code']))
              value="{{$vendorBankDetails['bank_ifsc_code']}}"
            @endif>
          </div> 
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endif

@endsection