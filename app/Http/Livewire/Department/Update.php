<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Update extends ModalComponent
{   
    public $departmentId;

    protected $rules = [
        'department.name'=>'required',
    ];

    public function mount()
    {
        $this->department = Department::find($this->departmentId);
    }

    public function update()
    {
        $this->validate();

        $this->department->save();

        $this->closeModal();

        $this->emit('refresh-data');
    }

    public function render()
    {
        return view('livewire.department.update');
    }
}
