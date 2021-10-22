<?php

namespace App\Http\Controllers;
use App\Document;
use Redirect;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $documents = Document::Simplepaginate(3);
        return view('cadastro.document.create', compact('documents'));
    }

    public function store(Request $request)
    {
        /* $rules = [
            'document' => 'required',
            'number_document' => 'required',
            'date_emission' => 'required'
        ];
        $request->validate($rules); */
        $documents = new Document;
        $documents = $documents->create( $request->all());
       toastr()->success('Dado inserido com sucesso');
        return Redirect::to('cadastro/document/create');
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        $document = Document::find($id);

        $document->delete();

        toastr()->error('Deletado com sucesso');

        return Redirect::to('cadastro/document/create');


    }
}
