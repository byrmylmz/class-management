<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class AssignLesson extends ModalComponent 
{
    public function render()
    {
        return view('livewire.assign-lesson');
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }
}
