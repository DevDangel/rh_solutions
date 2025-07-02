<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\ContratoController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CrudController;
use App\Http\Controllers\Admin\HistorialController;
use App\Http\Controllers\Admin\RelacionesController;
use App\Http\Controllers\Admin\ValidacionController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Usuario\UsuarioAuthController;
use App\Http\Controllers\Usuario\SolicitarController;
use App\Http\Controllers\Admin\SolicitudController;
use App\Http\Controllers\Admin\DocumentoAsignacionController;
use App\Http\Controllers\Admin\VisualizarDocumentosController;
use App\Http\Controllers\Usuario\DocumentoController;





// Ruta de inicio de sesión (vista)
Route::get('/', function () {
    return view('login');
})->name('login');
//----------------------- Rutas para el login y logout -----------------------------------------------//
// Ruta para enviar formulario de login General
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');//Login general

//--------------Rutas del Login y Logout Para el Admin-----------------//
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

//--------------Rutas del Login y Logout Para el Usuario-----------------//
Route::get('/usuario/login', [UsuarioAuthController::class, 'showLoginForm'])->name('usuario.login');
Route::post('/usuario/login', [UsuarioAuthController::class, 'login'])->name('usuario.login.submit');
Route::post('/usuario/logout', [UsuarioAuthController::class, 'logout'])->name('usuario.logout');


/////////////////////////// Ruta protegida para el usuario //////////////////////////////////////////
Route::middleware('auth:usuario')->group(function () {
    Route::get('/usuario/dashboard', function () {
        return view('user.dashboard'); // crea esta vista también
    })->name('usuario.dashboard');

    //----------------------------- solicitar certificado ----------------------------------------//
    Route::get('/solicitar', [SolicitarController::class, 'listarContratos'])->name('user.solicitar');
    Route::post('/usuario/solicitar-certificado', [SolicitarController::class, 'guardarSolicitud'])->name('usuario.solicitar');

    //--------------------------------Documentos---------------------------------------//

    Route::get('/documentos', [DocumentoController::class, 'index'])->name('usuario.documentos.index');
    Route::post('/usuario/documentos/upload', [DocumentoController::class, 'upload'])->name('usuario.documentos.upload');
    Route::delete('/usuario/documentos/eliminar/{id}', [DocumentoController::class, 'eliminar'])->name('usuario.documentos.eliminar');
    Route::put('/usuario/documentos/actualizar/{id}', [DocumentoController::class, 'actualizarFecha'])->name('usuario.documentos.actualizarFecha');


});
////////////////////////////////////////////////////////////////////////////////////////////////////

//-------------------------------------------------------------------------------------------------//

// --------------------- Recuperación de contraseña ----------------------------//
// 1. Mostrar formulario para ingresar la cédula
Route::get('password/request', [PasswordResetController::class, 'showRequestForm'])->name('password.request');
// 2. Enviar código por email o mensaje
Route::post('password/send-code', [PasswordResetController::class, 'sendCode'])->name('password.sendCode');
// 3. Mostrar formulario para ingresar el código de verificación
Route::get('password/verify', [PasswordResetController::class, 'showVerifyForm'])->name('password.verify');
// 4. Verificar el código ingresado
Route::post('password/reset', [PasswordResetController::class, 'resetPassword'])->name('password.reset');
// 5. Mostrar formulario para cambiar la contraseña
Route::get('password/change', [PasswordResetController::class, 'showChangeForm'])->name('password.change');
// 6. Actualizar la contraseña en la base de datos
Route::post('password/update', [PasswordResetController::class, 'updatePassword'])->name('password.update');

