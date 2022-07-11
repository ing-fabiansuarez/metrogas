<?php

namespace App\Http\Controllers;

use App\Enums\EStateLegalization;
use App\Enums\EStateRequest;
use App\Models\Legalization;
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
        return view('viatic.viatic-request.index');
    }
    public function show($id)
    {
        $viaticRequest = ViaticRequest::find($id);
        if (isset($viaticRequest)) {
            //se redirecciona segun el estado

            switch ($viaticRequest->sw_state) {
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
        return redirect()->route('legalization.create');
    }

    public function createlegalization()
    {
        return view('viatic.legalization.create', [
            'viaticRequests' => ViaticRequest::where('request_by', auth()->user()->id)->where('sw_state', EStateRequest::CLOSE->getId())->latest()->get(),
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
            }
            return;
        }

        echo "NO EXISTE";
        return;
    }
}
