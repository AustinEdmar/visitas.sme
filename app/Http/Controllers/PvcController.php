<?php

namespace App\Http\Controllers;
use App\Pvc;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class PvcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pvcs = Pvc::Simplepaginate(3);
        return view('cadastro.pvc.create', compact('pvcs'));
    }

    public function store(Request $request)
    {

        $validator = $this->validate($request, [
            'number_pvc' => 'required|unique:pvcs'
         ]);

         if($validator) {
            Pvc::create($request->all());
            /* toastr()->success('Dado inserido com sucesso'); */
            Toastr::success('Adicionado com sucesso :)','Sucesso');
         }

         return Redirect::to('cadastro/pvc/create');
    }


    
    public function edit()
    {

    }

    public function delete($id)
    {
        $pvcs = Pvc::find($id);

        $pvcs->delete();
        Toastr::success('deletado sucesso :)','Sucesso');
        return Redirect::to('cadastro/pvc/create');

    }
}
