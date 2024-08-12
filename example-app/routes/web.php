<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;


// Route::get('/', function () {
//     return view('pages.welcome',[']);
// });


//Controller Pages
Route::get('/', [PageController::class,'showHome'] );
Route::get('/user/{id}', [PageController::class,'showUser'] );



Route::get('/about', function () {
    return view('pages.about');
});
Route::get('/post', function () {
    return view('pages.post',['data'=> 'Post Page of bussiness']);
});
// Route::get('/user/{id}', function (string $id) {
//     return view('pages.user',['user_id'=> $id]);
// })->whereNumber('id');


 //Error Msg Page

 Route::fallback(function () {

    return "<h4>Page not Found</h4>";

 });