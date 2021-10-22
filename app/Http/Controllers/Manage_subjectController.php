<?php

namespace App\Http\Controllers;

use App\{User, Direction, Manage_subject,  Section, Department, Document, Floor, Visitor, Pvc,Progress};

use Illuminate\Http\Request;
use Redirect;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use Validator;


class Manage_subjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   /*    public function pegarss(Request $request)
    {

        $users = User::get();

        if($request){
                $sql = trim($request->get('search'));
                $utents = Visitor::where('doc_number', 'LIKE','%'.$sql.'%')
                        ->orWhere('name', 'LIKE','%'.$sql.'%')->get();
            }


            return view('cadastro.manage_subject.create', compact('users'));

    } */

    public function create(Request $request)
    {

        $sections = Section::get();
        $floors = Floor::get();
        $departments = Department::get();
       // $manage_subjects = Manage_subject::where('user_id', auth()->user()->id)->latest()->paginate(5);
        $manage_subjects = Manage_subject::latest()->paginate(5);
        $directions = Direction::get();
        $visitors = Visitor::get();
        $documents = Document::get();
        $pvcs = Pvc::get();
        $progress = Progress::get();

        $users = User::get();

       /*  if($request){
            $sql = trim($request->get('search'));
            $utents = Visitor::where('doc_number', 'LIKE','%'.$sql.'%')
                    ->orWhere('name', 'LIKE','%'.$sql.'%')->get();
        }
 */

        //dd(auth()->user()->department->id);



        return view('cadastro.manage_subject.create', compact(
            'users',
            'documents',
            'pvcs',
            'directions',
            'visitors',
            'manage_subjects',
            'departments',
            'progress',
            'floors',
            //'utents',
            'sections'));
    }




    public function getUsers(Request $request){
        $search = $request->search;

        if($search == ''){
            $users = User::orderby("name","asc")
                                    ->select("id","name")
                                   // ->limit(5)
                                    ->get();
        }else{
            $users = User::orderby("name","asc")
                                    ->select("id","name","email")
                                    ->where("name","like","%".$search."%")
                                   // ->limit(5)
                                    ->get();

        }



        $response = array();
        foreach($users as $user){
            $response[] = array(
                "value" => $user->id,
                /* 1-passa no input email
                <input type="email" id="usermail" readonly>
              2- no jquery
                    $('#usermail').val(ui.item.email);
                */
                "name" => $user->name,
                "label" => $user->name
            );
        }


        return response()->json($response);


    }



    public function getVisitors(Request $request){
        $search = $request->search;

        if($search == ''){
            $visitors = Visitor::orderby("name","asc")
                                    ->select("id","name")
                                   // ->limit(5)
                                    ->get();
        }else{
            $visitors = Visitor::orderby("name","asc")
                                    ->select("id","name")
                                    ->where("name","like","%".$search."%")
                                   // ->limit(5)
                                    ->get();

        }



        $resposta = array();
        foreach($visitors as $visitor){
            $resposta[] = array(
                "value" => $visitor->id,
                "name" => $visitor->name,
                /* 1-passa no input email
                <input type="email" id="usermail" readonly>
              2- no jquery
                    $('#usermail').val(ui.item.email);
                */

                "label" => $visitor->name
            );
        }


        return response()->json($resposta);


    }




    public function store(Request $request)
    {


        $validator = $this->validate($request, [
            'object_left' => 'required',
            'visitor_id' => 'required',
            'user_id' => 'required',
            'pvc_id' => 'required',
            'progress_id' => 'required',
            'motive' => 'required'
         ]);

         if($validator) {
            $data['object_left'] = $request->object_left;
            $data['visitor_id'] = $request->visitor_id;
            $data['user_id'] = $request->user_id;
            $data['pvc_id'] = $request->pvc_id;

            $data['progress_id'] = $request->progress_id;
            $data['motive'] = $request->motive;
            $data['by'] = auth()->user()->name;

            Manage_subject::create($data);
            //Floor::create($request->all());
            toastr()->success('Dado inserido com sucesso');
         }

        return Redirect::to('cadastro/manage_subject/create');

    }

    public function edit($id)
    {
        $manage_subjects = Manage_subject::find($id);
        return view('cadastro.manage_subject.edit', compact('manage_subjects'));
    }



    public function update(Request $request, $id)
    {

        $manage_subject = Manage_subject::find($id);
        $data = $request->all();


        $manage_subject->update($data);

        return Redirect::to('cadastro/manage_subject/create')->with('message', 'Actualizado com sucesso');

    }

    public function delete($id)
    {
        $manage_subject = Manage_subject::find($id);

        $manage_subject->delete();
        toastr()->error('Deletado com sucesso');
        return Redirect::to('cadastro/manage_subject/create');


    }

}
