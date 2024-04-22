<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="./assets/img/favicon.png" />
    <title>Soft UI Dashboard Tailwind</title>
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
