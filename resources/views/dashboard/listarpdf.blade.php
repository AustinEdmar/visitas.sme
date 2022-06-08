<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">



 <title>Document</title>

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

   .sectioninfobanner{

       width: 100%;
       margin-top: 125px;
       margin-left: 420px;


   }

   .bolado{
       /* margin-left: 520px; */
   }

   .sectionAprov{
       margin-left:550px;
   }

   .hr{
    margin-left: 50px;
        margin-right: 50px;
   }

   .tabela{
        margin-left: 30px;
        margin-right: 30px;
   }
   .table{
        cursor: pointer;

   }

   .tablehead{
    margin: 120vh!important;
    background: #099A8B;
    color: white;


   }

   .total{
    /* font-family: Rozha One; */
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 14px;

    color: rgba(0, 0, 0, 0.64);
    margin-left: 820px;
    margin-bottom: 30px;
   }

   .tablehead th, th{
    /* font-family: Rozha One; */
    font-style: normal;
    font-weight: normal;
    font-size: 14px;
    line-height: 17px;
   }

   tbody td{


/* font-family: Rozha One; */
font-style: normal;
font-weight: normal;
font-size: 14px;
line-height: 18px;

color: rgba(0, 0, 0, 0.64);
   }

   .vistotitulo{
    /* font-family: Rozha One; */
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 14px;

    color: rgba(0, 0, 0, 0.64);
   }


   .chefe{
    /* font-family: Rozha One; */
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 11px;

    color: rgba(0, 0, 0, 0.64);
   }

   .intendente{
    font-size: 15px;
    line-height: 11px;

    color: rgba(0, 0, 0, 0.64);
   }

   .dpartname{
    /* font-family: Rozha One; */
    font-style: normal;
    font-weight: normal;
    font-size: 20px;
    line-height: 14px;

    color: #FFFFFF;
   }

   .sectionname{
    /* font-family: Rozha One; */
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 14px;

    color: #FFFFFF;
   }

 /* outro */
 .tablehead th {
    padding-top: 20px;
    padding-bottom: 20px;
    text-align: left;
    background: #099A8B;
    border: none;
    color: white;
  }

  .sintra{
      width: 20px
  }



    </style>
</head>
<body background= "{{ public_path('assets/img/invoice.png') }}">

  <div class="col-xs-1 text-center">
        <div class="sectioninfobanner">

                       <div class="bolado">
                        <div>
                            <span class="dpartname">Departamento de Segurança Institucional</span>
                        </div>
                        <div>
                            <span class="sectionname">
                                Secção de Segurança Interna
                            </span>
                        </div>
                        <div>
                            <span class="text-white mr-3">
                                DATA <span>01 /03/2021</span>
                            </span>
                        </div>
                       </div>

        </div>
  </div>

  <div class="mt-5 ">
      <div class="d-flex justify-content-end">
        <div class="sectionAprov text-center">

            <div>
                <span class="vistotitulo">
                    VISTO E APROVADO
                </span>
            </div>

            <div class="hr">
                _____/_____/___/
            </div>

            <div>
                O CHEFE DE SECÇÃO
            </div>
            <div>
                <span class="chefe">JORGE MANUEL DA COSTA CARVALHO</span>
            </div>
            <div>
                <span class="intendente">
                    **SUPERINTENDENTE DE MIGRAÇÃO**
                </span>
            </div>

        </div>
      </div>
  </div>
    <div class="tabela">
        <div>
                <span>Relatorio do mes: Junho</span>
        </div>
        <div>
            <table class="table table-striped">
                <thead class="tablehead">
                  <tr>
                    <th scope="col">Nº</th>
                    <th scope="col">Nome do utente</th>
                    <th scope="col">Nacionalidade</th>
                    <th scope="col">Assunto</th>
                    <th scope="col">Pessoa contactar</th>
                    <th scope="col">Nº. Telefone</th>


                    <th scope="col">Data de registro</th>
                  </tr>
                </thead>



                <tbody>
                  <tr>
                {{--  @foreach ( $manage_subjects as $key=> $manage_subject ) --}}
                    <th scope="row">{{-- {{$key+1}} --}}</th>
                    <td>{{$manage_subject->visitors_name  ??''}}</td>

                    <td>{{$manage_subject->motive ??''}}</td>
                    <td>{{$manage_subject->users_name ??''}}</td>
                    <td>{{$manage_subject->visitors_phone_number ??''}}</td>

                    <td>{{$manage_subject->users_name  ??''}}</td>

                    <td>{{$manage_subject->created_at ??''}}</td>
                  </tr>


                </tbody>
                {{-- @endforeach --}}
              </table>



              {{-- <div class="d-flex justify-content-end total">
                <span class="mb-3">
                    TOTAL DE  VISITAS: {{$manage_subjects->count()}}
                </span>
            </div> --}}

        </div>

    </div>

</body>
</html>
