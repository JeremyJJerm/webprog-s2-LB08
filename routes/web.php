<?php

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

route::match(['get', 'post'], '/feedback', function(\Illuminate\Http\Request $request){
    if($request->isMethod('post')){
        return ('Form Submitted');
    }
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/submit-contact', function (Request $request) {
    $name = $request->input('name');
    return "Received name: $name";
});