<aside class="w-64 bg-white shadow-sm min-h-screen flex flex-col p-6">
    <div class="flex items-center gap-2 mb-8">
        <div class="w-8 h-8 bg-rose-400 rounded-full flex items-center justify-center">
            <i class="fa-solid fa-check text-white text-sm"></i>
        </div>
        <span class="font-semibold text-gray-800">TaskNest</span>
        <span class="text-xs text-gray-400 ml-auto">Stay productive!</span>
    </div>

    <a href="/tasks/create"
       class="mb-4 bg-rose-400 text-white text-sm font-medium px-4 py-2 rounded-lg flex items-center gap-2 hover:bg-rose-500 transition">
        <i class="fa-solid fa-plus"></i> New Task
    </a>

    <nav class="flex flex-col gap-1 text-sm text-gray-600">
        <a href="/dashboard"
           class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-rose-50 {{ request()->is('dashboard') ? 'bg-rose-50 text-rose-600 font-medium' : '' }}">
            <i class="fa-solid fa-grid-2 w-4"></i> Dashboard
        </a>
        <a href="/categories"
           class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-rose-50 {{ request()->is('categories') ? 'bg-rose-50 text-rose-600 font-medium' : '' }}">
            <i class="fa-solid fa-folder w-4"></i> Categories
        </a>
    </nav>

    <div class="mt-4 border-t border-gray-100 pt-4">
        <p class="text-xs text-gray-400 px-3 mb-2 uppercase tracking-wide">Folders</p>
        @if(isset($categories))
            @foreach($categories as $cat)
            <a href="/dashboard?category={{ $cat->id_category }}"
               class="flex items-center gap-2 px-3 py-1.5 text-sm text-gray-500 hover:text-rose-500 rounded-lg hover:bg-rose-50">
                <span class="w-2 h-2 bg-rose-300 rounded-full"></span>{{ $cat->name }}
            </a>
            @endforeach
        @endif
        <a href="/categories" class="flex items-center gap-2 px-3 py-1.5 text-sm text-gray-400 hover:text-rose-400">
            <i class="fa-solid fa-circle-plus w-4"></i> Add Category
        </a>
    </div>

    <div class="mt-auto">
        <form method="POST" action="/logout">
            @csrf
            <button class="flex items-center gap-2 text-sm text-gray-500 hover:text-red-500 px-3 py-2 w-full transition">
                <i class="fa-solid fa-right-from-bracket w-4"></i> Logout
            </button>
        </form>
    </div>
</aside>
