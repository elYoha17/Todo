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
        <div class="pb-4 border-b border-b-gray-600/25">
            <h1 class="mb-8 text-indigo-600 text-3xl text-center font-semibold">Todo List</h1>

            <div class="p-4 bg-slate-300 border border-slate-400 rounded-md">
                {{ $task->name }}
            </div>

            <form action="{{ url($task->id) }}" method="post" class="flex items-center mx-auto py-4 text-center">
                @csrf
                @method('put')
                <input
                    type="text"
                    name="name"
                    class="flex-1 px-3 py-1 rounded ring-2 ring-gray-400 hover:ring-2 hover:ring-blue-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Modifier '{{ $task->name }}'">
                <button type="submit" class="ml-4 px-3 py-1 bg-indigo-200 font-semibold rounded ring-2 ring-indigo-300 hover:ring-2 hover:ring-indigo-500 active:bg-indigo-500">Modifier</button>
            </form>
        </div>
        <div class="text-center">
            <a href="{{ url('/') }}" class="text-xs hover:underline">Voir toutes les tâches</a>
        </div>
    </div>
   

    @vite('resources/js/app.js')
</body>
</html>