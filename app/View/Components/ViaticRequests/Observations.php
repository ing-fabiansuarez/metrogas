<?php

namespace App\View\Components\ViaticRequests;

use App\Models\ViaticRequest;
use Illuminate\View\Component;

class Observations extends Component
{
    public $viaticRequest;
    public function __construct(ViaticRequest $viaticRequest)
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
        return view('components.viatic-requests.observations');
    }
}
