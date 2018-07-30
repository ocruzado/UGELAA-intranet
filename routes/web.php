<?php

Route::post('login', 'AuthController@login');
Route::post('logout', 'AuthController@logout');

Route::view('/', 'login');
Route::view('dashboard', 'dashboard');

// AREA
Route::get('area', 'AreaController@create');
Route::post('api/area', 'AreaController@store');
Route::get('api/area', 'AreaController@index');
Route::get('api/area/{area}', 'AreaController@show');
Route::delete('api/area/{area}', 'AreaController@destroy');
Route::get('api/get-area-padre', 'AreaController@getAreaPadre');
Route::get('api/get-area', 'AreaController@getArea');

// USUARIO
Route::get('usuario', 'UsuarioController@create');
Route::post('api/usuario', 'UsuarioController@store');
Route::get('api/usuario', 'UsuarioController@index');
Route::get('api/usuario/{usuario}', 'UsuarioController@show');
Route::delete('api/usuario/{usuario}', 'UsuarioController@destroy');

Route::get('api/usuario-supervisor', 'UsuarioController@show_supervisor');
Route::get('api/usuario-asignado/{usuario}', 'UsuarioController@show_asignado');
Route::get('api/usuario-no-asignado', 'UsuarioController@show_no_asignado');

// CATEGORIA
Route::get('categoria', 'CategoriaController@create');
Route::post('api/categoria', 'CategoriaController@store');
Route::get('api/categoria', 'CategoriaController@index');
Route::get('api/categoria/{categoria}', 'CategoriaController@show');
Route::delete('api/categoria/{categoria}', 'CategoriaController@destroy');
Route::get('api/get-categoria-padre', 'CategoriaController@getCategoriaPadre');
Route::get('api/get-categoria', 'CategoriaController@getCategoria');

// TICKET
Route::get('ticket-new', 'TicketUserController@create');
Route::post('api/ticket-new', 'TicketUserController@store');
Route::get('api/ticket-new', 'TicketUserController@index');
Route::get('api/ticket-new/{ticket}', 'TicketUserController@show');

// ASIGNACION
Route::get('asignacion-admin', 'AsignacionAdminController@create');
Route::post('api/asignacion-admin-add', 'AsignacionAdminController@store');
Route::delete('api/asignacion-admin-remove', 'AsignacionAdminController@destroy');

// ADMINISTRACION DE
Route::get('ticket-admin', 'TicketAdminController@create');
Route::get('api/ticket-admin', 'TicketAdminController@index');
