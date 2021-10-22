@extends('layouts.app')

@section('content')
<div class="container ">
    <div class="row">
        <div class="col-sm-5">
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
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/document/create')}}">document</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/permission/create')}}">permissoes</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/level/create')}}">permissoes</a></li>

                  <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/create')}}">Motivo</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/floor/create')}}">floor</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/relatorio')}}">Relatorio</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/relatorio/pdf')}}">pdf</a></li>
                  <li class="breadcrumb-item active" aria-current="page"></li>
                </ol>
              </nav>




{{--
              <div class="modal fade" id="AddStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                        <ul id="saveForm_erroList"></ul>

                <div class="form-group mb-3">
                    <label>Student Name</label>
                    <input type="text" class="name form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Email</label>
                    <input type="text" class="email form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Phone</label>
                    <input type="text" class="phone form-control">
                </div>
                <div class="form-group mb-3">
                    <label>Course</label>
                    <input type="text" class="course form-control">
                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary add_student">Save</button>
                    </div>
                  </div>
                </div>
              </div> --}}

              {{-- fim modal --}}



               {{--  <div class="container py-5">
                 <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4> Students data
                                   <a href="http://" class=" btn btn-primary float-right"  data-toggle="modal" data-target="#AddStudent">Add New</a>
                                </h4>
                            </div>
                        </div>
                      </div>
                    </div>
                </div> --}}






        <form action="{{route('floor.store')}}" method="POST">
                    @csrf
                <div class="card-header bg-primary">
                        <h6 class="text-white">Cadastrar Andar</h6>
                  <div class=" form-group ">

                        <label>Nome</label>
                    <input type="text" class="form-control " @error('name') is-invalid @enderror name="name" placeholder="Escreva o andar">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                 </div>

                 <button type="submit" class="btn btn-warning">Cadastrar</button>
                </div>
            </form>
        </div>
        <div class="col-sm-7">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                            <h4>Listar os Andares</h4>

                    </div>
                </div>


                        <div>
                            <div>
                              <table class="table table-sm table-striped table-hover">

                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Andar</th>


                                      <th scope="col">Acções</th>
                                    </tr>

                                  </thead>
                                  <tbody>

                                    @foreach($floors as $floor)


                                    <tr>
                                       <th scope="row">{{$floor->id}}</th>
                                       <td>{{$floor->name}}</td>

                                       <td>Editar</td>
                                        </td>


                                            <td>

                                                <a href="{{route('floor.delete', $floor->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" class="btn btn-danger">Deletar</a>
                                                </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>

                            </div>

                        </div>


            </div>
        </div>
    </div>
</div>
   {{--  <div class="d-flex">
        <div class="justify-content-center">
            <div class="container">

            </div>
        </div>
    </div> --}}
@endsection
