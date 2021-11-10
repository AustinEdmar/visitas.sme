@extends('layouts.app')

@section('content')
<div class="container mt-5 ">

    <div class="container">
        <div class="row">
          <div class="col-sm-4">

            @include('cadastro.partials.ol_partials')

          </div>

          <div class="col md-8">
            <form action=" {{route('user.update', [$users->id])}}" method="POST">
                @csrf
                @method('PUT')
               <div class="card-header ">
                <h1 class="text-white">Editar Usuario</h1>

            </div>
            <div class="card-body bg-primary">
                <div class="">
                    <div class="row">
                      <div class="col-sm">
                        <label class="text-white"> Editar Usuario</label>
                        <input type="text" class="form-control " name="name" placeholder="Escreva o nome" value="{{$users->name}}" autocomplete="off">

                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror

                      </div>
                      <div class="col-sm-2">
                        <label class="text-white" >Sexo</label>

                        <div>



                                <select name="gender_id"  class="form-control" value="{{$users->gender->name}}">
                                    <option value="{{$users->gender->id}}" {{-- disabled selected --}}>
                                        {{$users->gender->name}}
                                    </option>

                                      @foreach ($genders as $gender )
                                            <option value="{{$gender->id}}">{{$gender->name}}</option>
                                    @endforeach
                             </select>



                        </div>
                      </div>
                      <div class="col-sm">
                        <label class="text-white" >Data de Nascimento</label>
                        <input type="text" class="form-control" name="birthday" placeholder="Escreva a data de aniversario" value="{{$users->birthday}}" selected>

                      </div>
                      <div class="col-sm">
                        <label class="text-white" >Nivel Status</label>
                        <select name="status_id" id="" class="form-control" value="{{$users->status->id}}">
                            <option value="{{$users->status->id}}" {{-- disabled selected --}}>
                                {{$users->status->name}}
                            </option>

                              @foreach ($status as $statu )
                                    <option value="{{$statu->id}}">{{$statu->name}}</option>
                            @endforeach
                     </select>

                      </div>
                      <div class="col-sm">
                        <label class="text-white" >Nivel de Acesso</label>
                        <select name="level_id" id="" class="form-control" value="{{$users->level->name}}">
                            <option value="{{$users->level->id}}" {{-- disabled selected --}}>
                                {{$users->level->name}}
                            </option>
                             @foreach ($levels as $level )
                                    <option value="{{$level->id}}">{{$level->name}}</option>
                            @endforeach
                   </select>
                    </div>

                    </div>
                    <div class="row">
                        <div class="col-sm">
                            <label class="text-white" >Insira a Foto</label>
                            <input type="file" class="form-control" name="image" placeholder="insira a foto" value="{{old('image')}}">
                        </div>


                        <div class="col-sm">
                            <label class="text-white" >Telefone</label>
                            <input type="number" class="form-control" name="phone_number" placeholder="Escreva o celular"" value="{{$users->phone_number}}">
                        </div>
                        <div class="col-sm">
                            <label class="text-white" >Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Escreva o celular"" value="{{$users->email}}">
                        </div>
                        <div class="col-sm">
                            <label class="text-white" >Andar</label>
                            <select name="floor_id" id="" class="form-control" value="{{$users->floor->name}}">
                                <option value="{{$users->floor_id}}" {{-- disabled selected --}}>
                                    {{$users->floor->name}}
                                </option>
                                 @foreach ($floors as $floor )
                                        <option value="{{$floor->id}}">{{$floor->name}}</option>
                                @endforeach
                       </select>
                        </div>


                    </div>

                    <div class="row">
                        <div class="col-sm">
                            <label class="text-white" >Patente</label>
                            <select name="police_rank_id" id="" class="form-control" value="{{$users->police_rank->name}}">
                                <option value="{{$users->police_rank->id}}" {{-- disabled selected --}}>
                                    {{$users->police_rank->name}}
                                </option>
                                 @foreach ($police_ranks as $police_rank )
                                        <option value="{{$police_rank->id}}">{{$police_rank->name}}</option>
                                @endforeach
                       </select>
                        </div>

                        <div class="col-sm">
                            <label class="text-white" >Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="Escreva a senha" autocomplete="off">
                        </div>

                        <div class="col-sm">
                            <label class="text-white" > Repetir a Senha</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Escreva a senha" autocomplete="off">
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-sm">
                            <label class="text-white" >Direcção</label>
                            <select name="direction_id" id="" class="form-control" >

                                <option value="{{$users->direction->id ??''}}" >
                                    {{$users->direction->name ??''}}
                                </option>

                                @foreach ($directions as $direction )
                                        <option value="{{$direction->id ??''}}">{{$direction->name ??''}}</option>
                                @endforeach
                       </select>
                        </div>
                        <div class="col-sm">
                            <label class="text-white" >Departamento</label>
                            <select name="department_id" id="" class="form-control" >
                                <option value="{{$users->department->id ??''}}" {{-- disabled selected --}}>
                                    {{$users->department->name ??''}}
                                </option>
                                @foreach ($departments as $department )
                                        <option value="{{$department->id ??''}}">{{$department->name ??''}}</option>
                                @endforeach
                       </select>
                        </div>

                        <div class="col-sm">
                            <label class="text-white" >Secção</label>
                            <select name="section_id" id="" class="form-control" value="{{old('section_id')}}">
                                <option value="{{$users->section->id ??''}}" {{-- disabled selected --}}>
                                    {{$users->section->name ??''}}
                                </option>
                                @foreach ($sections as $section )
                                        <option value="{{$section->id ??''}}">{{$section->name ??''}}</option>
                                @endforeach
                       </select>
                        </div>

                        <div class="col-sm">
                            <label class="text-white" > Grupo Pertencente</label>
                            <select name="group_id" id="" class="form-control" value="{{old('group_id')}}">
                                <option value="{{$users->group->id}}" {{-- disabled selected --}}>
                                    {{$users->group->name}}
                                </option>
                                @foreach ($groups as $group )
                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                @endforeach
                       </select>
                        </div>


                    </div>
                  </div>



             </div>
              <button type="submit" class="btn btn-warning" style="width: 100%; margin-top:5px">Salvar</button>

            </div>


              </form>
          </div>


          </div>

        </div>
      </div>

@endsection

