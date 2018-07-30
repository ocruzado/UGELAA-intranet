<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Help Desk - UGELAA desarrollado por el equipo de informática">
    <meta name="author" content="Ing. Orry Nays Cruzado Morey">

    <title>Help Desk - @yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

@yield('stylesheet')

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>


<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            {{--<a class="navbar-brand" href="index.html">SB Admin v2.0</a>--}}
            <a class="navbar-brand" href="index.html">HELP DESK - UGELAA</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    {{--<i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                    {{--                    <i class="fa fa-user fa-fw"></i> {{ strtoupper(auth()->user()->email) }} <i--}}
                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->email }} <i
                            class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-gear fa-fw"></i> Configuración</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a id="a_logout" href="#"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                    </li>

                </ul>
                <!-- /.dropdown-messages -->
            </li>
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="{{url('dashboard')}}">
                            <i class="fa fa-dashboard fa-fw"></i> Dashboard
                        </a>
                    </li>

                    @if(Auth::user()->hasRole('admin'))
                        <li>
                            <a href="#">
                                <i class="fa fa-university fa-fw"></i>
                                ADMINITRAR<span class="fa arrow"></span>
                            </a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{url('area')}}">Areas</a>
                                </li>
                                <li>
                                    <a href="{{url('usuario')}}">Usuario</a>
                                </li>

                                <li>
                                    <a href="{{url('categoria')}}">Categoria</a>
                                </li>
                            </ul>
                        </li>
                    @endif


                    <li>
                        <a href="{{url('ticket-new')}}"><i class="fa fa-table fa-fw"></i> New Ticket</a>
                    </li>

                    <li>
                        <a href="{{url('ticket-admin')}}"><i class="fa fa-edit fa-fw"></i> Tickets</a>
                    </li>

                    <li>
                        <a href="{{url('asignacion-admin')}}"> Asignacion</a>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="panels-wells.html">Panels and Wells</a>
                            </li>
                            <li>
                                <a href="buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="typography.html">Typography</a>
                            </li>
                            <li>
                                <a href="icons.html"> Icons</a>
                            </li>
                            <li>
                                <a href="grid.html">Grid</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Second Level Item</a>
                            </li>
                            <li>
                                <a href="#">Third Level <span class="fa arrow"></span></a>
                                <ul class="nav nav-third-level">
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                    <li>
                                        <a href="#">Third Level Item</a>
                                    </li>
                                </ul>
                                <!-- /.nav-third-level -->
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span
                                    class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="blank.html">Blank Page</a>
                            </li>
                            <li>
                                <a href="login.html">Login Page</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">


        <div class="row">
            <div class="col-lg-12">
                {{--<h1 class="page-header">Forms</h1>--}}
                <h1 class="page-header">
                    @yield('content-title')
                </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                {{--<div class="panel panel-default">--}}

                    @yield('content-body')

                {{--</div>--}}
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->

</div>


<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootbox.min.js') }}" type="text/javascript"></script>

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js" type="text/javascript"></script>--}}

<script type="text/javascript">
    $(document).ready(function () {
        bootbox.setLocale("es"); // set bootbox library

        $('#a_logout').click(function (e) {

            bootbox.confirm({
                message: "¿Estás seguro que desea finalizar la sessión?",
                size: 'small',
                callback: function (result) {
                    if (result) {

                        $.ajax({
                            url: "{{ url('logout') }}",
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            method: 'post',
                            success: function (data) {
                                if (data.success) {
                                    window.location.replace(data.data);
                                }
                            }
                        });
                    }
                }
            });


        });
    });

    function formato_row_number(value, row, index) {
        return 1 + index;
    }

    String.Format = function (b) {
        var a = arguments;

        return b.replace(/(\{\{\d\}\}|\{\d\})/g, function (b) {
            if (b.substring(0, 2) == "{!!'{{'!!}") return b;
            var c = parseInt(b.match(/\d/)[0]);
            return a[c + 1]
        })
    };
</script>

@yield('script')

</body>
</html>