<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

use App\{User, Police_rank, Level, Direction, Gender, Status, Section, Department, Floor, Group};


class UserController extends Controller
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


    public function show($id)
    {

        $where = array('id' => $id);


		$users = User::where($where)->first();
           // dd($users);


        return view('cadastro.user.show', compact(
            'users',


        ));
    }
    public function create()
    {
        $police_ranks = Police_rank::get();
        $sections = Section::get();
        $departments = Department::get();
        $levels = Level::get();
        $directions = Direction::get();
        $genders = Gender::get();
        $status = Status::get();
        $groups = Group::get();
        $floors = Floor::get();

        $users = User::latest()->paginate(5);
        return view('cadastro.user.create', compact(
            'users',
            'police_ranks',
            'levels',
            'directions',
            'genders',
            'status',
            'departments',
            'groups',
            'floors',
            'sections'
        ));
    }


    public function store(Request $request)
    {

      // dd($request->all());

        $data = $request->all();

        $this->validate($request, [

            /*
            'name' => 'required',
            'birthday' => 'required',
            'gender_id' => 'required',
            'status_id' => 'required',
            'level_id' => 'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'phone_number' => 'required',
            'email'=>'required|string|email|max:255|unique:users',
            'police_rank_id' => 'required',
            'direction_id' => 'required',
            'department_id' => 'required',
            'section_id' => 'required',
 */
            'password' => 'required|string',
            'password_confirmation' => 'sometimes|required_with:password',

        ]);

        /* if ($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('user'), $image);
        } else {
            $image = 'avatar2.png';
        } */



        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }






        /* $data['image'] = $image; */
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['birthday'] = $request->birthday;
        $data['phone_number'] = $request->phone_number;
        $data['police_rank_id'] = $request->police_rank_id;
        $data['level_id'] = $request->level_id;
        $data['direction_id'] = $request->direction_id;
        $data['department_id'] = $request->department_id;
        $data['section_id'] = $request->section_id;
        $data['gender_id'] = $request->gender_id;
        $data['status_id'] = $request->status_id;
        $data['group_id'] = $request->group_id;
        $data['floor_id'] = $request->floor_id;


        $data['password'] = Hash::make($request->password);
   //     dd($data);


        User::create($data);
        Toastr::success('Adicionado com sucesso :)','Sucesso');
        return Redirect::to('cadastro/user/create');
    }

    public function edit($id)
    {
        $police_ranks = Police_rank::get();
        $sections = Section::get();
        $departments = Department::get();
        $levels = Level::get();
        $directions = Direction::get();
        $genders = Gender::get();
        $status = Status::get();
        $groups = Group::get();
        $floors = Floor::get();

        $where = array('id' => $id);
		$users = User::where($where)->first();



        return view('cadastro.user.edit', compact(
            'users',
            'police_ranks',
            'levels',
            'directions',
            'genders',
            'status',
            'departments',
            'groups',
            'floors',
            'sections'

        ));
    }

    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $data = $request->all();

        $this->validate($request,[
            'password' => 'confirmed',
            ]);

        /* if ($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('user'), $image);
        } else {
            $image = 'avatar2.png';
        } */

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $data['image'] = "$profileImage";
        }else{
            unset($data['image']);
        }



        /* $data['image'] = $image; */
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['birthday'] = $request->birthday;
        $data['phone_number'] = $request->phone_number;
        $data['police_rank_id'] = $request->police_rank_id;
        $data['level_id'] = $request->level_id;
        $data['direction_id'] = $request->direction_id;
        $data['department_id'] = $request->department_id;
        $data['section_id'] = $request->section_id;
        $data['gender_id'] = $request->gender_id;
        $data['status_id'] = $request->status_id;
        $data['group_id'] = $request->group_id;
        $data['floor_id'] = $request->floor_id;
        $data['password'] = Hash::make($request->password);


        //dd($data);

        $user->update($data);
        Toastr::success('Actualizado com sucesso :)','Sucesso');

        return Redirect::to('cadastro/user/create')->with('message', 'Actualizado com sucesso');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/user/create');
    }



    public function perfil($id)
    {


        $where = array('id' => $id);
		$users = User::where($where)->first();



        return view('cadastro.user.perfil', compact(
            'users',


        ));
    }



}
