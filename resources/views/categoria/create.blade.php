@extends('layouts.app')

@section('title', 'CATETORIAS')

@section('stylesheet')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection

@section('content-title', 'ADMINISTRAR - CATEGORIAS')

@section('content-body')

    <div class="panel panel-default">
        <div class="panel-heading">
            Formulario
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-lg-4">
                    <form role="form">
                        <div class="form-group">
                            <label for="inp_nombre">Nombre</label>
                            <input id="inp_nombre" name="inp_nombre" class="form-control"
                                   placeholder="ingrese el nombre" type="text">
                        </div>

                        <div class="form-group">
                            <label for="sel_categoria_padre">Categoria Padre</label>
                            <select id="sel_categoria_padre" name="sel_categoria_padre" class="form-control"></select>
                        </div>

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
                    </form>
                </div>
                <div class="col-lg-8">
                    <table id="tbl_lista">
                        <thead>
                        <tr>
                            <th data-formatter="formato_row_number" data-halign="center" data-valign="middle"
                                data-align="center" data-width="30">#
                            </th>
                            <th data-field="nombre">Nombre</th>
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
@endsection

@section('script')

    <script src="{{ asset('js/table.js') }}" type="text/javascript"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            fun_save();
            fun_reset();
            fun_load_categoria_padre();
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
                    url: "{{ url('api/categoria') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        idCategoria: $('#hdf_id').val(),
                        idCategoriaPadre: parseInt($('#sel_categoria_padre').val()),
                        nombre: $('#inp_nombre').val()
                    },
                    success: function (data) {
                        fun_reset();
                        fun_load_list();
                        fun_load_categoria_padre();

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
            $('#sel_categoria_padre').val('0');
            $('#inp_nombre').val('');
        }

        function fun_load_list() {
            var $tbl_lista = $('#tbl_lista');

            $tbl_lista.bootstrapTable('destroy');
            $tbl_lista.bootstrapTable({
                url: '{{url('api/categoria')}}',
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

        function fun_load_categoria_padre() {
            var combo = $("#sel_categoria_padre");

            $.ajax({
                type: 'GET',
                url: '{{url('api/get-categoria-padre')}}',
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
            html.push(String.Format('<a href="javascript:fun_load_registro({0});" title="{1}">{2}</a>', row.idCategoria, 'Editar', '<i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>'));
            html.push(String.Format('<a href="javascript:fun_remove({0});" title="{1}">{2}</a>', row.idCategoria, 'Eliminar', '<i class="fa fa-trash fa-lg" aria-hidden="true"></i>'));
            return html.join('');
        }

        function fun_load_registro(id) {

            $.ajax({
                type: 'GET',
                url: '{{ url('api/categoria')  }}/' + id,
                success: function (dataObject, status) {
                    if (status == "success") {

                        var data = dataObject.data;

                        $("#hdf_id").val(data.idCategoria);

                        $("#sel_categoria_padre").val(data.idCategoriaPadre);
                        $("#inp_nombre").val(data.nombre);
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
                            url: '{{ url('api/categoria')  }}/' + id,
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function (dataObject, status) {
                                if (status == "success") {
                                    fun_load_list();
                                    fun_load_categoria_padre();
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