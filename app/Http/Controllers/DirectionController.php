<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Direction;
use App\Department;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;

class DirectionController extends Controller
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


        $directions = Direction::Simplepaginate(3);
        return view('cadastro.direction.create', compact('directions'));
    }


    public function store(Request $request)
    {

        $validator = $this->validate($request, [
            'name' => 'required|unique:directions',
            'floor_id' => 'required|unique:directions',
            'group_id' => 'required|unique:directions',
            'extention' => 'required|unique:directions'
         ]);

         if($validator) {
            Direction::create($request->all());
            toastr()->success('Dado inserido com sucesso');
         }


        return Redirect::to('cadastro/direction/create');
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        $direction = direction::find($id);

        $direction->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/direction/create');


    }
}
