<?php

namespace App\Http\Controllers;
use App\Models\File;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Symfony\Contracts\Service\Attribute\Required;

class FileController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos['files']=File::paginate(5);

        return view('file.index', $archivos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('file.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $campos=[
            'url'=>'required',
            'alt'=>'required',
        ];
        $mensaje=[
            'required'=>'El campo ":attribute" es requerido'
        ];

        $this->validate($request,$campos,$mensaje);
        $datofile = request()->except('_token');
        
        if($request->hasFile('url','alt')){
            $datofile['url']=$request->file('url')->store('uploads','public');
            $datofile['alt']=$request->file('alt')->store('uploads','public');
        }

        File::insert($datofile);
        return redirect('file')->with('mensaje','Video Subido con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $file=File::findOrFail($id);

        return view('file.edit', compact('file'));
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

       $datofile = request()->except(['_token','_method']);
       if($request->hasFile('url','alt')){
        $file=File::findOrFail($id);
        Storage::delete('public/'.$file->url) and Storage::delete('public/'.$file->alt);
        $datofile['url']=$request->file('url')->store('uploads','public');
        $datofile['alt']=$request->file('alt')->store('uploads','public');
        }
       File::where('id','=',$id)->update($datofile);

       $file=File::findOrFail($id);
       return redirect('file')->with('mensaje','Archivo editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file=File::findOrFail($id);
        if(Storage::delete('public/'.$file->url) and Storage::delete('public/'.$file->alt)){
            File::destroy($id); 
        }
        
        return redirect('file')->with('mensaje','Video Borrado con exito');
    }
}
