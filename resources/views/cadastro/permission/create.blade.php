@extends('layouts.app')

@section('content')
<div class="container mt-3">
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

<div class="row">
    <div class="col-md-6">

        <form action="{{route('permission.store')}}" method="POST">
            @csrf
        <div class="card-body">
            <select class="form-control" @error('role_id') is-invalid @enderror name="level_id" id="">
                    <option value="">Seleccione o nivel</option>
                    @foreach (App\Level::all() as $level)
                    <option value="{{$level->id}}">{{$level->name}}</option>

                    @endforeach

                    @error('level_id')

                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                    @enderror
            </select>
            <table class="table table-striped table-dark mt-3">
                <thead>
                  <tr>
                    <th scope="col">Permissoes</th>
                    <th scope="col">can-add</th>
                    <th scope="col">can-edit</th>
                    <th scope="col">can-view</th>
                    <th scope="col">can-delete</th>
                    <th scope="col">can-list</th>
                  </tr> {{--

                    superadmin
                    admin
                    useradmin
                    user

                    --}}
                </thead>
                <tbody>
                    <tr>
                        <td>SuperAdmin</td>
                        <td><input type="checkbox" name="name[superadmin][can-add]"  value="1"></td>
                        <td><input type="checkbox" name="name[superadmin][can-edit]"  value="1"></td>
                        <td><input type="checkbox" name="name[superadmin][can-delete]"  value="1"></td>
                        <td><input type="checkbox" name="name[superadmin][can-view]"  value="1"></td>
                        <td><input type="checkbox" name="name[superadmin][can-list]"  value="1"></td>
                    </tr>

                    <tr>
                        <td>Admin</td>
                        <td><input type="checkbox" name="name[admin][can-add]"  value="1"></td>
                        <td><input type="checkbox" name="name[admin][can-edit]"  value="1"></td>
                        <td><input type="checkbox" name="name[admin][can-delete]"  value="1"></td>
                        <td><input type="checkbox" name="name[admin][can-view]"  value="1"></td>
                        <td><input type="checkbox" name="name[admin][can-list]"  value="1"></td>
                    </tr>

                    <tr>
                        <td>Useradmin</td>
                        <td><input type="checkbox" name="name[useradmin][can-add]"  value="1"></td>
                        <td><input type="checkbox" name="name[useradmin][can-edit]"  value="1"></td>
                        <td><input type="checkbox" name="name[useradmin][can-delete]"  value="1"></td>
                        <td><input type="checkbox" name="name[useradmin][can-view]"  value="1"></td>
                        <td><input type="checkbox" name="name[useradmin][can-list]"  value="1"></td>
                    </tr>
                    <tr>
                        <td>user</td>
                        <td><input type="checkbox" name="name[user][can-add]"  value="1"></td>
                        <td><input type="checkbox" name="name[user][can-edit]"  value="1"></td>
                        <td><input type="checkbox" name="name[user][can-delete]"  value="1"></td>
                        <td><input type="checkbox" name="name[user][can-view]"  value="1"></td>
                        <td><input type="checkbox" name="name[user][can-list]"  value="1"></td>
                    </tr>
                </tbody>

              </table>
              <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        </form>

    </div>

    <div class="col-md-6">
        <div class="col">
            @if(Session::has('message'))
                <div class="alert alert-success">
                        {{Session::get('message')}}
                </div>
            @endif
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>

                        <th>Edit</th>
                         <th>Delete</th>

                    </tr>
                </thead>
                @foreach ($permissions as $permission )


                <tbody>
                    <tr>
                        <td class="text-white">{{$permission->level->id}}</td>
                        <td class="text-white">{{$permission->level->name}}</td>


                         <td>
                        <a href="{{route('permission.edit', [$permission->id])}} ">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>

                        <td>
                       <a href="#" data-toggle="modal" data-target="#exampleModal{{$permission->id}}">
                        <i class="fas fa-trash"></i>
                        </a>

                         </td>

                              <!-- Modal -->
                              <div class="modal fade" id="exampleModal{{$permission->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('permission.destroy', [$permission->id])}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                  <div class="modal-content">


                                    <div class="modal-body">

                                      Do you want to delete ?
                                      <br>
                                      <span>{{$permission->level->name}}</span>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                  </div>
                                </form>
                                </div>
                              </div>

                                {{-- fim modal --}}

                    </tr>
                 @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>

</div>






@endsection
