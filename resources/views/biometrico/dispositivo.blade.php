<x-layouts.public>
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Información del Dispositivo</h1>
        <a href="{{ route('asistencia.index') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">Volver a Asistencias</a>
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
    </div>
</x-layouts.public>
