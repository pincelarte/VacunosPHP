<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Establecimientos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
            <div style="background-color: #d1e7dd; color: #0f5132; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                {{ session('success') }}
            </div>
            @endif

            <div class="mb-4">
                <a href="{{ route('establecimientos.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                    {{ __('Crear Nuevo Establecimiento') }}
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        Lista de Establecimientos Registrados
                    </h3>

                    @forelse ($establecimientos as $establecimiento)
                    <div class="border-b py-2 flex justify-between items-center">
                        <div>
                            <p class="text-sm font-semibold">{{ $establecimiento->nombre }}</p>
                            <p class="text-xs text-gray-500">{{ $establecimiento->direccion ?: 'Sin dirección' }}</p>
                        </div>
                    </div>
                    @empty
                    <p class="text-gray-500">Aún no tienes establecimientos registrados.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>