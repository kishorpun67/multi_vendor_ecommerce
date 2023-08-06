
$(document).ready(function (){
    // update appendCategoryLevel status 
    $("#getPrice").change(function() {
        var size = $(this).val();
        var product_id = $(this).attr('product_id');

        console.log(product_id, size);
        // return;
        $.ajax({
            type: 'post',
            url: '/get-product-price',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                product_id: product_id,
                size: size,

            },
            success: function(response) {
                if(response.discount > 0) {
                    $('.getAttributePrice').html(`
                        <div class="price">
                            <h4>Rs.${response.final_price}</h4>
                        </div>
                        <div class="original-price">
                            <span>Original Price:</span>
                            <span> Rs.${response.product_price}</span>
                        </div>
                    `);
                } else {
                    $('.getAttributePrice').html(`
                        <div class="original-price">
                            <span>Original Price:</span>
                            <span> Rs.${response.product_price}</span>
                        </div>
                    `);
                }
                // $("#appendCategory").html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // update cart item qty
    $(document).on('click','.updateCrtItem', function(){
        if($(this).hasClass('plus-a')){
            // get qty
            var quantity = parseInt($(this).attr('qty'));

            // increase the qty by one
            var new_qty = parseInt(quantity)+1;
        } else if ($(this).hasClass('minus-a')) {
            // get qty
            var quantity = parseInt($(this).attr('qty'));
            
            // check qty is at lest 1
            if(quantity<2  ) {
                alert('Item quantity must be 1 or greater');
                return;
            }
            // increase the qty by one
            var new_qty = parseInt(quantity)-1;
        }
        // get cart id 
        var cart_id = $(this).attr('cart_id');
        $.ajax({
            type: 'post',
            url: '/cart/update',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                new_qty: new_qty,
                cart_id: cart_id
            },
            success: function(response) {
                $('.totalCartItems').html(response.totalCartItems);
                if(response.status== false) { 
                    alert(response.message);
                }
                // alert('test');
                $('.appendCartItems').html(response.view);
                $('#appendHeaderCartItems').html(response.headerview);

            },
            error: function() {
                alert("Error");
            }
        });
    })

    // delete cart item
    $(document).on('click','.deleteCartItem', function(){
        var cart_id = $(this).data('cartid');
        var result = confirm('Are you sure you want to delete this cart item');
        if (result) {
            console.log(cart_id);
            $.ajax({
                type: 'post',
                url: '/cart/delete',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    cart_id: cart_id
                },
                success: function(response) {
                    $('.totalCartItems').html(response.totalCartItems);
                    $('.appendCartItems').html(response.view);
                    $('#appendHeaderCartItems').html(response.headerview);

                },
                error: function() {
                    alert("Error");
                }
            });
        }
    });

    // register fomr validation
    $('#registerForm').submit( function(event) {
        event.preventDefault(); // Prevent default form submission
        $('.loader').show(); //show loader
        var name  = $('#name').val();
        var mobile  = $('#mobile').val();
        var email  = $('#email').val();
        var password  = $('#password').val();
        var accept  = $('#accept').val();
        // console.log(name,mobile,email,password ,accept);
        // console.table([formData ])
        $.ajax({
            method: 'POST',
            url: '/user/register',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                name: name,
                mobile: mobile,
                email: email,
                password: password, 
                accept: accept
            },
            success: function(response) {
                if(response.type == 'error'){
                    $('.loader').hide(); //hide loader
                    console.log(response.errors);
                    $.each(response.errors , function(i,error) {
                        console.log(error)
                        console.log(i)
                        $("#register-"+i).text(error);
                        setTimeout(function(){
                            $("#register-"+i).css({'display':'none'});
                        }, 3000);
                    })

                } else if(response.type == 'success') {
                    $('.loader').hide(); //hide loader
                    $(".alert-success").css({'display':'block'});
                    $(".alert-success").html(response.message);
                    setTimeout(function(){
                        $(".alert-success").css({'display':'none'});
                    }, 6000);
                    // window.location.href = response.url
                }
            },
            error: function() {
                alert("Error");
            }
        });
    })

    // register fomr validation
    $('#loginForm').submit( function(event) {
        event.preventDefault(); // Prevent default form submission
        var email  = $('#login-email').val();
        var password  = $('#login-password').val();
        console.log(email,password );
        $.ajax({
            method: 'POST',
            url: '/user/login-register',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                email: email,
                password: password, 
            },
            success: function(response) {
                if(response.type == 'error'){
                    // alert('drts') 
                    console.log(response.errors);
                    $.each(response.errors , function(i,error) {
                        console.log(error)
                        console.log(i)
                        $("#login_"+i).html(error);
                        setTimeout(function(){
                            $("#login_"+i).css({'display':'none'});
                        }, 3000);
                    })

                } else if(response.type == 'success') {
                    window.location.href = response.url

                } else if(response.type =='incorrect') {
                    $("#error_message").html(response.message);
                    setTimeout(function(){
                        $("#error_message").css({'display':'none'});
                    }, 6000)
                }
                else if(response.type =='inactive') {
                    $(".alert-danger").css({'display':'block'});
                    $(".alert-danger").html(response.message);
                    setTimeout(function(){
                        $(".alert-danger").css({'display':'none'});
                    }, 6000);
                }
            },
            error: function() {
                alert("Error");
            }
        });
    })

    // check user current password 
    $("#current_password").keyup(function () {
        var current_password = $("#current_password").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'user/check-current-password',
            data:{
                current_password:current_password
            },
            success:function(response) {
                // if(response.type == 'error'){
                //     console.log(response.errors);
                //     $.each(response.errors , function(i,error) {
                //         console.log(error)
                //         console.log(i)
                //         $("#register-"+i).text(error);
                //         setTimeout(function(){
                //             $("#register-"+i).css({'display':'none'});
                //         }, 3000);
                //     })

                // }
                if(response=="false")
                {
                    $("#user-current_password").html("<font color=red>Current Password is Incorrect.");
                }else if(response=="true")
                {
                    $("#user-current_password").html("<font color=green>Current Password is Correct.");
                }
            },error:function(){
                alert("Error");
            }
        });

    });

     // update user passsword 
    $("#updatePassword").submit(function () {
        $('.loader').show(); //show loader
        var current_password = $("#current_password").val();
        var new_password = $("#new_password").val();
        var confirm_password = $("#confirm_password").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'user/update-password',
            data:{
                current_password:current_password,
                new_password:new_password,
                confirm_password:confirm_password,
            },
            success:function(response) {
                if(response.type == 'error'){
                    $('.loader').hide(); //hide loader
                    $.each(response.errors , function(i,error) {
                        $("#user-"+i).text(error);
                        setTimeout(function(){
                            $("#user-"+i).css({'display':'none'});
                        }, 6000);
                    })
                } else if(response.type =='incorrect') {
                    $('.loader').hide(); //hide loader
                    $("#error_message").html(response.message);
                    setTimeout(function(){
                        $("#error_message").css({'display':'none'});
                    }, 6000)
                } else if(response.type =='notmatch') {
                    $('.loader').hide(); //hide loader
                    $(".alert-danger").css({'display':'block'});
                    $(".alert-danger").html(response.message);
                    setTimeout(function(){
                        $(".alert-danger").css({'display':'none'});
                    }, 6000);
                } else if(response.type == 'success') {
                    $('.loader').hide(); //hide loader
                    $(".alert-success").css({'display':'block'});
                    $(".alert-success").html(response.message);
                    setTimeout(function(){
                        $(".alert-success").css({'display':'none'});
                    }, 6000);
                    // window.location.href = response.url
                }
            },error:function(){
                alert("Error");
            }
        });

    });

    // updata user account 
    $("#updateAccount").submit(function () {
        $('.loader').show(); //show loader
        var name = $("#name").val();
        var address = $("#address").val();
        var city = $("#city").val();
        var state = $("#state").val();
        var country = $("#country").val();
        var mobile = $("#mobile").val();
        var pincode = $("#pincode").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'post',
            url:'user/update-account',
            data:{
                name:name,
                address:address,
                city:city,
                state:state,
                country:country,
                mobile:mobile,
                pincode:pincode,
            },
            success:function(response) {
                if(response.type == 'error'){
                    $('.loader').hide(); //hide loader
                    $.each(response.errors , function(i,error) {
                        $("#user-"+i).text(error);
                        setTimeout(function(){
                            $("#user-"+i).css({'display':'none'});
                        }, 6000);
                    })
                }  else if(response.type == 'success') {
                    $('.loader').hide(); //hide loader
                    $(".alert-success").css({'display':'block'});
                    $(".alert-success").html(response.message);
                    setTimeout(function(){
                        $(".alert-success").css({'display':'none'});
                    }, 6000);
                    // window.location.href = response.url
                }
            },error:function(){
                alert("Error");
            }
        });

    });

    // apply coupon code 
    $("#ApplyForm").submit(function(event) {
        event.preventDefault(); // Prevent default form submission
        var coupon_code = $("#coupon-code").val();
        var user= $('#ApplyForm').attr('user');
        console.log(coupon_code, user);
        if(user == 1) {
            $.ajax({
                type: 'post',
                url: '/apply-coupon',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    coupon_code: coupon_code,
                },
                success: function(response) {
                    if (response.message !='') { 
                        alert(response.message);
                    }

                    $('.totalCartItems').html(response.totalCartItems);
                    $('.appendCartItems').html(response.view);
                    $('#appendHeaderCartItems').html(response.headerview);
                    if(response.couponAmount > 0) {
                        $('.couponAmount').text('Rs.'+response.couponAmount);
                    } else {
                        $('.couponAmount').text('Rs.0');
                    }
                    if(response.grandTotalAmount > 0) {
                        $('.grandTotal').text('Rs.'+response.grandTotalAmount);
                    } else {
                        $('.grandTotal').text('Rs.0');
                    }
                },
                error: function() {
                    alert("Error");
                }
            });
        } else {
            alert("Please login for apply coupon code");
        }

    })

    // edit delivery address 
    $(document).on("click",".editAddress", function(){
        var addressid = $(this).data("addressid");
        $.ajax({
            type: 'post',
            url: '/get-delivery-address',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                addressid: addressid,
            },
            success: function(response) {
                $("#showdifferent").removeClass('collapse');
                $(".newAddress").hide();
                $(".deliveryText").text('Edit Delivery');
                $('[name=delivery_id]').val(response.id);
                $('[name=delivery_name]').val(response.name);
                $('[name=delivery_address]').val(response.address);
                $('[name=delivery_city]').val(response.city);
                $('[name=delivery_state]').val(response.state);
                $('[name=delivery_country]').val(response.country);
                $('[name=delivery_pincode]').val(response.pincode);
                $('[name=delivery_mobile]').val(response.mobile);
                // $('[name=delivery_id]').val(response.id);
                console.log(response);
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // address Add Edit
    $(document).on("submit", "#addressAddEditForm", function(){
        var delivery_id = $('[name=delivery_id]').val();
        var delivery_name = $('[name=delivery_name]').val();
        var delivery_address = $('[name=delivery_address]').val();
        var delivery_city = $('[name=delivery_city]').val();
        var delivery_state = $('[name=delivery_state]').val();
        var delivery_country = $('[name=delivery_country]').val();
        var delivery_pincode = $('[name=delivery_pincode]').val();
        var delivery_mobile =$('[name=delivery_mobile]').val();
        $.ajax({
            type: 'post',
            url: '/save-delivery-address',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                delivery_id: delivery_id,
                delivery_name: delivery_name,
                delivery_address: delivery_address,
                delivery_city: delivery_city,
                delivery_state: delivery_state,
                delivery_country: delivery_country,
                delivery_pincode: delivery_pincode,
                delivery_mobile: delivery_mobile,
            },
            success: function(response) {
                if (response.status == true) {
                    alert(response.message)
                }
                if (response.status == false) {
                    alert(response.message)
                }
                $("#deliveryAddress").html(response.view);
                window.location.href = 'checkout';
            },
            error: function() {
                alert("Error");
            }
        });
    });
    
    // delete delivery address 
    $(".removeAddress").on("click", function(){
        if(confirm("Are you sure to remove this?")) {
            var addressid = $(this).data("addressid");
            $.ajax({
                type: 'post',
                url: '/remove-delivery-address',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    addressid: addressid,
                },
                success: function(response) {
                    if (response.status == true) {
                        alert(response.message)
                    }
                    $("#deliveryAddress").html(response.view);
                    window.location.href = 'checkout';
                },
                error: function() {
                    alert("Error");
                }
            });    
        }
    });

    // show loading when order is placing 
    $("#orderPlace").on("click",function(){
        $('.loader').show(); //show loader
    })

    // calculate grand total 
    $("input[name=address_id]").bind('change',function(){
        var shipping_charges = $(this).attr('shipping_charges');
        var total_price = $(this).attr('total_price');
        var coupon_amount = $(this).attr('coupon_amount');
        var cod_checkout_pincode = $(this).attr('codpincodeCount');

        if(cod_checkout_pincode == 0) {
            $('.codMethod').hide();
        } else {
            $('.codMethod').show();

        }
        if(coupon_amount == "") {
            coupon_amount = 0;
        }
        var grant_total = parseInt(total_price) + parseInt(shipping_charges) - parseInt(coupon_amount);
        $('.shippingCharge').text('Rs.'+shipping_charges);
        $('.couponAmount').text('Rs.'+shipping_charges);
        $('.grandTotal').text('Rs.'+grant_total);

        console.log(grant_total);
    });

    // varify pincode at detail page 
    $('.checkpincode').on('click', function(){
        var pincode = $("#pincode").val();
        if(pincode != "") {
            $.ajax({
                type: 'post',
                url: '/check-pincode',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    pincode: pincode,
                },
                success: function(response) {
                    alert(response);
                },
                error: function() {
                    alert("Error");
                }
            });
        } else {
            alert("Please enter pincode");
        }
    })
});
function get_filter(class_name) {
    var filter = [];
    $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());

    })
    return filter;
}

function addSubscriber() {
    let email = $("#subscriber_name").val();
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))
    {
        $.ajax({
            type: 'post',
            url: '/add-subscribe-email',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                email: email,
            },
            success: function(response) {
                if (response=="exists") { 
                    alert(response);
                } else if(response=="save") { 
                    alert(response);
                }
            },
            error: function() {
                alert("Error");
            }
        });    }
      console.log("You have entered an invalid email address!")
      return (false)
}