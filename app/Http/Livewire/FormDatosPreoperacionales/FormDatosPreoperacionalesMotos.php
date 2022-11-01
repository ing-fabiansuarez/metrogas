<?php

namespace App\Http\Livewire\FormDatosPreoperacionales;

use App\Enums\EBuenoMalo;
use App\Enums\ENivelAceite;
use App\Enums\ESiNo;
use App\Models\DatosPreoperacional;
use App\Models\FormDatosPreoperacionalesMotosModel;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormDatosPreoperacionalesMotos extends Component
{
    use WithFileUploads;
    public $solo_lectura;

    public $model;
    public $fotografia_tacometro;
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

        'model.luz_delantera' => 'required',
        'model.direccionales_delantera' => 'required',
        'model.direccionales_traseras' => 'required',
        'model.stop' => 'required',

        'model.presion_labrado_llanta_delantera' => 'required',
        'model.presion_labrado_llanta_trasera' => 'required',
        'model.rin_delantero' => 'required',
        'model.rin_trasero' => 'required',

        'model.testigos_tacometros' => 'required',
        'model.tanque_gasolina' => 'required',
        'model.cojin_argonomico' => 'required',
        'model.placa_visible' => 'required',
        'model.moto_aseada' => 'required',
        'model.comandos_acelerador_buen_estado' => 'required',
        'model.freno_delantero' => 'required',
        'model.freno_trasero' => 'required',
        'model.relacion' => 'required',
        'model.suspencion' => 'required',
        'model.niveles_fluidos' => 'required',
        'model.direccion' => 'required',
        'model.pito' => 'required',
        'model.espejos_retrovisores' => 'required',
        'model.casco_certificado' => 'required',
        'model.chaleco' => 'required',
        'model.coderas_rodilleras' => 'required',
        'model.guantes' => 'required',
        'model.reposapies' => 'required',

        'model.soat' => 'required',
        'model.rtm' => 'required',
        'model.licencia_de_conduccion' => 'required',
        'model.tarjeta_de_propiedad' => 'required',

        'model.observacion' => 'required',



        'model.ha_diligenciado_ud_mismo' => 'required',
       

    ];

    public function render()
    {
        return view('livewire.form-datos-preoperacionales.form-datos-preoperacionales-motos', [
            'ENivelAceite' => ENivelAceite::cases(),
            'EBuenoMalo' => EBuenoMalo::cases(),
            'ESiNo' => ESiNo::cases()
        ]);
    }

    public function mount($solo_lectura = false, DatosPreoperacional $datosPreoperacional = new DatosPreoperacional(), FormDatosPreoperacionalesMotosModel $formulario = new FormDatosPreoperacionalesMotosModel())
    {
        $this->solo_lectura = $solo_lectura;


        //aqui se le agregan los datos al modelo

        $this->model = $formulario;

        if ($datosPreoperacional->cedula != null && $datosPreoperacional->placa_vehiculo != null) {
            if ($modeloPre = FormDatosPreoperacionalesMotosModel::where('cedula', $datosPreoperacional->cedula)->where('placa_vehiculo', $datosPreoperacional->placa_vehiculo)->orderBy('id', 'desc')->first()) {
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


    public function save()
    {
        $this->validate();
        $this->model->save();

        if (!empty($this->fotografia_tacometro)) {
            $this->model->fotografia_tacometro = $this->fotografia_tacometro->store("public/form-datos-preoperacionales/soportes/" . $this->model->id);
        }
        if (!empty($this->fotografia_mantenimiento)) {
            $this->model->fotografia_mantenimiento = $this->fotografia_mantenimiento->store("public/form-datos-preoperacionales/soportes/" . $this->model->id);
        }
        $this->model->save();

        return redirect()->route('datospreoperacionales.finalizado');
    }
}
