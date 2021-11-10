<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\{Manage_subject, User, Visitor};
use Illuminate\Support\Facades\Redirect;

class UserGoupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $assuntos = Manage_subject::count();
       $manage_subjects = Manage_subject::get();
       $users = User::count();
       $visitors = Visitor::count();

        $manage_subjects = DB::table('manage_subjects')
                    ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                    ->join('groups', 'users.group_id', '=', 'groups.id')
                    ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                    ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                     ->Where('group_id', '=' , auth()->user()->group_id )
                    ->select('manage_subjects.*', 'users.name as users_name', 'progress.name as progress_name','visitors.name as visitors_name', 'users.group_id','groups.name as  groups_name' )
                    ->latest()
                    ->paginate(5);


                     return view('Usergroup.index', compact('manage_subjects',
                    'assuntos',
                    'users',
                    'visitors'));



       

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $manage_subjects = Manage_subject::find($id);

        //dd($manage_subjects);
        return view('Usergroup.edit', compact('manage_subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $manage_subject = Manage_subject::find($id);
        $data = $request->all();


        $manage_subject->update($data);
        return Redirect::to('/area')->with('message', 'Actualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
