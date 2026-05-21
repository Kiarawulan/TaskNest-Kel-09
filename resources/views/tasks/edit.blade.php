@extends('layouts.app')
@section('title', 'Edit Tugas')
@section('content')
<div class="max-w-lg mx-auto bg-white rounded-2xl shadow p-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Edit Tugas</h2>
            <p class="text-sm text-gray-400">Tambahkan tugas ke ruang kerja Anda.</p>
        </div>
        <a href="/dashboard" class="text-gray-400 hover:text-gray-600 text-xl">✕</a>
    </div>

    <form method="POST" action="/tasks/{{ $task->id_task }}" class="flex flex-col gap-4">
        @csrf @method('PUT')
        <div>
            <label class="text-sm font-medium text-gray-700 block mb-1">Judul Tugas</label>
            <input type="text" name="title" value="{{ old('title', $task->title) }}"
                class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300" required>
        </div>
        <div>
            <label class="text-sm font-medium text-gray-700 block mb-1">Deskripsi</label>
            <textarea name="description" rows="3"
                class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300 resize-none">{{ old('description', $task->description) }}</textarea>
        </div>
        <div class="flex gap-4">
            <div class="flex-1">
                <label class="text-sm font-medium text-gray-700 block mb-1">Tenggat Waktu</label>
                <input type="date" name="due_date" value="{{ old('due_date', $task->due_date) }}"
                    class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300">
            </div>
            <div class="flex-1">
                <label class="text-sm font-medium text-gray-700 block mb-1">Kategori</label>
                <select name="category_id" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300" required>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id_category }}" {{ $task->category_id == $cat->id_category ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div>
            <label class="text-sm font-medium text-gray-700 block mb-1">Status</label>
            <select name="status" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300">
                <option value="belum selesai" {{ $task->status === 'belum selesai' ? 'selected' : '' }}>Belum Selesai</option>
                <option value="selesai"       {{ $task->status === 'selesai'       ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>
        <div class="flex justify-end gap-2 mt-2">
            <a href="/dashboard" class="px-4 py-2 text-sm text-gray-500 border border-gray-200 rounded-lg hover:bg-gray-50">Batal</a>
            <button class="px-4 py-2 text-sm bg-rose-400 text-white rounded-lg hover:bg-rose-500 transition">Ubah Tugas</button>
        </div>
    </form>
</div>
@endsection
