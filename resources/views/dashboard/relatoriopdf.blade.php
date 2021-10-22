<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">



 <title>Relatorio</title>

    <style>



* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  html,body {
    height: 100vh;
    background-repeat: no-repeat;
     -webkit-background-size: cover;
     -moz-background-size: cover;
     -o-background-size: cover;
     background-size: cover;
      /* font-family: 'Rozha One'; */
      font-family: DM Sans!important;
   }




.tabelamargin{
   margin: 0 70px;

}

   .total{
    /* font-family: Rozha One; */
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 14px;

    color: rgba(0, 0, 0, 0.64);
    margin-left: 740px;
    margin-top: 30px;
   }
   .dpartname{
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 14px;

   }

   .sectionname{
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 20px;



   }

   /* .tabelamargin{
       margin-top: 10px;
   } */



  .sintra{
      width: 20px
  }


  .tablehead th {
    padding-top: 5px;
    padding-bottom: 5px;
    text-align: left;
    background: #099A8B;
    border: none;
    color: white;
    text-align: center;
  }


  .table{
        cursor: pointer;

   }

   .tablehead{
    margin: 120vh!important;
    background: #099A8B;
    color: white;


   }


   .tablehead th, th{
    font-family: Rozha One;
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 17px;
   }

   .data{
       color: #7e7878;
       font-size: 12px;

   }

   tbody td{


font-family: Rozha One;
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 18px;
padding: 3 5px;
color: rgba(0, 0, 0, 0.64);
justify-content: center;
   }



.hr{
    margin-left: 30px;
    margin-bottom: 5px;
}

.page-break {
page-break-before: always;

}

.marginvisto{
    margin-left: 560px;

}

.insiginia{
    margin-top: 50px;
}

.intendente{
    padding-left: 10px!important;
}

    </style>
</head>
<body background= "{{ public_path('assets/img/invoice.jpg') }}">

  <div class="">
      <div class="insiginia">
          <img src="{{ public_path('assets/img/insignia.png') }}" alt="" style="width: 60px; height:60px;">
      </div>
    <div>
        REPÚBLICA DE ANGOLA
    </div>
    <div>
        MINISTÉRIO DO INTERIOR
    </div>
    <div>
        SERVIÇO DE MIGRAÇÃO E ESTRANGEIROS
    </div>

    <div>
        <span class="dpartname">Departamento de Segurança Institucional</span>
    </div>

    <div>
        <span class="sectionname">
            Secção de Segurança Interna
        </span>
    </div>

  </div>

  <div class="mt-1 marginvisto">
      <div class="">


                <div class="col-xs-1 text-center">


                <span class=" data">
                    DATA: <span>{{$hoje}}</span>

                </span>

                <div class="">

                    <span class="">
                        VISTO E APROVADO
                    </span>
                </div>

                <div class="">
                    _____/_____/___/
                </div>

                <div class="">
                    O CHEFE DE SECÇÃO
                </div>

            <div>
                <span class="">JORGE MANUEL DA COSTA CARVALHO</span>
            </div>
            <div>
                <span class="intendente">
                    **SUPERINTENDENTE DE MIGRAÇÃO**
                </span>
            </div>



      </div>
    </div>
  </div>
    <div class="tabelamargin ">
        <div>
                <span>Resultados da pesquisa</span>
        </div>
        <div ">


                <table class="manage">
                    <thead class="tablehead">
                        <tr>
                          <th>ID</th>
                      <th>Nome do Utente</th>
                      <th>Nacionalidade</th>
                      <th>Assunto</th>
                      <th>Andar</th>
                      <th>Pessoa a Contactar</th>
                      <th>Operador</th>
                      <th>Telefone</th>
                      <th>Objecto Deixado</th>
                      <th>Area</th>


                          <th scope="col">Data de Entrada</th>
                          <th scope="col">Data de saida</th>
                        </tr>
                      </thead>



                      <tbody>
                        @foreach ( $manage_subjects as $key=> $manage_subject )
                        <tr>

                          <th scope="row">{{$key+1}}</th>

                          <td>{{$manage_subject->visitors_name}}</td>

                          <td>{{$manage_subject->nacionalities_name}}</td>
                          <td>{{$manage_subject->motive}}</td>
                          <td>{{$manage_subject->floors_name}}</td>
                          <td>{{$manage_subject->users_name}}</td>
                          <td>{{$manage_subject->by}}</td>
                          <td>{{$manage_subject->visitors_phone_number}}</td>
                          <td>{{$manage_subject->object_left}}</td>
                          <td>

                                  @if (isset($manage_subject->directions_name))
                                      {{$manage_subject->directions_name}}

                                      @elseif (isset($manage_subject->departments_name))
                                      {{$manage_subject->departments_name}}
                                      @elseif (isset($manage_subject->sections_name))

                                      {{$manage_subject->sections_name}}

                                  @endif

                          </td>
                          <td>{{$manage_subject->created_at}}</td>

                          @if($manage_subject->created_at != $manage_subject->updated_at)
                         <td class="">{{$manage_subject->updated_at ??''}}</td>
                         @else
                         <td class="text-white "><span class="bg-danger w-100"> Vitante sem saida</span></td>

                          @endif

                        </tr>


                        @endforeach
                      </tbody>

                </table>

                 <div class="page-break"></div>




              {{-- <div class=" ">
                <span class="">
                    TOTAL DE  VISITAS: {{$manage_subjects->count()}}
                </span>
            </div> --}}

        </div>

    </div>

</body>
</html>
