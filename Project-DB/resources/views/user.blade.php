<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

       <table style="border: 2px solid red;border-collapse: collapse;">
        <th>Name</th>
        <th >Phone</th>
        <th >Email</th>
        <th >Age</th>
        <th >Address</th>
           @foreach ($data as $item => $doctor)

           <tr style="border: 2px solid red">
               <td>{{$doctor->name}}</td>
               <td>{{$doctor->phone}}</td>
               <td>{{$doctor->email}}</td>
               <td>{{$doctor->age}}</td>
               <td>{{$doctor->address}}</td>
           </tr>
            @endforeach
        </table>    
</body>
</html>