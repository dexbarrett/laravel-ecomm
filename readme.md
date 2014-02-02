## Laravel Ecommerce app source code

This is a follow-along ecommerce app made with Laravel 4.1

From the course [Build an eCommerce App in Laravel](https://tutsplus.com/course/laravel-ecommerce-application/)

**Things to note:**

*    The app uses Route::controller which is not recommended. Explicit routing or resource controllers are preferred 
*    URLs prefixes inside the views are hardcoded (**/store/view/**); it works but it could be better if they're more dynamic.
*    On the course we are told to create a helpers file and a class that returns a formatted string to indicate if a product is on stock. Instead, I created the functions inside the corresponding model (Product). It feels more right to me to encapsulate this functionality on the model instead of using some wrapper class which feels more like functional programming and not very OOP oriented.
*    before running locally, a folder called ´local´ must be created within the config folder. After that you should create a ´database.php´ config file and specify the MySQL connections. Once done, run DB migrations through artisan 