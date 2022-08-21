<?php

namespace App\View\Components\ViaticRequests;

use Illuminate\View\Component;

class HeaderViaticRequest extends Component
{
    public $viaticRequest;
    
    public function __construct($viaticRequest)
    {
        $this->viaticRequest = $viaticRequest;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.viatic-requests.header-viatic-request');
    }
}
