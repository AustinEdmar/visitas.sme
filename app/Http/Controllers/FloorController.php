<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Floor;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $floors = Floor::get();
        return view('cadastro.floor.create', compact('floors'));
    }

    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required|unique:floors'
         ]);

         if($validator) {
            Floor::create($request->all());
            toastr()->success('Dado inserido com sucesso');
         }


        return Redirect::to('cadastro/floor/create');
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        $floor = Floor::find($id);

        $floor->delete();

        toastr()->error('Deletado com sucesso');

        return Redirect::to('cadastro/floor/create');


    }
}
