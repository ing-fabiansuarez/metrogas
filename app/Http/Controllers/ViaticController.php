<?php

namespace App\Http\Controllers;

use App\Enums\EStateRequest;
use App\Models\ViaticRequest;
use Illuminate\Http\Request;

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
            if ($viaticRequest->sw_state == EStateRequest::CREATED->getId()) {
                return view('viatic.viatic-request.aprove_boss', compact('viaticRequest'));
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
}
