@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">
            @include('cadastro.partials.ol_partials')

            <form action="{{route('gender.store')}}" method="POST">
                @csrf
               <div class="card-header bg-primary">
                <h4 class="text-white">Cadastrar Genero</h4>


                <div class="form-group">

                <label>Genero</label>
                  <input type="text" class="form-control" name="name" placeholder="Escreva o nome do genero">

                </div>

                <button type="submit" class="btn btn-warning">Cadastrar</button>
            </div>
              </form>
          </div>
          <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h4>Listar todos Generos</h4>

                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div>
                            <div>
                              <table class="table table-dark table-striped">

                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nome</th>

                                      <th scope="col">Acções</th>
                                    </tr>
                                     @foreach($genders as $gender)
                                  </thead>
                                  <tbody>

                                    <tr>
                                      <th scope="row">{{$gender->id}}</th>
                                    <td>{{$gender->name}}</td>


                                      <td>


                                        <a href="{{route('gender.delete', $gender->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                        </td>
                                    </tr>
                                       @endforeach
                                  </tbody>
                                </table>

                            </div>
                            {{ $genders->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
          </div>

        </div>
      </div>
@endsection



