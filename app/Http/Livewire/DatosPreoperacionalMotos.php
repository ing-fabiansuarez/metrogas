<?php

namespace App\Http\Livewire;

use App\Models\DatosPreoperacionalMotos as ModelsDatosPreoperacionalMotos;
use Livewire\Component;
use Livewire\WithPagination;

class DatosPreoperacionalMotos extends Component
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
    public $cedula;
    public $nombre_completo;
    public $correo;
    public $lugar_trabajo;
    public $area;
    public $placa_vehiculo;
    public $modelo;

    protected $rules = [
        'model.cedula' => 'required',
        'model.nombre_completo' => 'required',
        'model.correo' => 'required',
        'model.lugar_trabajo' => 'required',
        'model.area' => 'required',
        'model.placa_vehiculo' => 'required',
        'model.modelo' => 'required',
    ];

    public function __construct()
    {
        //aqui se define el titulo para el mantenimiento
        $this->title = "Datos Preoperacional Motos";
    }

    public function render()
    {
        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.datos-preoperacional-motos.view', [
            'objetsModel' => ModelsDatosPreoperacionalMotos::latest()
                ->orWhere('nombre_completo', 'ilike', $keyWord)
                ->orWhere('cedula', 'ilike', $keyWord)
                ->paginate($this->paginationQuantity),
            'title' => $this->title
        ]);
    }

    public function store()
    {
        //Reglas de validacion
        $this->validate([
            'cedula' => 'required',
            'nombre_completo' => 'required',
            'correo' => 'required',
            'lugar_trabajo' => 'required',
            'area' => 'required',
            'placa_vehiculo' => 'required',
            'modelo' => 'required',
        ]);
        ModelsDatosPreoperacionalMotos::create([
            'cedula' => $this->cedula,
            'nombre_completo' => $this->nombre_completo,
            'correo' => $this->correo,
            'lugar_trabajo' => $this->lugar_trabajo,
            'area' => $this->area,
            'placa_vehiculo' => $this->placa_vehiculo,
            'modelo' => $this->modelo,
        ]);
        //resetear las propiedades
        $this->reset([
            'cedula',
            'nombre_completo',
            'correo',
            'lugar_trabajo',
            'area',
            'placa_vehiculo',
            'modelo'
        ]);

        //ocultar el modal de creacion!
        $this->dispatchBrowserEvent('close-modal');
        //mostrar el mensaje de que se creo correctamente
        $this->emit('alert', __('forms.message.god_job'), __('forms.message.save'));
    }

    public function edit(ModelsDatosPreoperacionalMotos $object)
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

    public function destroy(ModelsDatosPreoperacionalMotos $object)
    {
        $object->delete();
    }
}
