<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Progress;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $progresss = Progress::Simplepaginate(3);
       return view('cadastro.progress.create', compact('progresss'));
    }
    



    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',

        ];
        $request->validate($rules);
        $progress = new Progress;

        $progress = $progress->create( $request->all());
        toastr()->success('Dado inserido com sucesso');
        return Redirect::to('cadastro/progress/create');
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        $progress = progresss::find($id);

        $progress->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/progresss/create');

    }
}
