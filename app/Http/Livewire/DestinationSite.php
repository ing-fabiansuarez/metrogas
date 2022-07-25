<?php

namespace App\Http\Livewire;

use App\Models\DestinationSite as ModelsDestinationSite;
use Livewire\Component;
use Livewire\WithPagination;

class DestinationSite extends Component
{
    //Paginacion para livewire y que use el tema de bootstrap
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginationQuantity = 15;

    //MODELO (Aqui es donde va el modelo del CRUD)
    public $model;

    //Titulo del mantenimiento
    private $title;

    //parametro de busqueda
    public $keyWord;

    //escuchadores de eventos
    protected $listeners = [
        'destroy' => 'destroy'
    ];

    /* Atributos */
    public $name;

    protected $rules = [
        'model.name' => 'required'
    ];

    public function __construct()
    {
        //aqui se define el titulo para el mantenimiento
        $this->title = __('forms.destination_site');
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.destination-site.view', [
            'objetsModel' => ModelsDestinationSite::latest()
                ->orWhere('name', 'ilike', $keyWord)
                ->orWhere('id', 'ilike', $keyWord)
                ->paginate($this->paginationQuantity),
            'title' => $this->title
        ]);
    }

    public function store()
    {
        //Reglas de validacion
        $this->validate([
            'name' => 'required'
        ]);
        ModelsDestinationSite::create([
            'name' => $this->name
        ]);
        //resetear las propiedades
        $this->reset(['name']);

        //ocultar el modal de creacion!
        $this->dispatchBrowserEvent('close-modal');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('alert', __('forms.message.god_job'), __('forms.message.save'));
    }

    public function edit(ModelsDestinationSite $object)
    {
        $this->model = $object;
    }

    public function update()
    {
        $this->validate();
        $this->model->save();
        //resetear las propiedades
        $this->reset(['model']);
        //ocultar el modal
        $this->dispatchBrowserEvent('close-modal-edit');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('alert', __('forms.message.god_job'), __('forms.message.update'));
    }

    public function destroy(ModelsDestinationSite $object)
    {
        $object->delete();
    }
}
