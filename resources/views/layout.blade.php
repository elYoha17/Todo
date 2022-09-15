<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800 text-sm antialiased">
    <div class="w-1/2 min-h-screen mx-auto p-4 bg-white">
    @yield('content') 
    </div>
    @vite('resources/js/app.js')
</body>
</html>