<?php

namespace App\Http\Controllers;

use App\Thing;
use Illuminate\Http\Request;
use App\Progress;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;

class ThingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $things = Thing::Simplepaginate(3);
        return view('cadastro.things.create',compact('things'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required|unique:things'
         ]);

         if($validator) {
            Thing::create($request->all());
            toastr()->success('Dado inserido com sucesso');
         }

        return Redirect::to('cadastro/things/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function show(Thing $thing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function edit(Thing $thing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thing $thing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thing  $thing
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $things = Thing::find($id);

        $things->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/things/create');
    }
}
