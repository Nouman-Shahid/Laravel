<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegistrationController;


// Route::get('/', function () {
//     return view('pages.welcome',[']);
// });


//Controller Pages
Route::get('/', [PageController::class,'showHome'] );

Route::get('/user', [RegistrationController::class,'index'] );
Route::post('/user', [RegistrationController::class,'register'] );



Route::get('/user', function () {
    return view('pages.user');
});
Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/post', function () {
    return view('pages.post',['data'=> 'Post Page of bussiness']);
});



 //Error Msg Page

 Route::fallback(function () {

    return "<h4>Page not Found</h4>";

 });