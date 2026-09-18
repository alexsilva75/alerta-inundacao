<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidente;
use App\Http\Requests\StoreIncidenteRequest;

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
        $incidenteData = $request->validated();

        $incidente = Incidente::create($incident);

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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
