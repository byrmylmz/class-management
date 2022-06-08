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
                <a href="{{ route('classroom.create') }}" class="">
                <x-button rounded primary label="Yeni Ders" />
                </a>
            </div>

            <!-- container for data area -->
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="mt-10 sm:mt-0">
                {{-- FORM START --}}
                <form action="{{ route('lesson.store') }}" method="POST">
                @csrf
                <div class="m-5">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
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
</x-app-layout>

    