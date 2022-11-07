<?php

namespace App\Http\Livewire\Faculty;

use App\Models\Department;
use App\Models\Faculty;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Update extends ModalComponent
{   
    public $facultyId;

    public $faculty;

    protected $rules= [
        'faculty.name'=>'required',
    ];

    public function mount()
    {
        $this->faculty = Faculty::find($this->facultyId);
    }

    public function update()
    {
        $this->validate();

        $this->faculty->save();

        $this->closeModal();

        $this->emit('refresh-data');
        
    }


    public function render()
    {
        return view('livewire.faculty.update');
    }
}
