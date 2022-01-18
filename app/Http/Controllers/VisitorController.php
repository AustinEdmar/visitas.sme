<?php

namespace App\Http\Controllers;
use App\Services\PayUService\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\{Visitor, Nacionality, Gender, Document, Floor};

use Redirect;
use Brian2694\Toastr\Facades\Toastr;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function consulta(Request $request){

    $documents = Document::get();
    $genders = Gender::get();

    try {

        $numero=$request['bi'];
        // dd($numero);


         $response=http::withBasicAuth('SME_USER','P@ssw0rdCISP')->post('http://10.1.51.14:9876/api/testQuery',

         [
             'id_number' => $numero,
         ]

     );

     $resposta=$response->json();
     $array=$resposta[0];
     }

       catch (\Exception $e) {
        //return back()->withError($e->getMessage())->withInput();
        return Redirect::back()->withErrors(['msg' => 'Falha na busca de dados da identificação, insira manualmente os dados do visitante']);

        Toastr::success('Adicionado com sucesso :)','Sucesso');
          //return $e->getMessage();
      }






  //dd($array);

return view('cadastro.visitor.consulta', compact('array','documents','genders'));



}



public function create(Request $request)
{
$genders = Gender::get();
$documents = Document::get();
$nacionalities = Nacionality::get();
$visitors = Visitor::latest()->paginate(5);


return view('cadastro.visitor.create', compact('visitors', 'nacionalities','genders', 'documents'/* ,'bisave' */));
}



public function store(Request $request)
{


     if(!$request->has('gender_id')){

        Toastr::error('Falha ao cadastrar verifique os dados ou cadastre manualmente :)','Error');
        return Redirect::to('/cadastro/visitor/create');
    }else{
        $data = $request->all();

        $data['name'] = $request->name. " ".$request->nickname;
        $data['image'] = $request->image;

        $data['affiliation'] = $request->father. " "." e de ".$request->mother;

        if($request->has('affiliation')){
            $data['affiliation'] = $request->affiliation;
        }

        $data['gender_id'] = $request->gender_id;
        $data['phone_number'] = $request->phone_number;
        $data['birthday'] = $request->birthday;
        $data['document_id'] = $request->document_id;
        $data['doc_number'] = $request->doc_number;
        $data['doc_emition'] = $request->doc_emition;
        $data['nacionality_id'] = $request->nacionality_id;

        Visitor::create($data);

        toastr()->success('Dado inserido com sucesso');
     return Redirect::to('cadastro/visitor/create');

    }


}

public function edit()
{

}

public function delete($id)
{
$visitors = Visitor::find($id);

$visitors->delete();
toastr()->error('Deletado com sucesso');
return Redirect::to('cadastro/visitor/create');

}
}
