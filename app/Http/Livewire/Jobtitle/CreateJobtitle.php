<?php

namespace App\Http\Livewire\Jobtitle;

use App\Models\Jobtitle;
use Livewire\Component;

class CreateJobtitle extends Component
{

    public $openModal = true;

    public $name;


    public function render()
    {
        return view('livewire.jobtitle.create-jobtitle');
    }

    public function store()
    {
        Jobtitle::create([
            'name' => $this->name
        ]);
        //resetear las propiedades
        $this->reset(['name']);
        //actualizar la tabla, envia un evento pero solo quiero que lo escuhe el un componente especifico
        $this->emitTo('show-jobtitles','render');
        //ocultar el modal
        $this->dispatchBrowserEvent('close-modal');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('alert', __('forms.message.save'));
    }
}
