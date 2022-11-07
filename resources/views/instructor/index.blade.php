<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Öğretim Elamanları') }}
        </h2>
    </x-slot>

        <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Derslik ekle button -->
            <div class="flex item-center mb-6">
                <x-button rounded primary label="Yeni Öğretim Elemanı" onclick="Livewire.emit('openModal','add-instructor')" />
                </a>
            </div>

            <!-- container for data area -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mt-10 sm:mt-0">
                <div class="m-5">
                    {{-- <livewire:lesson-table> --}}
                    <livewire:instructor-table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    