# Online Api Based Food Ordering Project Using Laravel For Test 

A fully featured, Lightweight Food Ordering Project powered by Laravel 

list of features:

| Feature                                  | Status        |
| ---------------------------------------- | ------------- |
| Get List Of Restaurants                  | &#9745;       |
| Get List Of Each Restaurant's Foods      | &#9745;       |
| Api For Login,Logout,Refresh And User    | &#9745;       |
| Crud For Orders                          | &#9745;       |
| Order Change Status Role Based Permission| &#9745;       |
| Role Based Authentication Using JWT      | &#9745;       |
| Database Seeders                         | &#9745;       |
| Well Documented                          | &#9745;       |
| Unit Test Including                      | &#9744;       |

## Getting Started

Clone the project:

```
> git clone https://github.com/vahiiiid/php-test.git
```

### Prerequisites

for running the project you need the minimum requirement of running laravel 5.8


### Installing

for installing just do below steps after cloning:

```
> navigate to php-test directory
> composer install
> php -r "file_exists('.env') || copy('.env.example', '.env');"
> create a mysql database, then add your database access in .env
> php artisan key:generate
> php artisan jwt:secret
> php artisan migrate --seed
```


## Working With Project

now your project is ready to serve:

```
> php artisan serve
```
there are several api to work with entities,
it is a road map to work sequentially with them:
1. login with one of the below users with different roles created with seeders:
    
    1.1 username: user@gmail.com,  pass: user, role: user
    
    1.2 username: admin@gmail.com, pass: admin, role: admin 
   
2. then add your access_token as token variable in postman environment
3. get a list of restaurants and restaurant's food by making these 2 api call 
4. store an order with knowledge of data given for restaurant and it's food
5. make changes to your orders

## logic rules of Project

1. user can change orders with init status only
2. user cannot change order status
3. admin user can change orders status and get list of all orders
4. admin can update order of all users



## Postman Doc Url

* [click to download postman doc](http://vahidvahedi.ir)


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

