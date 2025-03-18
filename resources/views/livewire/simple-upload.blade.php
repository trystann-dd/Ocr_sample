<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OCR Upload</title>
    <!-- Tailwind CSS from CDN for simplicity -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="antialiased bg-gray-100 min-h-screen">
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex justify-between items-center">
                <h1 class="text-3xl font-bold text-gray-900">Simple OCR Upload</h1>
                <nav>
                    <a href="/" class="text-blue-600 hover:text-blue-800">Home</a>
                    <a href="/documents" class="ml-4 text-blue-600 hover:text-blue-800">Documents</a>
                </nav>
            </div>
        </div>
    </header>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="max-w-xl mx-auto">
            <div class="p-6 bg-white shadow-sm rounded-lg">
                <!-- Render the Livewire component -->
                @livewire('ocr-upload')
            </div>
        </div>
    </main>

    <footer class="bg-white shadow mt-auto py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Simple OCR Application
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>