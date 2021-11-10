@extends('layouts.app')

@section('content')

<div class="container ">
    <div class="">
        <div class="">
            @include('cadastro.partials.ol_partials')

              <!-- Button trigger modal -->
<button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target=".bd-example-modal-lg">
    Cadastrar Novo Visitante
  </button>

  <!-- Modal -->
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Visitante Cadastro</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                <div>



                <div class="col-sm-6">
                    <label >Buscar Identidade do Visitante</label>
                    <form action=" {{route('visitor.consulta')}}  " method="post">
                        @csrf


                     <div class="input-group">
                    <input type="text" class="form-control" placeholder="Achar B.I do visitante" name="bi">
                     <div class="input-group-btn">
                     <button class="btn btn-success text-white" type="submit">Procurar</button>
                        </div>
                 </div>
                 </form>
                </div>

                <form action="{{route('visitor.store')}}" method="POST" enctype="multipart/form-data" >
                    @csrf

              {{--   @if(!isset(auth()->user()->level->permission['name']['superadmin']['can-add'])) --}}


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
                            <label >Nome do Visitante</label>
                            <input type="text" class="form-control " name="name" placeholder="Escreva o nome" >

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>
                          <div class="col-sm">
                            <label >Sexo</label>

                            <div>
                                @foreach ($genders as $gender )
                                <span>
                                    <label >
                                        <input type="radio" name="gender_id" id="" class="" value="{{$gender->id}}">
                                        <span>{{$gender->name}}</span>

                                        @error('gender_id')
                                         <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </label>
                                </span>

                               @endforeach
                            </div>
                          </div>
                          <div class="col-sm">
                            <label >Data de Nascimento</label>
                            <input type="date" class="form-control" name="birthday" placeholder="Escreva a data de aniversario" value="{{old('birthday')}}">

                          </div>

                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <label >Insira a foto</label>
                                <input type="file" class="form-control" name="image" placeholder="insira a foto" value="{{old('name')}}">
                            </div>
                            <div class="col-sm">
                                <label >Filiação</label>
                                <input type="text" class="form-control" name="affiliation" placeholder="Escreva a filiacao"" value="{{old('affiliation')}}">
                            </div>
                            <div class="col-sm">
                                <label >Telefone</label>
                                <input type="number" class="form-control" name="phone_number" placeholder="Escreva o celular"" value="{{old('phone_number')}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm">
                                <label >Documento</label>
                                <select name="document_id" id="" class="form-control" value="{{old('document_id')}}">
                                    <option value="" disabled selected>
                                        Selecione o tipo
                                    </option>
                                    @foreach ($documents as $document )
                                            <option value="{{$document->id}}">{{$document->name}}</option>
                                    @endforeach
                           </select>
                            </div>

                            <div class="col-sm">
                                <label >Numero documento</label>
                                <input type="text" class="form-control" name="doc_number" placeholder="Escreva o numero"" value="{{old('affiliation')}}">
                            </div>
                            <div class="col-sm">
                                <label >Data de Emissão do Documento</label>
                                <input type="date" class="form-control" name="doc_emition" placeholder="seleccione a data"" value="{{old('phone_number')}}">
                            </div>
                        </div>
                      </div>

                    <label >Selecione a Nacionalidade</label>
                    <select name="nacionality_id" id="" class="form-control" value="{{old('nacionality_id')}}">
                            <option value="" disabled selected>
                                Selecione o País
                            </option>
                            @foreach ($nacionalities as $nacionality )
                                    <option value="{{$nacionality->id}}">{{$nacionality->name}}</option>
                            @endforeach
                   </select>

                 </div>

                 <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-warning">Cadastrar</button>
                  </form>
                  </div>
             </div>

        </div>

        {{-- @endif --}}

        </div>

      </div>
    </div>
  </div>
</div>








        <div class="">
            <div class="card">
                <div class="card-header">
                    <div class="row">

                            <h4>Listar Visitantes</h4>

                    </div>
                </div>


                        <div>
                            <div>
                              <table class="table table-sm table-striped table-hover">

                                  <thead>
                                    <tr>
                                      <th scope="col">ID</th>
                                      <th scope="col">Nome</th>
                                      <th scope="col">Genero</th>
                                      <th scope="col">Data Nascimento</th>
                                      <th scope="col">Tipo Doc</th>
                                      <th scope="col">Num. Doc</th>
                                      <th scope="col">Doc Emissão</th>
                                      <th scope="col">Imagem</th>
                                      <th scope="col">Filiação</th>
                                      <th scope="col">Telefone</th>
                                      <th scope="col">Nacionalidade</th>

                                      <th scope="col">Acções</th>
                                    </tr>

                                  </thead>
                                  <tbody>

                                     @foreach($visitors as $visitor)


                                    <tr>
                                       <th scope="row$">{{$visitor->id}}</th>
                                       <td>{{$visitor->name}}</td>
                                       <td>{{$visitor->gender->name}}</td>
                                       <td>{{$visitor->birthday}}</td>
                                       <td>{{$visitor->document->name}}</td>
                                       <td>{{$visitor->doc_number}}</td>
                                       <td>{{$visitor->doc_emition}}</td>
                                       <td>{{$visitor->image}}</td>
                                       <td>{{$visitor->affiliation}}</td>
                                       <td>{{$visitor->phone_number}}</td>
                                       <td>{{$visitor->nacionality->name}}</td>

                                       <td><i class="far fa-edit btn btn-warning"></i></td>
                                        </td>

                                       <td>

                                            <a href="{{route('visitor.delete', $visitor->id)}}" onclick="return confirm('Tens a certeza que pretendes apagar')" ><i class="fas fa-trash btn btn-danger"></i></a>
                                         </td>
                                    </tr>
                                    @endforeach
                                  </tbody>

                                </table>

                            </div>
                            <div class="mb-3">
                                {{$visitors->render()}}
                            </div>
                        </div>


            </div>
        </div>
    </div>
</div>

@endsection
