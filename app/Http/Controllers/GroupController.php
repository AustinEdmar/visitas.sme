<?php

namespace App\Http\Controllers;

use toastr;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = Group::Simplepaginate(3);
        return view('cadastro.group_area.create', compact('groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validator = $this->validate($request, [
            'name' => 'required|unique:groups'
         ]);

         if($validator) {
            Group::create($request->all());
            toastr()->success('Dado inserido com sucesso');
         }

        return Redirect::to('cadastro/group/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $groups = Group::find($id);

        return view('cadastro.group_area.edit', compact('groups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $group = Group::find($id);
        $group->update($request->all());

        return redirect()->route('group.create')->with('message', 'group actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {

    }

    public function delete($id)
    {
        $groups = Group::find($id);

        $groups->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/group/create');

    }
}
