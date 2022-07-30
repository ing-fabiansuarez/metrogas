<?php

namespace App\View\Components\SelectsGroup;

use App\Models\OtherItem;
use Illuminate\View\Component;

class OtherItems extends Component
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
        return view('components.selects-group.other-items', ['items' => OtherItem::all()]);
    }
}
