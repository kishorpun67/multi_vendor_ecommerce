$(document).ready(function() {
    // class data tabele class
    $('#section').DataTable();

    // $('.nav-item').removeClass('active');
    // $('.nav-link').removeClass('active');


    // delete function 
    $('body').on("click", ".delete", function() {
        var id = $(this).attr('rel');
        var record = $(this).attr('record');
        console.log(id, record);
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                // swalWithBootstrapButtons.fire(
                //     'Deleted!',
                //     'Your file has been deleted.',
                //     'success'
                // )
                function test() {
                    window.location.href = "delete-" + record + "/" + id;
                }
                test();
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                )
            }
        })
    });

    // update admin status 
    $('body').on('click', ".updateAdminStatus", function() {
        var status = $(this).children("i").attr("status");
        var admin_id = $(this).attr("admin_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-admin-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                admin_id: admin_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#admin-" + admin_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#admin-" + admin_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // update section status 
    $('body').on('click', '.updateSectionStatus', function() {
        var status = $(this).children("i").attr("status");
        var section_id = $(this).attr("section_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-section-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                section_id: section_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#section-" + section_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#section-" + section_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // update category status 
    $('body').on('click', '.updatecategoryStatus', function() {
        var status = $(this).children("i").attr("status");
        var category_id = $(this).attr("category_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-category-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                category_id: category_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#category-" + category_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#category-" + category_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // update appendCategoryLevel status 
    $('body').on('change','#appendCategoryLevel', function() {
        var section_id = $(this).val();
        console.log(section_id);
        $.ajax({
            type: 'post',
            url: '/admin/append-category-level',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                section_id: section_id
            },
            success: function(response) {
                $("#appendCategory").html(response);
            },
            error: function() {
                alert("Error");
            }
        });
    });
    
    //  updatebrandStatus  
    $('body').on('click', '.updatebrandStatus', function() {
        var status = $(this).children("i").attr("status");
        var brand_id = $(this).attr("brand_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-brand-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                brand_id: brand_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#brand-" + brand_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#brand-" + brand_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    //  updateproductStatus  
    $('body').on('click', '.updateproductStatus', function() {
        var status = $(this).children("i").attr("status");
        var product_id = $(this).attr("product_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-product-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                product_id: product_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#product-" + product_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#product-" + product_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // add field warraper in produtct attributes
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = 
    `<div>

        <div style="height:10px;"></div>
        <input type="text" style="width: 100px; border-color:stick; " name="sku[]" value="" placeholder="SKU" required/>
        <input type="text" style="width: 100px; border-color:stick; " name="size[]" value="" placeholder="Size" required/>
        <input type="text" style="width: 100px; border-color:stick; "  name="price[]" value="" placeholder="Price" required/>
        <input type="text" style="width: 100px; border-color:stick; " name="stock[]" value="" placeholder="Stock" required/>  
    <a href="javascript:void(0);" class="remove_button">Remove</div>`; //New input field html 
    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });

    //  updateattributeStatus  
    $('body').on('click', '.updateattributeStatus', function() {
        var status = $(this).children("i").attr("status");
        var attribute_id = $(this).attr("attribute_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-attribute-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                attribute_id: attribute_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#attribute-" + attribute_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#attribute-" + attribute_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    //  updateProuductImageStatus  
    $('body').on('click', '.updateProuductImageStatus', function() {
        var status = $(this).children("i").attr("status");
        var image_id = $(this).attr("image_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-image-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                image_id: image_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#image-" + image_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#image-" + image_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    //  updatebannerStatus  
    $('body').on('click', '.updatebannerStatus', function() {
        var status = $(this).children("i").attr("status");
        var banner_id = $(this).attr("banner_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-banner-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                banner_id: banner_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#banner-" + banner_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#banner-" + banner_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });


    //  updatefilterStatus  
    $('body').on('click', '.updatefilterStatus', function() {
        var status = $(this).children("i").attr("status");
        var filter_id = $(this).attr("filter_value_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-filter-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                filter_id: filter_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#filter-" + filter_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#filter-" + filter_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // updateFilterValueStatus
    $('body').on('click', '.updateFilterValueStatus', function() {
        var status = $(this).children("i").attr("status");
        var filter_value_id = $(this).attr("filter_value_id");
        console.log(filter_value_id)
        $.ajax({
            type: 'post',
            url: '/admin/update-filter-value-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                filter_value_id: filter_value_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#filter_value-" + filter_value_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#filter_value-" + filter_value_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // show filters on selection of cateogory 
    $('body').on('change', '#cateogory_id', function(){
        var category_id = $(this).val();
        $.ajax({
            type: 'post',
            url: '/admin/category-filters',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                category_id: category_id
            },
            success: function(response) {
                $(".loadFilters").html(response.view);
            },
            error: function() {
                alert("Error");
            }
        });    
    })

    //  updatecouponStatus  
    $('body').on('click', '.updatecouponStatus', function() {
        var status = $(this).children("i").attr("status");
        var coupon_id = $(this).attr("coupon_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-coupon-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                coupon_id: coupon_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#coupon-" + coupon_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#coupon-" + coupon_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });
    
    // show/hide coupon field for manual/automatic 
    $("#ManulCoupon").click(function() {
        $("#couponField").show();
    })
    $("#AutomaticCoupon").click(function() {
        $("#couponField").hide();

    })

    // updateuserStatus
    $('body').on('click', '.updateuserStatus', function() {
        var status = $(this).children("i").attr("status");
        var user_id = $(this).attr("user_id");
        // console.log(status, user_id);
        $.ajax({
            type: 'post',
            url: '/admin/update-user-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                user_id: user_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#user-" + user_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#user-" + user_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // show courier number name aand tracking number in case of  shipped order status 
    $("#courier_name").hide();
    $("#tracking_number").hide();
    $('#order_status').on('change', function(){
        if($(this).val() == 'Shipped') {
            $("#courier_name").show();
            $("#tracking_number").show();
        }else {
            $("#courier_name").hide();
            $("#tracking_number").hide(); 
        }
    })

    // show item courier number name aand item tracking number in case of  shipped order status 

    $('.item_status').on('change', function(){
        var id = $(this).data('id');
        if($(this).val() == 'Shipped') {
            $("#item_courier_name-"+id).show();
            $("#item_tracking_number-"+id).show();
        }else {
            $("#item_courier_name-"+id).hide();
            $("#item_tracking_number-"+id).hide(); 
        }
    })

       // update shipping status 
    $('body').on('click', ".updateshippingStatus",function() {
        var status = $(this).children("i").attr("status");
        var shipping_id = $(this).attr("shipping_id");
      
        $.ajax({
            type: 'post',
            url: '/admin/update-shipping-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                shipping_id: shipping_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#shipping-" + shipping_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#shipping-" + shipping_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });

    // updateratingStatus
    $('body').on('click', ".updateratingStatus",function() {
        var status = $(this).children("i").attr("status");
        var rating_id = $(this).attr("rating_id");
      
        $.ajax({
            type: 'post',
            url: '/admin/update-rating-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                rating_id: rating_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#rating-" + rating_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#rating-" + rating_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });
    
      // updatesubscriberStatus
      $('body').on('click', ".updatesubscriberStatus",function() {
        var status = $(this).children("i").attr("status");
        var subscriber_id = $(this).attr("subscriber_id");
        $.ajax({
            type: 'post',
            url: '/admin/update-subscriber-status',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                status: status,
                subscriber_id: subscriber_id
            },
            success: function(response) {
                if (response['status'] == 0) {
                    $("#subscriber-" + subscriber_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-outline" status="Inactive"></i>');
                } else if (response['status'] == 1) {
                    $("#subscriber-" + subscriber_id).html('<i style="font-size: 25px;" class="mdi mdi-bookmark-check"  status="Active"></i> ');
                }
            },
            error: function() {
                alert("Error");
            }
        });
    });
    
});