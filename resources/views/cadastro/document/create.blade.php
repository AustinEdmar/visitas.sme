@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-sm-5">
            @include('cadastro.partials.ol_partials')

        <form action="{{route('document.store')}}" method="POST">
                    @csrf
                <div class="card-header bg-primary">
                        <h6 class="text-white">Cadastrar doc Visitante</h6>
                  <div class=" form-group ">

                        <label>Tipo de documento</label>
                    <input type="text" class="form-control  " name="name" placeholder="Escreva a nacionalidade">




                 </div>

                 <button type="submit" class="btn btn-warning">Cadastrar</button>
                </div>
            </form>
        </div>
        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                            <h4>Lista documentos</h4>

                    </div>
                </div>


                        <div>
                            <div>
                              <table class="table table-sm table-striped table-hover">

                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Tipo do documento</th>


                                      <th scope="col">Acções</th>
                                    </tr>

                                  </thead>
                                  <tbody>

                                    @foreach($documents as $document)


                                    <tr>
                                       <th scope="row">{{$document->id}}</th>
                                       <td>{{$document->name}}</td>

                                       <td>Editar</td>
                                        </td>


                                            <td>

                                                <a href="{{route('document.delete', $document->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                                </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>

                            </div>

                        </div>


            </div>
        </div>
    </div>
</div>
   {{--  <div class="d-flex">
        <div class="justify-content-center">
            <div class="container">

            </div>
        </div>
    </div> --}}
@endsection
