<?php

namespace App\Http\Livewire\Jobtitle;

use App\Models\Jobtitle;
use Livewire\Component;

class CreateJobtitle extends Component
{
    /* Atributos */
    public $name;

    //Reglas de validacion
    protected $rules = [
        'name' => 'required|email'
    ];

    //Se ejecuta cada vez que un Atributo cambia su valor, cualquier atributo
    /*
     * Recuerda que en la vista hay que quitar el '.defer' en wire:model.defer
     * defer funciona para que no se este renderizando el componente cada vez que cambia un atributo
     */
    /* 
    public function updated($attributes)
    {
        $this->validateOnly($attributes);
    }
    */
    public function render()
    {
        return view('livewire.jobtitle.create-jobtitle');
    }

    public function store()
    {
        $this->validate();
        Jobtitle::create([
            'name' => $this->name
        ]);
        //resetear las propiedades
        $this->reset(['name']);
        //actualizar la tabla, envia un evento pero solo quiero que lo escuhe el un componente especifico
        $this->emitTo('show-jobtitles', 'render');
        //ocultar el modal
        $this->dispatchBrowserEvent('close-modal');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('alert', __('forms.message.god_job'), __('forms.message.save'));
    }
}
