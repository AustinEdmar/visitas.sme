@php
    header("refresh: 10");

    /* echo date('H:i:s Y-m-d'); */

@endphp

@extends('layouts.app')

@section('content')

<div class="container">
    <nav aria-label="breadcrumb">

        @include('cadastro.partials.ol_partials')
      </nav>


      <div class="ml-4">
        <span class="text-white assuntoletras"> Total de Visitas : <span class="assuntoletras text-white"">
            {{$manage_subjects->count()}}
            </span>
         </span><br>
         <span class="text-white  text-bold">Em:{{auth()->user()->group->name}}</span>

     </div>

    {{-- </div> --}}

    <div class="">
        <div>
          <table class="table table-sm-dark table-striped table-hover">

              <thead>
                <tr>
                  <th scope="col" class="text-white">ID</th>
                  <th scope="col" class="text-white">Objecto deixado</th>

                  <th scope="col" class="text-white">Motivo</th>
                  {{-- <th scope="col" class="text-white">Pvc</th> --}}



                  <th scope="col" class="text-white">Utente</th>
                  <th scope="col" class="text-white">Funcionario a contactar</th>


                  <th scope="col" class="text-white" class="text-white">Hora entrada</th>

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
                   {{-- <td class="text-white">{{ $manage_subject->pcv->number_pvc ??''}}</td> --}}


                   <td class="text-white">{{$manage_subject->visitors_name ??''}}</td>

                   <td class="text-white">{{$manage_subject->users_name ??''}}</td>



                   <td class="text-white">{{ \Carbon\Carbon::parse($manage_subject->created_at)->diffForHumans() }}</td>


                    <td>

                    <div class="mt-1">
                        @if ($manage_subject->progress_name == 'Aprovado')
                       <span class="alert alert-success ">Activo</span>
                       @elseif($manage_subject->progress_name == 'Pendente')
                       <span class="alert alert-warning">Pendente</span>

                       @elseif($manage_subject->progress_name == 'Recusado')
                       <span class="alert alert-danger">Recusado</span>
                       @endif
                      </div>
                   </td>




                   <td>
                        <a href="{{route('area.edit', $manage_subject->id)}}" ><i class="fa fa-eye btn btn-warning"></i></a>
                   </td>


                  {{--  <td>

                        <a href="{{route('manage_subject.delete', $manage_subject->id) ?? ''}}"
                            onclick="return confirm('Tens a certeza que pretendes apagar')"
                            ><i class="fas fa-trash btn btn-danger"></i></a>
                     </td> --}}
                </tr>
                @endforeach

              </tbody>

            </table>

        </div classe="">

     {!! $manage_subjects->links() !!}



    </div>


</div>


</div>

@endsection
