@extends('layouts.app')

@section('content')
        <div class="container mt-5 ">

           <div class="row">
                <div class="col-sm">

                    @include('cadastro.partials.ol_partials')


                    <form action="{{route('nacionality.store')}}" method="POST">
                        @csrf
                        <div class="card-header bg-primary"><h4 class="text-white">Cadastrar Paises</h4>



                        <div class="form-group">

                        <label class="text-white">Nacionalidade</label>
                          <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" placeholder="Escreva a nacionalidade">
                          @error('name')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                             @enderror
                        </div>

                        <button type="submit" class="btn btn-warning text-white">Cadastrar</button>
                    </div>
                      </form>
                </div>
                <div class="col-sm">
                    <div class="container ">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">

                                        <h4>Lista de paises</h4>



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
                                                @foreach($nacionalities as $nacionality)
                                              </thead>
                                              <tbody>

                                                <tr>
                                                  <th scope="row">{{$nacionality->id}}</th>
                                                <td>{{$nacionality->name}}</td>


                                                  <td>

                                                     {{-- <form action="" method="post">
                                                        @csrf
                                                         @method('delete')

                                                        <button class="btn btn-danger">Deletar</button>
                                                    </form> --}}
                                                    <a href="{{route('nacionality.destroy', $nacionality->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" ><i class="fas fa-trash btn btn-danger"></i></a>

                                                    </td>


                                                </tr>
                                                   @endforeach
                                              </tbody>
                                            </table>

                                        </div>
                                        {{ $nacionalities->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        @endsection
