{{--  @php
    header("refresh: 60");
@endphp --}}

@extends('layouts.app')

@section('content')

<div class="container mt-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{url('/cadastro/nacionality/create')}}">Nacionalidade</a></li>
          <li class="breadcrumb-item"><a href="{{url('/cadastro/gender/create')}}">genero</a></li>
          <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/create')}}">Motivo</a></li>
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
          <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/create')}}">motive</a></li>
          <li class="breadcrumb-item"><a href="{{url('/cadastro/permissions/create')}}">permissions</a></li>
          <li class="breadcrumb-item"><a href="{{url('/relatorio')}}">relatorio</a></li>
          <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
      </nav>


      <div class="d-flex justify-content-end">
          <form action="" method="get">
          <div style="margin-right:8rem; margin-bottom: 2rem; ">
             <select onchange="this.form.submit()" name="dias" id="" style="border-radius:5px; padding:5px;">
                 <option selected disabled>
                    @if ($interval == "30")
                    <span>Ultimos 30 dias </span>
                    @endif
                    @if ($interval == "60")
                    <span>Ultimos 2 meses </span>
                    @endif
                    @if ($interval == "90")
                    <span>Ultimos 3 meses </span>
                    @endif
                    @if ($interval == "120")
                    <span>Ultimos 6 meses </span>
                    @endif

                 </option>
                 <option {{-- {{$dateIntervals==30 ?'selected="selected"':''}} --}} value="30">Ultimos 30 dias</option>

                 <option {{-- {{$dateIntervals==60 ?'selected="selected"':''}} --}} value="60">Ultimos 2 meses</option>
                 <option {{-- {{$dateIntervals==90 ?'selected="selected"':''}} --}} value="90">Ultimos 3 meses</option>
                 <option {{-- {{$dateIntervals==120 ?'selected="selected"':''}} --}} value="120">Ultimos 6 meses</option>
             </select>


          </div>

        </form>

      </div>




  <div class="row justify-content-center">



         <div class="col-md-3">
            <div class="small-box  cardfixe">
                <div class="inner">
                    <span class="dash mt-5 ml-2">Visitas</span>
                    <div class="icon d-inline olho ">

                        <i class="far fa-fw fa-eye"></i>
                    </div>
                    <div class="ml-4">

                        @if ($interval == "30")
                         <span>Visitas a 1 meses :  <span class="assuntoletras">{{$dateIntervals->count()}}</span></span>
                         @endif

                         @if ($interval == "60")
                        <span>Visitas a 2 meses : <span class="assuntoletras">{{$dateIntervals->count()}}</span></span>
                         @endif

                         @if ($interval == "90")
                        <span>Visitas a 3 meses : <span class="assuntoletras">{{$dateIntervals->count()}}</span></span>
                         @endif
                         @if ($interval == "120")
                        <span>Visitas a 6 meses : <span class="assuntoletras">{{$dateIntervals->count()}}</span></span>
                         @endif

                           </span>
                        </span>
                    </div>
                </div>

            </div>
        </div>


        <div class="col-md-3">
            <div class="small-box  cardfixe">
                <div class="inner">
                    <span class="dash mt-5 ml-3">Visitantes</span>
                    <div class="icon d-inline olho ">

                        <i class="far fa-fw fa-eye"></i>
                    </div>
                    <div class="ml-4">
                        <span> Total de Visitantes <span class="assuntoletras">
                            {{$visitors}}
                               </span>
                            </span>



                    </div>
                </div>

            </div>
        </div>



        <div class="col-md-3">
            <div class="small-box  cardfixe">
                <div class="inner">
                    <span class="dash mt-5 ml-3">Funcionarios</span>
                    <div class="icon d-inline olho ">

                        <i class="far fa-fw fa-eye"></i>
                    </div>
                    <div class="ml-4">
                       <span> Total de Funcionarios <span class="assuntoletras">
                        {{$users}}
                           </span>
                        </span>
                    </div>
                </div>

            </div>
        </div>




    </div>





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



                 @foreach($dateIntervals as $key=> $dateInterval)
                <tr>
                   <th scope="row$" class="text-white">{{$key+1}}</th>

                   <td class="text-white">{{$dateInterval->object_left ??''}}</td>

                   <td class="text-white">{{ Illuminate\Support\Str::of($dateInterval->motive ??'')->words(3)}}</td>
                   <td class="text-white">{{ $dateInterval->pvc->number_pvc ??''}}</td>


                   <td class="text-white">{{$dateInterval->visitor->name ??''}}</td>

                   <td class="text-white">{{$dateInterval->visitor->nacionality->name ??''}}</td>

                   <td class="text-white">{{$dateInterval->user->name ??''}}</td>
                   <td class="text-white">{{$dateInterval->by ??''}}</td>



                   <td class="text-white">{{$dateInterval->created_at->diffForHumans() ??''}}</td>
                   @if ($dateInterval->created_at != $dateInterval->updated_at)
                   <td class="text-white">{{$dateInterval->updated_at->diffForHumans() ??''}}</td>
                   @else
                   <td class="text-white "><span class="bg-danger">Visitante sem saida</span></td>

                   @endif




                    <td>

                    <div class="mt-1">
                        @if ($dateInterval->progress->name == 'Aprovado')
                       <span class="alert alert-success ">Activo</span>
                       @elseif($dateInterval->progress->name == 'Pendente')
                       <span class="alert alert-warning">Pendente</span>

                       @elseif($dateInterval->progress->name == 'Recusado')
                       <span class="alert alert-danger">Recusado</span>
                       @endif
                      </div>
                   </td>




                   <td>
                        <a href="{{route('manage_subject.edit', $dateInterval->id)}}" ><i class="fa fa-eye btn btn-warning"></i></a>
                   </td>


                   <td>

                        <a href="{{route('manage_subject.delete', $dateInterval->id) ?? ''}}"
                            onclick="return confirm('Tens a certeza que pretendes apagar')"
                            ><i class="fas fa-trash btn btn-danger"></i></a>
                     </td>
                </tr>
                @endforeach

              </tbody>

            </table>

        </div classe="">

          {!! $dateIntervals->links() !!}



    </div>


</div>


</div>






@endsection
