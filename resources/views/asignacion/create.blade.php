@extends('layouts.app')

@section('title', 'ASIGNACION')

@section('stylesheet')
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
@endsection

@section('content-title', 'ADMINISTRAR - USUARIOS')

@section('content-body')

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuario - Supervisor
                </div>
                <div class="panel-body">

                    <table id="tbl_lista_supervisor">
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
                            <th data-formatter="formato_operaciones_supervisor" data-halign="center"
                                data-valign="middle" data-align="center" data-width="100">Opciones
                            </th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuarios - Asignados
                </div>
                <div class="panel-body">

                    <table id="tbl_lista_asignado">
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
                            <th data-formatter="formato_operaciones_asignado" data-halign="center"
                                data-valign="middle" data-align="center" data-width="100">Opciones
                            </th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Usuario - No Asignados
                </div>
                <div class="panel-body">

                    <table id="tbl_lista_no_asignado">
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
                            <th data-formatter="formato_operaciones_no_asignado" data-halign="center"
                                data-valign="middle" data-align="center" data-width="100">Opciones
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

        var idUsuarioSupervisor = 0;

        $(document).ready(function () {
            fun_load_list_supervisor();
            // fun_load_list_asignado();
            // fun_load_list_no_asignado();
        });

        function fun_load_list_supervisor() {
            var $tbl_lista = $('#tbl_lista_supervisor');

            $tbl_lista.bootstrapTable('destroy');
            $tbl_lista.bootstrapTable({
                url: '{{url('api/usuario-supervisor')}}',
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

        function fun_load_asignado_no_asignado(id) {

            idUsuarioSupervisor = id;

            fun_load_list_asignado(id);
            fun_load_list_no_asignado();
        }

        function fun_load_list_asignado(id) {
            var $tbl_lista = $('#tbl_lista_asignado');

            $tbl_lista.bootstrapTable('destroy');
            $tbl_lista.bootstrapTable({
                url: '{{url('api/usuario-asignado')}}/' + id,
                {{--url: '{{url('api/usuario-asignado')}}/3',--}}
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

        function fun_load_list_no_asignado() {
            var $tbl_lista = $('#tbl_lista_no_asignado');

            $tbl_lista.bootstrapTable('destroy');
            $tbl_lista.bootstrapTable({
                url: '{{url('api/usuario-no-asignado')}}',
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

        function formato_operaciones_supervisor(value, row, index) {
            var html = [];
            // html.push(String.Format('<a href="javascript:fun_cambiar_estado({0}, {1});" class="m-1" title="{2}">{3}</a>', row.InstitucionId, row.FlagActivo, row.FlagActivo ? 'Desactivar' : 'Activar', row.FlagActivo ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-square-o" aria-hidden="true"></i>'));
            html.push(String.Format('<a href="javascript:fun_load_asignado_no_asignado({0});" title="{1}">{2}</a>', row.idUsuario, 'Detalle', '<i class="fa fa-users fa-lg" aria-hidden="true"></i>'));
            // html.push(String.Format('<a href="javascript:fun_remove({0});" title="{1}">{2}</a>', row.idArea, 'Eliminar', '<i class="fa fa-trash fa-lg" aria-hidden="true"></i>'));
            return html.join('');
        }

        function formato_operaciones_asignado(value, row, index) {
            var html = [];
            // html.push(String.Format('<a href="javascript:fun_cambiar_estado({0}, {1});" class="m-1" title="{2}">{3}</a>', row.InstitucionId, row.FlagActivo, row.FlagActivo ? 'Desactivar' : 'Activar', row.FlagActivo ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-square-o" aria-hidden="true"></i>'));
            html.push(String.Format('<a href="javascript:fun_remove_asignado({0});" title="{1}">{2}</a>', row.idUsuario, 'Remover', '<i class="fa fa-user-times fa-lg" aria-hidden="true"></i>'));
            // html.push(String.Format('<a href="javascript:fun_remove({0});" title="{1}">{2}</a>', row.idArea, 'Eliminar', '<i class="fa fa-trash fa-lg" aria-hidden="true"></i>'));
            return html.join('');
        }

        function formato_operaciones_no_asignado(value, row, index) {
            var html = [];
            // html.push(String.Format('<a href="javascript:fun_cambiar_estado({0}, {1});" class="m-1" title="{2}">{3}</a>', row.InstitucionId, row.FlagActivo, row.FlagActivo ? 'Desactivar' : 'Activar', row.FlagActivo ? '<i class="fa fa-check" aria-hidden="true"></i>' : '<i class="fa fa-square-o" aria-hidden="true"></i>'));
            html.push(String.Format('<a href="javascript:fun_add_asignado({0});" title="{1}">{2}</a>', row.idUsuario, 'Agregar', '<i class="fa fa-user-plus fa-lg" aria-hidden="true"></i>'));
            // html.push(String.Format('<a href="javascript:fun_remove({0});" title="{1}">{2}</a>', row.idArea, 'Eliminar', '<i class="fa fa-trash fa-lg" aria-hidden="true"></i>'));
            return html.join('');
        }

        function fun_remove_asignado(id) {
            bootbox.confirm({
                message: "¿Estás seguro que deseas <strong>remover</strong> la asignación?",
                size: 'small',
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: '{{ url('api/asignacion-admin-remove')  }}',
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                idUsuario: id,
                                idUsuarioSupervisor: idUsuarioSupervisor,
                            },
                            success: function (dataObject, status) {
                                if (status == "success") {
                                    fun_load_list_asignado(idUsuarioSupervisor);
                                    fun_load_list_no_asignado();
                                }
                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                            }
                        });
                    }
                }
            });
        }

        function fun_add_asignado(id) {
            bootbox.confirm({
                message: "¿Estás seguro que desea realizar la <strong>asignación</strong>?",
                size: 'small',
                callback: function (result) {
                    if (result) {
                        $.ajax({
                            url: '{{ url('api/asignacion-admin-add')  }}',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                idUsuario: id,
                                idUsuarioSupervisor: idUsuarioSupervisor,
                            },
                            success: function (dataObject, status) {
                                if (status == "success") {
                                    fun_load_list_asignado(idUsuarioSupervisor);
                                    fun_load_list_no_asignado();
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