<?php 

namespace Controllers;

use Model\Paciente;
use MVC\Router;

class PacienteController {
    public static function index(Router $router){
        $router->render('pacientes/index',[

        ]);
    }

    public static function ver(Router $router){
        // session_start();
        $pacientes = Paciente::all();

        $router->render('pacientes/ver',[
            'pacientes' => $pacientes,
        ]);
    }

    public static function crear(Router $router){
        // session_start();
        isAdmin();
        $paciente = new Paciente;
        $alertas = [];


        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $paciente->sincronizar($_POST);
            $alertas = $paciente->validar();

            if(empty($alertas)) {
                $paciente->calculos();
                $paciente->guardar();
                header('Location: /pacientes');
            }

        }

        $router->render('pacientes/crear',[
            'Paciente' => $paciente,
            'alertas' => $alertas
        ]);
    }

    public static function actualizar(Router $router){
        $paciente = Paciente::find($_GET['id']);
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $paciente->sincronizar($_POST);
            $alertas = $paciente->validar();

            if(empty($alertas)) {
                $paciente->calculos();
                $paciente->guardar();
                header('Location: /pacientes');
            }
        }

        $router->render('pacientes/actualizar',[
            'paciente'=>$paciente,
            'alertas'=>$alertas
        ]);
    }

    public static function eliminar(){

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'];
            $paciente = Paciente::find($id);
            $paciente->eliminar();
            header('Location: /pacientes/ver');
        }
    }
}