<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\TropaController;
use Controllers\TrasladosController;
use Controllers\ReportesController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

//TROPA
$router->get('/tropa', [TropaController::class,'index']);
$router->get('/API/tropa/buscarTropa', [TropaController::class,'buscarTropa']);

//ALTAS
$router->get('/API/tropa/buscarMunicipio', [TropaController::class,'buscarMunicipios']);
$router->get('/API/tropa/buscarMunicipioResidencia', [TropaController::class,'buscarMunicipiosResidencia']);
$router->get('/API/tropa/buscarMunicipioNacimiento', [TropaController::class,'buscarMunicipiosNacimiento']);
$router->get('/API/tropa/buscarMunicipioBen', [TropaController::class,'buscarMunicipiosBen']);
$router->get('/API/tropa/verificarDpi', [TropaController::class,'verificarDpi']);
$router->get('/API/tropa/generarCatalogo', [TropaController::class,'generarCatalogo']);
$router->post('/API/tropa/darAlta', [TropaController::class,'darAlta']);

//BAJAS
$router->get('/API/tropa/obtenerDatosPlaza', [TropaController::class,'obtenerDatosPlaza']);

//CORRECCIONES
$router->get('/API/tropa/obtenerDatosCorrecciones', [TropaController::class,'obtenerDatosCorrecciones']);

//TRASLADOS
$router->get('/traslados', [TrasladosController::class,'index']);
$router->get('/API/traslados/ObtenerDatosTraslados_1', [TrasladosController::class,'ObtenerDatosTraslados_1']);
$router->get('/API/traslados/ObtenerDatosTraslados_2', [TrasladosController::class,'ObtenerDatosTraslados_2']);

//REPORTES
$router->get('/reportes', [ReportesController::class,'index']);


$router->comprobarRutas();