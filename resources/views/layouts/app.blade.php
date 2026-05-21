<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskNet - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body class="bg-rose-50 min-h-screen flex">
    @include('partials.sidebar')
    <main class="flex-1 p-8">
        @if(session('success'))
            <div class="mb-4 bg-green-100 text-green-800 px-4 py-2 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif
        @yield('content')
    </main>
</body>
</html>
