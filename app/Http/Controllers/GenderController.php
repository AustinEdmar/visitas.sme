<?php

namespace App\Http\Controllers;
use App\Gender;
use Illuminate\Http\Request;

use Redirect;
use Brian2694\Toastr\Facades\Toastr;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genders = Gender::Simplepaginate(3);
        return view('cadastro.gender.create', compact('genders'));
    }

    public function store(Request $request)
    {

        /* $rules = [
            'document' => 'required',
            'number_document' => 'required',
            'date_emission' => 'required'
        ];
        $request->validate($rules); */
        $genders = new Gender();
        $genders = $genders->create( $request->all());
        toastr()->success('Dado inserido com sucesso');
        return Redirect::to('cadastro/gender/create');
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        $gender = Gender::find($id);

        $gender->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/gender/create');


    }
}
