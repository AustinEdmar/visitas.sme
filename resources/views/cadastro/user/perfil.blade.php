@extends('layouts.app')

@section('content')
<div class="container mt-5 ">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">

            @include('cadastro.partials.ol_partials')

          </div>

          <div class="col md-8">
            @if ($user = Auth::user())
            <form action=" {{route('user.update', [$users->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
               <div class="card-header ">
                <h1 class="text-white">Meu Perfil</h1>

                <div class="card-body bg-primary">
                    <div class="">
                        <div class="row">
                          <div class="col-sm">
                            <label class="text-white"> Editar Usuário</label>
                            <input type="text" class="form-control " name="name" placeholder="Escreva o nome" value="{{$users->name}}" autocomplete="off" readonly>

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>
                          @if ($user->level->id != '4' && $user->level->id != '3')
                          <div class="col-sm-2">

                            <label class="text-white" >Sexo</label>

                            <div>



                                    <input name="gender_id"  class="form-control" value="{{$users->gender->name}}" readonly>

                                 </input>



                            </div>
                          </div>
                          @endif
                          <div class="col-sm">
                            <label class="text-white" >Data de Nascimento</label>
                            <input type="text" class="form-control" name="birthday" placeholder="Escreva a data de aniversario" value="{{$users->birthday}}" inputed>

                          </div>
                          @if ($user->level->id != '4' && $user->level->id != '3')
                          <div class="col-sm">
                            <label class="text-white" >Nivel Status</label>
                            <input name="status_id" id="" class="form-control" value="{{$users->status->name}}" readonly>

                         </input>

                          </div>
                          @endif
                          @if ($user->level->id != '4' && $user->level->id != '3')
                          <div class="col-sm">
                            <label class="text-white" >Nivel de Acesso</label>
                            <input name="level_id" id="" class="form-control" value="{{$users->level->name}}" readonly>

                       </input>
                        </div>
                        @endif

                        </div>
                        <div class="row">
                            <div class="col-sm">
                                <label class="text-white" >Insira a Foto</label>
                                <input type="file" class="form-control" name="image" placeholder="insira a foto" value="{{old('image')}}" readonly>
                            </div>


                            <div class="col-sm">
                                <label class="text-white" >Telefone</label>
                                <input type="number" class="form-control" name="phone_number" placeholder="Escreva o celular"" value="{{$users->phone_number}}" readonly>
                            </div>
                            @if ($user->level->id != '4' && $user->level->id != '3')
                            <div class="col-sm">
                                <label class="text-white" >Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Escreva o celular"" value="{{$users->email}}" readonly>
                            </div>
                            @endif
                            @if ($user->level->id != '4' && $user->level->id != '3')
                            <div class="col-sm">
                                <label class="text-white" >Andar</label>
                                <input name="floor_id" id="" class="form-control" value="{{$users->floor->name}}" readonly>

                           </input>
                            </div>
                            @endif


                        </div>

                        <div class="row">
                            @if ($user->level->id != '4' && $user->level->id != '3')

                            <div class="col-sm">
                                <label class="text-white" >Patente</label>
                                <input name="police_rank_id" id="" class="form-control" value="{{$users->police_rank->name}}" readonly>

                           </input>
                            </div>

                            @endif

                            <div class="col-sm">
                                <label class="text-white" >Senha</label>
                                <input type="password" class="form-control" name="password" placeholder="Escreva a senha"" value="{{('923.eddy')}}">
                            </div>

                            <div class="col-sm">
                                <label class="text-white" > Repetir a Senha</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Escreva a senha"" value="{{('923.eddy')}}">
                            </div>



                        </div>
                        @if ($user->level->id != '4' && $user->level->id != '3')

                        <div class="row">

                            <div class="col-sm">
                                <label class="text-white" >Direcção</label>
                                <input class="form-control"  value="{{$users->direction->name ??''}}">

                           </input>
                            </div>
                            <div class="col-sm">
                                <label class="text-white" >Departamento</label>
                                <input name="department_id" id="" class="form-control" value="{{$users->department->name ??''}}" readonly>

                           </input>
                            </div>
                            {{-- @if ($user->)

                            @endif --}}


                            <div class="col-sm">
                                <label class="text-white" >Secção</label>
                                <input name="section_id" id="" class="form-control" value="{{$users->section->name ?? ''}}" readonly>

                           </input>
                            </div>

                            <div class="col-sm">
                                <label class="text-white" > Grupo Pertencente</label>
                                <input name="group_id" id="" class="form-control" value="{{$users->group->name}}" readonly>

                           </input>
                            </div>


                        </div>
                        @endif
                      </div>



                 </div>
                </div>




                <button type="submit" class="btn btn-warning " style="width: 100%; margin-top:5px">
                    Salvar
                </button>
            </div>



              </form>
              @endif

            </div>


          </div>

        </div>
      </div>

@endsection

