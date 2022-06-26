<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\LoginController;
use Controllers\PacienteController;
use MVC\Router;

$router = new Router();

// iniciamos sesion

$router->get('/',[LoginController::class,'login']);
$router->post('/',[LoginController::class,'login']);
$router->post('/logout',[LoginController::class,'logout']);

// recuperar la contraseña
$router->get('/olvide',[LoginController::class,'olvide']);
$router->post('/olvide',[LoginController::class,'olvide']);
$router->get('/recuperar',[LoginController::class,'recuperar']);
$router->post('/recuperar',[LoginController::class,'recuperar']);

//crear cuentas
$router->get('/crear-cuenta',[LoginController::class,'crear']);
$router->post('/crear-cuenta',[LoginController::class,'crear']);

//confirmar correo
$router->get('/confirmar-cuenta',[LoginController::class,'confirmar']);
$router->get('/mensaje',[LoginController::class,'mensaje']);


// admin
$router->get('/admin',[AdminController::class,'index']);

// abm pacientes

$router->get('/pacientes',[PacienteController::class,'index']);
$router->get('/pacientes/ver',[PacienteController::class,'ver']);
$router->get('/pacientes/crear',[PacienteController::class,'crear']);
$router->post('/pacientes/crear',[PacienteController::class,'crear']);
$router->get('/pacientes/actualizar',[PacienteController::class,'actualizar']);
$router->post('/pacientes/actualizar',[PacienteController::class,'actualizar']);
$router->post('/pacientes/eliminar',[PacienteController::class,'eliminar']);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();