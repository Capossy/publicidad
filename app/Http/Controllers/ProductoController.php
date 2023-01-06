<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index')->with('productos', $productos);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = new Producto();

        $productos->codigo = $request->get('codigo');
        $productos->foto = $request->get('foto');
        if($request->hasFile('foto')){
            $productos['foto']=$request->file('foto')->store('uploads','public');
        }
        
        $productos->descripcion = $request->get('descripcion');
        $productos->cantidad = $request->get('cantidad');
        $productos->precio = $request->get('precio');
        
        $productos->save();
        return Redirect('productos');
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
        $producto=Producto::findOrFail($id);
        return view('producto.edit')->with('producto',$producto);
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
        $producto=Producto::findOrFail($id);

        $producto->codigo = $request->get('codigo');
        $producto->foto = $request->get('foto');
        if($request->hasFile('foto')){
            $producto=Producto::findOrFail($id);
            Storage::delete('public/'.$producto->foto);
            $producto['foto']=$request->file('foto')->store('uploads','public');
        }
        $producto->descripcion = $request->get('descripcion');
        $producto->cantidad = $request->get('cantidad');
        $producto->precio = $request->get('precio');
        
        $producto->save();
        return Redirect('productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=Producto::findOrFail($id);

        if(Storage::delete('public/'.$producto->foto)){
            $producto->delete();
        }

        return Redirect('productos');
    }
}
