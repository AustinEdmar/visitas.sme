


<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/fontawesome/fontawesome.min.css')}}">

    <!-- CSS only -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @laravelPWA
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>
<body style="background-image: url('{{ asset('assets/img/fundo.svg')}}'); background-size: cover;background-repeat: no-repeat;">

    <div id="app">

        <main class="py-4">
            @if ($user = Auth::user())
            <label for=""></label>
            <div class="d-flex justify-content-end mr-5">

                <label class="text-white bold mr-3">Bem-vindo de volta,

                    </label>

                    {{-- dropdown --}}


                 <div class="dropdown show mr-2">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('image')}}/{{$user->image}}" height="40px" width="40px" class="rounded-circle"> <span class="">{{ Auth::user()->name }}</span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                      <a class="dropdown-item" href="{{route('user.perfil', $user->id)}}">Meu Perfil</a>

                      <a href="javascript:void" class="btn btn-danger dropdown-item"  onclick="$('#logout-form').submit();">
                        <i class="fas fa-power-off " style="color: red; font-weght:bold"><span> Sair</span></i>
                    </a>
                    </div>
                  </div>




                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @endif
            @yield('content')
        </main>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    {!! Toastr::message() !!}

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            $('#employee_search').autocomplete({
                source:function(request,respon){
                    $.ajax({
                        url: "{{route('visitor.searchUsers')}}",
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


    <script>
   $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset ").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
</script>


</body>
</html>
