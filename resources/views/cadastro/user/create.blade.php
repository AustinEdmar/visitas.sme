<meta name="csrf-token" content="{{ csrf_token() }}">

@extends('layouts.app')


@section('content')

<div class="m-4 ">
    <div class="container">
        <div class="">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/nacionality/create')}}">Nacionalidade</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/gender/create')}}">genero</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/rank/create')}}">Patente</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/pvc/create')}}">Pvc</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/visitor/create')}}">Utente</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/section/create')}}">section</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/visitor/create')}}">visitor</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/direction/create')}}">direccao</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/department/create')}}">departamento</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/user/create')}}">Usuarios</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/status/create')}}">Status</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/progress/create')}}">Progresso</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/document/create')}}">documento</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/permission/create')}}">permissoes</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/level/create')}}">permissoes</a></li>

                  <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/create')}}">Motivo</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/relatorio')}}">Relatorio</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/relatorio/pdf')}}">pdf</a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
              </nav>



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

                                         <div class="  row">

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
                                                        <label  >Nome do Usuario</label>
                                                        <input type="text" class="form-control " name="name" placeholder="Escreva o nome" value="{{('Austin Edmar')}}" autocomplete="off">

                                                        @error('name')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror

                                                      </div>
                                                      <div class="col-sm-2">
                                                        <label >Sexo</label>

                                                        <div>
                                                            @foreach ($genders as $gender )
                                                            <span>
                                                                <label >
                                                                    <input type="radio" name="gender_id" id="" class="" value="{{$gender->id}}">
                                                                    <span>{{$gender->name}}</span>

                                                                    @error('gender_id')
                                                                     <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </label>
                                                            </span>

                                                           @endforeach
                                                        </div>
                                                      </div>
                                                      <div class="col-sm">
                                                        <label >Data de nascimento</label>
                                                        <input type="" class="form-control" name="birthday" placeholder="Escreva a data de aniversario" value="{{('17/08/1989')}}">

                                                      </div>
                                                      <div class="col-sm">
                                                        <label >Nivel status</label>
                                                        <select name="status_id" id="" class="form-control" value="{{old('status_id')}}">
                                                            <option value="status_id" disabled selected>
                                                                Selecione o status
                                                            </option>
                                                            @foreach ($status as $statu )
                                                                    <option value="{{$statu->id}}">{{$statu->name}}</option>
                                                            @endforeach
                                                   </select>

                                                      </div>
                                                      <div class="col-sm">
                                                        <label >Nivel de acesso</label>
                                                        <select name="level_id" id="" class="form-control" value="{{old('level_id')}}">
                                                            <option value="" disabled selected>
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
                                                            <label >Insira a foto</label>
                                                            <input type="file" class="form-control" name="image" placeholder="insira a foto" value="{{old('image')}}">
                                                        </div>


                                                        <div class="col-sm">
                                                            <label >Telefone</label>
                                                            <input type="number" class="form-control" name="phone_number" placeholder="Escreva o celular"" value="{{('923851259')}}">
                                                        </div>
                                                        <div class="col-sm">
                                                            <label >Email</label>
                                                            <input type="email" class="form-control" name="email" placeholder="Escreva o celular"" value="{{('domingosmussumar@gmail.com')}}">
                                                        </div>
                                                        <div class="col-sm">
                                                            <label >Andar</label>
                                                            <select name="floor_id" id="" class="form-control" value="{{old('floor_id')}}">
                                                                <option value="" disabled selected>
                                                                    Selecione o andar
                                                                </option>
                                                                @foreach ($floors as $floor )
                                                                        <option value="{{$floor->id}}">{{$floor->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div>


                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm">
                                                            <label >Patente</label>
                                                            <select name="police_rank_id" id="" class="form-control" value="{{old('police_rank_id')}}">
                                                                <option value="" disabled selected>
                                                                    Selecione a patente
                                                                </option>
                                                                @foreach ($police_ranks as $police_rank )
                                                                        <option value="{{$police_rank->id}}">{{$police_rank->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div>

                                                        <div class="col-sm">
                                                            <label >Senha</label>
                                                            <input type="password" class="form-control" name="password" placeholder="Escreva a senha"" value="{{('923.eddy')}}">
                                                        </div>

                                                        <div class="col-sm">
                                                            <label > Repetir a Senha</label>
                                                            <input type="password" class="form-control" name="password_confirmation" placeholder="Escreva a senha"" value="{{('923.eddy')}}">
                                                        </div>

                                                    </div>

                                                    <div class="row">

                                                        <div class="col-sm">
                                                            <label >Direccao</label>
                                                            <select name="direction_id" id="" class="form-control" value="{{old('direction_id')}}">
                                                                <option value="" disabled selected>
                                                                    Selecione a direccao
                                                                </option>
                                                                @foreach ($directions as $direction )
                                                                        <option value="{{$direction->id}}">{{$direction->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div>
                                                        <div class="col-sm">
                                                            <label >Departamento</label>
                                                            <select name="department_id" id="" class="form-control" value="{{old('departments_id')}}">
                                                                <option value="" disabled selected>
                                                                    Selecione o departamento
                                                                </option>
                                                                @foreach ($departments as $department )
                                                                        <option value="{{$department->id}}">{{$department->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div>

                                                        <div class="col-sm">
                                                            <label >Seccao</label>
                                                            <select name="section_id" id="" class="form-control" value="{{old('section_id')}}">
                                                                <option value="" disabled selected>
                                                                    Selecione a seccao
                                                                </option>
                                                                @foreach ($sections as $section )
                                                                        <option value="{{$section->id}}">{{$section->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div>

                                                        <div class="col-sm">
                                                            <label >Grupo pertencente</label>
                                                            <select name="group_id" id="" class="form-control" value="{{old('group_id')}}">
                                                                <option value="" disabled selected>
                                                                    Selecione o grupo Area o qual pertence
                                                                </option>
                                                                @foreach ($groups as $group )
                                                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                                                @endforeach
                                                       </select>
                                                        </div>


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

              {{--







                --}}

        </div>





        <div class="">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                            <h4>Lista documentos</h4>

                    </div>
                </div>


                        <div>
                            <div>
                              <table class="table table-sm table-striped table-hover">

                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Nome</th>
                                      <th scope="col">Genero</th>
                                      <th scope="col">Data Nascimento</th>
                                     <th scope="col">Level</th>
                                     <th scope="col">image</th>

                                      <th scope="col">Telefone</th>
                                      <th scope="col">Grupo</th>
                                      <th scope="col">Patente</th>


                                      <th scope="col">Direccao</th>
                                       <th scope="col">Departamento</th>
                                       <th scope="col">Seccao</th>
                                      <th scope="col">Genero</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Acções</th>
                                    </tr>

                                  </thead>
                                  <tbody>

                                     @foreach($users as $user)
                                    <tr>
                                       <th scope="row$">{{$user->id}}</th>
                                       <td>{{$user->name}}</td>
                                       <td>{{$user->gender->name}}</td>
                                       <td>{{$user->birthday}}</td>
                                       <td>{{$user->level->name ??''}}</td>
                                      <td><img src="{{ asset('user')}}/{{$user->image}}" height="40px" width="60px"></td>
                                       <td>{{$user->phone_number}}</td>
                                      <td>{{$user->group->name ??''}}</td>

                                       <td>{{$user->police_rank->name}}</td>


                                       <td>{{$user->direction->name ??''}}</td>
                                       <td> {{$user->department->name ??''}} </td>
                                      <td>{{$user->section->name ??''}}</td>
                                       <td>{{$user->gender->name ?? ''}}</td>


                                       <td>

                                       <div class="mt-1">
                                         @if ($user->status->name == 'Activo')
                                        <span class="alert alert-success ">Activo</span>
                                        @elseif($user->status->name == 'Inactivo')
                                        <span class="alert alert-danger">Inactivo</span>

                                        @endif
                                       </div>
                                    </td>


                                       <td>

                                            <a href="#" data-toggle="modal" id="{{ $user->id }}" data-target=".bd-example-modal" onclick="userView(this.id)">
                                                <i class="fas fa-edit"></i>
                                            </a>


                                       </td>


                                       <td>

                                            <a href="{{-- {{route('user.delete', $user->id)}}  --}}"
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


{{-- modal edit --}}

<!-- Modal -->
<div class="modal fade bd-example-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>


@endsection

