<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\TropaController;
use Controllers\TrasladosController;
use Model\Tropa;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

//TROPA
$router->get('/tropa', [TropaController::class,'index']);
$router->get('/API/tropa/buscarTropa', [TropaController::class,'buscarTropa']);

//ALTAS
$router->get('/API/tropa/buscarMunicipio', [TropaController::class,'buscarMunicipios']);
$router->get('/API/tropa/verificarDpi', [TropaController::class,'verificarDpi']);

//BAJAS
$router->get('/API/tropa/obtenerDatosBajas', [TropaController::class,'obtenerDatosBajas']);

//CORRECCIONES
$router->get('/API/tropa/obtenerDatosCorrecciones', [TropaController::class,'obtenerDatosCorrecciones']);

//TRASLADOS
$router->get('/traslados', [TrasladosController::class,'index']);
$router->get('/API/traslados/ObtenerDatosTraslados_1', [TrasladosController::class,'ObtenerDatosTraslados_1']);
$router->get('/API/traslados/ObtenerDatosTraslados_2', [TrasladosController::class,'ObtenerDatosTraslados_2']);

$router->comprobarRutas();