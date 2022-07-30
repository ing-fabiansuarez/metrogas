<?php

namespace App\View\Components\Legalizations;

use App\Models\Legalization;
use Illuminate\View\Component;

class Observations extends Component
{
    public $legalization;

    public function __construct(Legalization $legalization)
    {
        $this->legalization = $legalization;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.legalizations.observations');
    }
}
