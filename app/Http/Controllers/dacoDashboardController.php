<?php

namespace App\Http\Controllers;

use DB;
use App\Section;
use Carbon\Carbon;
use App\Department;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\{Direction, Floor, Manage_subject, User, Visitor, };

class DashboardController extends Controller
{
    public function index(Request $request)
    {

       $visitas = Visitor::get();
       // dd($visitas->nacionality->name);


       $assuntos = Manage_subject::count();
       $manage_subjects = Manage_subject::paginate(3);
       $users = User::count();
       $visitors = Visitor::count();

       $interval = intval($request->input('dias', 30));

       $dateInterval = date('Y-m-d H:i:s', strtotime('-'.$interval.'days'));
   // $dateIntervals = Manage_subject::where('created_at', '>=', $dateInterval)->count();
       $dateIntervals = Manage_subject::where('created_at', '>=', $dateInterval)->get();


       //dd($dateIntervals);

        return view('dashboard.index', compact(
            'assuntos',
            'users',
            'visitors',
            'visitas',
            'manage_subjects',
            'dateIntervals',
            'interval'
        ));
    }
    public function relatorio()
    {

        $floors = Floor::get();
        $directions = Direction::get();
        $departments = Department::get();
        $sections = Section::get();
        $visitors = Visitor::get();
        $users = User::get();


     return view('dashboard.relatorio', compact('floors','directions','departments','sections','visitors','users'));

     }


     public function search(Request $request)
     {
        //dd($request->all());

         /*  if (isset($request->floor_id) || isset($request->direction_id) ||
             isset($request->department_id) || isset($request->section_id) ||
             isset($request->visitor_id) || isset($request->user_id)||
             isset($request->data)

          ){
            $floor_id = $request->floor_id;
            $direction_id = $request->direction_id;
            $department_id = $request->department_id;
            $section_id = $request->section_id;
            $visitor_id = $request->visitor_id;
            $user_id = $request->user_id;

          } */

            //$data = $request->input('data');
            //$data = intval($request->input('data'));
           // $data = $request->input('data');

            $floor_id = $request->floor_id;
            $direction_id = $request->direction_id;
            $department_id = $request->department_id;
            $section_id = $request->section_id;
            $visitor_id = $request->visitor_id;
            $user_id = $request->user_id;

            //$dado = date('Y-m-d H:i:s', $data);
                $manage_subjects = DB::table('manage_subjects')

                ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
                ->join('floors', 'users.floor_id', '=', 'floors.id')
                ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                ->rightJoin('directions', 'users.direction_id', '=', 'directions.id')
                ->rightJoin('departments', 'users.department_id', '=', 'departments.id')
                ->rightJoin('sections', 'users.section_id', '=', 'sections.id')
                ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                ->select('manage_subjects.*','users.name as users_name',
                'nacionalities.name as nacionalities_name',
                'visitors.name as visitors_name',
                'floors.name as floors_name',
                'directions.name as directions_name', 'departments.name as departments_name',
               'sections.name as sections_name',
                'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')


                ->where('manage_subjects.user_id', $user_id)
                       // ->orWhere('manage_subjects.visitor_id', $visitor_id)
                       // ->orWhere('users.floor_id', $floor_id)
                         //->orWhere('users.direction_id', $direction_id)
                        //->orWhere('users.department_id', $department_id)
                       // ->orWhere('users.section_id', $section_id)
                       //->whereDay('manage_subjects.created_at',$data)

                ->get();


             dd($manage_subjects);


/*
            $manage_subjects = DB::table('manage_subjects')


                        //->Where('manage_subjects.user_id', $user_id)
                        ->Where('manage_subjects.visitor_id', $visitor_id)
                        ->Where('users.floor_id', $floor_id)
                        ->Where('manage_subjects.user_id', $user_id)
                         ->where('users.direction_id', $direction_id)
                        ->where('users.department_id', $department_id)
                        ->where('users.section_id', $section_id)
                       //->whereDay('manage_subjects.created_at',$data)
                    ->get();

                    dd($manage_subjects); */

                return view('dashboard.relatorio', compact('manage_subjects'));

                   // dd($manage_subjects);

                    /* $manage_subjects = DB::table('manage_subjects')
                    ->select('manage_subjects.*')
                    ->join('users', function($join){
                        $join->on('manage_subjects.user_id', '=', 'users.id')
                        ->where('users.id', '$user_id');
                    })
                    ->get();




    }

    public function listarpdf()
    {
        /* $manage_subjects = Manage_subject::join('visitors','manage_subjects.visitor_id', '=', 'visitors.id')
        ->join('users','manage_subjects.user_id','users.id')
         ->join('nacionalities','visitors.nacionality_id','nacionalities.id')
        ->join('departments','manage_subjects.department_id','departments.id')
        ->select( 'manage_subjects.motive', 'manage_subjects.created_at', 'visitors.name as visitors_name','visitors.phone_number as visitors_phone_number','users.name as users_name','nacionalities.name as nacionalities_name', 'departments.name as department_name')
                    ->get(); */

                    $manage_subjects = DB::table('manage_subjects')
                    ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                    ->join('directions', 'users.direction_id', '=', 'directions.id')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->join('sections', 'users.section_id', '=', 'sections.id')

                    ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')

                    ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                    ->select('manage_subjects.*', 'visitors.name as visitors_name', 'directions.name as directions_name', 'visitors.phone_number as visitors_phone_number', 'users.name as users_name','nacionalities.name as nacionality_name','departments.name as departments_name','sections.name as sections')
                    ->get();
          //  dd($manage_subjects);

        //$manage_subjects = Manage_subject::all();
        $pdf = PDF::loadView('dashboard.listarpdf', compact('manage_subjects'))->setPaper('a4', 'landscape');
        return $pdf->stream('relatorio.pdf');

    }


}
