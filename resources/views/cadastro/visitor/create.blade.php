@extends('layouts.app')

@section('content')
<div class="container mt-5 ">
    <div class="row">

    
        <div class="col-sm">
           
              @include('cadastro.partials.ol_partials')

              <button type="button" class="btn btn-warning mb-2" data-toggle="modal" data-target="#exampleModal">
                Cadastrar Visitante
              </button>
            <button type="button" class="btn btn-warning mb-2" >
                REGISTRAR VISITA
              </button>
                <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <h5 class="modal-title text-white" id="exampleModalLabel">Buscar utentes</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>

        </div>
        
        <div class="modal-body">

        <fieldset>
                                                                    <div class="form-card">

                                                                        <div class="row">
                                                                            <div class="col-7">
                                                                                <h2 class="fs-title">Info registro:</h2>
                                                                            </div>
                                                                       

                                                                        </div>

                                                                        <article>
                                                                           <div class="text-center">
                                                                            <h5>Cadastrar Nacional ou Estrangeiros</h5>
                                                                           </div>
                                                                               <div class="row">

                                                                                <div class="col-md-6">

                                                                                          <div class="text-center">

                                                                                          </div>

                                                                                          <label >Buscar Identidade Nacional</label>
                                                                                        <form action=" {{route('visitor.consulta')}}  " method="post">
                                                                                             @csrf

                                                                                          <div class="input-group">

                                                                                        <input type="text" id="employee_search" class="form-control" placeholder="Achar a identidade nacional" name="bi">

                                                                                        </div>
                                                                                        <div >
                                                                                            <button class="btn btn-success mt-2 mb-3">Buscar Nacional</button>
                                                                                        </div>

                                                                                        </form>
                                                                                </div>
                                                                                <div class="col-md-6">

                                                                                          <div class="text-center">

                                                                                          </div>

                                                                                          <label >Buscar Identidade Estrangeiro</label>
                                                                                        <form action=" {{route('visitor.estrangeiro')}}  " method="post">
                                                                                             @csrf


                                                                                          <div class="input-group">

                                                                                        <input type="text" id="employee_search" class="form-control" placeholder="Achar a identidade do estrangeiro" name="passaporte">

                                                                                        </div>

                                                                                        <div >
                                                                                            <button class="btn btn-success mt-2 mb-3">Buscar Estrangeiro</button>
                                                                                        </div>
                                                                                        </form>
                                                                                </div>



                                                                        </article>

                                                                        <form action="{{route('visitor.store')}}" method="POST" enctype="multipart/form-data" >
                                                                            @csrf

                                                                          <div class="row">
                                                                          <div class="col-sm">
                                                                    <label >Nome do Visitantes</label>
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
                                                                    <div class="col-sm">
                                                                        <label >Filiação</label>
                                                                        <input type="text" class="form-control" name="affiliation" placeholder="Escreva a filiacao" value="{{old('affiliation')}}">
                                                                    </div>
                                                                    <div class="col-sm">
                                                                        <label >Telefone</label>
                                                                        <input type="number" class="form-control" name="phone_number" placeholder="Escreva o celular" value="{{old('phone_number')}}">
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
                                                                    <div class="text-center">
                                                                    <button type="submit" class="btn btn-success mt-3">CADASTRAR </button>
                                                                    </div>
                                                                </form>


                                                                   
                                                                </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
         
        </div>
      </div>
    </div>
  </div>





        </div>

       
</div>

    <div>
    
    </div>
    <div class="col-sm">
            <div class="col-sm">
                <div class=" ">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="">
                                    <h4>Lista de Visitantes <h4>

                                </div>

                            </div>
                        </div>
                        <div class="card-body table-responsive">
                                <table class="table table-sm">
                                    <thead class="thead-dark">
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Data de nascimento</th>
                                        <th scope="col">Tipo documento</th>
                                        <th scope="col">Documento numero</th>
                                        <th scope="col">Doc. emitido em</th>
                                        <th scope="col">Telefone</th>
                                        <th scope="col">Filiação</th>
                                        <th scope="col">Sexo</th>
                                        <th scope="col">Nacionalidade</th>
                                        <th scope="col">Acções</th>

                                        
                                        </tr>
                                    </thead>
                                    <tbody>

                                    
                                    @foreach ($visitors as $key => $visitor )
                                                                 
                              
                                        <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td>{{$visitor->name}}</td>
                                        <td>{{$visitor->birthday}}</td>

                                        <td>{{$visitor->document->name}}</td>
                                        <td>{{$visitor->doc_number}}</td>
                                        <td>{{$visitor->doc_emition}}</td>
                                        <td>{{$visitor->phone_number}}</td>
                                        <td>{{$visitor->affiliation}}</td>
                                        <td>{{$visitor->gender->name}}</td>
                                        <td>{{$visitor->nacionality->name}}</td>
                                        
                                        <td>
                                            <a href=" {{route('visitor.delete', $visitor->id)}} "
                                                onclick="return confirm('Tens a certeza que pretendes apagar')"
                                                ><i class="fas fa-trash btn btn-danger"></i></a>
                                         </td>
                                        </tr>
                                    @endforeach
                                

                                    </tbody>
                                    </table>

                                    
                        </div>
                     
                    </div>
                    <div class="mb-3 d-flex justify-content-center mt-1">
                <div>
                    {{$visitors->render()}}
                </div>
                </div>
                </div>
            </div>
        </div>

    </div>
    


@endsection
