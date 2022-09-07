<?php

namespace App\View\Components\Legalizations;

use Illuminate\View\Component;

class ProgressBar extends Component
{

    public $stepsCompletes;
    public $totalSteps = 7;
    public $width;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($stepsCompletes)
    {
        $this->stepsCompletes = $stepsCompletes;
        $this->width = 100 / $this->totalSteps; 
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.legalizations.progress-bar');
    }
}
