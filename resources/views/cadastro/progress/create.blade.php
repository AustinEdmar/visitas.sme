@extends('layouts.app')

@section('content')
<div class="container mt-5 ">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">
            @include('cadastro.partials.ol_partials')

            <form action="{{route('progress.store')}}" method="POST">
                @csrf
               <div class="card-header bg-primary">
                <h4 class="text-white">Cadastrar progresso</h4>


                <div class="form-group ">

                <label>Progresso</label>
                  <input type="text" class="form-control" name="name" placeholder="Escreva o progress">

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
                            <h4>Listar todos progresss</h4>

                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div>
                            <div>
                              <table class="table table-sm table-striped table-hover">

                                  <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">Nome</th>

                                      <th scope="col">Acções</th>
                                    </tr>
                                     @foreach($progresss as $progress)
                                  </thead>
                                  <tbody>

                                    <tr>
                                      <th scope="row">{{$progress->id}}</th>
                                    <td>{{$progress->name}}</td>


                                      <td>

                                        <a href="{{route('progress.delete', $progress->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                        </td>
                                    </tr>
                                       @endforeach
                                  </tbody>
                                </table>

                            </div>
                            {{ $progresss->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
          </div>

        </div>
      </div>

@endsection

