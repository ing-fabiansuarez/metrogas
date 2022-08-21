<?php

namespace App\View\Components\ViaticRequests;

use Illuminate\View\Component;

class Comission extends Component
{
    public $viaticRequest;

    public function __construct($viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }
    
    public function render()
    {
        return view('components.viatic-requests.comission');
    }
}
