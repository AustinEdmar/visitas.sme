<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Section, Department, Direction};
use Redirect;
use Brian2694\Toastr\Facades\Toastr;

class DepartmentController extends Controller
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
        $directions = Direction::get();
        $departments = Department::Simplepaginate(3);
        return view('cadastro.department.create', compact('departments', 'directions'));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'direction_id' => 'required',
            'extention' => 'required',

        ];
        $request->validate($rules);
        $departments = new Department;
        $departments = $departments->create( $request->all());
        return Redirect::to('cadastro/department/create');
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        $departments = Department::find($id);

        $departments->delete();

        return Redirect::to('cadastro/department/create');

    }
}
