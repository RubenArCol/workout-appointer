<!DOCTYPE html>
<html lang="es" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a GymX</title>
    <link href="https://fonts.bunny.net/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
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
                        primary: '#dc2626',
                        background: '#0f172a',
                        surface: '#1e293b',
                        text: '#e2e8f0',
                    }
                },
            },
        }
    </script>
</head>
<body class="bg-[url('/images/gym-bg.jpg')] bg-cover bg-center bg-no-repeat backdrop-blur-sm bg-black/70 text-white">
<div class="max-w-2xl w-full bg-surface rounded-2xl p-10 shadow-lg">
    <div class="text-center">
        <h1 class="text-3xl font-bold mb-4">¡Ponte en forma con <span class="text-primary">GymX</span>!</h1>
        <p class="text-lg text-gray-300 mb-6">
            Entrena con los mejores equipos y alcanza tus metas. <br>
            Vive la experiencia fitness en un ambiente de alto rendimiento.
        </p>
        <a href="/inscribirse" class="inline-block bg-primary hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition">
            ¡Empieza ahora!
        </a>
    </div>

    <div class="mt-10">
        <ul class="space-y-4">
            <li class="flex items-start">
                <svg class="w-6 h-6 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 2a8 8 0 100 16 8 8 0 000-16zM8 12l-3-3 1.414-1.414L8 9.172l5.586-5.586L15 5l-7 7z" />
                </svg>
                <span>Conoce nuestros <a href="/planes" class="underline hover:text-white">Planes de Entrenamiento</a></span>
            </li>
            <li class="flex items-start">
                <svg class="w-6 h-6 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h3v-2H4V5h12v10h-3v2h3a2 2 0 002-2V5a2 2 0 00-2-2H4z" />
                </svg>
                <span>Explora nuestras <a href="/instalaciones" class="underline hover:text-white">Instalaciones</a></span>
            </li>
            <li class="flex items-start">
                <svg class="w-6 h-6 text-primary mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M13 7H7v6h6V7z" />
                </svg>
                <span>Conéctate con nuestros <a href="/entrenadores" class="underline hover:text-white">Entrenadores Expertos</a></span>
            </li>
        </ul>
    </div>
</div>
</body>
</html>
