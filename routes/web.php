<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
return view('welcome');
});

//Route::get("/home", function() {
//return "<h1>This is home page</h1>" ;
//});

Route::get("/blog/{id}", function($id) {
return "<h1>This is blog page : {$id} </h1>" ;
});

Route::get( "/blog/{id}/edit" , function($id) {
return "<h1>This is blog page : {$id} for edit</h1>" ;
});

Route::get("/product/{a}/{b}/{c}", function($a, $b, $c) {
return "<h1>This is product page </h1><div>{$a} , {$b}, {$c}</div>" ;
});

Route::get("/category/{a?}", function($a = "mobile") {
return "<h1>This is category page : {$a} </h1>" ;
});

Route::get("m", function() {
return "<h1>This is order form page : ". request("username") ."</h1>" ;
});

//routes/web.php
Route::get("/hello", function () {
return view("hello");
});

Route::get('/greeting', function () {
$name = 'James';
$last_name = 'Mars';
return view('greeting', compact('name','last_name') );
});

//Quiz1

Route::get( "/gallery" , function(){
$ant = url("images/ant.jpg");
$bird = url("images/bird.jpg");
$cat = url("images/cat.jpg");
$god = url("images/god.jpg");
$spider = url("images/spider.jpg");

return  view("test/index", compact("ant","bird","cat","god","spider") );
});


Route::get( "/gallery/ant" , function(){
$ant = url("images/ant.jpg");

return  view("test/index1", compact("ant") );
});


Route::get( "/gallery/bird" , function(){
$bird = url("images/bird.jpg");

return  view("test/index2", compact("bird") );
});

Route::get( "/gallery/cat" , function(){
$cat = url("images/cat.jpg");

return  view("test/index3", compact("cat") );
});

Route::get("/myprofile/create","MyProfileController@create");

Route::get("/myprofile/{id}/edit", "MyProfileController@edit");

Route::get("/myprofile/{id}", "MyProfileController@show");

//Quiz2

Route::get( "/newgallery" , "MyProfileController@gallery" );
Route::get( "/newgallery/ant" , "MyProfileController@ant" );
Route::get( "/newgallery/bird" , "MyProfileController@bird" );

Route::get( "/coronavirus" , "MyProfileController@coronavirus" );

//Boostrap

// Middleware
Route::middleware(['auth', 'role:admin,teacher'])
->group(function () {
	Route::get('/covid19', 'Covid19Controller@index');
	Route::get('/covid19/{id}', 'Covid19Controller@show');
});

Route::middleware(['auth', 'role:admin'])
->group(function () {
	Route::get('/covid19/create', 'Covid19Controller@create');
	Route::post('/covid19', 'Covid19Controller@store');
	Route::get('/covid19/{id}/edit', 'Covid19Controller@edit');
	Route::put('/covid19/{id}', 'Covid19Controller@update');
	Route::delete('/covid19/{id}', 'Covid19Controller@destroy');
});
// Middleware
	

Route::get("/teacher" , function (){
	return view("teacher/index");
});

Route::get("/student" , function (){
	return view("student/index");
});


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
// Route::get('/', function () {
//     return view('table');
// });

//การสร้าง รวม Routes โดยใช้ resource
//Route::resource('/covid19','Covid19Controller');

//แยก Routes 
/*Route::get('/covid19', 'Covid19Controller@index');
Route::get('/covid19/create', 'Covid19Controller@create');
Route::post('/covid19', 'Covid19Controller@store');
Route::get('/covid19/{id}', 'Covid19Controller@show');
Route::get('/covid19/{id}/edit', 'Covid19Controller@edit');
Route::patch("/covid19/{id}", "Covid19Controller@update");
Route::delete('/covid19/{id}', 'Covid19Controller@destroy');*/


Route::resource('/staffs','StaffsController');

 //Route::get('/staffs', 'staffsController@index');
 

Auth::routes();    
Route::resource('post', 'PostController');
Route::resource('book', 'BookController');
Route::resource('street', 'streetController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::resource('proflie', 'proflieController');
//Route::resource('vehicles', 'vehiclesController');
Route::resource('users', 'usersController');
//Route::resource('profile', 'profileController');
Route::resource('profile', 'profileController');
Route::resource('vehicles', 'vehiclesController');

//shop online
Route::get('/product/pdf', 'ProductController@pdf_index');
//Route::resource('order', 'OrderController');
//Route::resource('payment', 'PaymentController');
//Route::resource('order-product', 'OrderProductController');
Route::resource('product', 'ProductController');

Route::middleware(['auth'])->group(function () {
	Route::middleware(['role:admin'])->group(function () {    //ONLY ADMIN CAN ACCESS
        Route::get('order-product/reportdaily', 'OrderProductController@reportdaily');
        Route::get('order-product/reportmonthly', 'OrderProductController@reportmonthly');
        Route::get('order-product/reportyearly', 'OrderProductController@reportyearly');
    });


    Route::resource('order', 'OrderController');
    Route::resource('payment', 'PaymentController');
	Route::resource('order-product', 'OrderProductController');	
});

