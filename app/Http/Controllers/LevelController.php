<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Validator;

class LevelController extends Controller
{
    public function create()
    {
        $levels = Level::Simplepaginate(3);
        return view('cadastro.level.create', compact('levels'));
    }

    public function store(Request $request)
    {

        $validator = $this->validate($request, [
            'name' => 'required|unique:levels'
         ]);

         if($validator) {
            Level::create($request->all());
            toastr()->success('Dado inserido com sucesso');
         }

        return Redirect::to('cadastro/level/create');
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        $levels = level::find($id);

        $levels->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/level/create');

    }
}
