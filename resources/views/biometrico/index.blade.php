<x-layouts.public>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Biometrico</h1>
    </div>
    <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
        <div>
            <label for="fecha" class="block text-sm font-medium">Buscar por fecha:</label>
            <input type="date" id="fecha" name="fecha" value="{{ request('fecha') }}" class="border rounded px-2 py-1">
        </div>
        <div>
            <label for="mes" class="block text-sm font-medium">Buscar por mes:</label>
            <input type="month" id="mes" name="mes" value="{{ request('mes') }}" class="border rounded px-2 py-1">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Buscar</button>
        <a href="{{ route('asistencia.index') }}" class="ml-2 text-blue-600 underline">Limpiar</a>
    </form>
    <label class="block text-lg font-semibold mb-2">Dispositivo asociado</label>
    <a href="{{ route('dispositivos.index') }}" class="mb-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded">Ver información del dispositivo</a>
    <div class="flex justify-between items-center mt-8 mb-4">
        <h2 class="text-xl font-semibold">Registros de Asistencia</h2>
        <a href="{{ route('usuarios.index') }}" class="bg-green-600 text-white px-4 py-2 rounded">Ver Usuarios</a>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID Usuario</th>
                    <th class="px-4 py-2 border">Nombre</th>
                    <th class="px-4 py-2 border">ID Registro</th>
                    <th class="px-4 py-2 border">Fecha y Hora</th>
                    <th class="px-4 py-2 border">Estado</th>
                    <th class="px-4 py-2 border">Verificado</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registros as $registro)
                    <tr>
                        <td class="px-4 py-2 border">{{ $registro['id'] ?? '' }}</td>
                        <td class="px-4 py-2 border">{{ $registro['nombre'] ?? '' }}</td>
                        <td class="px-4 py-2 border">{{ $registro['uid'] ?? '' }}</td>
                        <td class="px-4 py-2 border">{{ $registro['timestamp'] ?? '' }}</td>
                        <td class="px-4 py-2 border">{{ $registro['state'] ?? '' }}</td>
                        <td class="px-4 py-2 border">{{ $registro['type'] ?? '' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 border text-center">No hay registros disponibles.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-layouts.public>
