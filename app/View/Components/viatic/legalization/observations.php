<?php

namespace App\View\Components\Viatic\Legalization;

use App\Models\Legalization;
use Illuminate\View\Component;

class Observations extends Component
{
    public $legalization;

    public function __construct(Legalization $legalization)
    {
        $this->legalization = $legalization;
    }

    public function render()
    {
        return view('components.viatic.legalization.observations');
    }
}
