<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use Redirect;
use App\Department;
use Brian2694\Toastr\Facades\Toastr;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::get();

        $sections = Section::Simplepaginate(3);
        return view('cadastro.section.create', compact('sections','departments'));
    }


    public function store(Request $request)
    {
         $rules = [
            'name' => 'required',
            'extention' => 'required',
            'department_id' => 'required',

        ];
        $request->validate($rules);
        $sections = new Section;

        $sections->create( $request->all());

        if ($sections instanceof Section) {
            toastr()->success('Dado inserido com sucesso');

            return Redirect::to('cadastro/section/create');
        }

        toastr()->error('Insira os dados correctamente.');
        return Redirect::to('cadastro/section/create');
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        $section = Section::find($id);

        $section->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/section/create');


    }
}
