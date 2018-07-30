@extends('layouts.app')

@section('title', 'USUARIOS')

@section('stylesheet')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection

@section('content-title', 'ADMINISTRAR - USUARIOS')

@section('content-body')
    <div class="panel panel-default">
        <div class="panel-heading">
            Formulario
        </div>
        <div class="panel-body">
            {{--<form role="form">--}}
            <div class="row">

                {{--<div class="col-lg-6">--}}

                <div class="form-group col-lg-4">
                    <label for="inp_nombre">Nombre</label>
                    <input id="inp_nombre" name="inp_nombre" class="form-control"
                           placeholder="ingrese el nombre" type="text">
                </div>

                <div class="form-group col-lg-4">
                    <label for="inp_apellido_paterno">Apellido Paterno</label>
                    <input id="inp_apellido_paterno" name="inp_apellido_paterno" class="form-control"
                           placeholder="ingrese el apellido paterno" type="text">
                </div>

                <div class="form-group col-lg-4">
                    <label for="inp_apellido_materno">Apellido Materno</label>
                    <input id="inp_apellido_materno" name="inp_apellido_materno" class="form-control"
                           placeholder="ingrese apellido materno" type="text">
                </div>


                <div class="form-group col-lg-4">
                    <label for="sel_area">Área</label>
                    <select id="sel_area" name="sel_area" class="form-control"></select>
                </div>

                <div class="form-group col-lg-2">
                    <label for="inp_dni">DNI</label>
                    <input id="inp_dni" name="inp_dni" class="form-control"
                           placeholder="ingrese el dni" type="text">
                </div>


                {{--</div>--}}

                {{--<div class="col-lg-6">--}}

                <div class="form-group col-lg-2">
                    <label for="inp_fecha_nacimiento">Fecha Nacimiento</label>
                    <input id="inp_fecha_nacimiento" name="inp_fecha_nacimiento" class="form-control"
                           placeholder="ingrese la fecha de nacimiento" type="date">
                </div>


                <div class="form-group col-lg-2">
                    <label for="inp_correo">Correo</label>
                    <input id="inp_correo" name="inp_correo" class="form-control"
                           placeholder="ingrese el correo" type="text">
                </div>

                <div class="form-group col-lg-2">
                    <label for="inp_telefono">Telefono</label>
                    <input id="inp_telefono" name="inp_telefono" class="form-control"
                           placeholder="ingrese el telefono" type="text">
                </div>


                {{--</div>--}}

                <div class="col-lg-12">
                    <div class="form-group">
                        <input id="hdf_id" name="hdf_id" value="0" type="hidden"/>
                        <button id="btn_save" type="button" class="btn btn-primary">
                            GUARDAR <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        </button>
                        <button id="btn_reset" type="reset" class="btn btn-default" onclick="fun_reset()">
                            RESTABLECER <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div id="div_errors" class="alert alert-danger">
                    </div>
                </div>

                <div class="col-lg-12">
                    <table id="tbl_lista">
                        <thead>
                        <tr>
                            <th data-formatter="formato_row_number" data-halign="center" data-valign="middle"
                                data-align="center" data-width="30">#
                            </th>
                            <th data-field="nombre">Nombre</th>
                            <th data-field="apellido_paterno">Apellido Materno</th>
                            <th data-field="apellido_materno">Apellido Materno</th>
                            <th data-field="email">Usuario</th>
                            <th data-field="dni">DNI</th>
                            <th data-formatter="formato_operaciones" data-halign="center" data-valign="middle"
                                data-align="center" data-width="100">Opciones
                            </th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
            {{--</form>--}}
        </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('js/table.js') }}" type="text/javascript"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            fun_save();
            fun_reset();
            fun_load_area();
            fun_load_list();
        });

        function fun_save() {
            var $div_errors = $('#div_errors');
            $div_errors.hide();

            $('#btn_save').click(function (e) {

                $("#btn_save")
                    .addClass("btn-info")
                    .removeClass("btn-primary")
                    .html('Procesando <i class="fa fa-spinner fa-pulse fa-lg fa-fw"></i>');

                $div_errors.hide();

                $.ajax({
                    url: "{{ url('api/usuario') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        idUsuario: $('#hdf_id').val(),
                        idArea: parseInt($('#sel_area').val()),
                        nombre: $('#inp_nombre').val(),
                        apellido_paterno: $('#inp_apellido_paterno').val(),
                        apellido_materno: $('#inp_apellido_materno').val(),
                        dni: $('#inp_dni').val(),
                        fecha_nacimiento: $('#inp_fecha_nacimiento').val(),
                        telefono: $('#inp_telefono').val(),
                        correo: $('#inp_correo').val()
                    },
                    success: function (data) {
                        fun_reset();
                        fun_load_list();

                        bootbox.alert({
                            title: "Operación Completada!",
                            message: data.message,
                            backdrop: true
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

        function fun_reset() {
            $('#hdf_id').val('0');
            $('#sel_area').val('0');
            $('#inp_nombre').val('');
            $('#inp_apellido_paterno').val('');
            $('#inp_apellido_materno').val('');
            $('#inp_dni').val('');
            $('#inp_fecha_nacimiento').val('');
            $('#inp_telefono').val('');
            $('#inp_correo').val('');
        }

        function fun_load_list() {
            var $tbl_lista = $('#tbl_lista');

            $tbl_lista.bootstrapTable('destroy');
            $tbl_lista.bootstrapTable({
                url: '{{url('api/usuario')}}',
                method: 'GET',
                pagination: true,
                pageSize: 10,
                // rowStyle: row_style_institucion,
                // queryParams: function (p) {
                //     return {
                //         filtro: $("#txt_filtro").val(),
                //         flagEstado: $("#ddl_estado").val() == -1 ? null : $("#ddl_estado").val() == 1 ? true : false,
                //     };
                // },
                responseHandler: function (res) {
                    return res;
                }
                // onLoadError: function (status, res) {
                //     console.log(res);
                //     fun_mostrar_alert_box("alert-danger", String.Format("<strong>Error!</strong> {0}", res));
                // }
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

        function formato_operaciones(value, row, index) {
            var html = [];
            // html.push(String.Format('<a href="javascript:fun_cambiar_estado({0}, {1});" class="m-1" title="{2}">{3}</a>', row.InstitucionId, row.FlagActivo, row.FlagActivo ? 'Desactivar' : 'Activar', row.FlagActivo ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-square-o" aria-hidden="true"></i>'));
            html.push(String.Format('<a href="javascript:fun_load_registro({0});" title="{1}">{2}</a>', row.idUsuario, 'Editar', '<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>'));
            html.push(String.Format('<a href="javascript:fun_remove({0});" title="{1}">{2}</a>', row.idUsuario, 'Eliminar', '<i class="fa fa-trash fa-lg" aria-hidden="true"></i>'));
            return html.join('');
        }

        function fun_load_registro(id) {

            $.ajax({
                type: 'GET',
                url: '{{ url('api/usuario')  }}/' + id,
                success: function (dataObject, status) {
                    if (status == "success") {

                        var data = dataObject.data;

                        $("#hdf_id").val(data.idUsuario);

                        $("#sel_area").val(data.idArea);
                        $("#inp_nombre").val(data.nombre);
                        $("#inp_apellido_paterno").val(data.apellido_paterno);
                        $("#inp_apellido_materno").val(data.apellido_materno);
                        $("#inp_dni").val(data.dni);
                        $("#inp_fecha_nacimiento").val(data.fecha_nacimiento);
                        $("#inp_telefono").val(data.telefono);
                        $("#inp_correo").val(data.correo);
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                }
            });

        }

        function fun_remove(id) {
            bootbox.confirm({
                message: "¿Estás seguro que deseas <strong>eliminar</strong> el registro seleccionado?",
                size: 'small',
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: '{{ url('api/usuario')  }}/' + id,
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (dataObject, status) {
                                if (status == "success") {
                                    fun_load_list();
                                }
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                            }
                        });
                    }
                }
            });
        }
    </script>
@endsection