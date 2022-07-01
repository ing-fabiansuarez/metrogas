<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Models\ViaticRequest;
use Livewire\Component;

class Aceptation extends Component
{
    public $viaticRequest;

    public function mount(ViaticRequest $viaticRequest)
    {
        //recibimos el viaticRequest
        $this->viaticRequest = $viaticRequest;
    }

    public function render()
    {
        return view('livewire.process-viatic-request.aceptation');
    }
}
