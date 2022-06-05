<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;


class TestComponent extends ModalComponent
{
    public function render()
    {
        return view('livewire.test-component');
    }
}
