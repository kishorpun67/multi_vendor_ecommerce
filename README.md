<ul>
    <h3>
        Set up :
    </h3>
    <li>Clone the repo and cd into it</li>
    
</ul>


In your terminal composer install
Rename or copy .env.example file to .env
php artisan key:generate
Set your database credentials in your .env file
Set your mail in your .env file 
Import db file(mutli_vendor_ecommerce.sql) into your database (mysql,sql)
run command[laravel file manager]:- php artisan storage:link
Visit localhost:8000 in your browser
Visit localhost:8000/admin/login for admin (email = admin@admin.com, password=12345) 
Visit localhost:8000/vendor/login-register for vednor (email = johan@admin.com, password=12345)
Visit localhost:8000/vendor/login-register for vednor (email = kishorpun55@gmail.com, password=12345)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

 return str_replace("http://127.0.0.1:8000/", '', url()->current());
