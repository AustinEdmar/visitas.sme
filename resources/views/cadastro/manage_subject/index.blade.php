<div class="">
    <div class="card">
        <div class="card-header">
            <div class="row">

                    <h4>Minhas Visitas</h4>

            </div>
        </div>


                <div>
                    <div>
                      <table class="table table-sm table-striped table-hover">

                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Objecto deixado</th>

                              <th scope="col">Motivo</th>
                              <th scope="col">Pvc</th>



                              <th scope="col">Utente</th>
                              <th scope="col">Funcionario a contactar</th>


                              <th scope="col">Hora entrada</th>

                                <th scope="col">andamento</th>

                              <th scope="col">Acções</th>
                            </tr>

                          </thead>
                          <tbody>

                             @foreach($manage_subjects as $key=> $manage_subject)
                            <tr>
                               <th scope="row$">{{$key+1}}</th>

                               <td>{{$manage_subject->object_left ??''}}</td>

                               <td>{{ Illuminate\Support\Str::of($manage_subject->motive ??'')->words(3)}}</td>
                               <td>{{ $manage_subject->pcv->number_pvc ??''}}</td>


                               <td>{{$manage_subject->visitor->name ??''}}</td>

                               <td>{{$manage_subject->user->name ??''}}</td>



                               <td>{{$manage_subject->created_at ??''}}</td>

                                <td>

                                <div class="mt-1">
                                    @if ($manage_subject->progress->name == 'Aprovado')
                                   <span class="alert alert-success ">Activo</span>
                                   @elseif($manage_subject->progress->name == 'Pendente')
                                   <span class="alert alert-warning">Pendente</span>

                                   @elseif($manage_subject->progress->name == 'Recusado')
                                   <span class="alert alert-danger">Recusado</span>
                                   @endif
                                  </div>
                               </td>




                               <td>
                                    <a href="{{route('manage_subject.edit', $manage_subject->id)}}" ><i class="fa fa-eye btn btn-warning"></i></a>
                               </td>


                               <td>

                                    <a href="{{route('manage_subject.delete', $manage_subject->id) ?? ''}}"
                                        onclick="return confirm('Tens a certeza que pretendes apagar')"
                                        ><i class="fas fa-trash btn btn-danger"></i></a>
                                 </td>
                            </tr>
                            @endforeach

                          </tbody>

                        </table>

                    </div classe="">

                    {!! $manage_subjects->render() !!}



                </div>


    </div>
</div>
</div>
