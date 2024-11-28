<?php

namespace Controllers;

use Exception;
use MVC\Router;
use Model\ActiveRecord;
use Model\Reportes;

class ReportesController
{
    public static function index(Router $router){

        $user = $_SESSION['auth_user'];
        
        $userInfo = ActiveRecord::fetchFirst("SELECT * from mper inner join morg on per_plaza = org_plaza inner join mdep on org_dependencia = dep_llave inner join grados on per_grado = gra_codigo where per_catalogo = $user ");
        $_SESSION['user_info'] = $userInfo;
        $router->render('reportes/index', [
            'user' => $userInfo
        ]);

    }
}