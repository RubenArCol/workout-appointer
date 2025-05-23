<aside class="w-64 min-h-screen bg-white border-r">
    <div class="p-4 border-b">
        <a href="{{ route('home.index') }}" class="text-xl font-bold text-gray-700">Workout Admin</a>
    </div>
    <nav class="p-4">
        <ul class="space-y-2">
            <li>
                <a href="{{ route('home.index') }}" class="block text-gray-600 hover:text-black">Inicio</a>
            </li>

            @role('admin')
            <li>
                <a href="{{ route('admin.users.index') }}" class="block text-gray-600 hover:text-black">Usuarios</a>
            </li>
            <li>
                <a href="{{ route('usuarios.list') }}" class="block text-gray-600 hover:text-black">Gestión de Usuarios</a>
            </li>
            <li>
                <a href="{{ route('admin.exercises.index') }}" class="block text-gray-600 hover:text-black">Ejercicios</a>
            </li>
            <li>
                <a href="{{ route('exercises.list') }}" class="block text-gray-600 hover:text-black">Gestión de Ejercicios</a>
            </li>
            @endrole

            <li>
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit" class="text-red-600 hover:underline">Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </nav>
</aside>
