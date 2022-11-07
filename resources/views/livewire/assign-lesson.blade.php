
<div class="z-5 overflow-visible">
    <form wire:submit.prevent='save'>
    <x-card title="Ders Ekle" blur >
       
                <div class="grid grid-flow-row gap-6">
                    <x-datetime-picker
                        label="Başlangıç" 
                        placeholder="Başlangıç" 
                        time-format='24'
                        parse-format="YYYY-MM-DDTHH:mm:ss"
                        wire:model.defer="event.start"
                        />
                        
                        <x-datetime-picker 
                        label="Bitiş" 
                        placeholder="Bitiş" 
                        time-format='24'
                        parse-format="YYYY-MM-DDTHH:mm:ss"
                        wire:model.defer="event.end"
                    />
                    <x-input wire:model.defer='event.code' label="Ders Kodu" placeholder="Ders Kodu"/>
                    <x-input wire:model.defer='event.title' label="Ders Adı" placeholder="Ders Adı"/>       
              
                </div>
           

        </div>
     
        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button flat negative label="Delete" wire:click="delete" />
     
                <div class="flex space-x-3">
                    <x-button flat label="Cancel" wire:click="$emit('closeModal')" />
                    <x-button primary label="Save" type='submit' />
                </div>
            </div>
        </x-slot>
    </x-card>
</form>

</div>
