<x-layouts.public>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold">Biometrico</h1>
    </div>
    <h2 class="text-xl font-semibold mt-8 mb-4">Registros de Asistencia</h2>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">ID Usuario</th>
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
