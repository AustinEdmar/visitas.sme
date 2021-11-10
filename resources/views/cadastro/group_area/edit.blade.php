@extends('layouts.app')

@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-sm">
            @include('cadastro.partials.ol_partials')



            <form action="{{route('group.update', [$groups->id])}}" method="POST">
                @csrf
                @method('PATCH')

               <div class="card-header bg-primary"> <h4 class="text-white">Editar Grupo de area</h4>

                <div class="form-group">

                    <label>Grupo Area</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$groups->name}}" placeholder="Editar Area">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    </div>

                <button type="submit" class="btn btn-warning">Editar</button>
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
                                    <h4>Lista Grupos de areas</h4>

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

                                          </thead>
                                          <tbody>

                                             <tr>



                                              {{-- <td>

                                                 <a href="{{route('group.edit', $group->id)}}" class="btn btn-warning">Editar</a>
                                                </td> --}}
                                              {{-- <td>

                                                 <a href="{{route('group.delete', $group->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                                </td> --}}
                                            </tr>

                                          </tbody>
                                        </table>

                                    </div>

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




