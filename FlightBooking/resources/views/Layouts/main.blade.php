<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
    <title>Airplan - @yield('title')</title>
</head>

<body class="w-screen min-h-screen h-auto flex flex-col justify-between items-center bg-slate-100 overflow-x-hidden">

    @yield('navbar')

    <div>

        @yield('content')

    </div>

    @yield('footer')

</body>

</html>
