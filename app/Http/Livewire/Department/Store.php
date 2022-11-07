<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use App\Models\Faculty;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Store extends ModalComponent
{   
    public Department $department;

    public $facultyId;

    public $faculties=[];

    public function mount()
    {
        $this->department = new Department();
        $this->faculties = Faculty::all();
    }   

    protected $rules = [
        'facultyId'=>'required',
        'department.name'=>'required',
    ];

    public function save()
    {
        $this->validate();

        Faculty::find($this->facultyId)->departments()->save($this->department);

        $this->closeModal();

        $this->emit('refresh-data');
    }


    public function render()
    {
        return view('livewire.department.store');
    }
}
