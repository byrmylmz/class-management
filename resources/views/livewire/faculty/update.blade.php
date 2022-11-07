<div>
    <form wire:submit.prevent='update'>
        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 m-5">
            <x-input wire:model.defer='faculty.name' label="Bölüm Adı" placeholder="Bölüm Adı" />
        </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <x-button primary label="Güncelle" type="submit" />
            </div>
    </form>
</div>
