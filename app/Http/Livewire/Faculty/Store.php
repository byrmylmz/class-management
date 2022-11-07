<?php

namespace App\Http\Livewire\Faculty;

use App\Models\Faculty;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Store extends ModalComponent
{   
    public Faculty $faculty;


    public function mount()
    {
        $this->faculty = new Faculty();
    }   

    protected $rules = [
        'faculty.name'=>'required',
    ];

    public function save()
    {
        $this->validate();

        $this->faculty->save();

        $this->closeModal();

        $this->emit('refresh-data');
    }

    public function render()
    {
        return view('livewire.faculty.store');
    }
}
