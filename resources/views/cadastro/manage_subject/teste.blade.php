
                                                       <div class="container">

<div id="msform">
    <!-- progressbar -->
    <ul id="progressbar">
        <li class="active" id="account"><strong>Dados do Visitante</strong></li>
        <li id="personal"><strong>Motivo da Visita</strong></li>
        <!-- <li id="payment"><strong>Image</strong></li> -->
        <li id="confirm"><strong>Finalizar</strong></li>
    </ul>
    <div class="progress">
        <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
    </div> <br> <!-- fieldsets -->


    <fieldset>
        <div class="form-card">

            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Info registro:</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Passo 1 - 3</h2>
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
                            </form>
                    </div>
                    <div class="col-md-6">

                              <div class="text-center">

                              </div>

                              <label >Buscar Identidade Nacional</label>
                            <form action=" {{route('visitor.consulta')}}  " method="post">
                                 @csrf


                              <div class="input-group">

                            <input type="text" id="employee_search" class="form-control" placeholder="Achar a identidade nacional" name="bi">

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
        <button type="submit" class="btn btn-success mt-3">CADASTRAR </button>
    </form>


        <input type="button" name="next" class="next action-button" value="Proximo" />
    </fieldset>
    
    <fieldset>
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Cadastrar motivo:</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Passo 2 - 3</h2>
                </div>
            </div> <label class="fieldlabels">First Name: *</label> <input type="text" name="fname" placeholder="First Name" /> <label class="fieldlabels">Last Name: *</label> <input type="text" name="lname" placeholder="Last Name" /> <label class="fieldlabels">Contact No.: *</label> <input type="text" name="phno" placeholder="Contact No." /> <label class="fieldlabels">Alternate Contact No.: *</label> <input type="text" name="phno_2" placeholder="Alternate Contact No." />
        </div> <input type="button" name="next" class="next action-button" value="Proximo" /> <input type="button" name="previous" class="previous action-button-previous" value="Anterior" />
    </fieldset>





    <fieldset>
        <div class="form-card">
            <div class="row">
                <div class="col-7">
                    <h2 class="fs-title">Finalizado:</h2>
                </div>
                <div class="col-5">
                    <h2 class="steps">Passo 3 - 3</h2>
                </div>
            </div> <br><br>
            <h2 class="purple-text text-center"><strong>Cadastrado com sucesso!</strong></h2> <br>
            <div class="row justify-content-center">
                <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
            </div> <br><br>
            <div class="row justify-content-center">
                <div class="col-7 text-center">
                    <h5 class="purple-text text-center">Obrigado caro operador</h5>
                </div>
            </div>
        </div>
    </fieldset>

    <!-- fom era -->
</div>
</div>