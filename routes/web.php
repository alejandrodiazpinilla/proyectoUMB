<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\CctvController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CiudadController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ApodatosController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LocalityController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\HomeVisitController;
use App\Http\Controllers\VisitTypeController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\AffiliationController;
use App\Http\Controllers\MonthReportController;
use App\Http\Controllers\NoveltyRrhhController;
use App\Http\Controllers\NoveltyTypeController;
use App\Http\Controllers\WorkMinutesController;
use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\NeighborhoodController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\StaffRequestController;
use App\Http\Controllers\BankOfResumesController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\TechnicalVisitController;
use App\Http\Controllers\TrainingEntityController;
use App\Http\Controllers\DelegateNoveltyController;
use App\Http\Controllers\NoveltyCustomerController;
use App\Http\Controllers\NoveltyWatchmenController;
use App\Http\Controllers\RouteInspectionController;
use App\Http\Controllers\PaymentConditionController;
use App\Http\Controllers\TerminationStaffController;
use App\Http\Controllers\DeliveryEndowmentController;

Route::view('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/home', [HomeController::class, 'index']);

//rutas para los usuarios autenticados en la aplicación web
Route::middleware(['auth'])->group(function () {

    //redirigir al home a los usuarios autenticados
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // *********************************INICIO RUTAS DE AFILIACIONES**********************************
    //cargar datatable del lado del servidor
    Route::get('/affiliations/affiliationsIndex', [AffiliationController::class, 'affiliationsIndex'])->name('affiliationsIndex');
    //activar/inactivar
    Route::post('/affiliations/activarRegistro/{id}', [AffiliationController::class, 'destroy']);
    Route::resource('affiliations', AffiliationController::class);
    // ************************************FIN RUTAS DE AFILIACIONES**********************************

    // *******************************Areas*****************************************
    //cargar datatable del lado del servidor
    Route::get('/areas/areasIndex', [AreaController::class, 'areasIndex'])->name('areasIndex');
    //activar/inactivar
    Route::post('/areas/activarArea/{id}', [AreaController::class, 'destroy']);
    // Resource
    Route::resource('areas', AreaController::class);

    // *******************************Barrios*****************************************
    //cargar datatable del lado del servidor
    Route::get('/neighborhoods/neighborhoodsIndex', [NeighborhoodController::class, 'neighborhoodsIndex'])->name('neighborhoodsIndex');
    //resource
    Route::resource('neighborhoods', NeighborhoodController::class);

    // *******************************Ciudades*****************************************
    //cargar datatable del lado del servidor
    Route::get('/ciudades/ciudadesIndex', [CiudadController::class, 'ciudadesIndex'])->name('ciudadesIndex');
    //resource
    Route::resource('ciudades', CiudadController::class);

    // *********************************INICIO RUTAS DE CLIENTES**********************************
    //cargar datatable del lado del servidor
    Route::get('/customers/customersIndex', [CustomerController::class, 'customersIndex'])->name('customersIndex');
    //Consultar registros de seguimiento
    Route::get('/customers/detalleSeguimiento/{id}', [CustomerController::class, 'detalleSeguimiento']);
    //Consultar y mostrar adjuntos
    Route::get('/customers/verAdjuntos/{id}', [CustomerController::class, 'verAdjuntos']);
    //Descargar adjunto
    Route::get('/customers/descargarArchivo/{nombre}', [CustomerController::class, 'descargarArchivo']);
    //actualizar
    Route::post('/customers/{id}', [CustomerController::class, 'update']);
    //guardar seguimiento
    Route::post('/customers/seguimiento/{id}', [CustomerController::class, 'saveTracing']);
    //activar/inactivar
    Route::post('/customers/activarRegistro/{id}', [CustomerController::class, 'destroy']);

    Route::resource('customers', CustomerController::class);
    // ************************************FIN RUTAS DE CLIENTES**********************************

    // *********************************INICIO RUTAS DE CONDICIONES DE PAGO***************************
    //cargar datatable del lado del servidor
    Route::get('/paymentconditions/PaymentConditionsIndex', [PaymentConditionController::class, 'paymentconditionsIndex'])->name('paymentconditionsIndex');
    //activar/inactivar
    Route::post('/paymentconditions/activarRegistro/{id}', [PaymentConditionController::class, 'destroy']);
    //actualizar
    Route::post('/paymentconditions/{id}', [PaymentConditionController::class, 'update']);
    Route::resource('paymentconditions', PaymentConditionController::class);
    // ************************************FIN RUTAS DE CONDICIONES DE PAGO***************************
    
    // **********************************INICIO RUTAS DE EMPLEADOS***********************************
    //cargar datatable de empleados con serverSide
    Route::get('/employees/employeesIndex', [EmployeController::class, 'employeesIndex'])->name('employeesIndex');
    //activar/inactivar
    Route::post('/employees/activarRegistro/{id}', [EmployeController::class, 'destroy']);
    // buscar localidad a partir de la ciudad
    Route::get('/employees/search_locality/{id}', [EmployeController::class, 'search_locality']);
    // buscar barrio a partir de la localidad
    Route::get('/employees/search_neighborhoods/{id}', [EmployeController::class, 'search_neighborhoods']);
    //crear contrato laboral
    Route::post('/employees/crearContrato', [EmployeController::class, 'crearContrato']);
    // traer historico de contratos laborales
    Route::get('/employees/detalleContratos', [EmployeController::class, 'detalleContratos']);
    // agregar otros anexos
    Route::post('/employees/agregarAnexos/{id}', [EmployeController::class, 'agregarAnexos']);
    // cambiar el contrato o los anexos
    Route::post('/employees/actualizarArchivo/{id}', [EmployeController::class, 'actualizarArchivo']);
    // mostrar el curriculum del candidato
    Route::get('/employees/mostrarCurriculum/{id}', [EmployeController::class, 'mostrarCurriculum']);
    // cargar archivo de afiliaciones
    Route::post('/employees/cargarArchivoAfiliacion', [EmployeController::class, 'cargarArchivoAfiliacion']);
    // eliminar archivo de afiliación
    Route::post('/employees/eliminarArchivoAfiliacion/{nombre}', [EmployeController::class, 'eliminarArchivoAfiliacion']);
    // cargar archivo de estudio
    Route::post('/employees/cargarArchivoEstudio', [EmployeController::class, 'cargarArchivoEstudio']);
    // eliminar archivo de estudio
    Route::post('/employees/eliminarArchivoEstudio/{nombre}', [EmployeController::class, 'eliminarArchivoEstudio']);
    // cargar archivo de antecedente
    Route::post('/employees/cargarArchivoAntecedente', [EmployeController::class, 'cargarArchivoAntecedente']);
    // eliminar archivo de antecedente
    Route::post('/employees/eliminarArchivoAntecedente/{nombre}', [EmployeController::class, 'eliminarArchivoAntecedente']);
    // cargar archivo de Otros Documentos
    Route::post('/employees/cargarArchivoOtros', [EmployeController::class, 'cargarArchivoOtros']);
    // eliminar archivo de Otros
    Route::post('/employees/eliminarArchivoOtros/{nombre}', [EmployeController::class, 'eliminarArchivoOtros']);
    // llenar curriculum del empleado
    Route::post('/employees/actualizarCurriculum', [EmployeController::class, 'actualizarCurriculum']);
    // cargar exámen médico y exámen psicotécnico
    Route::post('employees/cargarExamenes', [EmployeController::class, 'cargarExamenes']);
    // mostrar detalle de exámenes
    Route::get('/employees/detalleExamenes', [EmployeController::class, 'detalleExamenes']);
    Route::resource('employees', EmployeController::class);

    // ************************************FIN RUTAS DE EMPLEADOS************************************

    // *******************************Empresas*****************************************
    // reportes
    Route::post('/empresas/reporte', [EmpresaController::class, 'reporteEmpresas'])->name('reporteEmpresas');
    //actualizar empresas
    Route::post('/empresas/{id}', [EmpresaController::class, 'update']);
    //cargar datatable del lado del servidor
    Route::get('/empresas/empresasIndex', [EmpresaController::class, 'empresasIndex'])->name('empresasIndex');
    //resource
    Route::resource('empresas', EmpresaController::class);

    // *********************************INICIO RUTAS DE ENCARGADOS DE NOVEDADES**********************************
    //cargar datatable del lado del servidor
    Route::get('/delegatesnovelties/delegatesNoveltiesIndex', [DelegateNoveltyController::class, 'delegatesNoveltiesIndex'])->name('delegatesNoveltiesIndex');
    Route::resource('delegatesnovelties', DelegateNoveltyController::class);
    // ************************************FIN RUTAS DE ENCARGADOS DE NOVEDADES**********************************

    // *********************************INICIO RUTAS DE ENTIDADES DE FORMACIÓN**********************************
    //cargar datatable del lado del servidor
    Route::get('/trainingentities/trainingEntitiesIndex', [TrainingEntityController::class, 'trainingEntitiesIndex']);
    Route::post('/trainingentities/activarEntidad/{id}', [TrainingEntityController::class, 'destroy']);
    Route::post('/trainingentities/{id}', [TrainingEntityController::class, 'update']);
    Route::resource('trainingentities', TrainingEntityController::class);
    // ************************************FIN RUTAS DE ENTIDADES DE FORMACIÓN**********************************

    // *********************************INICIO RUTAS DE ESTADO CIVIL**********************************
    //cargar datatable del lado del servidor
    Route::get('/maritalstatus/maritalStatusIndex', [MaritalStatusController::class, 'maritalStatusIndex'])->name('maritalStatusIndex');

    Route::resource('maritalstatus', MaritalStatusController::class);
    // ************************************FIN RUTAS DE ESTADO CIVIL**********************************

    // *******************************Localidades*****************************************
    //cargar datatable del lado del servidor
    Route::get('/localities/localitiesIndex', [LocalityController::class, 'localitiesIndex'])->name('localitiesIndex');
    //resource
    Route::resource('localities', LocalityController::class);

    // *********************************INICIO RUTAS DE PROVEEDORES***************************
    //cargar datatable del lado del servidor
    Route::get('/providers/providersIndex', [ProviderController::class, 'providersIndex'])->name('providersIndex');
    //activar/inactivar
    Route::post('/providers/activarRegistro/{id}', [ProviderController::class, 'destroy']);
    //actualizar
    Route::post('/providers/{id}', [ProviderController::class, 'update']);
    Route::resource('providers', ProviderController::class);
    // ************************************FIN RUTAS DE PROVEEDORES***************************

    // *********************************INICIO RUTAS DE TIPOS DE DOCUMENTOS**********************************
    //cargar datatable del lado del servidor
    Route::get('/documenttypes/documentTypesIndex', [DocumentTypeController::class, 'documentTypesIndex'])->name('documentTypesIndex');

    Route::resource('documenttypes', DocumentTypeController::class);
    // ************************************FIN RUTAS DE TIPOS DE DOCUMENTOS**********************************

    // *********************************INICIO RUTAS DE TIPOS DE NOVEDADES**********************************
    //cargar datatable del lado del servidor
    Route::get('/noveltiestypes/noveltyTypesIndex', [NoveltyTypeController::class, 'noveltyTypesIndex'])->name('noveltyTypesIndex');
    Route::resource('noveltiestypes', NoveltyTypeController::class);
    // ************************************FIN RUTAS DE TIPOS DE NOVEDADES**********************************

    // *******************************Tipos de Visitas*****************************************
    //cargar datatable del lado del servidor
    Route::get('/visittypes/VisitTypeIndex', [VisitTypeController::class, 'VisitTypeIndex'])->name('VisitTypeIndex');
    //activar/inactivar
    Route::post('/visittypes/activarTipoVisita/{id}', [VisitTypeController::class, 'destroy']);
    // Resource
    Route::resource('visittypes', VisitTypeController::class);

    // **********************************INICIO RUTAS DE USUARIOS************************************
    // editar perfil
    Route::post('/users/actualizar/{id}', [UserController::class, 'actualizar'])->name('actualizar');
    //activar/inactivar usuario
    Route::post('/users/activarUsuario', [UserController::class, 'destroy'])->name('activarUsuario');
    // reportes
    Route::post('/users/reporte', [UserController::class, 'reporteUsuarios'])->name('reporteUsuarios');
    //cargar datatable del lado del servidor
    Route::get('/users/usersIndex', [UserController::class, 'usersIndex'])->name('usersIndex');
    // obtener el rol y el area a partir de la empresa seleccionada al agregar un usuario nuevo
    Route::get('/users/rolandarea/{string}', [UserController::class, 'rolandarea']);
    // obtener el rol y el area a partir de la empresa seleccionada al editar un usuario
    Route::get('/users/rolandareaedit/{string}/{id}/', [UserController::class, 'rolandareaedit']);
    //traer la informacion de areas, empresas y roles en modal editar
    Route::get('/users/areaempresa', [UserController::class, 'rolesPorEmpresa']);
    //eliminar roles por empresa
    Route::post('/users/areaempresa/eliminar', [UserController::class, 'eliminarRolesPorEmpresa']);
    //actualizar usuario
    Route::post('/users/{id}', [UserController::class, 'update']);
    //mostrar traza de clientes de usuario
    Route::get('/users/clientes', [UserController::class, 'clientes']);
    //consultar guardas asociados segun en id del cliente enviado como parametro
    Route::get('/users/searchWatchman/{id}', [UserController::class, 'searchWatchman']);
    //detalle hijos
    Route::get('/users/detalleHijos', [UserController::class, 'detalleHijos']);

    // Resource
    Route::resource('users', UserController::class);
    // ************************************FIN RUTAS DE USUARIOS*************************************

    // *********************************INICIO RUTAS DE ACTAS DE VISITAS **********************************
    Route::get('/workminutes/workMinutesIndex', [WorkMinutesController::class, 'workMinutesIndex'])->name('workMinutesIndex');
    Route::resource('workminutes', WorkMinutesController::class);
    // ************************************FIN RUTAS DE ACTAS DE VISITAS **********************************

    // **********************************INICIO APODATOS***********************************
    //cargar datatable del lado del servidor
    Route::get('/apodatos/apodatosIndex', [ApodatosController::class, 'apodatosIndex'])->name('apodatosIndex');
    //activar/inactivar
    Route::post('/apodatos/activarApodatos/{id}', [ApodatosController::class, 'destroy']);
    // descargar plantilla de apodatos
    Route::post('/apodatos/descargarPlantilla', [ApodatosController::class, 'descargarPlantilla']);
    // consultar academia
    Route::get('/apodatos/consultarAcademia/{id}', [ApodatosController::class, 'consultarAcademia']);
    // Resource
    Route::resource('apodatos', ApodatosController::class);
    // ************************************FIN APODATOS************************************

    // **********************************INICIO HOJAS DE VIDA***********************************
    //cargar datatable con serverSide
    Route::get('/bankofresumes/consultar', [BankOfResumesController::class, 'consultar']);
    Route::post('/bankofresumes/{id}', [BankOfResumesController::class, 'update']);
    Route::resource('bankofresumes', BankOfResumesController::class);
    // ************************************FIN HOJAS DE VIDA************************************

    // *********************************INICIO RUTAS DE CERTIFICADOS**********************************
    // Descargar desprendible individual
    Route::get('/certificates/descDespNom/{id}', [CertificatesController::class, 'descDespNom']);
    // Descargar certificado laborar individual
    Route::get('/certificates/descCertLab/{id}', [CertificatesController::class, 'descCertLab']);
    // Descargar plantilla masivo nomina
    Route::get('/certificates/plantillaMasivo',[CertificatesController::class,'plantillaMasivo'])->name('plantillaMasivo');
    // guardar cargue de nomina
	Route::post('/certificates/cargarNomina', [CertificatesController::class,'cargarNomina']);
    // consultar los despredibles de la cedula ingresada
    Route::get('/certificates/consultarDesprendibles/{id}',[CertificatesController::class,'consultarDesprendibles']);
    // Descargar desprendible de pago de nómina
    Route::get('/certificates/payroll/{id}',[CertificatesController::class,'payroll']);
    Route::resource('certificates', CertificatesController::class);
    // ************************************FIN RUTAS DE CERTIFICADOS**********************************
    
    // *********************************INICIO RUTAS DE COTIZACIONES**********************************
    //cargar datatable del lado del servidor
    Route::get('/quotations/quotationsIndex', [QuotationController::class, 'quotationsIndex'])->name('quotationsIndex');
    // aprobar o rechazar cotización
    Route::post('/quotations/aprobarCotizacion/{id}', [QuotationController::class, 'aprobarCotizacion']);
    // mostrar pdf de la orden de compra
    Route::get('/quotations/ordencompra/{id}', [QuotationController::class, 'OrdenCompra']);

    Route::post('/quotations/registrarPago', [QuotationController::class, 'registrarPago']);
    
    Route::resource('quotations', QuotationController::class);
    // ************************************FIN RUTAS DE COTIZACIONES**********************************
    
    // *********************************INICIO RUTAS DE CAPACITACIONES**********************************
    //cargar datatable del lado del servidor
    Route::get('/trainings/trainingsIndex', [TrainingController::class, 'trainingsIndex'])->name('trainingsIndex');
    //activar/inactivar
    Route::post('/trainings/activarRegistro/{id}', [TrainingController::class, 'destroy']);
    //actualizar
    Route::post('/trainings/{id}', [TrainingController::class, 'update']);
    //mostrar tabla de participantes
    Route::get('/trainings/tablaParticipantes', [TrainingController::class, 'tablaParticipantes']);
    Route::resource('trainings', TrainingController::class);
    // ************************************FIN RUTAS DE CAPACITACIONES**********************************

    // **********************************INICIO DESVINCULACIÓN DE PERSONAL***********************************
    Route::post('/terminationstaff/generarReporte', [TerminationStaffController::class, 'generarReporte'])->name('generarReporte');
    //cargar datatable con serverSide
    Route::get('/terminationstaff/terminationStaffIndex', [TerminationStaffController::class, 'terminationStaffIndex']);
    //consultar si el trabajador ya esta registrado
    Route::get('/terminationstaff/consultarTrabajador/{id}', [TerminationStaffController::class, 'consultarTrabajador']);
    Route::post('/terminationstaff/aprobarDesvinculacion/{id}', [TerminationStaffController::class, 'aprobarDesvinculacion']);
    Route::resource('terminationstaff', TerminationStaffController::class);
    // ************************************FIN DESVINCULACIÓN DE PERSONAL************************************

    // **********************************INICIO ENTREGA DOTACIÓN***********************************
    //cargar datatable con serverSide
    Route::get('/deliveryendowment/deliveryEndowmentIndex', [DeliveryEndowmentController::class, 'deliveryEndowmentIndex']);
    Route::resource('deliveryendowment', DeliveryEndowmentController::class);
    // ************************************FIN ENTREGA DOTACIÓN************************************

    // **********************************INICIO INFORME DE ACTIVIDADES CCTV***********************************
    //cargar datatable con serverSide
    Route::get('/cctv/cctvIndex', [CctvController::class, 'cctvIndex']);
    // eliminar pdf de la cotización actual
    Route::post('/cctv/eliminarPdfCotizacion/{id}', [CctvController::class, 'eliminarPdfCotizacion']);
    // actualizar fecha y cotización
    Route::post('/cctv/update/{id}', [CctvController::class, 'update']);
    Route::resource('cctv', CctvController::class);
    // ************************************FIN INFORME DE ACTIVIDADES CCTV************************************

    // **********************************INICIO INFORME MENSUAL***********************************
    //cargar datatable con serverSide
    Route::get('/monthreport/monthReportIndex', [MonthReportController::class, 'monthReportIndex']);
    Route::post('/monthreport/aprobarInforme/{id}', [MonthReportController::class, 'aprobarInforme']);
    Route::resource('monthreport', MonthReportController::class);
    // ************************************FIN INFORME MENSUAL************************************

    // *******************************INFORMES (Inspección de Ruta)*****************************************
    //cargar datatable del lado del servidor
    Route::get('/routeinspection/routeInspectionIndex', [RouteInspectionController::class, 'routeInspectionIndex'])->name('routeInspectionIndex');
    //consultar tabla de guardas e imagenes de revi
    Route::get('/routeinspection/getPersPreWatchmen/{id}', [RouteInspectionController::class, 'getPersPreWatchmen']);
    // guardar informe revi en PDF
    Route::post('/inspeccionRuta/guardarPdfRevi', [RouteInspectionController::class, 'guardarPdfRevi']);
    Route::post('/inspeccionRuta/eliminarPdfRevi/{id}', [RouteInspectionController::class, 'eliminarPdfRevi']);
    // Resource
    Route::resource('routeinspection', RouteInspectionController::class);

    // **********************************INICIO RUTAS DE NOVEDADES DE CLIENTES***********************************
    //cargar datatable de novedades de clientes con serverSide
    Route::get('/noveltiescustomers/NoveltycustomerIndex', [NoveltyCustomerController::class, 'NoveltycustomerIndex'])->name('NoveltycustomerIndex');
    // buscar tipo de gestión
    Route::get('/noveltiescustomers/search_action/{id}', [NoveltyCustomerController::class, 'search_action']);

    Route::resource('noveltiescustomers', NoveltyCustomerController::class);
    // ************************************FIN RUTAS DE NOVEDADES DE CLIENTES************************************
    
    // **********************************INICIO RUTAS DE NOVEDADES DE GUARDAS***********************************
    //cargar datatable de novedades de guardas con serverSide
    Route::get('/noveltieswatchmen/NoveltyWatchmenIndex', [NoveltyWatchmenController::class, 'NoveltyWatchmenIndex']);
    Route::resource('noveltieswatchmen', NoveltyWatchmenController::class);
    // ************************************FIN RUTAS DE NOVEDADES DE GUARDAS************************************

    // **********************************INICIO RUTAS DE NOVEDADES DE RRHH***********************************
    //cargar datatable de novedades de RRHH con serverSide
    Route::get('/noveltiesrrhh/noveltiesRrhhIndex', [NoveltyRrhhController::class, 'noveltiesRrhhIndex'])->name('noveltiesRrhhIndex');
    Route::post('/noveltiesrrhh/generarReporteRrhh', [NoveltyRrhhController::class, 'generarReporteRrhh'])->name('generarReporteRrhh');
    Route::post('/noveltiesrrhh/{id}', [NoveltyRrhhController::class, 'update']);
    Route::resource('noveltiesrrhh', NoveltyRrhhController::class);
    // ************************************FIN RUTAS DE NOVEDADES DE RRHH************************************

    // **********************************INICIO SOLICITUD DE PERSONAL***********************************
    //cargar datatable con serverSide
    Route::get('/staffrequest/staffrequestIndex', [StaffRequestController::class, 'staffrequestIndex']);
    Route::post('/staffrequest/aprobarSolicitud/{id}', [StaffRequestController::class, 'aprobarSolicitud']);
    Route::post('/staffrequest/agregarCandidatos', [StaffRequestController::class, 'agregarCandidatos']);
    Route::post('/staffrequest/actualizarArchivo', [StaffRequestController::class, 'actualizarArchivo']);
    Route::get('/staffrequest/traerCandidatos', [StaffRequestController::class, 'traerCandidatos']);
    Route::resource('staffrequest', StaffRequestController::class);
    // ************************************FIN SOLICITUD DE PERSONAL************************************

    // *******************************Visitas Domiciliarias*****************************************
    //cargar datatable del lado del servidor
    Route::get('/homevisits/homeVisitIndex', [HomeVisitController::class, 'homeVisitIndex']);
    // Resource
    Route::resource('homevisits', HomeVisitController::class);

    // *******************************Visitas Técnicas*****************************************
    //cargar datatable del lado del servidor
    Route::get('/technicalvisits/technicalVisitIndex', [TechnicalVisitController::class, 'technicalVisitIndex']);
    // Resource
    Route::resource('technicalvisits', TechnicalVisitController::class);

    // *******************************Permisos*****************************************
    //cargar datatable del lado del servidor
    Route::get('/permissions/permissionsIndex', [PermissionController::class, 'permissionsIndex'])->name('permissionsIndex');
    Route::resource('permissions', PermissionController::class);


    // *******************************Roles*****************************************
    // Resource
    Route::resource('roles', RoleController::class);

    // **********************************INICIO NOTIFICACIONES***********************************
    // marcar notificacion comercial como leída
    Route::post('/notificacionClienteLeida', [NotificationController::class, 'notificacionClienteLeida']);
    // eliminar notificación comercial
    Route::post('/notificacionClienteEliminada', [NotificationController::class, 'notificacionClienteEliminada']);
    // marcar notificacion de desvinculacion de personal como leída
    Route::post('/notificacionDesvinculacionLeida', [NotificationController::class, 'notificacionDesvinculacionLeida']);
    // eliminar notificación de desvinculacion de personal
    Route::post('/notificacionDesvinculacionEliminada', [NotificationController::class, 'notificacionDesvinculacionEliminada']);
    // marcar notificacion de Solicitud de personal como leída
    Route::post('/notificacionSolicitudPersonalLeida', [NotificationController::class, 'notificacionSolicitudPersonalLeida']);
    // eliminar notificación de Solicitud de personal
    Route::post('/notificacionSolicitudPersonalEliminada', [NotificationController::class, 'notificacionSolicitudPersonalEliminada']);
    // marcar notificacion de apodatos como leída
    Route::post('/notificacionApodatosLeida', [NotificationController::class, 'notificacionApodatosLeida']);
    // eliminar notificación de Apodatos
    Route::post('/notificacionApodatosEliminada', [NotificationController::class, 'notificacionApodatosEliminada']);
    // marcar notificacion de afiliaciones como leída
    Route::post('/notificacionAfiliacionesLeida', [NotificationController::class, 'notificacionAfiliacionesLeida']);
    // eliminar notificación de afiliaciones
    Route::post('/notificacionAfiliacionesEliminada', [NotificationController::class, 'notificacionAfiliacionesEliminada']);
    // **********************************FIN NOTIFICACIONES***********************************
});

