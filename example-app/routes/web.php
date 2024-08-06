<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


//Routes Grouping
 Route::prefix('page')->group(function () {
 
    Route::get('/about/{aboutid}', function (string $aboutid) {
    return "<h3>About id is ".$aboutid."</h3>";
})->whereNumber('aboutid');
 
    Route::get('/contactus/{userid}', function (string $userid) {
    return "<h3>User id is ".$userid."</h3>";
})->whereIn('userid',[1,2,3]);

    Route::get('/menu/{prodid}', function (string $prodid) {
    return "<h3>Product id is ".$prodid."</h3>";
})->whereAlphaNumeric('prodid');

 });

 //Error Msg Page

 Route::fallback(function () {

    return "<h4>Page not Found</h4>";

 });