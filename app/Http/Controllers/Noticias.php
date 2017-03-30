<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Noticia;

use Storage;// esto es que utilizara las librerias para acceso a discos virtuales, en 
//este caso sera en public/imgNoticia


class Noticias extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        
        $this->validate($request,['titulo'=>'required',
                                  'descripcion'=>'required']);

        $noticia = new Noticia(); //creo un objeto noticia 
        //manejo de archivos en este caso de imagen
        if ($request->urlImg){
            $img=$request->file('urlImg'); //segun la ruta cargo la imagen en una variable
            $file_route= $img->getClientOriginalName(); //cargo el nombre original de la imagen
            $file_route= time().$file_route; //antepongo el tiempo en unix,esto es por precusion que se repita el nombre del archivo de imagen

            Storage::disk('imgNoticias')->put($file_route,file_get_contents($img->getRealPath()));
            //Storage::disk('imgNotiicas') es el disco logico donde guardare la img
            //se mete con el put el primer parametro es el nombre con la ruta, el segundo es la imagen
            //Storage::disk('imgNoticias')->put($file_route,file_get_contents($img->getRealPath()));
            $noticia->urlImg=$file_route;//carga la ruta donde la guarde
        }
        $noticia->titulo=$request->titulo; //carga el titulo
        $noticia->descripcion=$request->descripcion;//carga la descripcion

        if ($noticia->save()){
            return back()->with('msj',$noticia->id);    
        }else{
            return back()->with('msj',false);    
        }
        
        
        
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
        $noticia =Noticia::find($id);
        return view('home')->with (['edit'=>true, 'noticia'=>$noticia]);
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

        $this->validate($request,['titulo'=>'required',
                                  'descripcion'=>'required']);

        $noticia=Noticia::find($id);//cuando edita busca el registro 
        //original, lo trae, y lo pisa
        //manejo de archivos en este caso de imagen
        if ($request->urlImg){//si cargo una nueva imagen, la pisa!!
            $img=$request->file('urlImg'); //segun la ruta cargo la imagen en una variable
            $file_route= $img->getClientOriginalName(); //cargo el nombre original de la imagen
            $file_route= time().$file_route; //antepongo el tiempo en unix,esto es por precusion que se repita el nombre del archivo de imagen

            Storage::disk('imgNoticias')->put($file_route,file_get_contents($img->getRealPath()));
            //Storage::disk('imgNotiicas') es el disco logico donde guardare la img
            //se mete con el put el primer parametro es el nombre con la ruta, el segundo es la imagen
            //Storage::disk('imgNoticias')->put($file_route,file_get_contents($img->getRealPath()));
            $noticia->urlImg=$file_route;//carga la ruta donde la guarde
        }
        $noticia->titulo=$request->titulo; //carga el titulo
        $noticia->descripcion=$request->descripcion;//carga la descripcion

        if ($noticia->save()){
            return back()->with('msj',$noticia->id);    
        }else{
            return back()->with('msj',false);    
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd('borrar: '.$id);
    }
}
