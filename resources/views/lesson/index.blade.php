<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Derslikler') }}
        </h2>
    </x-slot>
    <!-- STYLE CDN FOR CALENDAR -->
    <!-- <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.css' rel='stylesheet' /> -->

   
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Derslik ekle button -->
            <div class="flex item-center mb-6">
                <a href="{{ route('classroom.create') }}" class="">
                <x-button rounded primary label="Yeni Derslik" />
                </a>
            </div>
            <!-- container for data area -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mt-10 sm:mt-0">
            <div class="m-5">
                <livewire:calendar/>
            </div>
            </div>
        </div>
    </div>
    <!-- JS CDN FOR CALENDAR -->
    @stack('scripts')
    <!-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.11.0/main.min.js'></script> -->
</x-app-layout>
