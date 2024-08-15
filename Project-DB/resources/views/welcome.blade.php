<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
       
    </head>
    <body>
           <h2>All User's Data</h2>

           @foreach ($data as $item => $doctor)

           <h4>
            {{$doctor->name}}|
            {{$doctor->phone}}|
            {{$doctor->email}}|
            {{$doctor->address}}|

           </h4>
               
           @endforeach
    </body>
</html>
