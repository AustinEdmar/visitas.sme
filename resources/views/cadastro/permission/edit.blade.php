@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">

        <div class="row mb-5">
            <div class="col-md-4">
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
                      <li class="breadcrumb-item"><a href="{{route('permission.create')}}">permissoes</a></li>
                      <li class="breadcrumb-item active" aria-current="page"></li>
                    </ol>
                  </nav>
            </div>

        <div class="col-md-8">

            {{--   --}}
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <form action="{{route('permission.update',[$permissions->id])}}" method="POST">
                    @csrf
                    @method('PATCH')
                <div class="card-body">
                    {{$permissions->level->name}}
                    <table class="table table-striped table-dark mt-3">
                        <thead>
                          <tr>
                            <th scope="col">Permission</th>
                            <th scope="col">can-add</th>
                            <th scope="col">can-edit</th>
                            <th scope="col">can-view</th>
                            <th scope="col">can-delete</th>
                            <th scope="col">can-list</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>SuperAdmin</td>
                                <td><input type="checkbox" name="name[superadmin][can-add]"@if(isset($permissions['name']['superadmin']['can-add'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[superadmin][can-edit]"  @if(isset($permissions['name']['superadmin']['can-edit'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[superadmin][can-delete]"@if(isset($permissions['name']['superadmin']['can-delete'])) checked @endif value="1"></td>
                                <td><input type="checkbox" name="name[superadmin][can-view]"@if(isset($permissions['name']['superadmin']['can-view'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[superadmin][can-list]"@if(isset($permissions['name']['superadmin']['can-list'])) checked @endif value="1"></td>
                            </tr>

                            <tr>
                                <td>Admin</td>
                                <td><input type="checkbox" name="name[admin][can-add]"@if(isset($permissions['name']['admin']['can-add'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[admin][can-edit]"@if(isset($permissions['name']['admin']['can-edit'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[admin][can-delete]"@if(isset($permissions['name']['admin']['can-delete'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[admin][can-view]" @if(isset($permissions['name']['admin']['can-view'])) checked @endif value="1"></td>
                                <td><input type="checkbox" name="name[admin][can-list]" @if(isset($permissions['name']['admin']['can-list'])) checked @endif value="1"></td>
                            </tr>

                            <tr>
                                <td>UserAdmin</td>
                                <td><input type="checkbox" name="name[useradmin][can-add]"@if(isset($permissions['name']['useradmin']['can-add'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[useradmin][can-edit]"@if(isset($permissions['name']['useradmin']['can-edit'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[useradmin][can-delete]"@if(isset($permissions['name']['useradmin']['can-delete'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[useradmin][can-view]" @if(isset($permissions['name']['useradmin']['can-view'])) checked @endif value="1"></td>
                                <td><input type="checkbox" name="name[useradmin][can-list]"@if(isset($permissions['name']['useradmin']['can-list'])) checked @endif value="1"></td>
                            </tr>
                            <tr>
                                <td>user</td>
                                <td><input type="checkbox" name="name[user][can-add]"@if(isset($permissions['name']['user']['can-add'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[user][can-edit]"@if(isset($permissions['name']['user']['can-edit'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[user][can-delete]"@if(isset($permissions['name']['user']['can-delete'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[user][can-view]"@if(isset($permissions['name']['user']['can-view'])) checked @endif  value="1"></td>
                                <td><input type="checkbox" name="name[user][can-list]"@if(isset($permissions['name']['user']['can-list'])) checked @endif  value="1"></td>
                            </tr>
                        </tbody>

                      </table>

                      <div>
                          <div>
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                          <div class="d-flex justify-content-end">
                            <a href="{{route('permission.create')}}" class="btn btn-warning">Voltar</a>
                        </div>
                      </div>





                </div>
            </form>
            </div>
        </div>


        </div>

    </div>
</div>
@endsection
