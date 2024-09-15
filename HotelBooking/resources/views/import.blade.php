<!DOCTYPE html>
<html>

<head>
    <title>Import Hotels</title>
</head>

<body>
    <h1>Import Hotels</h1>

    @if (session('message'))
        <p>{{ session('message') }}</p>
    @endif

    <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" accept=".xlsx" />
        <button type="submit">Upload</button>
    </form>
</body>

</html>
