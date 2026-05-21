<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - TaskNest</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-rose-100 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-md p-8 w-full max-w-sm">
        <div class="text-center mb-6">
            <div class="w-10 h-10 bg-rose-400 rounded-full mx-auto mb-3 flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
            </div>
            <h1 class="text-xl font-semibold text-gray-800">Welcome Back</h1>
            <p class="text-sm text-gray-400 mt-1">Enter your details to access your cozy workspace.</p>
        </div>

        @if($errors->any())
            <p class="text-red-500 text-sm mb-4 text-center">{{ $errors->first() }}</p>
        @endif

        <form method="POST" action="/login" class="flex flex-col gap-3">
            @csrf
            <div class="flex items-center border border-gray-200 rounded-lg px-3 gap-2 focus-within:ring-2 focus-within:ring-rose-300">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}"
                    class="flex-1 py-2 text-sm outline-none" required>
            </div>
            <div class="flex items-center border border-gray-200 rounded-lg px-3 gap-2 focus-within:ring-2 focus-within:ring-rose-300">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
                <input type="password" name="password" placeholder="Password"
                    class="flex-1 py-2 text-sm outline-none" required>
            </div>
            <div class="flex justify-between items-center text-xs text-gray-400">
                <label class="flex items-center gap-1 cursor-pointer">
                    <input type="checkbox" name="remember" class="accent-rose-400"> Remember me
                </label>
                <a href="#" class="hover:text-rose-500">Forgot Password?</a>
            </div>
            <button class="bg-rose-400 text-white py-2 rounded-lg text-sm font-medium hover:bg-rose-500 transition">
                Login →
            </button>
        </form>
        <p class="text-center text-xs text-gray-400 mt-4">
            Belum punya akun? <a href="/register" class="text-rose-500 font-medium hover:underline">Daftar</a>
        </p>
    </div>
</body>
</html>
