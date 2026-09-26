<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidente;
use App\Http\Requests\StoreIncidenteRequest;
use Illuminate\Support\Carbon;

class IncidenteController extends Controller
{
    

/**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Incidente::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncidenteRequest $request)
    {
        //
        //dd(auth()->user());
        $incidenteData = $request->validated();

        $incidenteData = $request->validated();

        $incidenteData['data_hora'] = Carbon::parse(
            $incidenteData['data_hora']
        )->format('Y-m-d H:i:s');

        if($request->hasFile('foto')){
            $incidenteData['foto_url'] = $request->file('foto')->store('incidentes', 'public');
        }

        $incidente = Incidente::create($incidenteData);

        return ['message' => 'Incidente registrado com sucesso', 'data' => $incidente];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $incidente = Incidente::find($id);
        $incidente->fill($request->all());
        return $incidente->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function fetchByUser(string $userId){
        return Incidente::where('user_id', $userId)->get();
    }
}
