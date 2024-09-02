<!DOCTYPE html>
<html>

<head>
    <title>User Data</title>
</head>

<body>
    <div class="flex">
        @if ($data)
            <table>
                <tr class="flex">
                    <td>ID:</td>
                    <td>{{ $data->id }}</td>
                </tr>
                <tr class="flex">
                    <td>Name:</td>
                    <td>{{ $data->name }}</td>
                </tr>
                <tr class="flex">
                    <td>Email:</td>
                    <td>{{ $data->email }}</td>
                </tr>
            </table>
        @else
            <p>No user found with the specified ID.</p>
        @endif
    </div>
</body>

</html>
