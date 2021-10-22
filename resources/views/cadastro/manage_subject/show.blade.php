@extends('layouts.app')

@section('content')

<div class="ml-2 mr-2 ">
    <div class="">
        <div class="">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
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
                </ol>
              </nav>

              <div class="container">



                        <div class="card text-center">
                            <div class="card-header">
                              Gerenciar as visitas
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">Tens visita por aprovar ou recusar</h5>
                              @foreach ($manage_subjects as $manage_subject )
                              <div class="row">
                                <div class="col">
                                    <label for="">Motivos</label><br>
                                    {{$manage_subject->motive}}

                                  </div>
                                  <div class="col">
                                    <label for="" class="d-inline-block">Data de entrada</label><br>
                                    {{$manage_subject->created_at->format('M d Y')}}
                                    {{Carbon\Carbon::parse($manage_subject->created_at)->format('D, d F Y')}}



                                  </div>

                                  <div class="col">
                                      <label >nome do utente</label><br>
                                      {{$manage_subject->visitor->name}}
                                  </div>
                                 {{--  <div class="col">
                                      <label >Funcionario a recebers</label><br>
                                      {{Auth::user() == $manage_subject->user->name}}

                                  </div> --}}

                                  <div class="col">
                                    <label>Area</label><br>
                                    {{-- {{$manage_subject->department->name}} --}}
                                </div>

                              </div>
                              <hr>
                            <label class="text-capitalize font-weight-bold">Andamento do pedido</label><br>

                            @if ($manage_subject->progress->name == 'Pendente')
                            <span class="form-control bg-warning text-bold text-white"><span>🤔</span>
                                Estado:{{$manage_subject->progress->name}}
                            </span>
                                @elseif($manage_subject->progress->name =='Aprovado')
                             <span class="form-control bg-success text-bold text-white"><span class="text-white">😎</span>
                                Estado:{{$manage_subject->progress->name}}
                            </span>
                                @else()
                                <span class="form-control bg-danger text-bold text-white"><span>😪</span>
                                    Estado:{{$manage_subject->progress->name}}
                                    </span>
                            @endif

                            <form action="{{route('manage_subject.update', $manage_subjects->id )}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                            <p>Deseja aprova-lo</p>
                            <select name="progress_id" id="" class="form-control" value="{{old('progres_id')}}"   >

                                @foreach(App\Models\Progress::get() as $progress)

                                <option value="{{$progress->id}}">{{$progress->name}}</option>
                            @endforeach

                         </select>

                              @endforeach



                            </div>
                            <div>
                                {{-- <a href="{{route('manage_subject.update', $manage_subject->id) ?? ''}}"
                                    onclick="return confirm('Tens a certeza que pretendes ')"
                                    ><i class="fas fa-save btn btn-success"></i></a> --}}
                                 <button type="submit" class="btn btn-primary">Salvar</button>
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
