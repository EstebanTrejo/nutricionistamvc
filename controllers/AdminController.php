<?php 

namespace Controllers;

use MVC\Router;

class AdminController{
    public static function index(Router $router){
        

        isAdmin();
        $router->render('pacientes/index',[

        ]);
    }
}