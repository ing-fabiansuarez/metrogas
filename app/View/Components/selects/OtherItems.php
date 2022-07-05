<?php

namespace App\View\Components\selects;

use App\Models\OtherItem;
use Illuminate\View\Component;

class OtherItems extends Component
{
    public function render()
    {
        return view('components.selects.other-items', ['items' => OtherItem::all()]);
    }
}
