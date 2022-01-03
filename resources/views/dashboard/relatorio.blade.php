@extends('layouts.app')

{{-- @php
header("refresh: 80");
@endphp --}}

@section('content')

<div class="container">
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
          <li class="breadcrumb-item"><a href="{{url('/cadastro/permissions/create')}}">permissions</a></li>
          <li class="breadcrumb-item"><a href="{{url('/relatorio')}}">relatorio</a></li>
          <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
      </nav>


      <div class="mt-5">
          @if($errors->any())

<div class="alert alert-danger" role="alert">
    {{$errors->first()}}
  </div>
@endif

           <div class="row">

               <div class="col">
                <div class="form-group">
                    <form action="{{ route('relatorio.search')}}" method="get">
                        @csrf
                        <input type="hidden" name="_token"/>
                        <div class="row">

                            <div class="col">
                                 @if(isset($directions))
                                <Label class="text-white">Filtrar por Direcção</Label>
                                <select name="direction_id" id="" class="form-control">
                                    <option value="">Seleccione a direcção</option>
                                    @foreach ($directions as $direction)
                                            <option value="{{$direction->id or old('direction->name') }}">{{$direction->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="col">
                                 @if(isset($departments))
                                <Label class="text-white">Filtrar por Departamento</Label>
                                <select name="department_id" id="" class="form-control">
                                    <option value="">Seleccione o Departamento </option>
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="col">
                                 @if(isset($sections))
                                <Label class="text-white">Filtrar por Secção</Label>
                                <select name="section_id" id="" class="form-control">
                                    <option value="">Seleccione a Secção</option>
                                    @foreach ($sections as $section)
                                    <option value="{{$section->id}}">{{$section->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                @if(isset($floors))
                                <Label class="text-white">Filtrar por andar</Label>
                                <select name="floor_id" id="" class="form-control">
                                    <option value="">Seleccione o andar</option>
                                    @foreach ($floors as $floor)
                                    <option value="{{$floor->id}}">{{$floor->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>

                            <div class="col">
                                 @if(isset($visitors))
                                <Label class="text-white">Filtrar por Visitante</Label>
                                <select name="visitor_id" id="" class="form-control">
                                    <option value="">Seleccione o visitante</option>
                                    @foreach ($visitors as $visitor)
                                    <option value="{{$visitor->id}}">{{$visitor->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="col">
                                 @if(isset($users))
                                <Label class="text-white">Filtrar por Funcionario</Label>
                                <select name="user_id" id="" class="form-control">
                                    <option value="">Seleccione o funcionario</option>
                                    @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="col">
                                <Label class="text-white">Filtrar por Data de </Label><br>
                                <input type="date" name="datainicio" id="" class="form-control">
                            </div>
                            <div class="col">
                                <Label class="text-white">A Data </Label><br>
                                <input type="date" name="datafim" id="" class="form-control">
                            </div>

                        </div>

                        {{-- fimm --}}

                        <div class="col mt-4">

                            <button type="submit" class="form-control bg-success text-white">
                                Consultar
                            </button>
                            </div>
                    </form>
                </div>
               </div>
           </div>

        <div>

          <table class="table table-sm-dark table-striped table-hover">

              <thead>
                <tr>
                  <th scope="col" class="text-white">ID</th>
                  <th scope="col" class="text-white">Objecto deixado</th>

                  <th scope="col" class="text-white">Motivo</th>
                  <th scope="col" class="text-white">Pvc</th>
                  <th scope="col" class="text-white">Direccao</th>
                  <th scope="col" class="text-white">Departamento</th>
                  <th scope="col" class="text-white">Seccao</th>

                  <th scope="col" class="text-white">Utente</th>
                  <th scope="col" class="text-white">Nacionalidade</th>
                  <th scope="col" class="text-white">Funcionario a contactar</th>
                  <th scope="col" class="text-white">Operador</th>


                  <th scope="col" class="text-white" class="text-white">Hora entrada</th>

                    <th scope="col" class="text-white">andamento</th>
                  <th scope="col" class="text-white ml-5">Acções</th>
                </tr>

              </thead>
              <tbody>


                    @if(isset($manage_subjects))
                    @foreach($manage_subjects as $key=> $manage_subject)
                    <tr>
                       <th scope="row$" class="text-white">{{$key+1}} </th>

                       <td class="text-white">{{$manage_subject->object_left ??''}} </td>

                       <td class="text-white">{{ Illuminate\Support\Str::of($manage_subject->motive ??'')->words(3)}} </td>
                       <td class="text-white">{{ $manage_subject->pvcs_number_pvc ??''}} </td>
                       <td class="text-white">{{ $manage_subject->directions_name ??''}} </td>
                       <td class="text-white">{{ $manage_subject->departments_name ??''}} </td>
                       <td class="text-white">{{ $manage_subject->sections_name ??''}} </td>


                       <td class="text-white">{{$manage_subject->visitors_name ??''}} </td>

                       <td class="text-white">{{$manage_subject->nacionalities_name ??''}} </td>

                       <td class="text-white">{{$manage_subject->users_name ??''}} </td>
                       <td class="text-white">{{$manage_subject->by ??''}} </td>
                       <td class="text-white">{{$manage_subject->created_at ??''}} </td>
                       <td class="text-white">{{$manage_subject->progress_name ??''}} </td>


                       <td>
                            <a href="{{route('manage_subject.edit', $manage_subject->id)}} " ><i class="fa fa-eye btn btn-warning"></i></a>
                       </td>


                       <td>

                            <a href="{{route('manage_subject.delete', $manage_subject->id) ?? ''}} "
                                onclick="return confirm('Tens a certeza que pretendes apagar')"
                                ><i class="fas fa-trash btn btn-danger"></i></a>
                         </td>
                    </tr>
                    @endforeach

                    @endif



              </tbody>

            </table>

        </div classe="">

        {{--  {!! $manage_subjects->links() !!} --}}



    </div>
      @endsection
