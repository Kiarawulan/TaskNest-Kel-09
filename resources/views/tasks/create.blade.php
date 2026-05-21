@extends('layouts.app')
@section('title', 'Tambah Tugas')
@section('content')
<div class="max-w-lg mx-auto bg-white rounded-2xl shadow p-8">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-lg font-semibold text-gray-800">Buat Tugas Baru</h2>
            <p class="text-sm text-gray-400">Tambahkan tugas baru ke ruang kerja Anda.</p>
        </div>
        <a href="/dashboard" class="text-gray-400 hover:text-gray-600 text-xl">✕</a>
    </div>

    @if($errors->any())
        <p class="text-red-500 text-sm mb-4">{{ $errors->first() }}</p>
    @endif

    <form method="POST" action="/tasks" class="flex flex-col gap-4">
        @csrf
        <div>
            <label class="text-sm font-medium text-gray-700 block mb-1">Judul Tugas</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Masukkan judul tugas..."
                class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300" required>
        </div>
        <div>
            <label class="text-sm font-medium text-gray-700 block mb-1">Deskripsi</label>
            <textarea name="description" rows="3" placeholder="Tambahkan detail tugas..."
                class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300 resize-none">{{ old('description') }}</textarea>
        </div>
        <div class="flex gap-4">
            <div class="flex-1">
                <label class="text-sm font-medium text-gray-700 block mb-1">Tenggat Waktu</label>
                <input type="date" name="due_date" value="{{ old('due_date') }}"
                    class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300">
            </div>
            <div class="flex-1">
                <label class="text-sm font-medium text-gray-700 block mb-1">Kategori</label>
                <select name="category_id" class="w-full border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300" required>
                    <option value="">Pilih Kategori</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id_category }}" {{ old('category_id') == $cat->id_category ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="flex justify-end gap-2 mt-2">
            <a href="/dashboard" class="px-4 py-2 text-sm text-gray-500 border border-gray-200 rounded-lg hover:bg-gray-50">Batal</a>
            <button class="px-4 py-2 text-sm bg-rose-400 text-white rounded-lg hover:bg-rose-500 transition">Buat Tugas</button>
        </div>
    </form>
</div>
@endsection
