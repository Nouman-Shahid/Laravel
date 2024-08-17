<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employee List</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 2vh;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            text-decoration: none;
            color: #007bff;
            background-color: #ddd;
            padding: 1.5vh;
            margin: 1vh;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <a href="">Add</a>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item => $emp)
                <tr>
                    <td>{{ $emp->id }}</td>
                    <td>{{ $emp->name }}</td>
                    <td>{{ $emp->phone }}</td>
                    <td>{{ $emp->email }}</td>
                    <td>{{ $emp->city }}</td>
                    <td><a href="{{ route('view.employees', ['id' => $emp->id]) }}">View</a>
                        <a href="{{ route('view.delete', ['id' => $emp->id]) }}">Delete</a>
                        <a href="{{ route('view.delete', ['id' => $emp->id]) }}">Update</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
