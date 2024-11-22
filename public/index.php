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

//TRASLADOS
$router->get('/traslados', [TrasladosController::class,'index']);
$router->get('/API/traslados/buscarTropa', [TrasladosController::class,'buscarTropa']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
