@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="container">
        <div class="row">
          <div class="col-sm">
              
            @include('cadastro.partials.ol_partials')

            <form action="{{route('rank.store')}}" method="POST">
                @csrf
               <div class="card-header bg-primary">
                <h4 class="text-white">Cadastrar Patentes</h4>
                <div class="form-group ">

                <label>Patente</label>
                  <input type="text" class="form-control" name="name" placeholder="Escreva a patente">
                  @if($errors->has('name'))
                  <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif


                </div>

                <button type="submit" class="btn btn-warning">Cadastrar</button>
            </div>
              </form>
          </div>
          <div class="col-sm">
            <div class="container ">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="p-2 flex-grow-1 bd-highlight">
                                <h4>Lista de Patentes</h4>

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
                                         @foreach($police_ranks as $police_rank)
                                      </thead>
                                      <tbody>

                                        <tr>
                                          <th scope="row">{{$police_rank->id}}</th>
                                        <td>{{$police_rank->name}}</td>


                                          <td>

                                            <a href="{{route('police_rank.delete', $police_rank->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                            </td>
                                        </tr>
                                           @endforeach
                                      </tbody>
                                    </table>

                                </div>
                                {{ $police_ranks->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>

        </div>
      </div>

@endsection


