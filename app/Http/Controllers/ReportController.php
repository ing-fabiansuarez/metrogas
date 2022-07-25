<?php

namespace App\Http\Controllers;

use App\Enums\EStateLegalization;
use App\Enums\EStateRequest;
use App\Exports\LegalizationExport;
use App\Exports\ViaticRequestExport;
use App\Models\Legalization;
use App\Models\User;
use App\Models\ViaticRequest;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function viaticRequest(Request $request)
    {
        $viaticRequests = ViaticRequest::latest();
        if (!empty($request->get('num_solicitud'))) {
            $viaticRequests->where('id', $request->get('num_solicitud'));
        }
        if (!empty($request->get('solicitado_por'))) {
            $viaticRequests->where('request_by', $request->get('solicitado_por'));
        }
        if (!empty($request->get('estado'))) {
            $viaticRequests->where('sw_state', $request->get('estado'));
        }
        if (!empty($request->get('fecha_creacion'))) {
            $dates = explode(' - ', $request->get('fecha_creacion'));
            $dates[0] = str_replace('/', '-', $dates[0]);
            $dates[1] = str_replace('/', '-', $dates[1]);
            $viaticRequests->where('created_at', '>=', $dates[0] . " 00:00:00");
            $viaticRequests->where('created_at', '<=', $dates[1] . " 23:59:59");
        }


        $viaticRequests = $viaticRequests->orderBy('id', 'desc')->get();

        if ($request->get('r') == "Exportar") {
            return (new ViaticRequestExport)->download('Solicitud_de_anticipos.xlsx');
        }
        return view('reports.viatic-request.list_request', [
            'viaticRequests' => $viaticRequests,
            'users' => User::orderBy('name', 'desc')->get(),
            'states' => EStateRequest::cases(),
            'request' => $request
        ]);
    }
    public function legalization(Request $request)
    {
        $legalizations = Legalization::latest();
        if (!empty($request->get('num_solicitud'))) {
            $legalizations->where('id', $request->get('num_solicitud'));
        }
        if (!empty($request->get('solicitado_por'))) {
            $legalizations->where('created_by', $request->get('solicitado_por'));
        }
        if (!empty($request->get('estado'))) {
            $legalizations->where('sw_state', $request->get('estado'));
        }
        if (!empty($request->get('fecha_creacion'))) {
            $dates = explode(' - ', $request->get('fecha_creacion'));
            $dates[0] = str_replace('/', '-', $dates[0]);
            $dates[1] = str_replace('/', '-', $dates[1]);
            $legalizations->where('created_at', '>=', $dates[0] . " 00:00:00");
            $legalizations->where('created_at', '<=', $dates[1] . " 23:59:59");
        }


        $legalizations = $legalizations->orderBy('id','desc')->get();

        if ($request->get('r') == "Exportar") {
            return (new LegalizationExport)->download('Legalizaciones.xlsx');
        }
        return view('reports.legalization.list', [
            'legalizations' => $legalizations,
            'users' => User::all(),
            'states' => EStateLegalization::cases(),
        ]);
    }
}
