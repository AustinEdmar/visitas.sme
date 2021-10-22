{{-- @extends('layouts.app')

@section('content') --}}


{{-- @endsection --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>

    {{-- <meta name ="csrf-token" content="{{csrf_token}}"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('jquery-ui.min.css')}}">
    <script type="text/javascript" src="{{asset('jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('jquery-ui.js')}}"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>


    <title>Document</title>
</head>
<body style="background-image: url('{{ asset('assets/img/fundo.svg')}}'); background-size: cover;background-repeat: no-repeat;">
<div class=" d-flex justify-content-end">
    <div class="d-flex justify-content-end mr-5 mt-3">
        <label class="text-white bold mr-3">Bemvindo de volta, <span class="">{{ Auth::user()->name }}</span></label>
        <a href="{{ route('logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-power-off"><span> Sair</span></i>
        </a>
    </div>
</div>
    <div class="m-4 ">
        <div class="">
            <div class="bg-primary">
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

                 <div class="card-header  ">


                            <h6 class="text-white">Cadastrar Assunto</h6>
                     <div class=" form-group ">

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




                            <form action="{{route('manage_subject.store')}}"   method="POST" enctype="multipart/form-data" >
                                @csrf


                                <div class="row ">
                                    <div class="col-sm mt-2" >
                                        <label class="text-white bg-warning"> Primeiro Busque o visitante</label>

                                        <input type="text" id="visitor_search"  placeholder="Ache o Visitante presente" class="form-control">
                                    </div>


                                    <div class="col-sm">
                                        <label class="text-white"> Visitante</label>
                                         <input type="text" id="visitorname"  placeholder="Ache o Visitante presente" class="form-control" readonly>
                                    </div>

                                    <div class="col-sm">
                                        <label class="text-white"> Visitante ID</label>
                                         <input type="text" id="visitorid" name="visitor_id" placeholder="Ache o Visitante presente" class="form-control" readonly @error('visitor_id') is-invalid @enderror>
                                         @error('visitor_id')
                                         <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                         </span>
                                         @enderror
                                    </div>

                                </div>

                            <div class="row">

                                <div class="col-sm mt-2">
                                    <label class="text-white bg-warning" >Segundo Busque o Funcionario a ser contactado </label>
                                    <input type="text" id="employee_search" class="form-control " placeholder="Buscar o nome do funcionario" style="border:red ">
                                    {{--1 input do selecionado --}}
                                </div>



                                <div class="col-sm">
                                    <label class="text-white">Funcionario a contactar</label>
                                    <input type="text" id="employeename"  placeholder="Ache o Visitante presente" class="form-control" readonly >
                                </div>

                                <div class="col-sm">
                                    <label class="text-white">ID Funcionario</label>
                                    <input type="text" id="employeeid" name="user_id"  class="form-control" readonly @error('user_id') is-invalid @enderror>
                                    @error('user_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>



                            </div>



                            <div class="row">


                                <div class="col-sm">
                                  <label class="text-white">Itens deixados</label>
                                  <input type="text" class="form-control " name="object_left" placeholder="Escreva o nome" value="{{old('object_left')}}" autocomplete="off" @error('object_left') is-invalid @enderror>
                                  @error('object_left')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                  @enderror


                                </div>


                                  <div class="col-sm">
                                      <label class="text-white"> Escolha o Numero de PVC</label>
                                      <select name="pvc_id" id="" class="form-control" value="{{old('pvcs_id')}}" @error('pvc_id') is-invalid @enderror>
                                        @error('pvc_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                          <option value="" disabled selected>
                                              Escolha o numero
                                          </option>
                                          @if(isset($pvcs))
                                          @foreach ($pvcs as $pvc )
                                                  <option value="{{$pvc->id}}">{{$pvc->number_pvc}}</option>
                                          @endforeach
                                          @endif
                                    </select>


                                </div>
                               <div class="col-sm">
                                  <label class="text-white">Andamento do pedido</label>
                                  <select name="progress_id" id="" class="form-control" value="{{old('progres_id')}}"   @error('progress_id') is-invalid @enderror>
                                    @error('progress_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                      @foreach(App\Progress::where('name','=','Pendente')->get() as $progress)

                                          <option value="{{$progress->id}}">{{$progress->name}}</option>
                                      @endforeach


                             </select>
                              </div>

                              </div>


                            <label class="text-white">Descreva o motivo da visita</label>
                            <div class="">

                                <textarea  name ="motive"  class="form-control summernote" id="summernote" @error('motive') is-invalid @enderror>
                                    @error('motive')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </textarea>
                            </div>


                          </div>



                     </div>

                     <div class="row">
                        <div class="d-flex justify-content-center">
                            <div class="container align-content-center ">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Cadastrar') }}
                                </button>
                            </div>
                         </div>
                     </div>
                 </div>
                </form>
            </div>
            </div>
            </div>

            <div class="m-4">

                <div class="mt-5">
                    <div>
                      <table class="table table-sm-dark table-striped table-hover">

                          <thead>
                            <tr>
                              <th scope="col" class="text-white">ID</th>
                              <th scope="col" class="text-white">Objecto deixado</th>

                              <th scope="col" class="text-white">Motivo</th>
                              <th scope="col" class="text-white">Pvc</th>



                              <th scope="col" class="text-white">Utente</th>
                              <th scope="col" class="text-white">Nacionalidade</th>
                              <th scope="col" class="text-white">Funcionario a contactar</th>
                              <th scope="col" class="text-white">Operador</th>


                              <th scope="col" class="text-white" class="text-white">Hora entrada</th>
                              <th scope="col" class="text-white" class="text-white">Hora saida</th>

                                <th scope="col" class="text-white">andamento</th>
                              <th scope="col" class="text-white ml-5">Acções</th>
                            </tr>

                          </thead>
                          <tbody>



                             @foreach($manage_subjects as $key=> $manage_subject)
                            <tr>
                               <th scope="row$" class="text-white">{{$key+1}}</th>

                               <td class="text-white">{{$manage_subject->object_left ??''}}</td>

                               <td class="text-white">{{ Illuminate\Support\Str::of($manage_subject->motive ??'')->words(3)}}</td>
                               <td class="text-white">{{ $manage_subject->pvc->number_pvc ??''}}</td>


                               <td class="text-white">{{$manage_subject->visitor->name ??''}}</td>

                               <td class="text-white">{{$manage_subject->visitor->nacionality->name ??''}}</td>

                               <td class="text-white">{{$manage_subject->user->name ??''}}</td>
                               <td class="text-white">{{$manage_subject->by ??''}}</td>



                               <td class="text-white">{{$manage_subject->created_at->diffForHumans() ??''}}</td>
                               @if ($manage_subject->created_at != $manage_subject->updated_at)
                               <td class="text-white">{{$manage_subject->updated_at->diffForHumans() ??''}}</td>
                               @else
                               <td class="text-white "><span class="bg-danger">Visitante sem saida</span></td>

                               @endif




                                <td>

                                <div class="mt-1">
                                    @if ($manage_subject->progress->name == 'Aprovado')
                                   <span class="alert alert-success ">Activo</span>
                                   @elseif($manage_subject->progress->name == 'Pendente')
                                   <span class="alert alert-warning">Pendente</span>

                                   @elseif($manage_subject->progress->name == 'Recusado')
                                   <span class="alert alert-danger">Recusado</span>
                                   @endif
                                  </div>
                               </td>




                               <td>
                                    <a href="{{route('manage_subject.edit', $manage_subject->id)}}" ><i class="fa fa-eye btn btn-warning"></i></a>
                               </td>


                               <td>

                                    <a href="{{route('manage_subject.delete', $manage_subject->id) ?? ''}}"
                                        onclick="return confirm('Tens a certeza que pretendes apagar')"
                                        ><i class="fas fa-trash btn btn-danger"></i></a>
                                 </td>
                            </tr>
                            @endforeach

                          </tbody>

                        </table>

                    </div classe="">

                      {!! $manage_subjects->links() !!}



                </div>


            </div>

            </div>






    <script type="text/javascript">
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(document).ready(function(){
                $('#employee_search').autocomplete({
                    source:function(request,respon){
                        $.ajax({
                            url: "{{route('manage.searchUsers')}}",
                            type: "post",
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success:function(data){
                                respon(data);

                            }
                        });
                    },
                    select: function(event,ui){
                        $('#employee_search').val(ui.item.label);
                        $('#employeeid').val(ui.item.value);
                         $('#employeename').val(ui.item.name);
                        return false;

                    }
                });
            });
        </script>

         <script type="text/javascript">
         var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $(document).ready(function(){
                $('#visitor_search').autocomplete({
                    source:function(request,response){
                        $.ajax({
                            url: "{{route('visitor.search')}}",
                            type: "post",
                            dataType: "json",
                            data: {
                                _token: CSRF_TOKEN,
                                search: request.term
                            },
                            success:function(data){
                                response(data);

                            }
                        });
                    },
                    select: function(event,ui){
                        $('#visitor_search').val(ui.item.label);
                        $('#visitorid').val(ui.item.value);
                        $('#visitorname').val(ui.item.name);
                         /* $('#visitorname').val(ui.item.name);  */
                        return false;

                    }
                });
            });

        </script>



<script type="text/javascript">
    $('#summernote').summernote({

        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],

          ['view', ['fullscreen']]
        ]
    });
</script>
</body>
</html>



