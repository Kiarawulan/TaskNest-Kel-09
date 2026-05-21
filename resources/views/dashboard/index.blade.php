@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="mb-6 flex items-start justify-between">
    <div>
        <h1 class="text-2xl font-semibold text-gray-800">Welcome back, {{ Auth::user()->username }} 👋</h1>
        <p class="text-sm text-gray-400 mt-1">
            You have {{ $tasks->where('status','belum selesai')->count() }} tasks to complete today. Keep it up!
        </p>
    </div>
    <form method="GET" action="/dashboard">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search tasks..."
            class="border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300 w-56 bg-white">
    </form>
</div>

@if($tasks->isEmpty())
    <div class="text-center text-gray-300 mt-24">
        <p class="text-5xl mb-4">📋</p>
        <p class="text-lg text-gray-400">Belum ada tugas. Klik <strong class="text-rose-400">New Task</strong> untuk mulai!</p>
    </div>
@else
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    @foreach($tasks->groupBy(fn($t) => $t->category?->name ?? 'Tanpa Kategori') as $categoryName => $grouped)
        @foreach($grouped as $task)
        <div class="bg-white rounded-xl p-5 shadow-sm border border-gray-100 hover:shadow-md transition">
            <span class="text-xs font-medium text-rose-500 bg-rose-50 px-2 py-1 rounded-full">{{ $categoryName }}</span>
            <div class="flex items-start gap-3 mt-3">
                <form method="POST" action="/tasks/{{ $task->id_task }}/toggle" class="mt-0.5">
                    @csrf @method('PATCH')
                    <button type="submit"
                        class="w-5 h-5 rounded-full border-2 flex items-center justify-center transition
                               {{ $task->status === 'selesai' ? 'bg-rose-400 border-rose-400' : 'border-gray-300 hover:border-rose-300' }}">
                        @if($task->status === 'selesai')
                            <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                            </svg>
                        @endif
                    </button>
                </form>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-gray-800 text-sm {{ $task->status === 'selesai' ? 'line-through text-gray-400' : '' }}">
                        {{ $task->title }}
                    </p>
                    @if($task->description)
                        <p class="text-xs text-gray-400 mt-1 truncate">{{ $task->description }}</p>
                    @endif
                    @if($task->due_date)
                        <p class="text-xs text-gray-400 mt-2 flex items-center gap-1">
                            📅 {{ \Carbon\Carbon::parse($task->due_date)->translatedFormat('D, d M Y') }}
                        </p>
                    @endif
                </div>
                <div class="flex gap-2 shrink-0">
                    <a href="/tasks/{{ $task->id_task }}/edit" class="text-gray-300 hover:text-blue-400 transition text-sm">✏️</a>
                    <form method="POST" action="/tasks/{{ $task->id_task }}"
                          onsubmit="return confirm('Hapus tugas ini?')">
                        @csrf @method('DELETE')
                        <button class="text-gray-300 hover:text-red-400 transition text-sm">🗑️</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endforeach
</div>
@endif
@endsection
