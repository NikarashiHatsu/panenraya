<?php

namespace App\Http\Controllers\Admin\Peternakan;

use App\Http\Controllers\Controller;
use App\Models\ModulePeternakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class HewanDaratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modulePeternakans = ModulePeternakan::all();

        return Inertia::render('Admin/Peternakan/HewanDarat/Index', [
            'modulePeternakans' => $modulePeternakans
        ]);
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
        $request->validate([
            'label_module' => ['required'],
        ]);

        ModulePeternakan::create($request->all());

        return response()->json([
            'message' => 'Berhasil menambahkan data.',
            'data' => ModulePeternakan::all(),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'label_module' => ['required'],
        ]);

        ModulePeternakan::findOrFail($id)->update($request->all());

        return response()->json([
            'message' => 'Berhasil mengubah data.',
            'data' => ModulePeternakan::all(),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModulePeternakan::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Berhasil menghapus data.',
            'data' => ModulePeternakan::all(),
        ], 200);
    }
}
