<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class AssignLesson extends ModalComponent 
{   
    public Event $event;

    public function mount()
    {
        $this->event = new Event();
    }

    protected $rules = [

        'event.start'=>'required',
        'event.end'=>'required',
        'event.title'=>'required',
        'event.code'=>'required',
    ];

    public function save()
    {   
        $this->validate();

        $this->event->save();

        $this->closeModal();

        $this->emit('classroom-calendar');


    }
    public function render()
    {
        return view('livewire.assign-lesson');
    }

}
