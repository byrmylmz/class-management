
<div class="z-5 overflow-visible">
    <form wire:submit.prevent='update'>
    <x-card title="Ders Güncelle{{$eventId}}" blur >
       
                <div class="grid grid-flow-row gap-6">
                    <x-datetime-picker
                        label="Appointment Date" 
                        placeholder="Appointment Date" 
                        time-format='24'
                        timezone='turkey'
                        wire:model.defer="event.start"
                        parse-format="YYYY-MM-DDTHH:mm:ss"

                        />
                        <x-datetime-picker 
                        label="Appointment Date" 
                        placeholder="Appointment Date" 
                        time-format='24'
                        timezone='turkey'
                        wire:model.defer="event.end"
                        parse-format="YYYY-MM-DDTHH:mm:ss"

                        
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
                    <x-button primary label="Update" type='submit' />
                </div>
            </div>
        </x-slot>
    </x-card>
</form>

</div>
