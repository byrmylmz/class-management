<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class UpdateLesson extends ModalComponent
{   
    public $event;

    public $eventId;

    protected $rules = [
        'event.title' => 'required',
        'event.start' => 'required',
        'event.end' => 'required',
        'event.code'=>'required'
    ];

    public function mount()
    {   
        $this->event = Event::find($this->eventId);
    }

    public function update()
    {
        $this->validate();
        
        $this->event->save();

        $this->closeModal();

        $this->emit('classroom-calendar');

    }


    public function render()
    {
        return view('livewire.update-lesson');
    }
}
