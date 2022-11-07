<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bölümler') }}
        </h2>
    </x-slot>
    
    <div class="flex flex-row max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex w-1/2 space-x-5">
                <div class="py-5 min-w-full">
                    <!-- Derslik ekle button -->
                    <div class="flex item-center mb-6">
                        <x-button rounded primary label="Yeni Fakülte" onclick="Livewire.emit('openModal','faculty.store')" />
                        </a>
                    </div>

                    <!-- container for data area -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                    <div class="mt-10 sm:mt-0">
                        <div class="m-5 ">
                                <livewire:faculty.faculty-table/>
                        </div>
                    </div>
                </div>
        </div>
        
        <div class="flex min-w-full ">
                <div class="py-5 min-w-full">
                    <!-- Derslik ekle button -->
                    <div class="flex item-center mb-6">
                        <x-button rounded primary label="Yeni Bölüm" onclick="Livewire.emit('openModal','department.store')" />
                        </a>
                    </div>

                    <!-- container for data area -->
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="mt-10 sm:mt-0">
                        <div class="m-5">
                                <livewire:department.department-table/>
                        </div>
                    </div>
                </div>
        </div>
    </div>

</x-app-layout>

    