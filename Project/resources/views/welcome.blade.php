<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <table>
        @foreach ($data as $item => $teachers)
            <tr style="border: 2px solid red">
                <td>{{ $teachers->name }}</td>
                <td>{{ $teachers->phone }}</td>
                <td>{{ $teachers->email }}</td>
                <td>{{ $teachers->city }} </td>
            </tr>
        @endforeach
    </table>
</body>

</html>
