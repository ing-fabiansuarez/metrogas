<?php

namespace App\View\Components\viatic\legalization;

use App\Models\Legalization;
use Illuminate\View\Component;

class observations extends Component
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
