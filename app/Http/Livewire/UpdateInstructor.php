<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Instructor;
use LivewireUI\Modal\ModalComponent;

class UpdateInstructor extends ModalComponent
{   
    public $instructerId;

    public $instructor;

    protected $rules = [
        'instructor.name'=>'required',
        'instructor.email'=>'required',
        'instructor.phone'=>'required',
    ];

    public function mount()
    {
        $this->instructor = Instructor::find($this->instructerId);
    }

    public function update()
    {
        $this->validate();

        $this->instructor->save();

        $this->closeModal();

        $this->emit('refresh-data');
    }


    public function render()
    {
        return view('livewire.update-instructor');
    }
}
