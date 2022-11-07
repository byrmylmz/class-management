<div>
    <form wire:submit.prevent='save'>

        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 m-5 z-20 overflow-visible">
            <x-select
                label="Fakülte Seç"
                placeholder="Fakülteler"
                wire:model="facultyId"
               >
               @foreach ($faculties as $item)
               <x-select.option label="{{$item->name}}" value="{{$item->id}}" />
               @endforeach
            </x-select>

            <x-input wire:model.defer='department.name' label="Bölüm Adı" placeholder="Bölüm Adı" />
            
        </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <x-button primary label="Kaydet" type="submit" />
            </div>
    </form>
</div>
