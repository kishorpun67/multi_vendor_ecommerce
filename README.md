<ol type="1">
    <h3>
        Set up :
    </h3>
    <li>Clone the repo and cd into it</li>
    <li>In your terminal composer install</li>
    <li>Rename or copy .env.example file to .env</li>
    <li>php artisan key:generate</li>
    <li>Set your database credentials in your .env file</li>
    <li>Set your mail in your .env file </li>
    <li>Import db file(mutli_vendor_ecommerce.sql) into your database (mysql,sql)</li>
    <li>run command[laravel file manager]:- php artisan storage:link</li>
    <li>Visit localhost:8000 in your browser</li>
    <li>Visit localhost:8000/admin/login for admin (email = admin@admin.com, password=12345)</li>
    <li>Visit localhost:8000/vendor/login-register for vednor (email = johan@admin.com, password=12345)</li>
    <li>Visit localhost:8000/vendor/login-register for vednor (email = kishorpun55@gmail.com, password=12345)</li>
</ol>
<ul> 
    <h3>
        ====== FRONT-END =======
    </h3>
    <li>Responsive Layout</li>
    <li>Category,Featured,Discounted,New Productct, Filter with ajax, search</li>
    <li>Shopping Cart, Product Reviews & rating</li>
    <li>Coupons, Discounts, shipping charge & pincode</li>
    <li>Product attributes: cost price price, stock, size, filters</li>
    <li>SEO support</li>
    <li>Related Products,</li>

</ul>
<ul>
    <h3>======= USER DASHBOARD =======</h3>
    <li>Profile Settings</li>
    <li>Products review  & rating</li>
    <li>Cart</li>
    <li>Checkout</li>
    <li>Orders and order details</li>
</ul>
<ul>
    <h3>======= VENDOR DASHBOARD =======</h3>
    <li>Vednor Detal = Personal Details, Business Details, Bank Details</li>
    <li>Catelogue = Products,Coupon</li>
    <li>Order = Orders & order Details, pdf, print</li>
</ul>









 



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

 return str_replace("http://127.0.0.1:8000/", '', url()->current());
