<x-layouts.public>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Información del Dispositivo</h1>
        <a href="{{ route('asistencia.index') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Volver a Asistencias</a>

        <form method="GET" class="mb-6 flex flex-wrap gap-4 items-end">
            <div>
                <label for="busqueda" class="block text-sm font-medium">Buscar por IP o Descripción:</label>
                <input type="text" id="busqueda" name="busqueda" value="{{ request('busqueda', $busqueda ?? '') }}" class="border rounded px-2 py-1" placeholder="Buscar...">
            </div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Buscar</button>
            @if(request('busqueda'))
                <button type="button" onclick="window.location='{{ route('dispositivos.index') }}'" class="ml-2 bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400 transition">Limpiar</button>
            @endif
        </form>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">IdDispositivo</th>
                        <th class="px-4 py-2 border">idSitio</th>
                        <th class="px-4 py-2 border">IP</th>
                        <th class="px-4 py-2 border">Descripción</th>
                        <th class="px-4 py-2 border">Ubicación</th>
                        <th class="px-4 py-2 border">Usuario</th>
                        <th class="px-4 py-2 border">Fecha Registro</th>
                        <th class="px-4 py-2 border">Edificio SICAU</th>
                        <th class="px-4 py-2 border">Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dispositivos as $dispositivo)
                        <tr>
                            <td class="px-4 py-2 border">{{ $dispositivo->IdDispositivo }}</td>
                            <td class="px-4 py-2 border">{{ $dispositivo->idSitio }}</td>
                            <td class="px-4 py-2 border">{{ $dispositivo->IPAddress }}</td>
                            <td class="px-4 py-2 border">{{ $dispositivo->Descripcion }}</td>
                            <td class="px-4 py-2 border">{{ $dispositivo->Ubicacion }}</td>
                            <td class="px-4 py-2 border">{{ $dispositivo->CodigoUsuario }}</td>
                            <td class="px-4 py-2 border">{{ $dispositivo->FechaHoraRegistro }}</td>
                            <td class="px-4 py-2 border">{{ $dispositivo->CodigoEdificioSICAU }}</td>
                            <td class="px-4 py-2 border">{{ $dispositivo->Estado }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="px-4 py-2 border text-center">No hay información disponible.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4">
            {{ $dispositivos->links() }}
        </div>
    </div>
</x-layouts.public>
