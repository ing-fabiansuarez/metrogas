<?php

namespace App\Http\Livewire\FormDatosPreoperacionales;

use App\Enums\EBuenoMalo;
use App\Enums\ENivelAceite;
use App\Enums\ESiNo;
use App\Models\DatosPreoperacional;
use App\Models\FormDatosPreoperacionalesCarrosModel;
use App\Models\FormDatosPreoperacionalesCarrosMotos;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormDatosPreoperacionalesCarros extends Component
{
    use WithFileUploads;
    public $solo_lectura;

    public $model;

    public $fotografia_vehiculos;
    public $fotografia_mantenimiento;

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

        'model.kilometraje_inicio_jornada' => 'required',

        'model.niveles_aceite' => 'required',

        'model.luces_retroceso_parqueo' => 'required',
        'model.luces_altas_bajas' => 'required',
        'model.direccionales_delanteras' => 'required',
        'model.direccionales_traseras' => 'required',


        'model.pito_bocina' => 'required',

        'model.espejos_centrales_laterales' => 'required',
        'model.puertas_acceso_vehiculo' => 'required',
        'model.vidrio_frontal' => 'required',
        'model.vidrios_laterales_trasero' => 'required',
        'model.indicadores' => 'required',


        'model.llantas_esparragos' => 'required',
        'model.rudas_buen_estado' => 'required',
        'model.llanta_repuesto' => 'required',
        'model.presion' => 'required',


        'model.caja_cambios' => 'required',
        'model.pedales' => 'required',
        'model.latas_pintura' => 'required',
        'model.freno_emergencia' => 'required',
        'model.nivel_fluidos' => 'required',


        'model.conos_reflectivos' => 'required',
        'model.gato' => 'required',
        'model.linterna' => 'required',
        'model.cruceta' => 'required',
        'model.senales' => 'required',
        'model.tacos' => 'required',
        'model.caja_herramienta' => 'required',
        'model.llantas_repuesto' => 'required',


        'model.extintor' => 'required',
        'model.botiquin' => 'required',


        'model.soat' => 'required',
        'model.rtm' => 'required',
        'model.licencia_conduccion' => 'required',
        'model.tarjeta_propuedad' => 'required',

        'model.observacion' => 'required',

        'model.ha_diligenciado_ud_mismo' => 'required',
        'fotografia_vehiculos' => 'image|required',
       

    ];



    public function mount($solo_lectura = false, DatosPreoperacional $datosPreoperacional = new DatosPreoperacional(), FormDatosPreoperacionalesCarrosModel $formulario = new FormDatosPreoperacionalesCarrosModel())
    {
        $this->solo_lectura = $solo_lectura;

        $this->model = $formulario;

        if ($datosPreoperacional->cedula != null && $datosPreoperacional->placa_vehiculo != null) {
            if ($modeloPre = FormDatosPreoperacionalesCarrosModel::where('cedula', $datosPreoperacional->cedula)->where('placa_vehiculo', $datosPreoperacional->placa_vehiculo)->orderBy('id', 'desc')->first()) {
                $this->model = $modeloPre;
            }
        }

        $this->model->cedula = $datosPreoperacional->cedula == null ? $this->model->cedula : $datosPreoperacional->cedula;
        $this->model->nombre_completo = $datosPreoperacional->nombre_completo == null ? $this->model->nombre_completo : $datosPreoperacional->nombre_completo;
        $this->model->correo = $datosPreoperacional->correo == null ? $this->model->correo : $datosPreoperacional->correo;
        $this->model->lugar_trabajo = $datosPreoperacional->lugar_trabajo == null ? $this->model->lugar_trabajo : $datosPreoperacional->lugar_trabajo;
        $this->model->area = $datosPreoperacional->area == null ? $this->model->area : $datosPreoperacional->area;
        $this->model->placa_vehiculo = $datosPreoperacional->placa_vehiculo == null ? $this->model->placa_vehiculo : $datosPreoperacional->placa_vehiculo;
        $this->model->modelo = $datosPreoperacional->modelo == null ? $this->model->modelo : $datosPreoperacional->modelo;
        $this->model->cargo = $datosPreoperacional->cargo == null ? $this->model->cargo : $datosPreoperacional->cargo;
        $this->model->tipo_vehiculo = $datosPreoperacional->tipo_vehiculo == null ? $this->model->tipo_vehiculo : $datosPreoperacional->tipo_vehiculo;
    }

    public function render()
    {
        return view('livewire.form-datos-preoperacionales.form-datos-preoperacionales-carros', [
            'EBuenoMalo' => EBuenoMalo::cases(),
            'ENivelAceite' => ENivelAceite::cases(),
            'ESiNo' => ESiNo::cases()
        ]);
    }

    public function save()
    {
        $this->validate();
        $this->model->save();

        if (!empty($this->fotografia_vehiculos)) {
            $this->model->fotografia_vehiculos = $this->fotografia_vehiculos->store("public/form-datos-preoperacionales/soportes-carros/" . $this->model->id);
        }
        if (!empty($this->fotografia_mantenimiento)) {
            $this->model->fotografia_mantenimiento = $this->fotografia_mantenimiento->store("public/form-datos-preoperacionales/soportes-carros/" . $this->model->id);
        }
        $this->model->save();

        return redirect()->route('datospreoperacionales.finalizado');
    }
}
