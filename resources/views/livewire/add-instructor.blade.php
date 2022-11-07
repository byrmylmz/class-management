<div>
    <form wire:submit.prevent='save'>
        <div class="grid grid-cols-1 sm:grid-cols-1 gap-4 m-5">
            <x-input wire:model.defer='instructor.name' icon="user" label="İsim Soyisim" placeholder="İsim Soyisim" />
            <x-input wire:model.defer='instructor.email' class="pr-28" label="Email" placeholder="Email" suffix="@mail.com" /> 
            <x-inputs.phone wire:model.defer='instructor.phone' label="Telefon" placeholder='Telefon' />
        </div>
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <x-button primary label="Kaydet" type="submit" />
            </div>
    </form>
</div>
