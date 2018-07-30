@extends('layouts.app')

@section('title', 'TICKET')

@section('stylesheet')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection

@section('content-title', 'MIS TICKETS')

@section('content-body')
    <div id="div_registro" class="panel panel-default" style="display: none">
        <div class="panel-heading">
            Detalle Ticket

            {{--<div class="row">--}}
            {{--<div class="col-lg-4">--}}
            {{--<h4 class="modal-title">Ticket #<span id="spa_codigo"></span></h4>--}}
            {{--Detalle Ticket #<strong id="spa_codigo" title="Codigo"></strong>--}}
            {{-----}}
            {{--<strong id="spa_estado" title="Estado"></strong>--}}
            {{--</h4>--}}
            {{--</div>--}}
            {{--<div class="col-md-4 col-md-offset-4">--}}
            {{--Usuario: <strong id="spa_usuario" title="Usuario"></strong>--}}
            {{--</div>--}}

            {{--</div>--}}
        </div>
        <div class="panel-body">
            {{--<form role="form">--}}
            {{--<div class="row">--}}

            {{--<h1>Detalle Ticket</h1>--}}
            {{--<div class="form-group col-lg-6">--}}
            {{--<label for="sel_area">Área</label>--}}
            {{--<select id="sel_area" name="sel_area" class="form-control"></select>--}}
            {{--</div>--}}


            {{--<div class="form-group col-lg-6">--}}
            {{--<label for="sel_categoria">Categoria</label>--}}
            {{--<select id="sel_categoria" name="sel_categoria" class="form-control"></select>--}}
            {{--</div>--}}


            {{--<div class="form-group col-lg-6">--}}
            {{--<label for="tex_descripcion">Descripción</label>--}}
            {{--<textarea id="tex_descripcion" name="tex_descripcion" class="form-control"--}}
            {{--rows="2" cols="40" placeholder="ingrese la descripción" type="text"></textarea>--}}
            {{--</div>--}}

            {{--<div class="form-group col-lg-6">--}}
            {{--<label for="inp_imagen">Cargar Imagen</label>--}}
            {{--<input id="inp_imagen" name="inp_imagen" class="form-control"--}}
            {{--placeholder="cargar imagen" type="file">--}}
            {{--</div>--}}

            {{--<div class="col-lg-12">--}}
            {{--<div class="form-group">--}}
            {{--<input id="hdf_id" name="hdf_id" value="0" type="hidden"/>--}}
            {{--<button id="btn_save" type="button" class="btn btn-primary">--}}
            {{--GUARDAR <i class="fa fa-floppy-o" aria-hidden="true"></i>--}}
            {{--</button>--}}
            {{--<button id="btn_cancel" type="reset" class="btn btn-default">--}}
            {{--CANCELAR <i class="fa fa-ban" aria-hidden="true"></i>--}}
            {{--</button>--}}
            {{--</div>--}}
            {{--<div id="div_errors" class="alert alert-danger">--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}

            {{--<div class="modal-header">--}}
            {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}

            <div class="row">
                <div class="col-lg-4">
                    {{--<h4 class="modal-title">Ticket #<span id="spa_codigo"></span></h4>--}}
                    Ticket #<strong id="spa_codigo" title="Codigo"></strong>
                    -
                    <strong id="spa_estado" title="Estado"></strong>
                    {{--</h4>--}}
                </div>
                <div class="col-md-4 col-md-offset-4">
                    Usuario: <strong id="spa_usuario" title="Usuario"></strong>
                </div>

            </div>

            {{--</div>--}}
            {{--<div class="modal-body">--}}

            <div class="row">
                <div class="col-lg-4">
                    <label for="spa_area">Area</label>
                    <p id="spa_area"></p>
                </div>
                <div class="col-lg-4">
                    <label for="spa_categoria">Categoria: </label>
                    <p id="spa_categoria"></p>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-4">
                    <label for="spa_descripcion">Descripcion</label>
                    <p id="spa_descripcion" class="text-justify"></p>
                </div>

                <div class="col-lg-8">
                    <label for="spa_descripcion">Imagen</label>
                    {{--<img style="height: 200px; width: 200px; background-color: #EFEFEF; margin: 20px;"--}}
                    <a id="img_image_a" href="#">
                        <img id="img_image" class="thumbnail img-responsive">
                    </a>

                    <div id="img_image_not_found" class="alert-info" style="display: none">Imagen no adjuntada
                    </div>

                </div>
            </div>
            {{--</div>--}}
            {{--<div class="modal-footer">--}}
            {{--<h4 class="modal-title">Fecha Registro :<strong id="spa_created_at_fecha"></strong></h4>--}}
            <div class="row" style="text-align: left">
                <div class="col-md-4">
                    Tiempo Transcurrido : <strong id="spa_created_at_diff"></strong>

                </div>
                <div class="col-md-4 col-md-offset-4">
                    Fecha Registro : <strong id="spa_created_at_fecha"></strong>
                </div>
            </div>


            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
            {{--</div>--}}

            {{--</form>--}}
        </div>
    </div>
    <div id="div_listado" class="panel panel-default">
        <div class="panel-heading">
            Listado Tickets
        </div>
        <div class="panel-body">


            <div class="row">

                {{--<div class="col-lg-12">--}}
                {{--<div class="form-group">--}}
                {{--<button id="btn_new" type="button" class="btn btn-primary">--}}
                {{--NUEVO <i class="fa fa-plus" aria-hidden="true"></i>--}}
                {{--</button>--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="col-lg-12">
                    <table id="tbl_lista">
                        <thead>
                        <tr>
                            <th data-formatter="formato_row_number" data-halign="center" data-valign="middle"
                                data-align="center" data-width="30">#
                            </th>
                            <th data-field="codigo">Codigo</th>
                            <th data-field="email">Usuario</th>
                            <th data-field="siglas">Area</th>
                            <th data-field="nombre">Categoria</th>
                            <th data-field="value">Estado</th>
                            <th data-formatter="formato_operaciones" data-halign="center" data-valign="middle"
                                data-align="center" data-width="100">Opciones
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--<div id="div_modal" class="modal fade">--}}
    {{--<div class="modal-dialog modal-lg">--}}
    {{--<div class="modal-content">--}}
    {{--<div class="modal-header">--}}
    {{--<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>--}}

    {{--<div class="row">--}}
    {{--<div class="col-lg-4">--}}
    {{--<h4 class="modal-title">Ticket #<span id="spa_codigo"></span></h4>--}}
    {{--Ticket #<strong id="spa_codigo" title="Codigo"></strong>--}}
    {{-----}}
    {{--<strong id="spa_estado" title="Estado"></strong>--}}
    {{--</h4>--}}
    {{--</div>--}}
    {{--<div class="col-md-4 col-md-offset-4">--}}
    {{--Usuario: <strong id="spa_usuario" title="Usuario"></strong>--}}
    {{--</div>--}}

    {{--</div>--}}

    {{--</div>--}}
    {{--<div class="modal-body">--}}

    {{--<div class="row">--}}
    {{--<div class="col-lg-4">--}}
    {{--<label for="spa_area">Area</label>--}}
    {{--<p id="spa_area"></p>--}}
    {{--</div>--}}
    {{--<div class="col-lg-4">--}}
    {{--<label for="spa_categoria">Categoria: </label>--}}
    {{--<p id="spa_categoria"></p>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="row">--}}

    {{--<div class="col-lg-4">--}}
    {{--<label for="spa_descripcion">Descripcion</label>--}}
    {{--<p id="spa_descripcion" class="text-justify"></p>--}}
    {{--</div>--}}

    {{--<div class="col-lg-8">--}}
    {{--<label for="spa_descripcion">Imagen</label>--}}
    {{--<img style="height: 200px; width: 200px; background-color: #EFEFEF; margin: 20px;"--}}
    {{--<a id="img_image_a" href="#">--}}
    {{--<img id="img_image" class="thumbnail img-responsive">--}}
    {{--</a>--}}

    {{--<div id="img_image_not_found" class="alert-info" style="display: none">Imagen no adjuntada--}}
    {{--</div>--}}

    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--<div class="modal-footer">--}}
    {{--<h4 class="modal-title">Fecha Registro :<strong id="spa_created_at_fecha"></strong></h4>--}}
    {{--<div class="row" style="text-align: left">--}}
    {{--<div class="col-md-4">--}}
    {{--Tiempo Transcurrido : <strong id="spa_created_at_diff"></strong>--}}

    {{--</div>--}}
    {{--<div class="col-md-4 col-md-offset-4">--}}
    {{--Fecha Registro : <strong id="spa_created_at_fecha"></strong>--}}
    {{--</div>--}}
    {{--</div>--}}


    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
    {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}
@endsection

@section('script')

    <script src="{{ asset('js/table.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
        // https://medium.com/typecode/a-strategy-for-handling-multiple-file-uploads-using-javascript-eb00a77e15f
        $(document).ready(function () {

            // fun_new();

            fun_save();
            fun_cancel();
            fun_reset();
            fun_load_list();
            fun_load_area();
            fun_load_categoria();
        });

        // function fun_new() {
        //     $('#btn_new').click(function (e) {
        //         $("#div_listado").hide('slow');
        //         $("#div_registro").show('slow');
        //     });
        // }

        function fun_save() {
            var $div_errors = $('#div_errors');
            $div_errors.hide();

            $('#btn_save').click(function (e) {

                $("#btn_save")
                    .addClass("btn-info")
                    .removeClass("btn-primary")
                    .html('Procesando <i class="fa fa-spinner fa-pulse fa-lg fa-fw"></i>');

                $div_errors.hide();

                var form_data = new FormData();

                form_data.append('idArea', $('#sel_area').val());
                form_data.append('idCategoria', $('#sel_categoria').val());
                form_data.append('descripcion', $('#tex_descripcion').val());

                if ($('#inp_imagen')[0].files[0]) {
                    form_data.append('image', $('#inp_imagen')[0].files[0]);
                }

                $.ajax({
                    url: "{{ url('api/ticket-new') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        fun_reset();

                        bootbox.alert({
                            title: "Operación Completada!",
                            message: data.message,
                            backdrop: true,
                            callback: function () {

                                $("#div_registro").hide('slow');
                                $("#div_listado").show('slow');

                                fun_load_list();
                            }
                        });
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        var data = JSON.parse(xhr.responseText);

                        $div_errors.html('').show();
                        $div_errors.append('<ul>');
                        $.each(data.errors, function (key, value) {
                            $div_errors.append($('<li>', {html: key.toUpperCase() + ' : ' + value}));
                        });
                        $div_errors.append('</ul>');
                    },
                    complete: function () {
                        $("#btn_save")
                            .addClass("btn-primary")
                            .removeClass("btn-info")
                            .html('GUARDAR <i class="fa fa-floppy-o" aria-hidden="true"></i>');
                    }
                });

            });
        }

        function fun_cancel() {
            $('#btn_cancel').click(function (e) {
                fun_reset();

                $("#div_registro").hide('slow');
                $("#div_listado").show('slow');
            });
        }

        function fun_reset() {
            // $('#hdf_id').val('0');
            $('#sel_area').val('0');
            $('#sel_categoria').val('0');
            $('#tex_descripcion').val('');
            $('#inp_imagen').val('');
        }

        function fun_load_list() {
            var $tbl_lista = $('#tbl_lista');

            $tbl_lista.bootstrapTable('destroy');
            $tbl_lista.bootstrapTable({
                url: '{{url('api/ticket-admin')}}',
                method: 'GET',
                pagination: true,
                pageSize: 10,
                responseHandler: function (res) {
                    return res;
                }
            });
        }

        function fun_load_area() {
            var combo = $("#sel_area");

            $.ajax({
                type: 'GET',
                url: '{{url('api/get-area')}}',
                success: function (data, status) {
                    if (status == "success") {
                        combo.html('');
                        combo.append($("<option>", {value: "0", text: "-- Seleccione --"}));
                        $.each(data, function () {
                            combo.append($("<option>", {value: this.value, text: this.text}));
                        });
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }

        function fun_load_categoria() {
            var combo = $("#sel_categoria");

            $.ajax({
                type: 'GET',
                url: '{{url('api/get-categoria')}}',
                success: function (data, status) {
                    if (status == "success") {
                        combo.html('');
                        combo.append($("<option>", {value: "0", text: "-- Seleccione --"}));
                        $.each(data, function () {
                            combo.append($("<option>", {value: this.value, text: this.text}));
                        });
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });
        }

        function formato_operaciones(value, row, index) {
            var html = [];
            // html.push(String.Format('<a href="javascript:fun_cambiar_estado({0}, {1});" class="m-1" title="{2}">{3}</a>', row.InstitucionId, row.FlagActivo, row.FlagActivo ? 'Desactivar' : 'Activar', row.FlagActivo ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-square-o" aria-hidden="true"></i>'));
            html.push(String.Format('<a href="javascript:fun_load_registro({0});" title="{1}">{2}</a>', row.idTicket, 'Detalle', '<i class="fa fa-eye fa-lg" aria-hidden="true"></i>'));
            // html.push(String.Format('<a href="javascript:fun_remove({0});" title="{1}">{2}</a>', row.idArea, 'Eliminar', '<i class="fa fa-trash fa-lg" aria-hidden="true"></i>'));
            return html.join('');
        }

        function fun_load_registro(id) {

            $.ajax({
                type: 'GET',
                url: '{{ url('api/ticket-new')  }}/' + id,
                success: function (data, status) {
                    if (status == "success") {

                        // var data = dataObject.data;

                        // $("#hdf_id").val(data.idTicket);

                        $("#spa_codigo").html(data.codigo);

                        $("#spa_usuario").html(data.email);
                        // $("#spa_nombre").html(data.nombre);
                        // $("#spa_apellido_paterno").html(data.apellido_paterno);
                        // $("#spa_apellido_materno").html(data.apellido_materno);
                        // $("#spa_dni").html(data.dni);
                        // $("#spa_correo").html(data.correo);

                        $("#spa_area").html(data.siglas);
                        $("#spa_categoria").html(data.nombre);
                        $("#spa_descripcion").html(data.descripcion);
                        $("#spa_estado").html(data.value);
                        $("#spa_created_at_fecha").html(data.created_at_fecha);
                        $("#spa_created_at_diff").html(data.created_at_diff);

                        if (data.image) {
                            $("#img_image").attr("src", '/upload/' + data.image);
                            $("#img_image_a").attr("href", '/upload/' + data.image);

                            $("#img_image_not_found").hide('slow');
                            $("#img_image").show('slow');
                        } else {
                            $("#img_image").attr("src", '');
                            $("#img_image_a").attr("href", '#');

                            $("#img_image").hide('slow');
                            $("#img_image_not_found").show('slow');
                        }

                        // $("#sel_categoria").val(data.idCategoria);
                        // $("#tex_descripcion").val(data.descripcion);

                        // $('#div_modal').modal({show: true});

                        $("#div_listado").hide('slow');
                        $("#div_registro").show('slow');
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });

        }

    </script>
@endsection