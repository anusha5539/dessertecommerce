<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// to show the home page
Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// to show the admin and home page
Route::get('/redirect',[HomeController::class,'redirect']);


// category
// to view the category page
Route::get('/admin_category',[AdminController::class,'view_category']);

// to add the category in category page
Route::post('/add_category',[AdminController::class,'add_category']);

// to delete the category in category page
Route::get('/delete_category/{id}',[AdminController::class,'delete_category']);



// for product
// to view product
Route::get('/view_product',[AdminController::class,'view_product']);

// to add product
Route::post('/add_product',[AdminController::class,'add_product']);

// to show product
Route::get('/show_product',[AdminController::class,'show_product']);

// to delete product
Route::get('/delete_product/{id}',[AdminController::class,'delete_product']);

// to edit product
Route::get('/edit_product/{id}',[AdminController::class,'edit_product']);

// to update product
Route::post('/update_product/{id}',[AdminController::class,'update_product']);

// to show the order product
Route::get('/order',[AdminController::class,'order']);

// to change the product status
Route::get('/delivery/{id}',[AdminController::class,'delivery']);

// to print the pdf
Route::get('/print_pdf/{id}',[AdminController::class,'print_pdf']);

// send email
Route::get('//send_email/{id}',[AdminController::class,'send_email']);

// to search certain product
Route::get('/search',[AdminController::class,'searchData']);



// in home controller
// to get product details
Route::get('/product_details/{id}',[HomeController::class,'product_details']);

// to add the product to cart
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);

// to add show product in cart
Route::get('/show_cart',[HomeController::class,'show_cart']);

// to remove  product from cart
Route::get('/remove_product/{id}',[HomeController::class,'remove_product']);

// to   product from cart
Route::get('/cash_order',[HomeController::class,'cash_order']);

// to  create stripe for cash on payment 
Route::get('/stripe/{totalprice}',[HomeController::class,'stripe']);
Route::post('stripe/{totalprice}', [HomeController::class,'stripePost'])->name('stripe.post');

// to show the order
Route::get('/show_order',[HomeController::class,'show_order']);

// to cancel the order
Route::get('/cancel_order/{id}',[HomeController::class,'cancel_order']);

// to add comment
Route::post('/add_comment',[HomeController::class,'add_comment']);

// to add a reply
Route::post('/add_reply',[HomeController::class,'add_reply']);

// to search for a product
Route::get('/search_product',[HomeController::class,'search_product']);
// to search for a product
Route::get('/product_search',[HomeController::class,'product_search']);

// for all product page
Route::get('/all_product',[HomeController::class,'all_product']);

