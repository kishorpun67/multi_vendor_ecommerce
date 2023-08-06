    @if (count($deliveryAddress) > 0)
        <h4 class="section-h4 deliveryText">Add New Delivery Address</h4>
        <div class="u-s-m-b-24">
            <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse" data-target="#showdifferent">
            <label class="label-text newAddress" for="ship-to-different-address">Ship to a different address?</label>
        </div>
        <div class="collapse" id="showdifferent">
            <form method="post" action="javascript:void(0);" id="addressAddEditForm">
                <div class="group-inline u-s-m-b-13">
                    <div class="group-1 u-s-p-r-16">
                        <label for="full-name-extra">Name 
                            <span class="astk">*</span>
                        </label>
                        <input type="hidden" name="delivery_id" id="">
                        <input type="text" name="delivery_name" id="full-name-extra" class="text-field" placeholder="Name">
                    </div>
                </div>
                <div class="street-address u-s-m-b-13">
                    <label for="req-st-address-extra">Address
                        <span class="astk">*</span>
                    </label>
                    <input type="text" name="delivery_address" id="req-st-address-extra" name="delivery_address" class="text-field" placeholder="Address">
                </div>
                <div class="street-address u-s-m-b-13">
                    <label for="req-st-address-extra">State
                        <span class="astk">*</span>
                    </label>
                    <input type="text" id="req-st-address-extra" name="delivery_state" class="text-field" placeholder="Stae">
                </div>
                <div class="u-s-m-b-13">
                    <label for="town-city-extra">City
                        <span class="astk">*</span>
                    </label>
                    <input type="text" id="town-city-extra" name="delivery_city" class="text-field" placeholder="City">
                </div>
                <div class="u-s-m-b-13">
                    <label for="select-country-extra">Country
                        <span class="astk">*</span>
                    </label>
                    <div class="select-box-wrapper">
                        <select class="select-box" name="delivery_country" id="select-country-extra">
                            <option value="">Choose your country...</option>
                            @foreach ($countries as $item)
                                <option value="{{$item->nicename}}"
                                {{-- @if (!empty(auth()->user()->country) && auth()->user()->country==$item->nicename)
                                    selected=""  
                                @endif --}}
                                >{{$item->nicename}}</option>                      
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="u-s-m-b-13">
                    <label for="postcode-extra">Pincode
                        <span class="astk">*</span>
                    </label>
                    <input type="text" id="postcode-extra" name="delivery_pincode" class="text-field" placeholder="Pincode">
                </div>
                <div class="group-inline u-s-m-b-13">
                    <div class="group-2">
                        <label for="phone-extra">Mobile
                            <span class="astk">*</span>
                        </label>
                        <input type="text" name='delivery_mobile' id="phone-extra" placeholder="Mobile" class="text-field">
                    </div>
                </div>
                <div class="u-s-m-b-13" >
                    <button style="width: 100%;" type="submit" class="button button-outline-secondary">Save</button>
                </div>
            </form>
        </div>
        {{-- <div>
            <label for="order-notes">Order Notes</label>
            <textarea class="text-area" id="order-notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
        </div> --}}

    @else
    <h4 class="section-h4 deliveryText">Add New Delivery Address</h4>
    <div class="u-s-m-b-24">
        <input type="checkbox" class="check-box" id="ship-to-different-address" data-toggle="collapse" data-target="#showdifferent">
        <label class="label-text newAddress" for="ship-to-different-address">Check to add Delivery Address</label>
    </div>
    <div class="collapse" id="showdifferent">
        <form method="post" action="javascript:void(0);" id="addressAddEditForm">
            <div class="group-inline u-s-m-b-13">
                <div class="group-1 u-s-p-r-16">
                    <label for="full-name-extra">Name 
                        <span class="astk">*</span>
                    </label>
                    <input type="hidden" name="delivery_id" id="">
                    <input type="text" name="delivery_name" id="full-name-extra" class="text-field" placeholder="Name">
                </div>
            </div>
            <div class="street-address u-s-m-b-13">
                <label for="req-st-address-extra">Address
                    <span class="astk">*</span>
                </label>
                <input type="text" name="delivery_address" id="req-st-address-extra" name="delivery_address" class="text-field" placeholder="Address">
            </div>
            <div class="street-address u-s-m-b-13">
                <label for="req-st-address-extra">State
                    <span class="astk">*</span>
                </label>
                <input type="text" id="req-st-address-extra" name="delivery_state" class="text-field" placeholder="Stae">
            </div>
            <div class="u-s-m-b-13">
                <label for="town-city-extra">City
                    <span class="astk">*</span>
                </label>
                <input type="text" id="town-city-extra" name="delivery_city" class="text-field" placeholder="City">
            </div>
            <div class="u-s-m-b-13">
                <label for="select-country-extra">Country
                    <span class="astk">*</span>
                </label>
                <div class="select-box-wrapper">
                    <select class="select-box" name="delivery_country" id="select-country-extra">
                        <option value="">Choose your country...</option>
                        @foreach ($countries as $item)
                            <option value="{{$item->nicename}}"
                            {{-- @if (!empty(auth()->user()->country) && auth()->user()->country==$item->nicename)
                                selected=""  
                            @endif --}}
                            >{{$item->nicename}}</option>                      
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="u-s-m-b-13">
                <label for="postcode-extra">Pincode
                    <span class="astk">*</span>
                </label>
                <input type="text" id="postcode-extra" name="delivery_pincode" class="text-field" placeholder="Pincode">
            </div>
            <div class="group-inline u-s-m-b-13">
                <div class="group-2">
                    <label for="phone-extra">Mobile
                        <span class="astk">*</span>
                    </label>
                    <input type="text" name='delivery_mobile' id="phone-extra" placeholder="Mobile" class="text-field">
                </div>
            </div>
            <div class="u-s-m-b-13" >
                <button style="width: 100%;" type="submit" class="button button-outline-secondary">Save</button>
            </div>
        </form>
    </div>
    {{-- <div>
        <label for="order-notes">Order Notes</label>
        <textarea class="text-area" id="order-notes" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
    </div> --}}

    @endif

