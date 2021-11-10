<?php

namespace App\Http\Controllers;

use DB;
use App\Section;
use Carbon\Carbon;
use PDF;
use App\Department;
//use Barryvdh\DomPDF\PDF;

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
       $dateIntervals = Manage_subject::where('created_at', '>=', $dateInterval)->latest()->paginate(5);


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



        if (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->direction_id) && isset($request->datainicio) && isset($request->datafim)){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.direction_id', $request->direction_id)
            ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)
            ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)
        ->get();

        }

        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->department_id) && isset($request->datainicio) && isset($request->datafim)){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.department_id', $request->department_id)
            ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)
            ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)

        ->get();


        }

        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->section_id) && isset($request->datainicio) && isset($request->datafim)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.section_id', $request->section_id)
            ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)
            ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)

        ->get();

            //dd($manage_subjects);

        }


        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->section_id) && isset($request->datainicio) && isset($request->datafim)){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.section_id', $request->section_id)
            ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)
            ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)

        ->get();

            //dd($manage_subjects);
        }

        /* aqui vai o data inicio */


        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->direction_id) && isset($request->datainicio) ){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.direction_id', $request->direction_id)
            ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)

        ->get();

        }

        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->department_id) && isset($request->datainicio) ){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.department_id', $request->department_id)
            ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)


        ->get();


        }

        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->section_id) && isset($request->datainicio)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.section_id', $request->section_id)
            ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)


        ->get();

            //dd($manage_subjects);

        }


        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->section_id) && isset($request->datainicio) ){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.section_id', $request->section_id)
            ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)


        ->get();

            //dd($manage_subjects);
        }


        /* aqui vai o data inicio */

        /* aui o fim */

        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->direction_id) && isset($request->datafim)){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.direction_id', $request->direction_id)

            ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)
        ->get();

        }

        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->department_id)  && isset($request->datafim)){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.department_id', $request->department_id)

            ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)

        ->get();


        }

        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->section_id)  && isset($request->datafim)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.section_id', $request->section_id)

            ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)

        ->get();

            //dd($manage_subjects);

        }


        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->section_id) && isset($request->datafim)){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.section_id', $request->section_id)

            ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)

        ->get();

            //dd($manage_subjects);
        }


        /* aqui fim  */


        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->direction_id)){


            $manage_subjects = DB::table('manage_subjects')
            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.direction_id', $request->direction_id)
        ->get();

            //dd($manage_subjects);
        }

        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->department_id)){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )
            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.department_id', $request->department_id)

        ->get();

            //dd($manage_subjects);
        }



        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->visitor_id) && isset($request->section_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.section_id', $request->section_id)

        ->get();

            //dd($manage_subjects);

        }

        /* fim if de 4 */
        elseif (isset($request->floor_id) && isset($request->visitor_id) && isset($request->direction_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)

            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.direction_id', $request->direction_id)

        ->get();

            //dd($manage_subjects);

        }



        elseif (isset($request->user_id) && isset($request->visitor_id) && isset($request->direction_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('manage_subjects.user_id', $request->user_id)

            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.direction_id', $request->direction_id)

        ->get();

            //dd($manage_subjects);

        }




        /* inicio if de  */

        elseif (isset($request->floor_id) && isset($request->visitor_id) && isset($request->department_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)

            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.department_id', $request->department_id)

        ->get();

            //dd($manage_subjects);

        }
        elseif (isset($request->floor_id) && isset($request->visitor_id) && isset($request->section_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.floor_id', $request->floor_id)

            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('users.section_id', $request->section_id)

        ->get();

            //dd($manage_subjects);

        }elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->direction_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->leftJoin('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)

            ->Where('manage_subjects.visitor_id', $request->user_id)
            ->Where('users.direction_id', $request->direction_id)

        ->get();

            //dd($manage_subjects);

        }
        /* inicio if de  */

        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->department_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subuser', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

            ->Where('users.floor_id', $request->floor_id)

            ->Where('manage_subjects.visitor_id', $request->user_id)
            ->Where('users.department_id', $request->department_id)

        ->get();

            //dd($manage_subjects);

        }
        elseif (isset($request->floor_id) && isset($request->user_id) && isset($request->section_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.floor_id', $request->floor_id)

            ->Where('manage_subjects.visitor_id', $request->user_id)
            ->Where('users.section_id', $request->section_id)

        ->get();

            //dd($manage_subjects);

        }

        elseif (isset($request->department_id) && isset($request->visitor_id) && isset($request->user_id)){
            $manage_subjects = DB::table('manage_subjects')
            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )
            ->Where('users.department_id', $request->department_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
        ->get();
            //dd($manage_subjects);
        }

        elseif (isset($request->section_id) && isset($request->visitor_id) && isset($request->user_id)){
            $manage_subjects = DB::table('manage_subjects')
            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )
            ->Where('users.section_id', $request->section_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)
            ->Where('manage_subjects.user_id', $request->user_id)
        ->get();
            //dd($manage_subjects);
        }

        elseif (isset($request->section_id) && isset($request->user_id)){
            $manage_subjects = DB::table('manage_subjects')
            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )
            ->Where('users.section_id', $request->section_id)

            ->Where('manage_subjects.user_id', $request->user_id)
        ->get();
            //dd($manage_subjects);
        }

        elseif (isset($request->section_id) && isset($request->visitor_id)){
            $manage_subjects = DB::table('manage_subjects')
            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )
            ->Where('users.section_id', $request->section_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)

        ->get();
            //dd($manage_subjects);
        }

        elseif (isset($request->section_id) && isset($request->floor_id)){
            $manage_subjects = DB::table('manage_subjects')
            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )
            ->Where('users.section_id', $request->section_id)

            ->Where('users.floor_id', $request->floor_id)
        ->get();
            //dd($manage_subjects);
        }

        elseif (isset($request->department_id) && isset($request->user_id)){
            $manage_subjects = DB::table('manage_subjects')
            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )
            ->Where('users.department_id', $request->department_id)

            ->Where('manage_subjects.user_id', $request->user_id)
        ->get();
            //dd($manage_subjects);
        }

        elseif (isset($request->department_id) && isset($request->visitor_id)){
            $manage_subjects = DB::table('manage_subjects')
            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )
            ->Where('users.department_id', $request->department_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)

        ->get();
            //dd($manage_subjects);
        }

        elseif (isset($request->floor_id) && isset($request->direction_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.floor_id', $request->floor_id)
            ->Where('users.section_id', $request->direction_id)

        ->get();

            //dd($manage_subjects);

        }
        elseif (isset($request->floor_id) && isset($request->department_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->join('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.floor_id', $request->floor_id)
            ->Where('users.section_id', $request->department_id)

        ->get();

            //dd($manage_subjects);

        }

        elseif (isset($request->floor_id) && isset($request->section_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.floor_id', $request->floor_id)
            ->Where('users.section_id', $request->section_id)

        ->get();

            //dd($manage_subjects);
        }
        elseif (isset($request->floor_id) && isset($request->user_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.user_id', $request->user_id)

        ->get();

            //dd($manage_subjects);
        }
        elseif (isset($request->floor_id) && isset($request->visitor_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.floor_id', $request->floor_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)

        ->get();

            //dd($manage_subjects);
        }

        /* terminei de andar */

        /* direccao */
        elseif (isset($request->direction_id) && isset($request->visitor_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.direction_id', $request->direction_id)
            ->Where('manage_subjects.visitor_id', $request->visitor_id)

        ->get();

            //dd($manage_subjects);
        }

        elseif (isset($request->direction_id) && isset($request->user_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.direction_id', $request->direction_id)
            ->Where('manage_subjects.user_id', $request->user_id)

        ->get();

            //dd($manage_subjects);
        }

        elseif (isset($request->direction_id) && isset($request->floor_id)){


            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->join('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*','users.name as users_name',
            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',
            'floors.name as floors_name',
            'directions.name as directions_name', 'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name')

            ->Where('users.direction_id', $request->direction_id)
            ->Where('users.floor_id', $request->floor_id)

        ->get();

            //dd($manage_subjects);
        }

        elseif(isset($request->datainicio) && isset($request->datafim)){

            $manage_subjects = DB::table('manage_subjects')

            ->join('users', 'manage_subjects.user_id', '=', 'users.id')
            ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
            ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
            ->join('floors', 'users.floor_id', '=', 'floors.id')
            ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
            ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
            ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
            ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
            ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
            ->select('manage_subjects.*',
            'users.name as users_name',

            'nacionalities.name as nacionalities_name',
            'visitors.name as visitors_name',
            'visitors.phone_number as visitors_phone_number',

            'floors.name as floors_name',
            'directions.name as directions_name',
            'departments.name as departments_name',
            'sections.name as sections_name',
            'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

           // ->where('manage_subjects.created_at', '>=', $request->data)
           ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)
           ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)

          ->get();

          //dd($manage_subjects);
        }



        elseif(isset($request->floor_id)){

                $manage_subjects = DB::table('manage_subjects')

                ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
                ->join('floors', 'users.floor_id', '=', 'floors.id')
                ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
                ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
                ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                ->select('manage_subjects.*','users.name as users_name',
                'nacionalities.name as nacionalities_name',
                'visitors.name as visitors_name',
                'visitors.phone_number as visitors_phone_number',
                'floors.name as floors_name',
                'directions.name as directions_name', 'departments.name as departments_name',
                'sections.name as sections_name',
                'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

                ->Where('users.floor_id', $request->floor_id)

              ->get();
               //dd($manage_subjects);

            }

        elseif(isset($request->direction_id)){

                $manage_subjects = DB::table('manage_subjects')

                ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
                ->join('floors', 'users.floor_id', '=', 'floors.id')
                ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                ->join('directions', 'users.direction_id', '=', 'directions.id')
                ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
                ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                ->select('manage_subjects.*','users.name as users_name',
                'nacionalities.name as nacionalities_name',
                'visitors.name as visitors_name',
                'visitors.phone_number as visitors_phone_number',
                'floors.name as floors_name',
                'directions.name as directions_name', 'departments.name as departments_name',
                'sections.name as sections_name',
                'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

                ->Where('users.direction_id', $request->direction_id)

              ->get();
               //dd($manage_subjects);

            }
        elseif(isset($request->department_id)){

                $manage_subjects = DB::table('manage_subjects')

                ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
                ->join('floors', 'users.floor_id', '=', 'floors.id')
                ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
                ->join('departments', 'users.department_id', '=', 'departments.id')
                ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
                ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                ->select('manage_subjects.*','users.name as users_name',
                'nacionalities.name as nacionalities_name',
                'visitors.name as visitors_name',
                'visitors.phone_number as visitors_phone_number',

                'floors.name as floors_name',
                'directions.name as directions_name', 'departments.name as departments_name',
                'sections.name as sections_name',
                'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

                ->Where('users.department_id', $request->department_id)

              ->get();
               //dd($manage_subjects);

            }
        elseif(isset($request->section_id)){

                $manage_subjects = DB::table('manage_subjects')

                ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
                ->join('floors', 'users.floor_id', '=', 'floors.id')
                ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
                ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                ->join('sections', 'users.section_id', '=', 'sections.id')
                ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                ->select('manage_subjects.*','users.name as users_name',
                'nacionalities.name as nacionalities_name',
                'visitors.name as visitors_name',
                'visitors.phone_number as visitors_phone_number',
                'floors.name as floors_name',
                'directions.name as directions_name', 'departments.name as departments_name',
                'sections.name as sections_name',
                'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

                ->Where('users.section_id', $request->section_id)

              ->get();
               //dd($manage_subjects);

            }

        elseif(isset($request->visitor_id)){

                $manage_subjects = DB::table('manage_subjects')

                ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
                ->join('floors', 'users.floor_id', '=', 'floors.id')
                ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
                ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
                ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                ->select('manage_subjects.*','users.name as users_name',
                'nacionalities.name as nacionalities_name',
                'visitors.name as visitors_name',
                'visitors.phone_number as visitors_phone_number',
                'floors.name as floors_name',
                'directions.name as directions_name', 'departments.name as departments_name',
                'sections.name as sections_name',
                'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

                ->Where('manage_subjects.visitor_id', $request->visitor_id)

              ->get();
               //dd($manage_subjects);
               //

            }
        elseif(isset($request->user_id)){

                $manage_subjects = DB::table('manage_subjects')

                ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
                ->join('floors', 'users.floor_id', '=', 'floors.id')
                ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
                ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
                ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                ->select('manage_subjects.*',
                'users.name as users_name',

                'nacionalities.name as nacionalities_name',
                'visitors.name as visitors_name',
                'visitors.phone_number as visitors_phone_number',

                'floors.name as floors_name',
                'directions.name as directions_name',
                'departments.name as departments_name',
                'sections.name as sections_name',
                'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

                ->where('manage_subjects.user_id', $request->user_id)

              ->get();

             // dd($manage_subjects);
            }

            elseif(!isset($request->user_id)){
                return redirect()->back();
            }
               //


            elseif(isset($request->datainicio)){

                $manage_subjects = DB::table('manage_subjects')

                ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
                ->join('floors', 'users.floor_id', '=', 'floors.id')
                ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
                ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
                ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                ->select('manage_subjects.*',
                'users.name as users_name',

                'nacionalities.name as nacionalities_name',
                'visitors.name as visitors_name',
                'visitors.phone_number as visitors_phone_number',

                'floors.name as floors_name',
                'directions.name as directions_name',
                'departments.name as departments_name',
                'sections.name as sections_name',
                'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

               // ->where('manage_subjects.created_at', '>=', $request->data)
               ->whereDate('manage_subjects.created_at', '>=', $request->datainicio)


              ->get();
            }


            elseif(isset($request->datafim)){

                $manage_subjects = DB::table('manage_subjects')

                ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')
                ->join('pvcs', 'manage_subjects.pvc_id', '=', 'pvcs.id')
                ->join('floors', 'users.floor_id', '=', 'floors.id')
                ->join('progress', 'manage_subjects.progress_id', '=', 'progress.id')
                ->leftJoin('directions', 'users.direction_id', '=', 'directions.id')
                ->leftJoin('departments', 'users.department_id', '=', 'departments.id')
                ->leftJoin('sections', 'users.section_id', '=', 'sections.id')
                ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                ->select('manage_subjects.*',
                'users.name as users_name',

                'nacionalities.name as nacionalities_name',
                'visitors.name as visitors_name',
                'visitors.phone_number as visitors_phone_number',

                'floors.name as floors_name',
                'directions.name as directions_name',
                'departments.name as departments_name',
                'sections.name as sections_name',
                'pvcs.number_pvc as pvcs_number_pvc' , 'progress.name as progress_name' )

               // ->where('manage_subjects.created_at', '>=', $request->data)

               ->WhereDate('manage_subjects.created_at', '<=', $request->datafim)

              ->get();
            }




            $hoje = Carbon::now()->format('d-m-Y');

                   /*  if(!isset($manage_subjects)){

                        return redirect()->back();
                    } */

                    $pdf = PDF::loadView('dashboard.relatoriopdf', compact('manage_subjects','hoje'))->setPaper('a4', 'landscape');
                    return $pdf->stream('relatorio.pdf');
                    return view('dashboard.relatorio', compact('manage_subjects'));



            }

    public function listarpdf()
    {

                    $manage_subjects = DB::table('manage_subjects')
                    ->join('users', 'manage_subjects.user_id', '=', 'users.id')
                    ->join('directions', 'users.direction_id', '=', 'directions.id')
                    ->join('departments', 'users.department_id', '=', 'departments.id')
                    ->join('sections', 'users.section_id', '=', 'sections.id')

                    ->join('visitors', 'manage_subjects.visitor_id', '=', 'visitors.id')

                    ->join('nacionalities', 'visitors.nacionality_id', '=', 'nacionalities.id')
                    ->select('manage_subjects.*', 'visitors.name as visitors_name',
                    'visitors.phone_number as visitors_phone_number', 'directions.name as directions_name', 'visitors.phone_number as visitors_phone_number', 'users.name as users_name','nacionalities.name as nacionality_name','departments.name as departments_name','sections.name as sections')
                    ->get();
          //  //dd($manage_subjects);

        //$manage_subjects = Manage_subject::all();
       $pdf = PDF::loadView('dashboard.listarpdf', compact('manage_subjects'))->setPaper('a4', 'landscape');
        return $pdf->stream('relatorio.pdf');



    }



}
