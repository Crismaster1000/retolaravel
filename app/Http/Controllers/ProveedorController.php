<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $search = $request['search'] ?? "";

        if ($search != "") {
            $datos = Proveedor::where('nombre_empresa', 'LIKE', "%$search%")->orWhere('representante', 'LIKE', "%$search%")->orWhere('tipo_servicio', 'LIKE', "%$search%")->get();
        } else {
            $datos = DB::table('dbo.proveedor')->get()->toArray();
        }
        
        /*$datos = Proveedor::where([
            ['nombre_empresa', '!=', Null],
            [function ($query) use ($request){
                if (($request->term)){
                    $query->orWhere('representante','LIKE', '%'.$request->term.'%')->get()->last();
                }
            }]
        ]);*/

        //$datos = Proveedor::where('dbo.nombre_empresa')
        

        //$datos = DB::table('dbo.proveedor')->get()->toArray();

        $servicios = DB::table('dbo.servicio')->get()->toArray();
    
        return view('index',['datos'=>$datos, 'servicios'=>$servicios]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios = DB::table('dbo.servicio')->get()->toArray();
        return view('create',['servicios'=>$servicios]);
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
            'nombre_empresa' => 'required',
            'representante' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'tipo_servicio' => 'required'
        ]);

        $input = $request->all();
        $servicios = $input['tipo_servicio'];

        $input['tipo_servicio'] = implode(',' , $servicios);

        Proveedor::create($input);

        return redirect()->route('proveedores.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedor $proveedor)
    {
        //return view('proveedor.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function edit(String $request)
    {
        $proveedor = Proveedor::where('id_proveedor','=',$request)->get()->last();
        $servicios = DB::table('dbo.servicio')->get()->toArray();
        return view('edit', ['proveedor'=>$proveedor, 'servicios'=>$servicios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_proveedor)
    {
        //$proveedor = Proveedor::where('id_proveedor','=',$request)->get();

        $input = $request->validate([
            'nombre_empresa' => 'required',
            'representante' => 'required',
            'telefono' => 'required',
            'correo' => 'required',
            'tipo_servicio' => 'required'
        ]);

        $servicios = $input['tipo_servicio'];

        $input['tipo_servicio'] = implode(',' , $servicios);
        //echo $id_proveedor;
        Proveedor::where('id_proveedor','=',$id_proveedor)->update($input);

        return redirect()->route('proveedores.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedor  $proveedor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_proveedor)
    {
        Proveedor::where('id_proveedor','=',$id_proveedor)->delete();
        

        return redirect()->route('proveedores.index');
    }
}
