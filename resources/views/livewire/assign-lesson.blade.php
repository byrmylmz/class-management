
<div class="z-5 overflow-visible">

    <x-card title="Ders Ekle" blur wire:model.defer="cardModal" >

                <div class="grid grid-flow-row gap-6">

                    <livewire:modal-problem>
                    <livewire:modal-problem>
                    <x-input label="Ders Kodu" placeholder="Ders Kodu"/>
                    <x-input label="Ders Adı" placeholder="Ders Adı"/>       
                    <x-input label="Email" placeholder="example@mail.com" />
              
                </div>
           

        </div>
     
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />
     
                <div class="flex space-x-3">
                    <x-button flat label="Cancel" wire:click="$emit('closeModal')" />
                    <x-button primary label="Save" wire:click="save" />
                </div>
            </div>
        </x-slot>
    </x-card>

</div>
