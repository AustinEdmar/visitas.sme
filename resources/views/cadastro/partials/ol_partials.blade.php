        <nav aria-label="breadcrumb">

            <ol class="breadcrumb">



              <!--    @if (auth()->user()->level->permission->id  == '1') -->
                                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>

                            <li class="breadcrumb-item"><a href="{{url('/cadastro/nacionality/create')}}">Nacionalidade</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/gender/create')}}">genero</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/rank/create')}}">Patente</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/pvc/create')}}">Pvc</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/visitor/create')}}">Visitante</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/section/create')}}">section</a></li>

                            <li class="breadcrumb-item"><a href="{{url('/cadastro/direction/create')}}">direccao</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/department/create')}}">departamento</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/user/create')}}">Usuarios</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/status/create')}}">Status</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/things/create')}}">coisas</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/progress/create')}}">Progresso</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/document/create')}}">documento</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/permission/create')}}">permissoes</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/level/create')}}">level</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/floor/create')}}">andar</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/group/create')}}">grupoArea</a></li>

                            <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/create')}}">Assunto</a></li>

                            <li class="breadcrumb-item"><a href="{{url('/relatorio')}}">Relatorio</a></li>

                            <li class="breadcrumb-item active" aria-current="page"></li>



                <!--  @elseif(auth()->user()->level->permission->id  == '2') -->

                            <li class="breadcrumb-item"><a href="{{url('/')}}" >Home</a></li>

                            <li class="breadcrumb-item"><a href="{{url('/cadastro/nacionality/create')}}">Nacionalidade</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/gender/create')}}">genero</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/rank/create')}}">Patente</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/pvc/create')}}">Pvc</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/visitor/create')}}">Visitante</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/section/create')}}">section</a></li>

                            <li class="breadcrumb-item"><a href="{{url('/cadastro/direction/create')}}">Direcçãoao</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/department/create')}}">Departamento</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/user/create')}}">Usuarios</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/status/create')}}">Status</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/progress/create')}}">Progresso</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/document/create')}}">Documento</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/permission/create')}}">Permissõess</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/level/create')}}">Nivel</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/cadastro/floor/create')}}">Andar</a></li>


                            <li class="breadcrumb-item"><a href="{{url('/relatorio')}}">Relatorio</a></li>

                            <li class="breadcrumb-item active" aria-current="page"></li>





              <!--   @elseif(auth()->user()->level->permission->id  == '3') -->

                            <li class="breadcrumb-item"><a href="{{url('/area')}}" class="btn btn-success">Area</a></li>



            <!--     @elseif(auth()->user()->level->permission->id  == '4') -->

                           <li class="breadcrumb-item"><a href="{{url('/cadastro/visitor/create')}}" >Cadastrar Visitante</a></li>



                            <li class="breadcrumb-item"><a href="{{url('/cadastro/manage_subject/create')}}">Assunto</a></li>

                            <li class="breadcrumb-item active" aria-current="page"></li>

          <!--       @endif -->



        </ol>


        </nav>

        @yield('content')
