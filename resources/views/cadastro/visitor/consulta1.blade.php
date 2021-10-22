@if (isset($array))
<input type="text" value="{{$array['FIRST_NAME']}}">
<input type="text" value="{{$array['LAST_NAME']}}">
<input type="text" value="{{$array['BI_NUMBER']}}">

@endif




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

                           {{--   @if(!isset(auth()->user()->level->permission['name']['superadmin']['can-add']))


                             <div class=" form-group">

                                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                    @endif --}}

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


                                      </div>
                                      <div class="col-sm">
                                        <label >Data de nascimento</label>
                                        <input type="date" class="form-control" name="birthday" placeholder="Escreva a data de aniversario" value="{{old('birthday')}}">

                                      </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm">
                                            <label >Insira a foto</label>
                                            <input type="file" class="form-control" name="image" placeholder="insira a foto" value="{{old('name')}}">
                                        </div>
                                        <div class="col-sm">
                                            <label >Filiacao</label>
                                            <input type="text" class="form-control" name="affiliation" placeholder="Escreva a filiacao"" value="{{old('affiliation')}}">
                                        </div>
                                        <div class="col-sm">
                                            <label >Telefone</label>
                                            <input type="number" class="form-control" name="phone_number" placeholder="Escreva o celular"" value="{{old('phone_number')}}">
                                        </div>
                                    </div>


                                  </div>



                             </div>

                             <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-warning">cadastrar</button>
                              </form>
                              </div>
                         </div>

                    </div>



                    </div>

                  </div>
                </div>
              </div>
            </div>



                </div>
            </div>