/////////////////////// rutas para el admin ///////////////////////////////////////////////////////
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    // Aquí puedes agregar más rutas de admin protegidas
    //ruta para generar vista de crud
    // --------------------------------------- rutas crud --------------------------------------------------------------------//
    Route::get('/lista-usuarios', [CrudController::class,'index'])->name( 'crud.index');
    //Ruta para botn crear
    Route::post('/registrar-usuario', [CrudController::class,'create'])->name( 'GestionarUsuario.create');
    //Ruta para boton actualizar
    Route::post('/usuarios/actualizar/{id}', [CrudController::class,'update'])->name( 'GestionarUsuario.update');
    //Ruta para boton eliminar
    Route::get('/usuarios/{id}/eliminar', [CrudController::class, 'delete'])
        ->name('GestionarUsuario.delete');
    // Ruta para relacionesController
    Route::get('/lista', [RelacionesController::class, 'index']);
    //Ruta paara validar con metodo ajax modal crear
    Route::post('/validar-documento', [ValidacionController::class, 'validarDocumento'])->name('validarcrear.documento');
    Route::post('/validar-numerocelular', [ValidacionController::class, 'validarCelular'])->name('validarcrear.celular');
    Route::post('/validar-correos', [ValidacionController::class, 'validarCorreo'])->name('validarcrear.correo');
    Route::post('/validar-contraseñas', [ValidacionController::class, 'validarContraseña'])->name('validarcrear.contraseña');
    //Ruta para validar con metodo ajax modal editar
    Route::post('/validar-campo', [ValidacionController::class, 'validarCampo'])->name('validar.campo');
    //ruta para enlazar municipio con departamento
    Route::get('/municipios/{idDepartamento}', [RelacionesController::class, 'getMunicipios']);
    //-----------------------------------------------------------------------------------------------------------------------//

    //------------------------------------- ruta para las solicitudes y generar certificado----------------------------------//
    Route::get('/admin-solicitudes',[SolicitudController::class,'view'])->name('admin.solicitud');
    Route::post('/admin/generar-certificado', [SolicitudController::class, 'generarCertificado'])->name('admin.generar');
    Route::post('/admin/enviar-certificado', [SolicitudController::class, 'enviarCertificado'])->name('admin.enviar');

    //-----------------------------------------------------------------------------------------------------------------------//

    //-------------------------------------- ruta para crear y ver contratos-------------------------------------------------//
    Route::get('/admin-contratos',[ContratoController::class,'view'])->name('admin.contratos');
    Route::post('/contrato-create',[ContratoController::class,'store'])->name('contrato.create');
    Route::get('/contrato/editar/{id}',[ContratoController::class, 'edit'])->name('contrato.edit');
    Route::put('/contrato/update/{id}',[ContratoController::class,'update'])->name('contrato.update');
    Route::delete('/contrato/delete/{id}',[ContratoController::class,'delete'])->name('contrato.delete');
    //-----------------------------------------------------------------------------------------------------------------------//

    // --------------------------------- rutas para historial certificados --------------------------------------------------//
    Route::get('/historial-certificados',[HistorialController::class,'view'])->name('admin.historial');
    Route::get('/admin/ver-certificado/{id_contrato}', [HistorialController::class, 'verCertificado'])->name('admin.verCertificado');
    //-----------------------------------------------------------------------------------------------------------------------//

    // --------------------------------- rutas para Asignar Documentos --------------------------------------------------//

    Route::get('/documentos/asignar', [DocumentoAsignacionController::class, 'index'])->name('admin.documentos.index');
    Route::post('/documentos/asignar', [DocumentoAsignacionController::class, 'asignarDocumentos'])->name('admin.guardar.documentos');
    Route::put('/documentos/asignados/{id}', [DocumentoAsignacionController::class, 'actualizarDocumento'])->name('admin.actualizar.documento');

    Route::delete('/documentos/asignados/{id}', [DocumentoAsignacionController::class, 'eliminarDocumento'])->name('admin.eliminar.documento');
    //-----------------------------------------------------------------------------------------------------------------------//

    // --------------------------------- rutas para Visualizar Documentos --------------------------------------------------//
    Route::get('/admin/visualizacion-documentos', [VisualizarDocumentosController::class, 'visualizarDocumentos'])->name('admin.visualizacion.documentos');
    //-----------------------------------------------------------------------------------------------------------------------//






});
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
