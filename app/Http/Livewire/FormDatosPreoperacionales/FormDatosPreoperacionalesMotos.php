<?php

namespace App\Http\Livewire\FormDatosPreoperacionales;

use App\Models\DatosPreoperacional;
use App\Models\FormDatosPreoperacionalesMotosModel;
use Livewire\Component;

class FormDatosPreoperacionalesMotos extends Component
{
    public $solo_lectura;

    public $model;

    protected $rules = [
        'model.cedula' => 'required',
        'model.nombre_completo' => 'required',
        'model.correo' => 'required',
        'model.lugar_trabajo' => 'required',
        'model.area' => 'required',
        'model.placa_vehiculo' => 'required',
        'model.modelo' => 'required',
        'model.cargo' => 'required',
        'model.tipo_vehiculo' => 'required',
    ];

    public function render()
    {
        return view('livewire.form-datos-preoperacionales.form-datos-preoperacionales-motos');
    }

    public function mount($solo_lectura = false, DatosPreoperacional $datosPreoperacional = new DatosPreoperacional())
    {
        $this->solo_lectura = $solo_lectura;


        //aqui se le agregan los datos al modelo
        $this->model = new FormDatosPreoperacionalesMotosModel();
        $this->model->cedula = $datosPreoperacional->cedula;
        $this->model->nombre_completo = $datosPreoperacional->nombre_completo;
        $this->model->correo = $datosPreoperacional->correo;
        $this->model->lugar_trabajo = $datosPreoperacional->lugar_trabajo;
        $this->model->area = $datosPreoperacional->area;
        $this->model->placa_vehiculo = $datosPreoperacional->placa_vehiculo;
        $this->model->modelo = $datosPreoperacional->modelo;
        $this->model->cargo = $datosPreoperacional->cargo;
        $this->model->tipo_vehiculo = $datosPreoperacional->tipo_vehiculo;
    }
}
