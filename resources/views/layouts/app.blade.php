<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&family=Open+Sans:wght@300;400;600;700&display=swap"
            rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/notification.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/> --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick-theme.css') }}">

    <script>
        window.Laravel = @php echo json_encode(['csrfToken' => csrf_token()]); @endphp
    </script>

    @if (!auth()->guest())
        <script>
            window.Laravel.userId = <?php echo auth()->user()->id; ?>
        </script>
    @endif
</head>

<body class="container-fluid">
<nav class="navbar navbar-expand-lg navbar-light">

    <a class="navbar-brand logo" href="#">
        FORA
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('watchlist') }}">Watchlist</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./library.php">Live</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('library') }}">Library</a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" id="search-form" action="{{ route('home') }}" methdd="GET" autocomplete="off">
            <!-- Actual search box -->
            {{ csrf_field() }}
            <div class="form-group has-search autocomplete ui-widget">
                <span class="fa fa-search form-control-feedback"></span>
                <input type="text" class="form-control typeahead " id="search" placeholder="Search">
            </div>
        </form>
        <div class="right d-flex" style="margin-right: 30px;">
            <div class="nav_right">
                <ul>
                    <li class="nr_li dd_main">
                        @auth
                            <a href="JavaScript:voideo(0)">
                                <i class="fas fa-user mr-1"></i>
                            </a>
                        @endauth

                        <div class="dd_menu">

                            <div class="dd_right">
                                <ul>

                                    <li class="add_pro">
                                        <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sign Out</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>
<div class="container-fluid">
    @yield('content')
</div>

<script src="https://kit.fontawesome.com/74d240b4ae.js" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
<script src="{{ asset('js/slick.min.js') }}"></script>


<script>

    $( function() {
        {{--$( "#search" ).autocomplete({--}}
        {{--    source: function( request, response ) {--}}
        {{--        // Fetch data--}}
        {{--        var headers = { 'X-CSRF-TOKEN': $('input[name="_token"]').val()};--}}
        {{--        $.ajax({--}}
        {{--            url:"{{route('autocomplete')}}",--}}
        {{--            type: 'get',--}}
        {{--            dataType: "json",--}}
        {{--            headers: headers,--}}
        {{--            data: {--}}
        {{--                search: request.term--}}
        {{--            },--}}
        {{--            success: function( data ) {--}}
        {{--            response( data );--}}
        {{--            }--}}
        {{--        });--}}
        {{--    },--}}
        {{--    select: function (event, ui) {--}}
        {{--        // Set selection--}}
        {{--        $('#search').val(ui.item.label); // display the selected text--}}
        {{--        return false;--}}
        {{--    }--}}
        {{--});--}}

        // $(".slick-slider").slick({
        //     slidesToShow: 4,
        //     slidesToScroll: 4,
        //     infinite: false,
        //     responsive: [
        //         {
        //             breakpoint: 1024,
        //             settings: {
        //                 slidesToShow: 3,
        //                 slidesToScroll: 3,
        //             }
        //         },
        //         {
        //             breakpoint: 600,
        //             settings: {
        //                 slidesToShow: 2,
        //                 slidesToScroll: 2
        //             }
        //         },
        //         {
        //             breakpoint: 480,
        //             settings: {
        //                 slidesToShow: 1,
        //                 slidesToScroll: 1
        //             }
        //         }
        //     ]
        // });

    } );

    // var path = "{{ url('autocomplete') }}";
    // $('#search').typeahead({
    //     minLength: 2,
    //     source:  function (query, process) {
    //     return $.get(path, { query: query }, function (data) {
    //             console.log('Data',data);
    //             return process(data);
    //         });
    //     }
    // });

    $('#search-form').submit(function( event ) {
        event.preventDefault();
        let q = $('#search').val();
        var path = "{{ url('search') }}?q="+q;

        console.log("{{request()->is('search')}}");
        // return;

        if("{{request()->is('search')}}" != 1){
            document.location.href = path;
        }


    });

    $(document).ready(function() {
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            //$(".active-tab span").html(activeTab);
            //$(".previous-tab span").html(previousTab);
        });
    });

    $(".video-list").click(function() {
        window.location.href = $(this).data('href');
    });

    var dd_main = document.querySelector(".dd_main");

    dd_main.addEventListener("click", function() {
        this.classList.toggle("active");
    })
</script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
@yield('jscripts')

@stack('scripts')

</body>

</html>
