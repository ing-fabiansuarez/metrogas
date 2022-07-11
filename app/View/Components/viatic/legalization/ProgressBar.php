<?php

namespace App\View\Components\viatic\legalization;

use Illuminate\View\Component;

class ProgressBar extends Component
{
    public $stepsCompletes;
    public $totalSteps = 5;
    public $width;

    public function __construct($stepsCompletes)
    {
        $this->stepsCompletes = $stepsCompletes;
        $this->width = 100 / $this->totalSteps;
    }
    public function render()
    {
        return view('components.viatic.legalization.progress-bar');
    }
}
