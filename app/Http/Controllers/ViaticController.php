<?php

namespace App\Http\Controllers;

use App\Enums\EStateLegalization;
use App\Enums\EStateRequest;
use App\Models\Legalization;
use App\Models\User;
use App\Models\ViaticRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use PDF;

class ViaticController extends Controller
{
    public function index()
    {
        return view('viatic.viatic-request.list_request', [
            'viaticRequests' => ViaticRequest::where('request_by', auth()->user()->id)->get()
        ]);
    }
    public function create()
    {
        //Antes de que muestre la vista hay que revisar que no tenga mas solicitudes de anticipos abiertas
        $viaticRequests = ViaticRequest::where('request_by', auth()->user()->id)->where(function ($query) {
            $query->where('sw_state', '!=', EStateRequest::CLOSE->getId())
                ->where('sw_state', '!=', EStateRequest::CANCELED->getId());
        })->count();

        if ($viaticRequests > 0) {
            return redirect()->route('viatic.index')->with('msg', ['class' => 'alert-success', 'body' => 'No puedes crear solicitud de anticipo, tienes otros abiertos.']);
        }
        return view('viatic.viatic-request.index');
    }
    public function show($id)
    {
        $viaticRequest = ViaticRequest::find($id);
        if (isset($viaticRequest)) {

            //valida que sea el dueño de la solicitud para poder verla
            if ($viaticRequest->user->id != auth()->user()->id) {
                //Verifica si es uno de los jefes
                if (!$viaticRequest->canAproveBoss()) {
                    if (!$viaticRequest->canAproveGeneral()) {
                        if (!$viaticRequest->canUploadSupports()) {
                            return "NO TIENE ACCESO PARA GESTIONAR ESTA SOLICITUD";
                        }
                    }
                }
            }

            //se redirecciona segun el estado

            switch ($viaticRequest->sw_state) {
                case EStateRequest::BY_CREATE->getId():
                    return view('viatic.viatic-request.by_create', compact('viaticRequest'));
                    break;
                case EStateRequest::CREATED->getId():
                    return view('viatic.viatic-request.aprove_boss', compact('viaticRequest'));
                    break;
                case EStateRequest::APROVED->getId():
                    return view('viatic.viatic-request.aceptation', compact('viaticRequest'));
                    break;
                case EStateRequest::ACCEPTED_EMPLOYEE->getId():
                    return view('viatic.viatic-request.aprove_general', compact('viaticRequest'));
                    break;
                case EStateRequest::APROVED_GENERAL->getId():
                    return view('viatic.viatic-request.supports', compact('viaticRequest'));
                    break;
                case EStateRequest::CLOSE->getId():
                    return view('viatic.viatic-request.viatic_request_closed', compact('viaticRequest'));
                    break;
                case EStateRequest::CANCELED->getId():
                    return view('viatic.viatic-request.viatic_request_canceled', compact('viaticRequest'));
                    break;
            }

            echo "EXITE";
            return;
        }

        echo "NO EXISTE";
        return;
    }
    public function pdf($id)
    {
        $viaticRequest = ViaticRequest::find($id);
        if (isset($viaticRequest)) {
            switch ($viaticRequest->sw_state) {
                case EStateRequest::APROVED->getId(): //solo va imprimir si esta en estado aprobado

                    $pdf = App::make('dompdf.wrapper');
                    $pdf->loadView('pdf.viatic-request.viatic-request', compact('viaticRequest'))->setPaper('letter', 'portrait');
                    return $pdf->stream();
                    /* return view('pdf.viatic-request.viatic-request', compact('viaticRequest')); */
                    break;
                case EStateRequest::ACCEPTED_EMPLOYEE->getId(): //solo va imprimir si esta en estado aprobado

                    $pdf = App::make('dompdf.wrapper');
                    $pdf->loadView('pdf.viatic-request.viatic-request', compact('viaticRequest'));
                    return $pdf->stream();
                    /* return view('pdf.viatic-request.viatic-request', compact('viaticRequest')); */
                    break;
            }
            echo "EXITE";
            return;
        }
        echo "NO EXISTE";
        return;
    }

