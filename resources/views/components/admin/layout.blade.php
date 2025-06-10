<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="icon" href="{{ asset('img/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="bg-slate-100">
    <div class="flex p-2 mb-16 gap-x-3">
        <div >
            <x-admin.sidebar />
        </div>
        <div class="w-full p-4 h-[calc(100vh-1rem)] ml-80">
            {{ $slot }}
        </div>
    </div>
</body>
</html>