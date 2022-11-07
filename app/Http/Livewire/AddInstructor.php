<?php

namespace App\Http\Livewire;

use App\Models\Instructor;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class AddInstructor extends ModalComponent
{
    public Instructor $instructor;
    
    public function mount()
    {
        $this->instructor = new Instructor();
    }
    
    protected $rules = [
        'instructor.name'=>'required',
        'instructor.email'=>'required',
        'instructor.phone'=>'required',
    ];

    public function save()
    {
        $this->validate();

        $this->instructor->save();

        $this->closeModal();

        $this->emit('refresh-data');


    }

    public function render()
    {
        return view('livewire.add-instructor');
    }
}