    public function indexlegalization()
    {
        return view('viatic.legalization.list_legalizations', [
            'Legalizations' => Legalization::where('created_by', auth()->user()->id)->orderBy('id', 'desc')->get()
        ]);
    }

    public function createlegalization()
    {
        $viaticRequestResult = [];
        foreach (ViaticRequest::where('request_by', auth()->user()->id)->where('sw_state', EStateRequest::CLOSE->getId())->latest()->get() as $viatic) {
            if (Legalization::where('viatic_request_id',$viatic->id)->get()->count() <= 0) {
                array_push($viaticRequestResult, $viatic);
            }
        }

        return view('viatic.legalization.create', [
            'viaticRequests' => $viaticRequestResult,
        ]);
    }

    public function storelegalization(Request $request)
    {
        if (empty($request->get('origen')[0])) {
            echo "el campo es obligatorioopoo";
            return redirect()->route('legalization.create')->with('origen', 'El campo es obligatorio!')->withInput();
        }

        $id_solicitud = null;
        switch ($request->get('origen')[0]) {
            case 1:
                $request->validate([
                    'origen' => 'required',
                    'justification' => 'required',
                    'id_solicitud' => 'required',
                ]);
                $id_solicitud = $request->get('id_solicitud');
                break;
            case 2:
                $request->validate([
                    'origen' => 'required',
                    'justification' => 'required',
                ]);
                break;
        }

        $legalization = Legalization::create([
            'justification' => $request->get('justification'),
            'viatic_request_id' => $id_solicitud,
            'created_by' =>  auth()->user()->id,
            'sw_state' => EStateLegalization::CREATED->getId()
        ]);
        return redirect()->route('legalization.show', $legalization->id);
    }

    public function showlegalization($id)
    {
        $legalization = Legalization::find($id);
        if (isset($legalization)) {
            //se redirecciona segun el estado
            switch ($legalization->sw_state) {
                case EStateLegalization::CREATED->getId():
                    return view('viatic.legalization.supports', compact('legalization'));
                    break;
                case EStateLegalization::SEND->getId():
                    return view('viatic.legalization.aprove_boss', compact('legalization'));
                    break;
                case EStateLegalization::APROVE_BOSS->getId():
                    return view('viatic.legalization.aprove_general', compact('legalization'));
                    break;
                case EStateLegalization::APROVE_GENERAL->getId():
                    return view('viatic.legalization.completed', compact('legalization'));
                    break;
            }
            return;
        }

        echo "NO EXISTE";
        return;
    }

    public function byAprove()
    {
        $idsSubordinates = [];
        /**Se recuperan los id de los usuarios que son subordinados del que ha iniciado sesion, para despues hacer la consulta */
        foreach (auth()->user()->jobtitle->subordinates()->get() as $jobtitle) {
            foreach ($jobtitle->users as $user) {
                array_push($idsSubordinates, $user->id);
            }
        }
        //hace la consulta traer las legalizaciones y solicitudes de los empleados subordinados
        $visticRequestsList = ViaticRequest::where('sw_state', EStateRequest::CREATED->getId())->whereIn('request_by', $idsSubordinates)->get();
        $legalizationsList =  Legalization::where('sw_state', EStateLegalization::SEND->getId())->whereIn('created_by', $idsSubordinates)->get();

        //Aqui se verifica si hay algo por aprobar si tiene el permiso de aprobacion financiera.
        $user = User::find(auth()->user()->id);
        if ($user->can('aproveGeneral')) {
            $viaticRequestAproveGeneral = ViaticRequest::where('sw_state', EStateRequest::ACCEPTED_EMPLOYEE->getId())->get();
            $visticRequestsList = $visticRequestsList->concat($viaticRequestAproveGeneral);
        }

        //aqui se verfica si tiene permisos para la aprobacion de tesorerai y si es asi se agregan
        if ($user->can('aproveTesoreria')) {
            $viaticRequestAproveTesoreria = ViaticRequest::where('sw_state', EStateRequest::APROVED_GENERAL->getId())->get();
            $visticRequestsList = $visticRequestsList->concat($viaticRequestAproveTesoreria);
        }

        return view('viatic.by-aprove', [
            'viaticRequests' =>  $visticRequestsList,
            'legalizations' => $legalizationsList,
        ]);
    }
}
