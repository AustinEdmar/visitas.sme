@extends('layouts.app')

@section('content')



<div class="container mt-5 ">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">
              <!-- Button trigger modal -->
<button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#exampleModal">
    Add Novo Departamento
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Cadastrar Departamento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{route('department.store')}}" method="POST">
                @csrf
               <div class="">



                <div class="form-group">

                        <div class="row">
                            <div class="col">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Escreva o nome do genero">

                            </div>

                            <div class="col">
                                <label>Extensao</label>
                                <input type="number" class="form-control" name="extention" value="{{old('extention')}}" placeholder="Escreva o nome do genero">

                            </div>
                        </div>
                            <div class="row">


                   <div class="col-sm">
                    <label>Selecione a Direcção</label>
                    <select name="direction_id" id="" class="form-control" value="{{old('direction_id')}}">
                            <option value="" disabled selected>
                                Seleccione
                            </option>
                            @foreach ($directions as $direction )
                                    <option value="{{$direction->id}}">{{$direction->name}}</option>
                            @endforeach
                   </select>
                   </div>


                  <div class="col-sm">
                     <label class="text-white">Grupo</label>
                     <select name="group_id" id="" class="form-control" value="{{old('group_id')}}"   >
                         <option disabled selected >Seleccione o Grupo</option>

                         @foreach(App\Group::get() as $group)


                             <option value="{{$group->id}}">{{$group->name }}</option>
                         @endforeach


                </select>
                 </div>
                            </div>

                </div>


            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-warning">Cadastrar</button>
        </form>
        </div>
      </div>
    </div>
  </div>

  @include('cadastro.partials.ol_partials')





          </div>







          <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h4>Listar todos Departamentos</h4>

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
                                      <th scope="col">Direcção</th>
                                      <th scope="col">Extensão</th>
                                      {{-- <th scope="col">seccao</th> --}}

                                      <th scope="col">Acções</th>
                                    </tr>
                                     @foreach($departments as $department)
                                  </thead>
                                  <tbody>

                                    <tr>
                                      <th scope="row">{{$department->id}}</th>
                                    <td>{{$department->name}}</td>
                                    <td>{{$department->direction->name}}</td>
                                    <td>{{$department->extention}}</td>
                                   {{--  <td>{{$department->section->name}}</td> --}}


                                         <td>

                                        <a href="{{route('department.delete', $department->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                        </td>
                                    </tr>
                                       @endforeach
                                  </tbody>
                                </table>

                            </div>
                            {{ $departments->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
          </div>

        </div>
      </div>
@endsection



