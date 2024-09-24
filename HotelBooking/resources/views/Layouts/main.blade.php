<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="shortcut icon" href="images/favicon/logo.png" type="image/x-icon">
    <title>InnVite - @yield('title')</title>
</head>

<body class="w-screen min-h-screen h-auto flex flex-col justify-between items-center bg-slate-100 overflow-x-hidden">

    @yield('navbar')



    <div class="flex  min-h-screen h-auto w-screen">

        @yield('sidebar')

        @yield('content')

    </div>



    @yield('footer')

</body>

</html>
