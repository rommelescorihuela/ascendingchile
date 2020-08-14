<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');
Route::get('/nosotros', function () {
   return view('nosotros');
})->name('nosotros');
Route::get('/servicios-empresas', function () {
   return view('servicios-empresas');
})->name('servicios-empresas');
Route::get('/servicios-personas', function () {
   return view('servicios-personas');
})->name('servicios-personas');

Route::get('/contacto', function () {
   return view('contacto')->with('exito', false);
})->name('contacto');
Route::post('/contacto', 'HomeController@contacto');

Route::get('/registrate', function () {
   return view('registrate');
})->name('registrate');

Route::get('/ganarganar', function () {
   return view('winwin')->with('exito', false);
})->name('winwin')->middleware('guest');
Route::post('/ganarganar', 'HomeController@winwin');

Route::get('/empresas', 'HomeController@empresas')->name('empresas');

// Servicios:

Route::get('/perfiles-profesionales', 'HomeController@perfiles')->name('perfiles-profesionales');
Route::get('/perfiles-operativos', 'HomeController@perfilesOp')->name('perfiles-operativos');


// Rutas Auth
Auth::routes();

Route::get('/home', function () {
   return redirect()->route('index');
})->name('home');

// PROFESIONALES

Route::get('/perfil', 'ProfesionalController@index')->name('perfil')->middleware('tipo:1');
Route::post('/perfil', 'ProfesionalController@guardar');
Route::post('/perfil-edit', 'ProfesionalController@editar');
Route::post('/foto-edit', 'ProfesionalController@editarFoto');

Route::get('/resumen', 'ProfesionalController@resumen')->name('resumen')->middleware('tipo:1');
Route::post('/resumen', 'ProfesionalController@resumir');
Route::post('/resumen-edit', 'ProfesionalController@editarResumen');

Route::get('/experiencia', 'ProfesionalController@experiencia')->name('experiencia')->middleware('tipo:1');
Route::post('/experiencia', 'ProfesionalController@experienciar');
Route::post('/edit-exp', 'ProfesionalController@editarExp')->name('edit-exp');
Route::post('/del-exp', 'ProfesionalController@borrarExp')->name('del-exp');

Route::get('/formacion', 'ProfesionalController@formacion')->name('formacion')->middleware('tipo:1');
Route::post('/formacion', 'ProfesionalController@formar');
Route::post('/guarda-acad', 'ProfesionalController@guardaAcad');
Route::post('/edit-form', 'ProfesionalController@editarForm')->name('edit-form');
Route::post('/del-form', 'ProfesionalController@borrarForm')->name('del-form');

Route::get('/cv', 'ProfesionalController@cv')->name('cv')->middleware('tipo:1');
Route::post('/cv', 'ProfesionalController@cvPost');

Route::get('/ofertas-laborales', 'ProfesionalController@ofertas')->name('ofertas-laborales')->middleware('tipo:1');
Route::post('/postular', 'ProfesionalController@postular')->name('postular');

Route::get('/mis-postulaciones', 'ProfesionalController@postulaciones')->name('mis-postulaciones')->middleware('tipo:1');

// EMPRESAS:

Route::get('/registro-empresa', function () {
   return view('auth.registro-empresa');
})->name('registro-empresa')->middleware('guest');
Route::post('/registro-empresa', 'EmpresaController@registro');

Route::get('/perfil-empresa', 'EmpresaController@perfil')->name('perfil-empresa')->middleware('auth')->middleware('tipo:2');
Route::post('/perfil-empresa', 'EmpresaController@guardar')->middleware('auth');
Route::post('/perfil-empresa-edit', 'EmpresaController@editar')->middleware('auth');
Route::post('/foto-edit-empresa', 'EmpresaController@editarFoto')->middleware('auth');

Route::get('/perfil-empresa/{id}', 'EmpresaController@perfilPublico')->name('perfil-publico');

Route::get('/sesion-empresa', 'EmpresaController@sesion')->name('sesion')->middleware('auth')->middleware('tipo:2');

Route::get('/oferta-laboral', 'EmpresaController@ofertaLaboral')->name('oferta-laboral')->middleware('auth')->middleware('tipo:2');
Route::post('/oferta-laboral', 'EmpresaController@ofertaLaboralPost')->middleware('auth');

Route::get('/levantar-perfil', 'EmpresaController@levantarPerfil')->name('levantar-perfil')->middleware('auth')->middleware('tipo:2');
Route::post('/levantar-perfil', 'EmpresaController@levantarPerfilPost')->middleware('auth');

Route::get('/mis-ofertas', 'EmpresaController@ofertas')->name('mis-ofertas')->middleware('auth')->middleware('tipo:2');
Route::get('/mis-ofertas-op', 'EmpresaController@ofertasOp')->name('mis-ofertas-op')->middleware('auth')->middleware('tipo:2');
Route::post('/estado-oferta', 'EmpresaController@estadoOferta')->name('estado-oferta');

