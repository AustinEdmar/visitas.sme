<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Hash;

use App\{User, Police_rank, Level, Direction, Gender, Status, Section, Department, floor, Group};


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

        $users = User::Simplepaginate(3);
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

        if ($request->hasFile('image')) {
            $image = $request->image->hashName();
            $request->image->move(public_path('user'), $image);
        } else {
            $image = 'avatar2.png';
        }



        $data['image'] = $request->image;
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
        return Redirect::to('cadastro/user/create');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
		$users = User::where($where)->first();
		return Response()->json($users);

        dd($users);
        /* $users = User::find($id);
        return view('admin.user.create', compact('users')); */
    }

    public function update(Request $request, $id)
    {



        $user = User::find($id);
        $data = $request->all();
        dd($data);


        $user->update($data);
        return Redirect::to('cadastro/user/create')->with('message', 'Actualizado com sucesso');
    }

    public function delete($id)
    {
        $user = User::find($id);

        $user->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/user/create');
    }

    public function userView(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $name = $user->name;

        $phone_number = $user->phone_number;

        return response()->json(array(
                'user' => $user,
                'name' => $name,
                'phone_number' => $phone_number,

        ));
    //dd($user, $phone_number);
    }

}
