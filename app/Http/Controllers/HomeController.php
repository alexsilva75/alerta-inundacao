<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Incidente;
use App\Services\HomeService;

class HomeController extends Controller
{
    public function __construct(private HomeService $homeService){}

    //
    public function index(Request $request)
    {
        $cidade = $request->get('cidade');
        $uf = $request->get('uf');
        
        return response()->json(['data' => $this->homeService->fetchHomeData($cidade, $uf)], 200);
    }

    public function search(Request $request){
        $cidade = $request->get('cidade');
        $uf = $request->get('uf');
        $ativo = $request->get('ativo');

        $ativo = $ativo === 'true' ? true : false;

        return response()->json(['data' => $this->homeService->homeSearch($cidade, $uf, $ativo)], 200);
    }
}
