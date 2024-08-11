<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.welcome',['data'=>'Data to enrich your online business']);
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/post', function () {
    return view('pages.post');
});


 //Error Msg Page

 Route::fallback(function () {

    return "<h4>Page not Found</h4>";

 });