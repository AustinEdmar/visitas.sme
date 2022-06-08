@extends('layouts.app')

@section('content')
<div class="container  ">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="container mb-2">
                <div class="row">

                   <div class="col-md-12">
                       <div class="card">
                           <div class="card-header">
                               <h4> Cadastrar Direcção
                                  <a href="#" class=" btn btn-warning"  data-toggle="modal" data-target="#AddStudent">Add Novo</a>
                               </h4>
                           </div>
                       </div>
                     </div>
                   </div>
               </div>
               @include('cadastro.partials.ol_partials')

              <div class="modal fade" id="AddStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-primary">
                      <h5 class="modal-title text-white" id="exampleModalLabel">Cadastrar Direccao</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                        <form action="{{route('direction.store')}}" method="POST">
                            @csrf

                            <div class="form-group ">

                          <div class="row">
                              <div class="col">



                                <label>Nome da Direccao</label>

                                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Escreva o nome da direçcão" @error('name') is-invalid @enderror>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                              </div>

                              <div class="col">
                                <label>Extensao</label>
                                <input type="number" class="form-control" name="extention" value="{{old('extention')}}" placeholder="Escreva o nome da direçcão" @error('extention') is-invalid @enderror >
                                @error('extention')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                              </div>
                          </div>


                       <div class="row">
                        <div class="col-sm">
                            <label class="text-white">Andar</label>
                            <select name="floor_id" id="" class="form-control" value="{{old('floor_id')}}"  @error('floor_id') is-invalid @enderror >
                                @error('floor_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <option disabled selected >Seleccione o Andar</option>

                                @foreach(App\Floor::get() as $floor)


                                    <option value="{{$floor->id}}">{{$floor->name }}</option>
                                @endforeach


                       </select>
                        </div>
                          <div class="col-sm">
                            <label class="text-white">Grupo</label>
                            <select name="group_id" id="" class="form-control" value="{{old('group_id')}}"   @error('group_id') is-invalid @enderror >
                                @error('group_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <option disabled selected >Seleccione o Grupo</option>

                                @foreach(App\Group::get() as $group)


                                    <option value="{{$group->id}}">{{$group->name }}</option>
                                @endforeach


                       </select>
                        </div>
                       </div>


                            </div>






                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                      <button type="submit"" class="btn btn-warning add_student">cadastrar</button>
                    </div>
                </form>
                  </div>
                </div>
              </div>






          </div>


          <div class="col-md-8">


            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h4>Listar todas direccoes</h4>

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
                                      <th scope="col">Extensao</th>
                                      <th scope="col">Grupo</th>
                                      <th scope="col">Andar</th>

                                      <th scope="col">Acções</th>
                                    </tr>
                                     @foreach($directions as $direction)
                                  </thead>
                                  <tbody>

                                    <tr>
                                      <th scope="row">{{$direction->id}}</th>
                                    <td>{{$direction->name}}</td>

                                    <td>{{$direction->extention}}</td>
                                    <td>{{$direction->extention}}</td>
                                    <td>{{$direction->floor->name ??''}}</td>


                                      <td>


                                        <a href="{{route('direction.delete', $direction->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                        </td>
                                    </tr>
                                       @endforeach
                                  </tbody>
                                </table>

                            </div>
                            {{ $directions->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
          </div>

        </div>
      </div>
@endsection



