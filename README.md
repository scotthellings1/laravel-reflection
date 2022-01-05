# Laravel reflection
### Install

* clone repository
* `cd` into cloned project folder
* run `composer install` to install the laravel framework dependecies
* run `npm install && npm run dev` to install and compile the assets  
* copy `.env.example` to `.env` and add local database credentials
* run `php artisan key:generate` to generate the application key
* run `php artisan storage:link` to link the storage directory to the public folder
* migrate and seed the database with `php artisan migrate --seed`
* run the project with `php artisan serve`
* login details
  * username : admin@admin.com
  * password: password
    


#### required functionality
- [x] Basic Laravel Auth: ability to log in as administrator
- [x] A seeder to create the first user with email admin@admin.com and password "password"
- [x] CRUD functionality (Create / Read / Update / Delete) for two menu items: Companies and Employees.
- [x] Companies Database table consists of these fields: Name (required), email, logo (minimum 100×100), website
- [x] Employees Database table consists of these fields: First name (required), last name (required), Company, email,
  phone number
- [x]  Use database migrations to create those schemas above
- [x]  Store companies logos in storage/app/public folder and make them accessible from public
- [x]  Use basic Laravel resource controllers with default methods – index, create, store etc.
- [x]  Use Laravel’s validation function, using Request classes
- [x]  Use Laravel’s pagination for showing Companies/Employees list, 10 entries per page
- [x]  Use Laravel make:auth as default Bootstrap-based design theme, but remove ability to register

#### extra funtionality

- [x]  Integrate drag and drop file upload
- [x]  Search Employees and Companies  
- [x]  Cache dashboard content 
