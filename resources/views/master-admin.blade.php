<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="dist/assets/image/Logo-KAB-SKH.png">
    <title>ADMIN DUKCAPIL | SKH</title>
    @vite('resources/css/app.css')
    @include('admin.link')
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
    @include('admin.header')


    @yield('content')
    </main>
    @include('admin.footer')
</body>
@include('admin.script')

</html>
