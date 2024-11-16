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
$router->get('/API/altas/buscarMunicipio', [AltasController::class,'buscarMunicipios']);
$router->get('/API/altas/buscarMunicipio2', [AltasController::class,'buscarMunicipios']);
$router->get('/API/altas/buscarMunicipio3', [AltasController::class,'buscarMunicipios']);
$router->get('/API/altas/buscarMunicipio4', [AltasController::class,'buscarMunicipios']);
$router->get('/API/altas/verificarDpi', [AltasController::class,'verificarDpi']);

//BAJAS
$router->get('/bajas', [BajasController::class,'index']);
$router->get('/API/bajas/buscarTropa', [BajasController::class,'buscarTropa']);

//MODIFICACIONES
$router->get('/correcciones', [CorreccionesController::class,'index']);
$router->get('/API/correcciones/buscarTropa', [CorreccionesController::class,'buscarTropa']);
$router->get('/API/correcciones/buscarMunicipio', [CorreccionesController::class,'buscarMunicipios']);
$router->get('/API/correcciones/buscarMunicipio2', [CorreccionesController::class,'buscarMunicipios']);
$router->get('/API/correcciones/buscarMunicipio3', [CorreccionesController::class,'buscarMunicipios']);
$router->get('/API/correcciones/buscarMunicipio4', [CorreccionesController::class,'buscarMunicipios']);

//TRASLADOS
$router->get('/traslados', [TrasladosController::class,'index']);
$router->get('/API/traslados/buscarTropa', [TrasladosController::class,'buscarTropa']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
