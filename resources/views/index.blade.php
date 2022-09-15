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

            <form action="{{ url('create') }}" method="post" class="w-96 mx-auto text-center">
                @csrf
                <input
                    type="text"
                    name="name"
                    class="w-full px-3 py-1 rounded ring-2 ring-gray-400 hover:ring-2 hover:ring-blue-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                    placeholder="Ajouter une tâche">
                <button type="submit" class="mt-4 px-3 py-1 bg-indigo-200 font-semibold rounded ring-2 ring-indigo-300 hover:ring-2 hover:ring-indigo-500 active:bg-indigo-500">Ajouter</button>
            </form>
        </div>
        <div>
            <div class="py-2 text-sm text-center font-semibold tracking-wide">
                @if (!$tasks->count())
                aucune tâche
                @elseif (!$tasks->count() === 1)
                1 tâche
                @else
                {{ $tasks->count() }} tâches
                @endif
            </div>
            @if ($tasks->count())
            <ul class="space-y-4">
                @foreach ($tasks as $task)
                <li class="px-4 py-2 bg-slate-100 border border-slate-300 rounded-lg hover:bg-slate-200 hover:shadow-lg">
                    <div class="truncate">{{ $task->name }}</div>
                    <div class="text-right border-t border-t-slate-300">
                        <a href="{{ url($task->id) }}" class="text-xs hover:underline">Modifier</a>
                    </div>
                </li>
                @endforeach
            </ul>
            @endif
        </div>

        
    </div>

    @vite('resources/js/app.js')
</body>
</html>