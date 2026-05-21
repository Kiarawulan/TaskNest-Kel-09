@extends('layouts.app')
@section('title', 'Manajemen Kategori')
@section('content')
<div class="mb-6">
    <h1 class="text-2xl font-semibold text-gray-800">Manajemen Kategori</h1>
    <p class="text-sm text-gray-400">Atur ruang kerjamu dengan pengelompokan yang rapi dan menyenangkan.</p>
</div>

@if(session('success'))
    <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded-lg text-sm">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="mb-4 bg-red-100 text-red-800 px-4 py-2 rounded-lg text-sm">{{ $errors->first() }}</div>
@endif

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <!-- Add new -->
    <div x-data="{ open: false }">
        <button @click="open = !open"
            class="w-full bg-white border-2 border-dashed border-gray-200 rounded-xl p-6 flex flex-col items-center justify-center gap-2 hover:border-rose-300 hover:bg-rose-50 transition">
            <span class="text-3xl text-gray-300">+</span>
            <span class="text-sm text-gray-400">Tambah Kategori Baru</span>
        </button>
        <form method="POST" action="/categories" x-show="open" class="mt-2 flex gap-2" x-cloak>
            @csrf
            <input type="text" name="name" placeholder="Nama kategori..."
                class="flex-1 border border-gray-200 rounded-lg px-3 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300" required>
            <button class="bg-rose-400 text-white px-3 py-2 rounded-lg text-sm hover:bg-rose-500">Tambah</button>
        </form>
    </div>

    @foreach($categories as $cat)
    <div class="bg-white rounded-xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col justify-between">
        <div>
            <div class="w-10 h-10 bg-rose-100 rounded-xl flex items-center justify-center mb-3">
                <span class="text-rose-400 font-semibold">{{ strtoupper(substr($cat->name, 0, 1)) }}</span>
            </div>
            <p class="font-semibold text-gray-800">{{ $cat->name }}</p>
            <p class="text-sm text-gray-400 mt-1">{{ $cat->tasks_count }} Tugas Aktif</p>
        </div>
        <div class="flex justify-between items-center mt-4">
            <a href="/dashboard?category={{ $cat->id_category }}"
               class="text-xs text-rose-400 hover:underline">Lihat tugas →</a>
            <form method="POST" action="/categories/{{ $cat->id_category }}"
                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                @csrf @method('DELETE')
                <button class="text-xs text-gray-300 hover:text-red-400 transition">Hapus</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

<script>
// Simple Alpine-like toggle without Alpine dependency
document.querySelectorAll('[\\@click]').forEach(btn => {
    const target = btn.nextElementSibling;
    if (target) {
        target.style.display = 'none';
        btn.addEventListener('click', () => {
            target.style.display = target.style.display === 'none' ? 'flex' : 'none';
        });
    }
});
</script>
@endsection
