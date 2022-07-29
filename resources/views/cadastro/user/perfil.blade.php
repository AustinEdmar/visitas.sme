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
                            

                            <select name="status_id" id="" class="form-control" value="{{old('floor_id')}}">
                                
                              <option hidden selected value="{{$users->status->id}}">{{$users->status->name }}</option>

                                @foreach ($status as $statu )
                                        <option value="{{$statu->id}}">{{$statu->name}}</option>
                                @endforeach
                           </select>

                          </div>
                          @endif
                          @if ($user->level->id != '4' && $user->level->id != '3')
                          <div class="col-sm">
                            <label class="text-white" >Nivel de Acesso</label>
                            
                            <select name="level_id" id="" class="form-control" value="{{old('floor_id')}}">
                                
                              <option hidden selected value="{{$users->level->id}}">{{$users->level->name }}</option>

                                @foreach ($levels as $level )
                                        <option value="{{$level->id}}">{{$level->name}}</option>
                                @endforeach
                           </select>
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
                                

                                <select name="floor_id" id="" class="form-control" value="{{old('floor_id')}}">
                                
                                  <option hidden selected value="{{$users->floor->id}}">{{$users->floor->name }}</option>
  
                                    @foreach ($floors as $floor )
                                            <option value="{{$floor->id}}">{{$floor->name}}</option>
                                    @endforeach
                               </select>


                            </div>
                            @endif


                        </div>

                        <div class="row">
                            @if ($user->level->id != '4' && $user->level->id != '3')

                           

                            <div class="col-sm">
                              <span>Patente</span>
                              <select name="police_rank_id" id="" class="form-control" value="{{old('police_rank_id')}}">
                                
                                <option hidden selected value="{{$users->police_rank->id}}">{{$users->police_rank->name}}</option>

                                  @foreach ($police_ranks as $police_rank )
                                          <option value="{{$police_rank->id}}">{{$police_rank->name}}</option>
                                  @endforeach
                         </select>
                          </div>

                            @endif

                            <div class="col-sm">
                                <label class="text-white" >Senha</label>
                                <input type="password" class="form-control" name="password" placeholder="Escreva a senha" autocomplete="off">
                            </div>

                            <div class="col-sm">
                                <label class="text-white" > Repetir a Senha</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Escreva a senha" >
                            </div>



                        </div>
                        @if ($user->level->id != '4' && $user->level->id != '3')

                        <div class="row">

                            <div class="col-sm">
                                <label class="text-white" >Pertence a area</label>
                                
                                
                                <select name="direction_id" id="" class="form-control" value="{{old('direction_id')}}">
                                
                                  <option hidden selected value="{{$users->direction->id}}">{{$users->direction->name }}</option>
  
                                    @foreach ($directions as $direction )
                                            <option value="{{$direction->id}}">{{$direction->name}}</option>
                                    @endforeach
                               </select>


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

