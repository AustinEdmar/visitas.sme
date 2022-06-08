@extends('layouts.app')

@section('content')

<div class="container ">
    <div class="">
        <div class="">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    @if (!auth()->user()->level->id == '4')
                  <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/nacionality/create')}}">Nacionalidade</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/gender/create')}}">genero</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/rank/create')}}">Patente</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/pvc/create')}}">Pvc</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/visitor/create')}}">Utente</a></li>
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/section/create')}}">section</a></li>

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
                  @endif
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/create')}}" class="btn btn-success">Voltar</a></li>
                </ol>
              </nav>

        <div class="">
            
            

            @if (session('error'))
                              <div class="alert alert-danger">{{ session('error') }}</div>
                         @endif
                <div>

                <form action="{{route('visitor.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf

          


                 <div class=" form-group">

                                @if ($errors->any())
                        <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    </div>
                    @endif

                    <div class="container">
                        <div class="row">
                          <div class="col-sm">
                            <label >Nome </label>
                            <input type="text" class="form-control " name="name" placeholder="Escreva o nome" value="{{$array['FIRST_NAME']}}" readonly>

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>
                          <div class="col-sm">
                            <label >Nome do sobrenome</label>
                            <input type="text" class="form-control " name="nickname" placeholder="Escreva o nome" value="{{$array['LAST_NAME']}}" readonly>

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>
                          <div class="col-sm">
                            <label >Sexo</label>

                            <div>

                                        @if($array['GENDER'] == "MASCULINO")
                                        <select name="gender_id" id="" class="form-control">

                                            @foreach(App\Gender::where('name','=','Masculino')->get() as $gender)
                                                    <option value="{{$gender->id}}"> {{$gender->name}} </option>
                                            @endforeach
                                       </select>


                                        @elseif($array['GENDER'] == "FEMENINO")
                                        <select name="gender_id" id="" class="form-control" value="{{old('gender_id')}}">

                                            @foreach(App\Gender::where('name','=','Femenino')->get() as $gender)
                                                    <option value=" {{$gender->id}}"> {{$gender->name}} </option>
                                            @endforeach
                                       </select>
                                        @endif


                                        @error('gender_id')
                                         <span class="text-danger">{{$message}}</span>
                                        @enderror



                            </div>
                          </div>
                          <div class="col-sm">
                            <label >Data de nascimento</label>
                            <input type="date" class="form-control" name="birthday" placeholder="Escreva a data de aniversario" value="{{$array['BIRTH_DATE']}}" readonly>

                          </div>

                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <label >Insira a foto</label>
                                <input type="file" class="form-control" name="image" placeholder="insira a foto" value="{{old('name')}}">
                            </div>
                            <div class="col-sm">
                                <label >Nome do Pai</label>
                                <input type="text" class="form-control" name="father" placeholder="Escreva a filiacao" value="{{$array['FATHER_NAME']}}" readonly >
                            </div>
                            <div class="col-sm">
                                <label >Nome da Mae</label>
                                <input type="text" class="form-control" name="mother" placeholder="Escreva a filiacao" value="{{$array['MOTHER_NAME']}}" readonly>
                            </div>
                            <div class="col-sm">
                                <label >Telefone</label>
                                <input type="number" class="form-control" name="phone_number" placeholder="Escreva o celular" value="{{$array['TELEPHONE']}}" readonly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <label >Documento</label>
                                <select name="document_id" id="" class="form-control" value="{{old('document_id')}}">

                                    @foreach(App\Document::where('name','=','Bilhete de Identidade')->get() as $document)
                                            <option value=" {{$document->id}}"> {{$document->name}} </option>
                                    @endforeach
                           </select>
                            </div>

                            <div class="col-sm">
                                <label >Numero documento</label>
                                <input type="text" class="form-control" name="doc_number" placeholder="Escreva o numero" value="{{$array['BI_NUMBER']}}" readonly>
                            </div>
                            <div class="col-sm">
                                <label >Data de emissao do documento</label>
                                <input type="date" class="form-control" name="doc_emition" placeholder="seleccione a data" value="{{$array['ISSUE_DATE']}}" readonly>
                            </div>
                        </div>
                      </div>

                    <label >Selecione a Nacionalidade</label>

                    @if($array['BIRTH_COUNTRY'] == "Angola")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Angola')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>


                    @endif


                 </div>

                 <div class="modal-footer">

                    <a href="{{url('/cadastro/manage_subject/create')}}" class="btn btn-danger">Voltar</a>
                    <button type="submit" class="btn btn-warning">cadastrar</button>
                  </form>
                  </div>







    </div>
  </div>

@endsection
