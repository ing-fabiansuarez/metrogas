<?php

namespace App\View\Components\selects;

use App\Models\DestinationSite;
use Illuminate\View\Component;

class SitesDestination extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.selects.sites-destination', [
            'objects' => DestinationSite::all()
        ]);
    }
}
