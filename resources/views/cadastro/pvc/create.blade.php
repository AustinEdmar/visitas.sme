@extends('layouts.app')

@section('content')
<div class="container mt-5 ">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">
            @include('cadastro.partials.ol_partials')
            <form action="{{route('pvc.store')}}" method="POST">
                @csrf
               <div class="card-header bg-primary">
                <h4 class="text-white">Cadastrar Pvcs</h4>


                <div class="form-group">

                <label>Numero do pvc</label>
                <input type="text" class="form-control @error('number_pvc') is-invalid @enderror" name="number_pvc" placeholder="Escreva o pvc">
                @error('number_pvc')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
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
                            <h4>Listar todos Pvcs</h4>

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
                                     @foreach($pvcs as $key=> $pvc)
                                  </thead>
                                  <tbody>

                                    <tr>
                                      <th scope="row">{{$key+1}}</th>
                                    <td>{{$pvc->number_pvc}}</td>


                                      <td>

                                        <a href="{{route('pvc.delete', $pvc->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                        </td>
                                    </tr>
                                       @endforeach
                                  </tbody>
                                </table>

                            </div>
                            {{ $pvcs->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
          </div>

        </div>
      </div>

@endsection

