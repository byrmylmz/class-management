<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Derslikler') }}
        </h2>
    </x-slot>

   
    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <!-- container for data area -->
            <div class="bg-white overflow-visible shadow-xl sm:rounded-lg">
            <div class="mt-10 sm:mt-0">

                <div class="md:grid md:grid-cols-2 md:gap-6">
                    <div class="mt-5 md:mt-0 md:col-span-2">
                {{-- FORM START --}}
                <form action="{{ route('lesson.store') }}" method="POST">
                        @csrf
                        <div class="">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 m-5">
                            <x-input name="faculty" id="faculty" label="Enstitü/Fakülte/Yüksekokul" placeholder="Enstitü/Fakülte/Yüksekokul" />
                            <x-input name="department" id="department" label="Bölüm/Program" placeholder="Bölüm/Program" />
                            <x-input name="code" label="Ders Kodu" placeholder="Ders Kodu" />
                            <x-input name="name" label="Ders Adı" placeholder="Ders Adı" />
                            <x-input name="first_teacher" label="Dersin 1. Öğretim Elemanı" placeholder="Dersin 1. Öğretim Elemanı" />
                            <x-input name="second_teacher" label="Dersin 2. Öğretim Elemanı" placeholder="Dersin 2. Öğretim Elemanı" />
                        </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <x-button primary label="Kaydet" type="submit" />
                        </div>
                </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

    