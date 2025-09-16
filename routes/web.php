<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-submit', function(){
    return view('test-submit');
});

Route::post('/submit', function(){
    return('Form has been submitted!!');
});

Route::put('/update', function(){
    return ('Send Update Data');
});

Route::delete('/remove', function(){
    return ('Send Remove Data');
});

//Route Grouping 
//Admin/<...>
Route::prefix('admin')->group(function () {
    Route::get('/mahasiswa', function () {
        return view('admin.mahasiswa');
    });

    Route::get('/karyawan', function () {
        return view('admin.karyawan');
    });

    Route::get('/dosen', function () {
        return view('admin.dosen');
    });
});

// Route Matching
route::match(['get', 'post'], '/feedback', function(\Illuminate\Http\Request $request){
    if($request->isMethod('post')){
        return ('Form Submitted');
    }
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact');
});

// Pass Data from View to Route
Route::post('/submit-contact', function (Request $request) {
    $name = $request->input('name');    
    return "Received name: $name";
});

// Pass Data from Route to View
Route::get('/about', function () {
    return view('about', ['name' => 'JJer', 'age' => '291']);
});

//Route Parameters
Route::get('/profile/{username}', function($username){
    return view('profile', ['username' => $username]);
});

//Route Fallback
Route::fallback(function(){
    return response()->view('fallback', [], 404);
});