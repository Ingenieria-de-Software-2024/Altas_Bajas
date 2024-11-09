<?php 
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\AppController;
use Controllers\AltasController;
use Controllers\BajasController;
use Controllers\CorreccionesController;
use Controllers\TrasladosController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class,'index']);

//ALTAS
$router->get('/altas', [AltasController::class,'index']);
$router->get('/API/altas/buscarTropa', [AltasController::class,'buscarTropa']);

//BAJAS
$router->get('/bajas', [BajasController::class,'index']);
$router->get('/API/bajas/buscarTropa', [BajasController::class,'buscarTropa']);

//MODIFICACIONES
$router->get('/correcciones', [CorreccionesController::class,'index']);
$router->get('/API/correcciones/buscarTropa', [CorreccionesController::class,'buscarTropa']);

//TRASLADOS
$router->get('/traslados', [TrasladosController::class,'index']);
$router->get('/API/traslados/buscarTropa', [TrasladosController::class,'buscarTropa']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
