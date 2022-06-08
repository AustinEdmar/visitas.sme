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
                  <li class="breadcrumb-item"><a href="{{url('/cadastro/visitor/create')}}" class="btn btn-success">Voltar</a></li>
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
                            <input type="text" class="form-control " name="name" placeholder="Escreva o nome" value="{{$responses[0]['Surname']}}" readonly>

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>
                          <div class="col-sm">
                            <label >Nome do sobrenome</label>
                            <input type="text" class="form-control " name="nickname" placeholder="Escreva o nome" value="{{$responses[0]['Forename']}}" readonly>

                            @error('name')
                                <span class="text-danger">{{$message}}</span>
                            @enderror

                          </div>
                          <div class="col-sm">
                            <label >Sexo</label>
                            
                            

                            <div>

                                         @if($responses[0]['Sex'] == "M")
                                        <select name="gender_id" id="" class="form-control">

                                            @foreach(App\Gender::where('name','=','Masculino')->get() as $gender)
                                                    <option value="{{$gender->id}}"> {{$gender->name}} </option>
                                            @endforeach
                                       </select>


                                        @elseif($responses[0]['Sex'] == "F")
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
                             <input type="date" class="form-control" name="birthday" placeholder="Escreva a data de aniversario" value="{{$responses[0]['DateBirth']}}" readonly>
 
                            </div>

                        </div>


                        <div class="row">
                        <div class="col-sm">
                                <label >Telefone</label>
                               <input type="number" class="form-control" name="phone_number" placeholder="Escreva o celular"  > 
                            </div>
                            <div class="col-sm">
                                <label >Documento</label>
                                @if($responses[0]['DocumentType'] == "PN")
                                <select name="document_id" id="" class="form-control" value="{{old('document_id')}}">

                                     @foreach(App\Document::where('name','=','Passporte')->get() as $document)
                                            <option value=" {{$document->id}}"> {{$document->name}} </option>
                                    @endforeach 
                           </select>
                           @endif
                           
                            </div>

                            <div class="col-sm">
                                <label >Numero documento</label>
                                <input type="text" class="form-control" name="doc_number" placeholder="Escreva o numero" value="{{$responses[0]['DocumentNo']}}" readonly> 
                            </div>
                          
                        </div>
                      </div>

                    <label >Nacionalidade</label>

                    @if($responses[0]['Nationality'] == "CHN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','China')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>

                    @elseif($responses[0]['Nationality'] == "AGO")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Angola')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PRT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Portugal')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BRA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Brazil')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>

                                       <!-- aqui -->
                    @elseif($responses[0]['Nationality'] == "ABW")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Aruba')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "AFG")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Afghanistan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "AIA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Anguilla')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ALA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Iceland')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ALB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Albania')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "AND")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Andorra')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ARG")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Argentina')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ARM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Armenia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ARE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','United Arab Emirates')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ASM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','American Samoa')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ATA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Antarctica')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "DZA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Algeria')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "DZA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Algeria')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "AUS")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Australia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "AUT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Austria')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "AZE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Azerbaijan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BHS")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Bahamas')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BHR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Bahrain')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BGD")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Bangladesh')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BRB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Barbados')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BLR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Belarus')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BEL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Belgium')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BEN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Benin')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BMU")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Bermuda')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BTN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Bhutan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BOL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Bolivia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BIH")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Bosnia and Herzegovina')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BWA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Botswana')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BGR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Bulgaria')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BFA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Burkina Faso')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BDI")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Burundi')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "KHM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Cambodia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CMR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Cameroon')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CAN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Canada')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CPV")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Cape Verde')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CYM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Cayman Islands')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CYM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Cayman Islands')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CAF")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Central African Republic')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CMR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Cameroon')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CAN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Canada')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CPV")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Cape Verde')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TCD")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Chad')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CHL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Chile')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CHN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','China')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "COL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Colombia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "COM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Comoros')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "COG")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Congo')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "COD")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Democratic Republic of Congo')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CRI")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Costa rica')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CIV")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Democratic Republic of Congo')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CUB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Cuba')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                   
                    @elseif($responses[0]['Nationality'] == "CYP")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Cyprus')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CZE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Czech Republic')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>

                    @elseif($responses[0]['Nationality'] == "DNK")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Denmark')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "DJI")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Djibouti')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "DOM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Dominican Republic')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ECU")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Ecuador')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "EGY")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Egypt')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SLV")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','El Salvador')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GNQ")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Equatorial Guinea')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ERI")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Eritrea')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "EST")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Estonia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ETH")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Ethiopia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "FLK")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Falkland Islands (Malvinas)')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "Faroe Islands")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','FRO')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "FJI")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Fiji')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "FIN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Finland')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "FRA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','France')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GUF")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','French Guiana')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PYF")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','French Polynesia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GAB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Gabon')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GMB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Gambia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GEO")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Georgia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "DEU")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Germany')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GHA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Ghana')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GIB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Gibraltar')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GRC")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Greece')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GRL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Greenland')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GRD")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Grenada')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GLP")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Guadeloupe')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GUM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Guam')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GTM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Guatemala')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GIN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Guinea')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GNB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Guinea-Bissau')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GUY")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Guyana')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "HTI")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Haiti')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "HND")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Honduras')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "HKG")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Hong Kong')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "HUN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Hungary')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ISL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Iceland')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "IND")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','India')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "IDN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Indonesia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "IRN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Iran (Islamic Republic of)')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "IRQ")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Iraq')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "IRL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Ireland')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ISR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Israel')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ITA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Italy')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "JAM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Jamaica')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "JPN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Japan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "JOR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Jordan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "KAZ")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Kazakhstan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "KEN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Kenya')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "KIR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Kiribati')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PRK")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Korea, Democratic People\'s Republic of')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "KOR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Korea, Republic of')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                                       
                    @elseif($responses[0]['Nationality'] == "KWT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Kuwait')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "KGZ")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Kyrgyzstan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LAO")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Lao People\'s Democratic Republic')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LVA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Latvia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LBN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Lebanon')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LSO")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Lesotho')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LBR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Liberia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LBY")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Libyan Arab Jamahiriya')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LIE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Liechtenstein')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LTU")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Lithuania')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LUX")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Luxembourg')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MAC")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Macao')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MKD")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Macedonia, the Former Yugoslav Republic of')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MDG")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Madagascar')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MWI")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Malawi')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MYS")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Malaysia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MDV")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Maldives')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MLI")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Mali')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MLT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Malta')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MHL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Marshall Islands')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MTQ")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Martinique')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>

                    @elseif($responses[0]['Nationality'] == "MRT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Mauritania')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>

                    @elseif($responses[0]['Nationality'] == "MUS")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Mauritius')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MEX")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Mexico')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "FSM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Micronesia, Federated States of')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MDA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Moldova, Republic of')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MCO")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Monaco')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MNG")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Mongolia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MSR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Montserrat')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MAR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Morocco')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MOZ")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Mozambique')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MMR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Myanmar')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NAM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Namibia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NRU")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Nauru')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NPL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Nepal')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NLD")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Netherlands')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ANT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Netherlands Antilles')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NCL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','New Caledonia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NZL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','New Zealand')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NIC")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Nicaragua')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NER")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Niger')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NGA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Nigeria')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NIU")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Niue')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NFK")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Norfolk Island')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "MNP")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Northern Mariana Islands')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "NOR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Norway')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "OMN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Oman')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PAK")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Pakistan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PLW")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Palau')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PAN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Panama')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PNG")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Papua New Guinea')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PRY")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Paraguay')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PER")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Peru')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PHL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Philippines')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PCN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Pitcairn')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "POL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Poland')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PRT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Portugal')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "PRI")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Puerto Rico')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "QAT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Qatar')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "REU")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Reunion')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ROM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Romania')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "RUS")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Russian Federation')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "RWA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Rwanda')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SHN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Saint Helena')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "KNA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Saint Kitts and Nevis')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LCA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Saint Lucia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SPM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Saint Pierre and Miquelon')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "VCT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Saint Vincent and the Grenadines')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "WSM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Samoa')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SMR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','San Marino')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "STP")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Sao Tome and Principe')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SAU")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Saudi Arabia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SEN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Senegal')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SRB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Serbia and Montenegro')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SYC")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Seychelles')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SLE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Sierra Leone')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SGP")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Singapore')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SVK")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Slovakia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SVN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Slovenia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SLB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Solomon Islands')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SOM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Somalia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ZAF")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','South Africa')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ESP")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Espanha')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "LKA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Sri Lanka')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SDN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Sudan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SUR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Suriname')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SJM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Svalbard and Jan Mayen')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SWZ")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Swaziland')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SWE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Sweden')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "CHE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Switzerland')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SYR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Syrian Arab Republic')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TWN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Taiwan, Province of China')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TJK")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Tajikistan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TZA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Tanzania')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "THA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Thailand')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TLS")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','East Timor')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TGO")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Togo')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TKL")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Tokelau')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TON")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Tonga')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TTO")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Trinidad and Tobago')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TUN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Tunisia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TUR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Turkey')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TKM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Turkmenistan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TCA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Turks and Caicos Islands')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "TUV")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Tuvalu')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "UGA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Uganda')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "UKR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Ukraine')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ARE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','United Arab Emirates')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GBR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','United Kingdom')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "USA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','United States')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ARE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','United Arab Emirates')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "GBR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','United Kingdom')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "USA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','United States')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "URY")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Uruguay')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "UZB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Uzbekistan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "VUT")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Vanuatu')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "VEN")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Venezuela')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "VNM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Vietnam')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>

                    @elseif($responses[0]['Nationality'] == "VGB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Virgin Islands, British')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "VIR")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Virgin Islands (U.S.)')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "WLF")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Wallis and Futuna')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ESH")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Western Sahara')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "YEM")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Ghana')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ZMB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Zambia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ZWE")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Zimbabwe')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SRB")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Serbia')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "ALA")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Aland Islands')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "BES")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Bonaire, Sint Eustatius and Saba')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @elseif($responses[0]['Nationality'] == "SSD")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','South Sudan')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                   
                    @elseif($responses[0]['Nationality'] == "")
                                        <select name="nacionality_id" id="" class="form-control">

                                            @foreach(App\Nacionality::where('name','=','Sem Novo')->get() as $nacionality)
                                                    <option value="{{$nacionality->id}}"> {{$nacionality->name}} </option>
                                            @endforeach
                                       </select>
                    @endif 

                 </div>

                 <div class="modal-footer">

                    <a href="{{url('/cadastro/visitor/create')}}" class="btn btn-danger">Voltar</a>
                    <button type="submit" class="btn btn-warning">cadastrar</button>
                  </form>
                  </div>







    </div>
  </div>

@endsection
