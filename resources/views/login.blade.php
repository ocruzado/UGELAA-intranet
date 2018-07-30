<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Help Desk - UGELAA desarrollado por el equipo de informática">
    <meta name="keywords" content="ugelaa, help desk, soporte, ticket">
    <meta name="author" content="Ing. Orry Nays Cruzado Morey">

    <title>Help Desk - @yield('title')</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="container">
    <div class="row">

        <div class="col-md-4 col-md-offset-4">

            <div class="login-panel panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">HELP DESK - UGELAA</h3>
                </div>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input id="usuario" name="usuario" class="form-control" placeholder="Usuario"
                                       autofocus>
                            </div>
                            <div class="form-group">
                                <input id="clave" name="clave" class="form-control" placeholder="Clave"
                                       type="password">
                            </div>
                            <div class="form-group">
                                <button id="btn_login" class="btn btn-lg btn-success btn-block" type="button">
                                    INGRESAR
                                </button>
                            </div>

                            <div id="div_errors" class="alert alert-danger">
                            </div>

                        </fieldset>
                    </form>
                </div>


            </div>

        </div>

    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>

<script type="text/javascript">

    var $div_errors = $('#div_errors');

    $(document).ready(function () {
        $div_errors.hide();

        $('#btn_login').click(function (e) {

            $div_errors.hide();
            $.ajax({
                method: 'post',
                url: "{{ url('login') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    // email: $('#usuario').val(),
                    // password: $('#clave').val()
                    usuario: $('#usuario').val(),
                    clave: $('#clave').val()
                },
                success: function (data) {
                    if (data.success) {
                        window.location.replace(data.data);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    var data = JSON.parse(xhr.responseText);

                    $div_errors.html('').show();
                    $div_errors.append(data.message);
                }
            });
        });
    });
</script>

</body>
</html>