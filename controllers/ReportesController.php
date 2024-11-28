<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\ActiveRecord;
use Model\Reportes;

class ReportesController
{
    public static function index(Router $router)
    {
        
        $router->render('reportes/index', [

        ]);
    }
}