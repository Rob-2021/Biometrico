<x-layouts.public>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Usuarios del Dispositivo</h1>
        <a href="{{ route('biometrico.index') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Volver a Asistencias</a>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">UID</th>
                        <th class="px-4 py-2 border">ID Usuario</th>
                        <th class="px-4 py-2 border">Nombre</th>
                        <th class="px-4 py-2 border">Tarjeta</th>
                        <th class="px-4 py-2 border">Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($usuarios as $usuario)
                        <tr>
                            <td class="px-4 py-2 border">{{ $usuario['uid'] ?? '' }}</td>
                            <td class="px-4 py-2 border">{{ $usuario['userid'] ?? '' }}</td>
                            <td class="px-4 py-2 border">{{ $usuario['name'] ?? '' }}</td>
                            <td class="px-4 py-2 border">{{ $usuario['cardno'] ?? '' }}</td>
                            <td class="px-4 py-2 border">{{ $usuario['role'] ?? '' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 border text-center">No hay usuarios disponibles.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layouts.public>
