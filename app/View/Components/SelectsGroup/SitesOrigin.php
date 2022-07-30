<?php

namespace App\View\Components\SelectsGroup;

use App\Models\OriginSite;
use Illuminate\View\Component;

class SitesOrigin extends Component
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
        return view('components.selects-group.sites-origin', [
            'objects' => OriginSite::all()
        ]);
    }
}
