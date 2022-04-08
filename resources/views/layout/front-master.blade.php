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
    <link rel="stylesheet" href="{{ asset('assets/front/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick-theme.css') }}">
    <style>
        .comment-div{
            border: 1px solid white;
        }
        .main-container {
            width: 95%;
            margin: auto;
            margin-top: 75px
        }
        .w-95{
            width: 95%;
            margin: auto;
        }
        .cover {
            width: 100%;
            height: 350px;
            padding-bottom: 20px
        }

        .cover img {
            width: 100%;
            height: 100%;
        }

        .profile-image {
            width: 70px;
            height: 70px;
            border-radius: 50%
        }

        .navbar-nav {
            margin-left: 30px;
        }

        .nav-link {
            color: #fff;
        }

        .nav-link.active {
            background-color: transparent !important;
            border: none !important;
            color: #000;
            border-bottom: 2px solid #000 !important;
            margin-bottom: 15px
        }

        .navbar-brand {
            padding-left: 35px !important;
        }

        .nav-link:hover {
            border: none !important;
            border-bottom: 2px solid #000 !important;
            transition:0s;
        }

        .tab-content {
            /* background-color: #1b1b1b; */
            margin-bottom: 20px
        }

        .video-list {
            width: 100% !important;
            height: 180px !important;
        }

        .video-row{
            margin-right:-5px !important;
            margin-left:-5px !important;
        }

        .video-box{
             padding: 5px !important; 
        }

        .video-box .video-content{
            padding: 0px !important;
            display: flex;
            flex-direction: row;
        }

        .video-box a{
            color: #515151;
        }
        .show {
            background-color: transparent !important
        }

        .clickable {
            cursor: pointer;
        }

        .video video {
            width: 100%;
            height: 500px;
        }

        .dropdown-menu.show {
            background-color: #1b1b1b !important;
            right: 0
        }

        .dropdown-item {
            color: #fff !important;

        }

        .dropdown-item:focus,
        .dropdown-item:hover {
            background-color: transparent;
            text-decoration: underline
        }

        .profile-image.play {
            height: 50px;
            width: 50px;
            margin-left: 15px
        }
        .ui-autocomplete
        {
            position:absolute;
            cursor:default;
            z-index:99999 !important
        }

        #carousalTop {
            padding: 35px;
        }

        .carousel-item {
            height: 300px;
        }

        #carousalTop {
            padding-bottom: 0px;
        }

        .navigations{
            display:flex;
            align-items: center;
            flex-basis: auto;
            justify-content: space-between;
            width: 100%;
        }
        
        .navigations .menu{
            margin-right:auto;
        }

        .notifications ul{
            list-style-type: none;
        }

        .notifications li{
            display: inline-block;
        }

        .search{
            justify-content: center;
        }

        .search .form-group{
            width: 100%;
        }

        .has-search .form-control{
            background:#fff;
            
        }
        .has-search .form-control-feedback{
            color:#000 !important;
        }

        .notifications .nav-link{
            font-size: 18px;
        }
        
        .notifications .nav-link:hover{
            border:unset !important;
        }
        
        .notifications .nav-link{
            border:unset !important;
            margin:0px !important;
                padding-right: 0px !important;
    padding-left: 0px !important;
    margin-left:20px !important;
        }
        .notifications .nav-link:hover a{
            border:unset !important;
        }
      .dropdown-menu.show{
            background:#fff !important;
            width:155px;
            padding:10px;
        }
        
        .dropdown-menu#notification-menu.show{
            width:250px !important;
        }

       .dropdown-menu.show li{
            height:30px;
            overflow: hidden;
        }

      .dropdown-menu.show li .profile-pic{
            height:100% !important;
            width: unset !important;
            float: left;
            min-width: unset !important;
            min-height: unset !important;

        }

     .dropdown-menu.show li a{
            display: block;
            font-size: 12px;
            color: #000;
            text-align:left;
        }
        .boxImg img{
            object-fit: cover;
        }

        .video-box .image-link-cover .profile-pic{
            height: 50px;
            width: 50px;
            border-radius: 100%;
            /* border: 1px solid; */
            overflow: hidden;
        }

        .video-box .image-link-cover .profile-pic img{
            height: 100%;
            width: 100%;
        }

        .video-box .image-link-cover{
            margin: 15px 13px 0px 0px;
        }

        .video-box .details{
            display: block !important;
            margin-top:15px !important;
        }

        .video-box .details .title-cover h3{
            color:#000;
            font-size: 1.4rem !important;
            line-height: 2rem;
            overflow: hidden; 
            display: block; 
            -webkit-line-clamp: 2;
            display: box;
            display: -webkit-box;
            -webkit-box-orient: vertical;
            text-overflow: ellipsis;
            white-space: normal;
            font-weight: 500;
            text-transform: capitalize;
            margin-bottom: 0px;
        }

        .heading h2{
            margin-left:0px !important;
            margin-right:0px !important;
            margin-bottom:30px !important;
        }

        .details .channel{
            display: block;
        }

        .details .channel .channel-inner{
            display: flex;
            flex-direction: row;
        }
        .details .channel .channel-inner a{
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            line-height: 22px;
        }

        .signin a{
            font-size: 14px !important;
            width: 70px;
        }
        .notifications .navbar-nav{
            margin-left:0px;
        }
    </style>


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

        <div class="navigations">
            <div class="menu">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            @auth()
                                <a class="nav-link" href="{{ route('home') }}">Home</a>
                            @else

                                <a class="nav-link" href="{{ route('default') }}">Home</a>
                            @endauth
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
                </div>
            </div>
            
            <form class="form-inline my-2 my-lg-0 search" id="search-form" action="{{ route('home') }}" methdd="GET" autocomplete="off">
                    <!-- Actual search box -->
                    {{ csrf_field() }}
                    <div class="form-group has-search autocomplete ui-widget">
                        <span class="fa fa-search form-control-feedback"></span>
                        <input type="text" class="form-control typeahead " id="search" placeholder="Search"/>
                    </div>
            </form>
            <div class="right d-flex notifications" style="margin-right: 70px;">
                    <ul class="navbar-nav">
                        @auth
                            <li class="nav-item dropdown">
                                    <a class=" btn nav-link" data-toggle="dropdown" data-target="#authmenu" >
                                        <i class="fas fa-user mr-1"></i>
                                    </a>
                                    <ul class="dropdown-menu" id="authmenu">
                                        <li class="add_pro details dropdown-item">
                                            <a href="{{ route('channel.index', auth()->user()) }}" style="">{{ auth()->user()->name }}</a>
                                        </li>
                                        <li class="add_pro dropdown-item">
                                            <a href="{{ route('user.profile', auth()->user()) }}">Account</a>
                                        </li>
                                        <li class="add_pro dropdown-item">
                                            <a href="#">Inbox</a>
                                        </li>
                                        <li class="add_pro dropdown-item">
                                            <a href="{{ route('user.studio') }}">Creator Studio</a>
                                        </li>
                                        <li class="add_pro dropdown-item">
                                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Sign Out</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                  
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.upload') }} ">
                                    <i class="fas fa-video"></i>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="btn nav-link" data-target="#notification-menu" data-toggle="dropdown">
                                    <i class="fas fa-bell"></i>
                                </a>
                                <ul class="dropdown-menu" id="notification-menu">
                                    <div class="dropdown-header">Notifications</div>
                                    @if(count($notifications) > 0)
                                        @foreach($notifications as $notification)
                                            <li class="add_pro details dropdown-item">
                                                <div class="profile-pic" style="margin-left: 15px">
                                                    <img src="{{ asset('assets/front/images/dummy.jpg') }}" alt=""/>
                                                </div>
                                                <a href="{{ route('channel.index', auth()->user()) }}" style="margin-top: 0px !important; margin-left: 5px">{{ auth()->user()->name }}</a>
                                            </li>
                                        @endforeach
                                    @else
                                        <li class="add_pro details dropdown-item">
                                            <a href="{{ route('channel.index', auth()->user()) }}" style="margin-top: 0px !important; margin-left: 5px">No new notifications</a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        @else
                            <li class="nav-item active signin">
                                <a class="nav-link" href="{{ route('login') }}">Sign In</a>
                            </li>
                        @endauth
                    </ul>
            </div>
        </div>
        

        
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>

    <script src="https://kit.fontawesome.com/74d240b4ae.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
    <script src="{{ asset('js/slick.min.js') }}"></script>


    <script>
        $( function() {
            $( "#search" ).autocomplete({
                source: function( request, response ) {
                    // Fetch data
                    var headers = { 'X-CSRF-TOKEN': $('input[name="_token"]').val()};
                    $.ajax({
                        url:"{{route('autocomplete')}}",
                        type: 'get',
                        dataType: "json",
                        headers: headers,
                        data: {
                            search: request.term
                        },
                        success: function( data ) {
                            response( data );
                        }
                    });
                },
                select: function (event, ui) {
                    // Set selection
                    $('#search').val(ui.item.label); // display the selected text
                    return false;
                }
            });

            $(".slick-slider").slick({
                slidesToShow: 4,
                slidesToScroll: 4,
                infinite: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

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