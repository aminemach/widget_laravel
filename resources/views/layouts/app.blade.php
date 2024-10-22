<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism-tomorrow.min.css" rel="stylesheet" />
        <!-- Prism.js JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-php.min.js"></script>
        <style>
            pre {
                background-color: #2d2d2d; /* Dark background */
                color: #f8f8f2; /* Light text */
                padding: 15px;
                border-radius: 8px;
                overflow-x: auto;
                max-height: 500px;
                font-family: 'Fira Code', monospace; /* Monospace font for code */
                font-size: 14px;
                line-height: 1.5;
                white-space: pre-wrap; /* Keeps the formatting */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); /* Shadow effect */
            }

            code {
                color: #f8f8f2;
            }

            /* Example CSS syntax highlighting (basic manual styling) */
            .language-html .keyword { color: #ff79c6; } /* For JavaScript keywords */
            .language-html .string { color: #f1fa8c; }  /* For strings */
            .language-html .comment { color: #6272a4; font-style: italic; } /* For comments */
        </style>
</script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
