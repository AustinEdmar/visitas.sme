
@extends('layouts.app')
@laravelPWA
@section('content')

<div class="row ">
    <div class="col-md-4">
        <div class="margem">

         <a href="{{url('/')}}" >
            <img src="{{asset('assets/img/logo.svg')}}" >
        </a>
        </div>
    </div>

    <div class="col-md-8 mt-3 ">


         <div class="deus">

             <div class="">
                 <div >
                     <div class="cfunciona text-center ">
                      <p class="infoss">
                         como funciona

                      </p>
                     </div>
                 </div>
                 <div class="svisitas">
                     <p class="infos">
                         Sistema de visitas

                      </p>
                 </div>

                 <span class="descricao ">
                     Faça o login com o seu email e senha  ou contacte o Administrador para efectuar
                     o seu cadastro ao sistema

                 </span>

             </div>



               <div class=" d-flex justify-content-center ">

                     <div class="eu">
                         <div class="inputfundo">
                             <div class="inputfundo2  " style="background-image: url('{{ asset('assets/img/Vector3.png')}}'); background-size: cover;background-repeat: no-repeat;">
                               <div class="container ">
                                   <div class="d-flex justify-content-center">
                                       <div class="text-center">
                                           <p class="seja">Sejam Bem Vindo</p>
                                       </div>
                                   </div>

                                       <div>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                               <div class="form-group">

                                                    <div>
                                                       <p class="pes">Email</p>

                                                       <input type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" class="form-control inpt " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Digite o seu email" autocomplete="focus">

                                                       @error('email')
                                                       <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                       </span>
                                                   @enderror
                                                    </div>

                                                    <div>
                                                       <p class="pes">Password</p>

                                                       <input type="password" class="form-control inpt" @error('password') is-invalid @enderror" name="password" placeholder="Digite a sua senha" autocomplete="off">
                                                       @error('password')
                                                       <span class="invalid-feedback" role="alert">
                                                           <strong>{{ $message }}</strong>
                                                       </span>
                                                   @enderror

                                                    </div>
                                                    <div class=" d-flex justify-content-center mt-3">
                                                       <button type="submit" class="botao"><span class="entrar">
                                                        {{ __('Entrar na Conta') }}
                                                    </span></button>
                                                    </div>

                                                    <div class=" d-flex justify-content-center mt-5 infbaixo">
                                                       <span>Nao tenho conta <span class="under">Contactar administrador</span></span>
                                                    </div>
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



@endsection
