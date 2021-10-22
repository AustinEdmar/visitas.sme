<?php

namespace App\Http\Controllers;
use App\Police_rank;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class Police_rankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
        {
            $police_ranks = Police_rank::Simplepaginate(3);

            return view('cadastro.police_rank.create',compact('police_ranks'));
        }

        public function store(Request $request)
        {

            $validator = $this->validate($request, [
                'name' => 'required|unique:Police_ranks'
             ]);

             if($validator) {
                Police_rank::create($request->all());
                toastr()->success('Dado inserido com sucesso');
             }
          

            return Redirect::to('cadastro/rank/create');
        }

        public function edit()
        {

        }

        public function delete($id)
        {
            $police_ranks = Police_rank::find($id);

            $police_ranks->delete();
            toastr()->error('Deletado com sucesso');
            return Redirect::to('cadastro/rank/create');

        }
}
