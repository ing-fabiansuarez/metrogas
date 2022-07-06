<?php

namespace App\Http\Controllers;

use App\Enums\EStateRequest;
use App\Models\ViaticRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class ViaticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('viatic.viatic-request.list_request', [
            'viaticRequests' => ViaticRequest::where('request_by', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('viatic.viatic-request.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ViaticRequest  $viaticRequest
     * @return \Illuminate\Http\Response
     */
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
            }

            echo "EXITE";
            return;
        }

        echo "NO EXISTE";
        return;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ViaticRequest  $viaticRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ViaticRequest $viaticRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ViaticRequest  $viaticRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViaticRequest $viaticRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ViaticRequest  $viaticRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViaticRequest $viaticRequest)
    {
        //
    }

    public function pdf($id)
    {
        $viaticRequest = ViaticRequest::find($id);
        if (isset($viaticRequest)) {
            switch ($viaticRequest->sw_state) {
                case EStateRequest::APROVED->getId(): //solo va imprimir si esta en estado aprobado

                    $pdf = App::make('dompdf.wrapper');
                    $pdf->loadView('pdf.viatic-request.viatic-request', compact('viaticRequest'))->setPaper('letter','portrait');
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
}
