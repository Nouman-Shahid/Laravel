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
        
        <table style="border: 2px solid red;border-collapse: collapse;">
        <th>Id</th>
        <th>Name</th>
        <th >Phone</th>
        <th >Email</th>
        <th >Age</th>
        <th >Address</th>
        <th >Action</th>
           @foreach ($data as $item => $doctor)

           <tr style="border: 2px solid red">
               <td>{{$doctor->id}}</td>
               <td>{{$doctor->name}}</td>
               <td>{{$doctor->phone}}</td>
               <td>{{$doctor->email}}</td>
               <td>{{$doctor->age}}</td>
               <td>{{$doctor->address}}</td>
               <td><a href="{{ route('view.user', ['id' => $doctor->id]) }}">View Details</a></td>
           </tr>
            @endforeach
        </table>
    </body>
</html>
