<?php

namespace App\Http\Controllers;

use App\Models\Jobtitle;
use Illuminate\Http\Request;

class JobtitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mtto.jobtitle.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Jobtitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function show(Jobtitle $jobtitle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jobtitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function edit(Jobtitle $jobtitle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jobtitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobtitle $jobtitle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jobtitle  $jobtitle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jobtitle $jobtitle)
    {
        //
    }
}
