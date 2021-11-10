@extends('layouts.app')

@section('content')

<div class="ml-2 mr-2 ">
    <div class="">
        <div class="">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/area')}}" class="btn btn-success"> Voltar a Area</a></li>
                    @if (auth()->user()->level->permission->id  != '3')
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
                    <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/create')}}">motivo</a></li>
                    <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/show')}}">motivoAdminAprove</a></li>
                    <li class="breadcrumb-item active" aria-current="page"></li>


                    @endif

                </ol>
              </nav>

              <div class="container">


                    <form action="{{route('area.update', $manage_subjects->id )}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                     @method('PUT')
                        <div class="card text-center">
                            <div class="card-header">
                              Gerenciar as visitas
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">Dados da Visita do Utente</h5>

                              <div class="row">
                                <div class="col">
                                    <label for="">Motivo</label><br>
                                    {{$manage_subjects->motive}}

                                  </div>
                                  <div class="col">
                                    <label for="" class="d-inline-block">Data de Entrada</label><br>

                                    <td class="text-white">{{$manage_subjects->created_at->diffForHumans() ??''}}</td>

                                  </div>


                                  <div class="col">
                                      <label >Nome do Visitante</label><br>
                                   {{$manage_subjects->visitor->name}}
                                  </div>
                                  <div class="col">
                                      <label >Area a Visitar</label><br>
                                      {{$manage_subjects->user->group->name ??''}}
                                  </div>

                                 <div class="col">
                                    <label>Operador</label><br>
                                    {{$manage_subjects->by ??''}}


                                  </div>

                              </div>
                              <hr>

                            <label class="text-capitalize font-weight-bold">Andamento do pedido</label><br>

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

                            <form action="{{route('area.update',[$manage_subjects->id])}}" method="POST">
                                @csrf
                                @method('PATCH')
                            <p>Deseja aprova-lo</p>
                            <select name="progress_id" id="" class="form-control" value="{{old('progres_id')}}"   >

                                @foreach(App\Progress::get() as $progress)

                                <option value="{{$progress->id}}">{{$progress->name}}</option>
                            @endforeach

                         </select>



                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary mb-2">Alterar</button>
                            </div>
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
