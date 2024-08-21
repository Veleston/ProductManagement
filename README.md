Instructions

Clone the repository.

1. Run  "composer install" to install packages
2. Run "php artisan jwt:secret" to generate jwt secret
3. Run the migrations and seeders
    php artisan migrate
    php artisan db:seed

Endpoints
Login : http://127.0.0.1:8000/api/auth/signin
Listing with Filters: http://127.0.0.1:8000/api/listing

Payload For listing eg. 

<pre>
    {
    "sort_order":"asc",
    "brands":[1]
    }
</pre>

