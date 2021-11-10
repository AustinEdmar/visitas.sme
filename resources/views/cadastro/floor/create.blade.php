@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-sm-5">
            @include('cadastro.partials.ol_partials')


        <form action="{{route('floor.store')}}" method="POST">
                    @csrf
                <div class="card-header bg-primary">
                        <h6 class="text-white">Cadastrar Andar</h6>
                  <div class=" form-group ">

                        <label>Nome</label>
                    <input type="text" class="form-control " @error('name') is-invalid @enderror name="name" placeholder="Escreva o andar">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                 </div>

                 <button type="submit" class="btn btn-warning">Cadastrar</button>
                </div>
            </form>
        </div>
        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                            <h4>Listar os Andares</h4>

                    </div>
                </div>


                        <div>
                            <div>
                              <table class="table table-sm table-striped table-hover">

                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Andar</th>


                                      <th scope="col">Acções</th>
                                    </tr>

                                  </thead>
                                  <tbody>

                                    @foreach($floors as $floor)


                                    <tr>
                                       <th scope="row">{{$floor->id}}</th>
                                       <td>{{$floor->name}}</td>

                                       <td>Editar</td>
                                        </td>


                                            <td>

                                                <a href="{{route('floor.delete', $floor->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
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
