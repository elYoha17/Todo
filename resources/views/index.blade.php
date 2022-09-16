@extends('layout')
@section('content')
    <div class="pb-4 border-b border-b-gray-600/25">
        <h1 class="mb-8 text-indigo-600 text-3xl text-center font-semibold">Todo List</h1>

        <form action="{{ url('create') }}" method="post" class="flex items-center gap-4">
            @csrf
            <input
                type="text"
                name="name"
                class="flex-1 px-3 py-1 rounded ring-2 ring-gray-400 hover:ring-2 hover:ring-blue-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="Ajouter une tâche">
            <button type="submit" class="px-3 py-1 bg-indigo-200 font-semibold rounded ring-2 ring-indigo-300 hover:ring-2 hover:ring-indigo-500 active:bg-indigo-500">Ajouter</button>
        </form>
        <div class="px-2 text-red-500">
            @error('name')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div>
        <div class="py-2 text-sm text-center font-semibold tracking-wide">
            @if (!$tasks->  count())
            aucune tâche
            @elseif ($tasks->count() === 1)
            1 tâche
            @else
            {{ $tasks->count() }} tâches
            @endif
        </div>

        @if (session()->has('deletedTask'))

            @php
                $deleted = session()->get('deletedTask');
            @endphp

        <div class="mb-4 px-4 py-2 bg-red-300 border border-slate-300 rounded-lg">
            <div class="flex justify-between items-center">
                <div class="font-semibold">Tâche supprimée</div>
                <form action="{{ url('create') }}" method="post">
                    @csrf
                    <input type="text" name="name" class="hidden" value="{{ $deleted->name }}">
                    <button type="submit" class="text-xs tracking-wide hover:underline">Restaurer</button>
                </form>
            </div>
            <div class="text-xs truncate">{{ $deleted->name }}</div>
        </div>
        @endif

        @if ($tasks->count())
        <ul class="space-y-4">
            @foreach ($tasks as $task)
            <li class="px-4 py-2 bg-slate-100 border border-slate-300 rounded-lg hover:bg-slate-200 hover:shadow-lg">
                <div class="pb-2 truncate"><a href="{{ url($task->id) }}" class="hover:underline">{{ $task->name }}</a></div>
                <form action="{{ url($task->id) }}" method="post" class="text-right border-t border-t-slate-300">
                    @csrf
                    @method('delete')
                    <button type="submit" class="text-indigo-600 text-xs tracking-wide hover:underline">Réaliser</button>
                </form>
            </li>
            @endforeach
        </ul>
        @endif
    </div>
@endsection