<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - TaskNest</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-rose-100 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-md p-8 w-full max-w-sm">
        <div class="text-center mb-6">
            <p class="text-lg font-semibold text-rose-500">☑ TaskNest</p>
            <h1 class="text-xl font-semibold text-gray-800 mt-1">Join the nest!</h1>
            <p class="text-sm text-gray-400 mt-1">Create your cozy, organized digital home.</p>
        </div>

        @if($errors->any())
            <p class="text-red-500 text-sm mb-4 text-center">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="/register" class="flex flex-col gap-3">
            @csrf
            <input type="text" name="username" placeholder="Username" value="{{ old('username') }}"
                class="border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300" required>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                class="border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300" required>
            <input type="password" name="password" placeholder="Password"
                class="border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300" required>
            <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                class="border border-gray-200 rounded-lg px-4 py-2 text-sm outline-none focus:ring-2 focus:ring-rose-300" required>
            <button class="bg-rose-400 text-white py-2 rounded-lg text-sm font-medium hover:bg-rose-500 transition">
                Create Account →
            </button>
        </form>
        <p class="text-center text-xs text-gray-400 mt-4">
            Already have an account? <a href="/login" class="text-rose-500 font-medium hover:underline">Login</a>
        </p>
    </div>
</body>
</html>
