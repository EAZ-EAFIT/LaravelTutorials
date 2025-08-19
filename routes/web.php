<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');

Route::get('/about', function () {
    $data1 = 'About us - Online Store';
    $data2 = 'About us';
    $description = 'This is an about page ...';
    $author = 'Developed by: Me';

    return view('home.about')->with('title', $data1)
        ->with('subtitle', $data2)
        ->with('description', $description)
        ->with('author', $author);
})->name('home.about');

Route::get('/contact', function () {
    $title = 'Contact us - Online Store';
    $subtitle = 'Contact us';
    $mail = 'contact@onlinestore.com';
    $address = '123 Online Store St.';
    $phone = '123-456-7890';

    return view('home.contact')->with('title', $title)
        ->with('subtitle', $subtitle)
        ->with('mail', $mail)
        ->with('address', $address)
        ->with('phone', $phone);
})->name('home.contact');

Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/create', 'App\Http\Controllers\ProductController@create')->name('product.create');
Route::post('/products/save', 'App\Http\Controllers\ProductController@save')->name('product.save');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/products/created', 'App\Http\Controllers\ProductController@created')->name('product.created');
