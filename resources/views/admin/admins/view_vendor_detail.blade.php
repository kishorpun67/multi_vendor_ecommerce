@extends('admin.layout.admin_layout')
@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">  
      <div class="card-body">
        <h4 class="card-title">Personal Detail</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="" placeholder="Username" readonly value="{{$vendorDetails['email']}}" >
              </div>
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Name" autocomplete="off" readonly value="{{$vendorDetails['vendor_personal']['name']}}">
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Address" autocomplete="off" readonly value="{{$vendorDetails['vendor_personal']['address']}}">
              </div>
              <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" name="city" id="city" placeholder="City" autocomplete="off" readonly value="{{$vendorDetails['vendor_personal']['city']}}">
              </div>
           
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" name="state" id="state" placeholder="State" autocomplete="off" readonly value="{{$vendorDetails['vendor_personal']['state']}}">
              </div>
              <div class="form-group">
                <label for="country">Country</label>
                <input type="text" class="form-control" name="country" id="country" placeholder="Country" autocomplete="off" readonly value="{{$vendorDetails['vendor_personal']['country']}}">
              </div>          
              <div class="form-group">
                <label for="pincode">Pincode</label>
                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Pincode" autocomplete="off" readonly value="{{$vendorDetails['vendor_personal']['pincode']}}">
              </div>
              <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile" autocomplete="off" readonly value="{{$vendorDetails['vendor_personal']['mobile']}}">
              </div>
              <div class="form-group">
                <label for="image">Image</label>
                <br>
                @if (!empty($vendorDetails['image']))
                 <a href="{{asset($vendorDetails['image'])}}" >View</a>
                @endif
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">  
      <div class="card-body">
        <h4 class="card-title"> Bussiness Details</h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="" placeholder="Username" readonly value="{{$vendorDetails['email']}}" >
              </div>
              <div class="form-group">
                <label for="shop_name">Shop Name</label>
                <input type="text" class="form-control" name="shop_name" id="shop_name" readonly placeholder="Shop Name" autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['shop_name']))
                value="{{$vendorDetails['vendor_business']['shop_name']}} "  
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_address">Shop Address</label>
                <input type="text" class="form-control" name="shop_address" id="shop_address" readonly placeholder="Shop Address" autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['shop_address']))
                  value="{{$vendorDetails['vendor_business']['shop_address']}}"  
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_city">Shop City</label>
                <input type="text" class="form-control" name="shop_city" id="shop_city" readonly placeholder="Shop City" autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['shop_city']))
                  value="{{$vendorDetails['vendor_business']['shop_city']}}"  
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_state">Shop State</label>
                <input type="text" class="form-control" name="shop_state" id="shop_state" readonly placeholder="Shop State" autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['shop_state']))
                  value="{{$vendorDetails['vendor_business']['shop_state']}}"  
                @endif>
              </div> 
              <div class="form-group">
                <label for="country">Shop Country</label>
                <input type="text" class="form-control" name="shop_country" id="shop_country" readonly placeholder="Shop Country" autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['shop_country']))
                  value="{{$vendorDetails['vendor_business']['shop_country']}}"  
                @endif>
              </div>          
              <div class="form-group">
                <label for="shop_pincode">Shop Pincode</label>
                <input type="text" class="form-control" name="shop_pincode" id="shop_pincode" readonly placeholder="Shop Pincode" autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['shop_pincode']))
                  value="{{$vendorDetails['vendor_business']['shop_pincode']}}"  
                @endif>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="shop_mobile">Shop Mobile</label>
                <input type="text" class="form-control" name="shop_mobile" id="shop_mobile" readonly placeholder="Shop Mobile" autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['shop_mobile']))
                  value="{{$vendorDetails['vendor_business']['shop_mobile']}}"  
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_website">Shop Websit(link)</label>
                <input type="text" class="form-control" name="shop_website" id="shop_website" readonly placeholder="Shop Website" autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['shop_website']))
                  value="{{$vendorDetails['vendor_business']['shop_website']}}"  
                @endif>
              </div>
              <div class="form-group">
                <label for="shop_email">Shop Email</label>
                <input type="text" class="form-control" name="shop_email" id="shop_email" readonly placeholder="Shop Email" autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['shop_email']))
                  value="{{$vendorDetails['vendor_business']['shop_email']}}"  
                @endif>
              </div>
              <div class="form-group">
                <label for="bussiness_license_number">Bussiness License Number</label>
                <input type="text" class="form-control" name="bussiness_license_number" id="bussiness_license_number" readonly  autocomplete="off" 
                @if (!empty($vendorDetails['vendor_business']['bussiness_license_number']))
                  value="{{$vendorDetails['vendor_business']['bussiness_license_number']}}"  
                @endif>
              </div>
              <div class="form-group">
                <label for="pan_number">PAN Number</label>
                <input type="text" class="form-control" name="pan_number" id="pan_number" autocomplete="off"  readonly
                @if (!empty($vendorDetails['vendor_business']['pan_number']))
                  value="{{$vendorDetails['vendor_business']['pan_number']}}"  
                @endif>
              </div>
              <div class="form-group">
                <label for="address_proof">Address Proof</label>
                <select name="address_proof" id="address_proof" class="form-control" readonly>
                  <option value="Citizenship" 
                  @if (!empty($vendorDetails['vendor_business']['address_proof']) && $vendorDetails['vendor_business']['address_proof']=="Citizenship")
                    slected="" @endif>Citizenship</option>
                  <option value="Passport" @if (!empty($vendorDetails['vendor_business']['address_proof']) && $vendorDetails['vendor_business']['address_proof']=="Passport")
                  slected="" @endif>Passport</option>
                  <option value="Driving License"@if (!empty($vendorDetails['vendor_business']['address_proof']) && $vendorDetails['vendor_business']['address_proof']=="Driving License")
                  slected="" @endif>Driving License</option>
                  <option value="PAN"@if (!empty($vendorDetails['vendor_business']['address_proof']) && $vendorDetails['vendor_business']['address_proof']=="PAN")
                  slected="" @endif>PAN</option>
                  <option value="Voting Card"@if (!empty($vendorDetails['vendor_business']['address_proof']) && $vendorDetails['vendor_business']['address_proof']=="Voting Card")
                  slected="" @endif >Voting Card</option>
                </select>
              </div>
              <div class="form-group">
                <label for="address_proof_image">Address Proof Image</label>
                <br>
                @if (!empty($vendorDetails['vendor_business']['address_proof_image']))
                  <a href="{{asset($vendorDetails['vendor_business']['address_proof_image'])}}">View</a>
                @endif
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">  
      <div class="card-body">
        <h4 class="card-title">Bank Details</h4>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="account_holder_name">Account Holder Name</label>
              <input type="text" class="form-control" name="account_holder_name" id="account_holder_name" readonly placeholder="Account Holder Name" autocomplete="off" 
              @if (!empty($vendorBankDetails['vendor_bank']['account_holder_name']))
              value="{{$vendorBankDetails['vendor_bank']['account_holder_name']}}"  @endif>
            </div>
            <div class="form-group">
              <label for="bank_name">Bank Name</label>
              <input type="text" class="form-control" name="bank_name" id="bank_name" readonly placeholder="Bank Name" autocomplete="off" 
              @if (!empty($vendorBankDetails['vendor_bank']['bank_name']))
              value="{{$vendorBankDetails['vendor_bank']['bank_name']}}"  @endif >
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="account_number">Account Number</label>
              <input type="text" class="form-control" name="account_number" id="account_number" readonly placeholder="account_number" autocomplete="off"
              @if (!empty($vendorBankDetails['vendor_bank']['account_number']))
              value="{{$vendorBankDetails['vendor_bank']['account_number']}}"  @endif>
            </div>
            <div class="form-group">
              <label for="bank_ifsc_code">Bank IFSC Code</label>
              <input type="text" class="form-control" name="bank_ifsc_code" id="bank_ifsc_code" readonly placeholder="Bank IFSC Code" autocomplete="off"
              @if (!empty($vendorBankDetails['vendor_bank']['bank_ifsc_code']))
              value="{{$vendorBankDetails['vendor_bank']['bank_ifsc_code']}}"  @endif>
            </div> 
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">  
      <div class="card-body">
        <h4 class="card-title">Commission Details</h4>
        <form action="{{route('admin.update.vendor.commission')}}">
          @csrf
          <div class="form-group">
            <label for="commissions">Commission per order item(in %) </label>
            <input type="hidden" name="vendor_id" value="{{$vendorDetails['vendor_personal']['id']}}">
            <input type="text" class="form-control" name="commissions" id="commissions" placeholder="Commission" autocomplete="off"
            @if (!empty($vendorDetails['vendor_personal']['commissions']))
            value="{{$vendorDetails['vendor_personal']['commissions']}}"  @endif>
          </div>
          <button type="submit" class="btn btn-primary mr-2">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection