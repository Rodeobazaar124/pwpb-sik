<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @yield('title' ?? 'anu')
    </title>

    @yield('head')
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }} ">
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body>
    <x-aside/>
@yield('body')
<script type="text/javascript" src="{{ URL::asset('js/main.min.js') }} "></script>
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>


</html>
