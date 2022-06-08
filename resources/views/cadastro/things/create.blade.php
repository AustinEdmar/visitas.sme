@extends('layouts.app')

@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-sm">
            @include('cadastro.partials.ol_partials')

            <form action=" {{route('things.store')}} " method="POST">
                @csrf

               <div class="card-header bg-primary"> <h4 class="text-white">Cadastrar ENTREGUE</h4>

                <div class="form-group">

                    <label>Entregue</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Escreva o status">
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
        <div class="col-sm">
            <div class="col-sm">
                <div class="container ">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="">
                                    <h4>Listar </h4>

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
                                          @foreach($things as $thing) 
                                          </thead>
                                          <tbody>

                                            <tr>
                                             <th scope="row">{{$thing->id}}</th>
                                            <td>{{$thing->name}}</td>



                                              <td>

                                                <a href="{{route('things.delete', $thing->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                                </td>
                                            </tr>
                                               @endforeach
                                          </tbody>
                                        </table>

                                    </div>
                                    {{ $things->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection




