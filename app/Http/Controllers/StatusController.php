<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Status;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;

class StatusController extends Controller
{
    public function create()
    {
        $status = Status::Simplepaginate(3);
        return view('cadastro.status.create', compact('status'));
    }

    public function store(Request $request)
    {

        $validator = $this->validate($request, [
            'name' => 'required|unique:pvcs'
         ]);

         if($validator) {
            Status::create($request->all());
            toastr()->success('Dado inserido com sucesso');
         }

        return Redirect::to('cadastro/status/create');
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        $status = Status::find($id);

        $status->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/status/create');

    }
}
