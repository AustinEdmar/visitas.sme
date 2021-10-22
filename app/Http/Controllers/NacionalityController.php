<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Nacionality;
use Redirect;

use Brian2694\Toastr\Facades\Toastr;

class NacionalityController extends Controller
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


    public function create()

    {
        $nacionalities = Nacionality::Simplepaginate(3);
        return view('cadastro.nacionality.create', compact('nacionalities'));
    }


    public function store(Request $request)
    {
        $validator = $this->validate($request, [
            'name' => 'required|unique:nacionalities'
         ]);

         if($validator) {
            Nacionality::create($request->all());
            toastr()->success('Dado inserido com sucesso');
         }

        return Redirect::to('cadastro/nacionality/create');
    }



    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }



    public function destroy($id)
    {
        $nacionality = Nacionality::find($id);

        $nacionality->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('/cadastro/nacionality/create');
    }
}
