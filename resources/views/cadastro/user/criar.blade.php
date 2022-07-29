<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('layouts.app')


@section('content')

<div class="m-4 ">
    <div class="container">
        <div class="">
            @include('cadastro.partials.ol_partials')





              <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target=".bd-example-modal-lg">Cadastrar Novo</button>

              
            

                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">

                            <div class="modal-content">
                                <div class="modal-header bg-primary">
                                  <h5 class="modal-title text-white" id="exampleModalLabel">Adicionar Usuario</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                        <div class="ml-2 mr-2">
                                            <form action="{{route('user.store')}}"  method="POST" enctype="multipart/form-data" >
                                                @csrf

                                         <div class=" row">

                                             <div class=" form-group">

                                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif


                                                <div class="">
                                                    <div class="row">
                                                      <div class="col-sm">
                                                    
                                                        <span  >Nome do Usuario</span>
                                                        <input type="text" class="form-control " name="name" placeholder="Escreva o nome" value="" autocomplete="off">

                                                        @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                      </div>
                                                      <div class="col-sm-2">
                                                        <span>Sexo</span>

                                                        <div>
                                                            @foreach ($genders as $gender )
                                                            <span>
                                                                <span>
                                                                    <input type="radio" name="gender_id" id="" class="" value="{{$gender->id}}">
                                                                    <span>{{$gender->name}}</span>

                                                                    @error('gender_id')
                                                                     <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </span>
                                                            </span>

                                                           @endforeach
                                                        </div>
                                                      </div>
                                                      <div class="col-sm">
                                                        <span>Data de Nascimento</span>
                                                        <input type="" class="form-control" name="birthday" placeholder="Escreva a data de aniversario" value="">

                                                      </div>
                                                      <div class="col-sm">
                                                        <span>Nivel Status</span>
                                                        <select name="status_id" id="" class="form-control" value=" ">
                                                            @foreach(App\Status::where('name','=','Activo')->get() as $statu)

                                                         <option value="{{$statu->id}}">{{$statu->name}}</option>
                                                            @endforeach

                                                   </select>

                                                      </div>
                                                      <div class="col-sm">
                                                        <span>Nivel de acesso</span>
                                                        <select name="level_id" id="" class="form-control" value="{{old('level_id')}}">
                                                            <option value="">
                                                                Selecione o Nivel de Acesso
                                                            </option>
                                                            @foreach ($levels as $level )
                                                                    <option value="{{$level->id}}">{{$level->name}}</option>
                                                            @endforeach
                                                   </select>
                                                    </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <span>Insira a Foto</span>
                                                            <input type="file" class="form-control" name="image" placeholder="insira a foto" value="{{old('image')}}">
                                                        </div>


                                                        <div class="col-sm">
                                                            <span>Telefone</span>
                                                            <input type="number" class="form-control" name="phone_number" placeholder="Escreva o celular" value=" ">
                                                        </div>
                                                        <div class="col-sm">
                                                            <span>Email</span>
                                                            <input type="email" class="form-control" name="email" placeholder="Escreva o celular" value="">
                                                        </div>
                                                        <div class="col-sm">
                                                            <span>Andar</span>
                                                            <select name="floor_id" id="" class="form-control" value="{{old('floor_id')}}">
                                                                <option value="">
                                                                    Selecione o Andar
                                                                </option>
                                                                @foreach ($floors as $floor )
                                                                        <option value="{{$floor->id}}">{{$floor->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div>


                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <span>Patente</span>
                                                            <select name="police_rank_id" id="" class="form-control" value="{{old('police_rank_id')}}">
                                                                <option value="">
                                                                    Selecione a Patente
                                                                </option>
                                                                @foreach ($police_ranks as $police_rank )
                                                                        <option value="{{$police_rank->id}}">{{$police_rank->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div>

                                                        <div class="col-sm">
                                                            <span>Senha</span>
                                                            <input type="password" class="form-control" name="password" placeholder="Escreva a senha">
                                                        </div>

                                                        <div class="col-sm">
                                                            <span> Repetir a Senha</span>
                                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Escreva a senha" >
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm">
                                                            <span>Local onde Trabalha</span>
                                                            <select name="direction_id" id="" class="form-control" value="{{old('direction_id')}}">
                                                                <option class="bg-warning">
                                                                    Seleccione: Sou Director(a) da/do
                                                                </option>
                                                                @foreach ($directions as $key => $direction )
                                                                        <option value="{{$direction->id}}">{{$key+1}} - {{$direction->name}}</option>
                                                                @endforeach

                                                                    <hr>
                                                                    <option value="" class="bg-warning">
                                                                    Selecione: Pertenço ao Departamento
                                                                </option>
                                                                @foreach ($departments as $key => $department )
                                                                        <option value="{{$department->id}}">{{$key+1}} - {{$department->name}}</option>
                                                                @endforeach
                                                                <hr>

                                                                <option class="bg-warning">
                                                                    Selecione Pertenço a Secção
                                                                </option>
                                                                @foreach ($sections as $key => $section )
                                                                        <option value="{{$section->id}}">{{$key+1}} - {{$section->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div>
                                                       

                                                       

                                                       <!--  <div class="col-sm">
                                                            <span>Grupo Pertencente / Direcção</span>
                                                            <select name="group_id" id="" class="form-control" value="{{old('group_id')}}">
                                                                <option value="">
                                                                    Selecione a direcção o qual Pertence
                                                                </option>
                                                                @foreach ($groups as $group )
                                                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div> -->


                                                    </div>
                                                  </div>



                                             </div>



                                         </div>
                                         <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-warning ">
                                              Cadastrar
                                          </button>
                                          </div>

                                        </form>


                                        </div>
                                </div>

                              </div>

                        </div>
                    </div>

        </div>





        <div class="">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                            <h4>Listar Usuarios</h4>

                    </div>
                </div>


                        <div>
                            <div>
                              <table class="table table-sm table-striped table-hover">

                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Nome</th>

                                     <th scope="col">Level</th>
                                     <th scope="col">image</th>

                                      <th scope="col">Telefone</th>
                                      <th scope="col">Grupo</th>



                                      <th scope="col">Direccao</th>
                                       <th scope="col">Departamento</th>
                                       <th scope="col">Seccao</th>
                                      <th scope="col">Genero</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Acções</th>
                                    </tr>

                                  </thead>
                                  <tbody>

                                     @foreach($users as $key => $user)
                                    <tr>
                                       <th scope="row$">{{$key+1}}</th>
                                       <td>{{$user->name}}</td>

                                       <td>{{$user->level->name ??''}}</td>
                                      <td><img src="/image/{{ $user->image }}" height="40px" width="60px"></td>

                                     {{--  <td><img src="{{ asset('user')}}/{{$user->image}}" height="40px" width="60px"></td> --}}

                                       <td>{{$user->phone_number}}</td>
                                      <td>{{$user->group->name ??''}}</td>




                                       <td>{{$user->direction->name ??''}}</td>
                                       <td> {{$user->department->name ??''}} </td>
                                      <td>{{$user->section->name ??''}}</td>
                                       <td>{{$user->gender->name ?? ''}}</td>


                                       <td>

                                       <div class="">
                                         @if ($user->status->name == 'Activo')
                                        <span class="btn btn-success ">Activo</span>
                                        @elseif($user->status->name == 'Inactivo')
                                        <span class="btn btn-danger" >Inactivo</span>

                                        @endif
                                       </div>
                                    </td>

                                    <td>
                                         <a type="" href="{{route('user.show', $user->id)}}" class="btn btn-warning mb-3" ><i class="fas fa-eye"></i></a>

                                         <td>


                                            <td>
                                                <a href="{{route('user.edit', $user->id)}}" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                            </td>


                                       </td>


                                       <td>
                                            <a href=" {{route('user.delete', $user->id)}} "
                                                onclick="return confirm('Tens a certeza que pretendes apagar')"
                                                ><i class="fas fa-trash btn btn-danger"></i></a>
                                         </td>


                                    </tr>
                                    @endforeach
                                  </tbody>



                                </table>

                            </div>

                        </div>


            </div>
            <div class="mb-3 d-flex justify-content-center mt-1">
                <div>
                    {{$users->render()}}
                </div>
                </div>
        </div>
    </div>
</div>



@endsection



