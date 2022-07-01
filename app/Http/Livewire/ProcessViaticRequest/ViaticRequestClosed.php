<?php

namespace App\Http\Livewire\ProcessViaticRequest;

use App\Models\ViaticRequest;
use Livewire\Component;

class ViaticRequestClosed extends Component
{
    public $viaticRequest;


    public function mount(ViaticRequest $viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }
    public function render()
    {
        return view('livewire.process-viatic-request.viatic-request-closed');
    }
}