Route::get('/postulaciones/{id}', 'EmpresaController@postulaciones')->name('postulaciones')->middleware('auth')->middleware('tipo:2');
Route::post('/estado-postulacion', 'EmpresaController@estadoPostulacion')->name('estado-postulacion');

Route::get('/perfiles-interes', 'EmpresaController@interes')->name('perfiles-interes')->middleware('auth')->middleware('tipo:2');
Route::post('/me-interesa', 'EmpresaController@meInteresa')->name('me-interesa');

// ADMIN

Route::get('/admin-area', 'AdminController@dashboard')->name('dashboard')->middleware('tipo:0');
Route::get('/admin-area/empresas', 'AdminController@empresas')->name('empresas-admin')->middleware('tipo:0');
Route::get('/admin-area/ofertas', 'AdminController@ofertas')->name('ofertas-admin')->middleware('tipo:0');
Route::get('/admin-area/levantamientos', 'AdminController@levantamientos')->name('levantamientos-admin')->middleware('tipo:0');
Route::get('/admin-area/winwin', 'AdminController@winwin')->name('winwin-admin')->middleware('tipo:0');
Route::get('/admin-area/contactos', 'AdminController@contacto')->name('contacto-admin')->middleware('tipo:0');
Route::get('/admin-area/operativos', 'AdminController@operativos')->name('operativos-admin')->middleware('tipo:0');

Route::get('/admin-area/info-pro/{id}', 'AdminController@infoPro')->name('info-pro')->middleware('tipo:0');

Route::post('/info-pros', 'AdminController@infoPros');
Route::post('/estado-pros', 'AdminController@estadoPros');
Route::post('/eliminar-pros', 'AdminController@eliminarPros');
Route::post('/eliminar-winwin', 'AdminController@eliminarWinwin');
Route::post('/estado-winwin', 'AdminController@estadoWinwin');

//agregados JP
Route::post('/eliminar-empresa', 'AdminController@eliminarEmpresa');
Route::post('/eliminar-oferta', 'AdminController@eliminarOferta');
Route::post('/eliminar-levantamiento', 'AdminController@eliminarLevantamiento');
Route::post('/eliminar-operativo', 'AdminController@eliminarOperativo');


//

// OPERATIVOS

Route::get('/perfil-op', 'OperativoController@index')->name('perfil-op')->middleware('tipo:3');
Route::post('/perfil-op', 'OperativoController@guardar');
Route::post('/perfil-op-edit', 'OperativoController@editar');
Route::post('/foto-op-edit', 'OperativoController@editarFoto');

Route::get('/situacion-op', 'OperativoController@resumen')->name('situacion-op')->middleware('tipo:3');
Route::post('/situacion-op', 'OperativoController@resumir');
Route::post('/situacion-op-edit', 'OperativoController@editarResumen');

Route::get('/experiencia-op', 'OperativoController@experiencia')->name('experiencia-op')->middleware('tipo:3');
Route::post('/experiencia-op', 'OperativoController@experienciar');
Route::post('/edit-exp-op', 'OperativoController@editarExp')->name('edit-exp-op');
Route::post('/del-exp-op', 'OperativoController@borrarExp')->name('del-exp-op');

Route::get('/formacion-op', 'OperativoController@formacion')->name('formacion-op')->middleware('tipo:3');
Route::post('/formacion-op', 'OperativoController@formar');
Route::post('/guarda-acad-op', 'OperativoController@guardaAcad');
Route::post('/edit-form-op', 'OperativoController@editarForm')->name('edit-form-op');
Route::post('/del-form-op', 'OperativoController@borrarForm')->name('del-form-op');

Route::get('/cv-op', 'OperativoController@cv')->name('cv-op')->middleware('tipo:3');
Route::post('/cv-op', 'OperativoController@cvPost');

Route::get('/ofertas-laborales-op', 'OperativoController@ofertas')->name('ofertas-laborales-op')->middleware('tipo:3');
Route::post('/postular-op', 'OperativoController@postular')->name('postular-op');

Route::get('/mis-postulaciones-op', 'OperativoController@postulaciones')->name('mis-postulaciones-op')->middleware('tipo:3');

// pdf

Route::get('/customer/print-pdf/{id}', 'CustomerController@printPDF');
Route::get('/customer/Ofertaprint-pdf/{id}', 'CustomerController@OfertaprintPDF');
Route::get('/customer/Profesionalprint-pdf/{id}', 'CustomerController@ProfesionalprintPDF');
Route::get('/customer/Levantamientoprint-pdf/{id}', 'CustomerController@LevantamientoprintPDF');
