<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ClassroomCalendar extends Component
{   
    protected $listeners=['classroom-calendar'=>'refreshCalendar'];
    
    public $eventId = ['eventId'=>'2'];

    public function refreshCalendar()
    {
        $this->emit("refreshCalendar");
    }


    public function render()
    {
        return view('livewire.classroom-calendar');
    }
}
