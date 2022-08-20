<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ListarController extends Controller
{
    //
    public function index(){
        $datos = DB::table('dbo.proveedor')->get()->toArray();

        $servicios = DB::table('dbo.servicio')->get()->toArray();

        return view('index',['datos'=>$datos, 'servicios'=>$servicios]);
    }
}
