<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ModulePeternakan;
use Illuminate\Http\Request;

class ModulePeternakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ModulePeternakan::all();

        return response()->json($data, 200);
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
     * @param  \App\Models\ModulePeternakan  $modulePeternakan
     * @return \Illuminate\Http\Response
     */
    public function show(ModulePeternakan $modulePeternakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ModulePeternakan  $modulePeternakan
     * @return \Illuminate\Http\Response
     */
    public function edit(ModulePeternakan $modulePeternakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ModulePeternakan  $modulePeternakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModulePeternakan $modulePeternakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ModulePeternakan  $modulePeternakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModulePeternakan $modulePeternakan)
    {
        //
    }
}
