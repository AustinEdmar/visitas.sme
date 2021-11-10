@extends('layouts.app')

@section('content')

<div class="ml-2 mr-2 ">
    <div class="">
        <div class="">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/cadastro/visitor/create')}}" >Voltar A Visitas</a></li>


                  <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/create')}}" >Cadastrar Assunto</a></li>

                @if ((auth()->user()->level->permission->id  != '4'))




                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/nacionality/create')}}">Nacionalidade</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/gender/create')}}">genero</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/nacionality/create')}}">Nacionalidade</a></li>
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


                  <li class="breadcrumb-item active" aria-current="page"></li>
                  @endif

                </ol>
              </nav>

              <div class="container">


                    <form action="{{route('manage_subject.update', $manage_subjects->id )}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')

                        <div class="card text-center">
                            <div class="card-header">
                              Gerenciar as visitas
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">DADOS DA VISITA DO UTENTE</h5>

                              <div class="row">
                                <div class="col">
                                    <label for="">Motivo</label><br>
                                    {{$manage_subjects->motive}}

                                  </div>
                                  <div class="col">
                                    <label for="" class="d-inline-block">Data de Entrada</label><br>
                                    {{$manage_subjects->created_at}}

                                  </div>

                                  <div class="col">
                                      <label >Nome do Utente</label><br>
                                   {{$manage_subjects->visitor->name}}
                                  </div>
                                  <div class="col">
                                      <label >Area Visitada</label><br>
                                        {{$manage_subjects->user->group->name ??''}}
                                       

                                  </div>
                                  <div class="col">
                                      <label >Extensão da Area</label><br>
                                       {{$manage_subjects->user->direction->extention ??''}}
                                       {{$manage_subjects->user->department->extention ??''}}
                                       {{$manage_subjects->user->section->extention ??''}}

                                  </div>

                                 <div class="col">
                                    <label>Operador</label><br>

                                            {{$manage_subjects->by}}
                                  </div>

                              </div>
                              <hr>

                            <label class="text-capitalize font-weight-bold">Andamento do Pedido</label><br>

                            @if ($manage_subjects->progress->name == 'Pendente')
                            <span class="form-control bg-warning text-bold text-white"><span>🤔</span>
                                Estado:{{$manage_subjects->progress->name}}
                            </span>
                                @elseif($manage_subjects->progress->name =='Aprovado')
                             <span class="form-control bg-success text-bold text-white"><span class="text-white">😎</span>
                                Estado:{{$manage_subjects->progress->name}}
                            </span>
                                @else()
                                <span class="form-control bg-danger text-bold text-white"><span>😪</span>
                                    Estado:{{$manage_subjects->progress->name}}
                                    </span>
                            @endif

                            <form action="{{route('manage_subject.update',[$manage_subjects->id])}}" method="POST">
                                @csrf
                                @method('PATCH')


                            <p>Deseja Aprova-lo</p>
                            @if(Auth::user()->level->name == 'superadmin'|| Auth::user()->level->name == 'useradmin')


                            <select name="progress_id" id="" class="form-control" value="{{old('progres_id')}}"   >

                                @foreach(App\Progress::get() as $progress)

                                <option value="{{$progress->id}}">{{$progress->name}}</option>
                            @endforeach

                         </select>




                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                            @elseif (Auth::user()->level->name != 'superadmin'|| Auth::user()->level->name != 'useradmin')
                                <h4>Ola {{ Auth::user()->name }} não poderá aprovar, solicite a area para aprovar</h4>
                            @endif




                            <div class="card-footer text-muted">
                              Caso tenha duvidas contacte ao seu suporte
                            </div>
                          </div>
                    </form>


              </div>




            </div>
        </div>
    </div>


@endsection
