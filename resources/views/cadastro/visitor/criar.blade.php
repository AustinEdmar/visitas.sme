





{{-- html --}}

<input type="text" id="employee_search" class="form-control " placeholder="Buscar o nome do funcionario" style="border:red ">

{{-- rota --}}

Route::post('manage_subject/search','Manage_subjectController@getUsers')->name("manage.searchUsers");

{{-- scripts js --}}

<script type="text/javascript">

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            $('#employee_search').autocomplete({
                source:function(request,respon){
                    $.ajax({
                        url: "{{route('manage.searchUsers')}}",
                        type: "post",
                        dataType: "json",
                        data: {
                            _token: CSRF_TOKEN,
                            search: request.term
                        },
                        success:function(data){
                            respon(data);

                        }
                    });
                },
                select: function(event,ui){
                    $('#employee_search').val(ui.item.label);
                    $('#employeeid').val(ui.item.value);
                     $('#employeename').val(ui.item.name);
                    return false;

                }
            });
        });
    </script>

    {{-- scripts js fim --}}



    {{-- controller --}}

    public function getUsers(Request $request){
        $search = $request->search;

        if($search == ''){
            $users = User::orderby("name","asc")
                                    ->select("id","name")
                                   // ->limit(5)
                                    ->get();
        }else{
            $users = User::orderby("name","asc")
                                    ->select("id","name","email")
                                    ->where("name","like","%".$search."%")
                                   // ->limit(5)
                                    ->get();

        }



        $response = array();
        foreach($users as $user){
            $response[] = array(
                "value" => $user->id,
                /* 1-passa no input email
                <input type="email" id="usermail" readonly>
              2- no jquery
                    $('#usermail').val(ui.item.email);
                */
                "name" => $user->name,
                "label" => $user->name
            );
        }


        return response()->json($response);


    }






