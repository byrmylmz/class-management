<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Derslikler') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Derslik ekle button -->
            <div class="flex item-center mb-6">
             
                <x-button rounded primary label="Ders Ekle" onclick="Livewire.emit('openModal', 'assign-lesson')" />
                </a>
            </div>


            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mt-10 sm:mt-0">
            <div class="m-5">
                <!--tailwind start  -->
               <livewire:classroom-calendar>
            </div>
            </div>
        </div>
    </div>
    
</x-app-layout>
