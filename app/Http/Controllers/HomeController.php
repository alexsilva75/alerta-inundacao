<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Incidente;

class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
        $cidade = $request->get('cidade');
        $uf = $request->get('uf');
        $incidentes = Incidente::where('cidade', $cidade)
                            ->where('uf', $uf);
        return response()->json(['data' => $incidentes->get()]);
    }
}
