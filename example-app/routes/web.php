<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/post/{id?}/comment/{comment?}', function (string $id = null, string $comment = null) {
    
    if($id)
    {
      return "<h1>Post Page id =". $id ." <br>  Comment id =". $comment ."</h1>";
    }
    else{
              return "<h1>No ID Found</h1>";
    }
})-> whereIn('id',[1,2,3])->whereAlpha('comment');


// Route::view('post','/post');
