@extends('layouts.app')

@section('content')
<div class="container mt-5 ">
    <div class="row">
        <div class="col-sm">
            <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#exampleModal">
                Cadastrar Seccao
              </button>
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


                <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Cadatrar seccao</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <form action="{{route('section.store')}}" method="POST">
                @csrf

               <div class="">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label>Nome da seccao</label>
                            <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Escreva a seccao">

                            @error('name')
                            <span class="text-danger">{{$message}}</span>

                            @enderror

                        </div>
                        <div class="col">
                            <label>Extensao</label>
                            <input type="text" class="form-control" name="extention" value="{{old('extention')}}" placeholder="Escreva a seccao">
                        </div>
                    </div>

                  <div class="row">
                      <div class="col-sm">
                        <label>Selecione a department</label>
                        <select name="department_id" id="" class="form-control" value="{{old('section_id')}}">
                          <option value="" disabled selected>
                              Seleccione
                          </option>
                          @foreach ($departments as $department )
                                  <option value="{{$department->id}}">{{$department->name}}</option>
                          @endforeach
                 </select>
                      </div>

                      <div class="col-sm">
                        <label class="text-white">Grupo</label>
                        <select name="group_id" id="" class="form-control" value="{{old('group_id')}}"   >
                            <option disabled selected >Seleccione o Grupo</option>

                            @foreach(App\Group::get() as $group)


                                <option value="{{$group->id}}">{{$group->name }}</option>
                            @endforeach


                   </select>
                    </div>
                  </div>

                </div>


            </div>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-warning">Cadastrar</button>
        </div>
      </div>
    </div>
  </div>





        </div>
        <div class="col-sm">
            <div class="col-sm">
                <div class="container ">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="">
                                    <h4>Seccoes</h4>

                                </div>

                            </div>
                        </div>
                        <div class="card-body">
                            <div class="">
                                <div>
                                    <div>
                                      <table class="table table-sm table-striped table-hover">

                                          <thead>
                                            <tr>
                                              <th scope="col">#</th>
                                              <th scope="col">Nome</th>
                                              <th scope="col">departamento</th>
                                              <th scope="col">extensao</th>

                                              <th scope="col">Acções</th>
                                            </tr>
                                             @foreach($sections as $section)
                                          </thead>
                                          <tbody>

                                            <tr>
                                              <th scope="row">{{$section->id}}</th>
                                            <td>{{$section->name}}</td>
                                            <td>{{$section->department->name}}</td>
                                            <td>{{$section->extention}}</td>


                                              <td>

                                                <a href="{{route('section.delete', $section->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                                </td>
                                            </tr>
                                               @endforeach
                                          </tbody>
                                        </table>

                                    </div>
                                    {{ $sections->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
