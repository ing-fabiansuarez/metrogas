<?php

namespace App\View\Components\viatic\viaticRequest;

use App\Models\ViaticRequest;
use Illuminate\View\Component;

class observations extends Component
{
    public $viaticRequest;
    public function __construct(ViaticRequest $viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }
    public function render()
    {
        return view('components.viatic.viatic-request.observations');
    }
}
