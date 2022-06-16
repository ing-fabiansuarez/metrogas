<?php

namespace App\Http\Livewire;

use App\Models\Jobtitle;
use Livewire\Component;

class ShowJobtitles extends Component
{

    public $search;
    protected $listeners = ['render' => 'render'];

    public function render()
    {
        $jobtitles = Jobtitle::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('id', $this->search)
            ->get();
        return view('livewire.show-jobtitles', compact('jobtitles'));
    }
}
