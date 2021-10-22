<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exportar PDF</title>
</head>
<style>
    .manage{
        align-items: center;
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100;
    }

    .manage td, .manage th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .manage th{
        width: 100%;
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #4CAF50;
        color: #fff
    }
</style>
<body>

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
          <th>Objecto deixado</th>
          <th>Area</th>


              <th scope="col">Data de registro</th>
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

            </tr>

            @endforeach
          </tbody>

    </table>

</body>
</html>
