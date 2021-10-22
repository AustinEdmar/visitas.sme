
@extends('layouts.app')

@section('content')
        <div class="container mt-5 ">

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
                                                <a href="{{route('nacionality.delete', $nacionality->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" ><i class="fas fa-trash btn btn-danger"></i></a>

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

            @endsection
