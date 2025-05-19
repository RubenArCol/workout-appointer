<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: '#dc2626',
                        background: '#0f172a',
                        surface: '#1e293b',
                        text: '#e2e8f0',
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-background text-text font-sans antialiased min-h-screen flex items-center justify-center">
<div class="bg-surface shadow-lg rounded-xl p-10 w-full max-w-md">
    <h1 class="text-2xl font-semibold text-center mb-6">Panel de Administración</h1>
    <div class="space-y-4">
        <a href="/dashboard" class="block w-full text-left bg-brand hover:bg-red-700 text-white font-medium px-4 py-3 rounded-lg transition">
            Ir al Dashboard
        </a>
    </div>
    <p class="text-xs text-gray-400 mt-6 text-center">© {{ date('Y') }} GymX Admin</p>
</div>
</body>
</html>
