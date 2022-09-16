@extends('layout')
@section('content')
    <div class="pb-4 border-b border-b-gray-600/25">
        <h1 class="mb-8 text-indigo-600 text-3xl text-center font-semibold">Todo List</h1>

        <div class="p-4 bg-slate-300 border border-slate-400 rounded-md">
            {{ $task->name }}
        </div>

        <form action="{{ url($task->id) }}" method="post" class="flex items-start gap-4 pt-4">
            @csrf
            @method('put')
            <input
                type="text"
                name="name"
                value="{{ $task->name }}"
                class="flex-1 px-3 py-1 rounded ring-2 ring-gray-400 hover:ring-2 hover:ring-blue-400 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="Modifier une tâche">
            <button type="submit" class="px-3 py-1 bg-indigo-200 font-semibold rounded ring-2 ring-indigo-300 hover:ring-2 hover:ring-indigo-500 active:bg-indigo-500">Modifier</button>
        </form>
        <div class="px-2 text-red-500">
            @error('name')
            {{ $message }}
            @enderror
        </div>
    </div>
    <div class="text-center">
        <a href="{{ url('/') }}" class="text-xs hover:underline">Voir toutes les tâches</a>
    </div>
@endsection