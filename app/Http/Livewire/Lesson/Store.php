<?php

namespace App\Http\Livewire\Lesson;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Store extends ModalComponent
{   
    public function render()
    {
        return view('livewire.lesson.store');
    }
}
