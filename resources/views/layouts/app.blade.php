<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body style="background-color: #F4F6F8">
    <livewire:components.navbar/>

    {{ $slot }}

    @livewireScripts
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>