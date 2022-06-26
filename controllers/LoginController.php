<?php

namespace Controllers;

use Classes\Email;
use Model\Usuario;
use MVC\Router;

class LoginController{

public static function login(Router $router){

    $alertas = [];
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $auth = new Usuario($_POST);

    $alertas = $auth->validarLogin();

    if(empty($alertas)){
        $usuario = Usuario::where('email',$auth->email);
    
        if($usuario){
            if($usuario->comprobarPasswordAndVerificado($auth->password)){
                //autenticar una sesion
                session_start();

                $_SESSION['id'] = $usuario->id;
                $_SESSION['nombre'] = $usuario->nombre . " " . $usuario->apellido;
                $_SESSION['email'] = $usuario->email;
                $_SESSION['login'] = true;

                if($usuario->administrador === "1"){
                    $_SESSION['administrador'] = $usuario->administrador ?? null;
                    header('Location: /pacientes');
                }
                else{
                    header('Location: /');
                }
                
            }
        }else{
            Usuario::setAlerta('error','El Correo Ingresado No Existe');
        }
    }
}
    $alertas = Usuario::getAlertas();
    $router->render('auth/login',[
        'alertas' => $alertas
    ]);
}

public static function logout(){
    echo "Desde el logout";
}

public static function olvide(Router $router){

    $alertas = []; 

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $auth = new Usuario($_POST);
        $alertas = $auth->validarEmail();

        if(empty($alertas)){
            $usuario = Usuario::where('email',$auth->email);
            if($usuario && $usuario->confirmado === "1"){
                
                //generar un token de recuperacion
                $usuario->creartoken();
                $usuario->guardar();
                //enviar el mail
                $email = new Email($usuario->email,$usuario->nombre,$usuario->token);
                $email-> enviarInstrucciones();
                //alerta
            Usuario::setAlerta('exito','Por Favor Revisa tu Email');
            $alertas = Usuario::getAlertas();
            }else{
                Usuario::setAlerta('error','El Correo Ingresado Es Incorrecto o No Esta Confirmado');
                $alertas = Usuario::getAlertas();
            }
        }
    }

    $router->render('auth/olvide-password',[
        'alertas' => $alertas
    ]);
}

public static function recuperar(Router $router){

    $alertas = [];
    $error = false;

    $token = s($_GET['token']);

    //buscar usuario

    $usuario = Usuario::where('token',$token);

    if(empty($usuario)){
        Usuario::setAlerta('error','Token De Usuario No Valido');
        $error = true;
    }

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $password = new Usuario($_POST);
        $alertas = $password->validadPassword();

        if(empty($alertas)){
            $usuario->password = null;

            $usuario->password = $password->password;
            $usuario->hashPassword();
            $usuario->token = null;

            $resultado = $usuario->guardar();

            if($resultado){
                header('Location: /');
            }
           
        }
    }

    $alertas = Usuario::getAlertas();
    $router->render('auth/recuperar-password',[
    'alertas' => $alertas,
    'error' => $error

    ]);
}

public static function crear(Router $router){
    $usuario = new Usuario();
    
    //alertas vacias xd

    $alertas = [];
    

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        
        $usuario -> sincronizar($_POST);
        $alertas = $usuario->validarNuevaCuenta();
        //revisar que el arreglo alertas este vacio

        if(empty($alertas)){
            //ahora verificamos que el email no se repita en la db
            $resultado = $usuario->existeUsuario();
            
            if($resultado->num_rows){
                $alertas = Usuario::getAlertas();
            }
            else{
                //hashear password
                $usuario->hashPassword();
                
                //generar un token

                $usuario->crearToken();
                

                //enviar email de confirmacion
                $email = new Email($usuario->email,$usuario->nombre,$usuario->token);
                $email->enviarConfirmacion();

                //creamos el usuario

                $resultado = $usuario->guardar();
                if($resultado){
                    header('Location:/mensaje');
                }
            }
            
            
        }
    }

    $router->render('auth/crear-cuenta',[
        'usuario' => $usuario,
        'alertas' => $alertas
    ]);
}
public static function mensaje(Router $router){
    $router->render('auth/mensaje');
}

public static function confirmar(Router $router){
    $alertas = [];

    $token = s($_GET['token']);
    $usuario = Usuario::where('token',$token);
    
    if(empty($usuario)){
        Usuario::setAlerta('error','Token No Valido');
    }
    else{
        $usuario->confirmado = "1";
        $usuario->token = NULL;
        $usuario->guardar();
        Usuario::setAlerta('exito','Cuenta Comprobada Exitosamente');
    }
    $alertas = Usuario::getAlertas();
    $router->render('auth/confirmar-cuenta', [
        'alertas' => $alertas
    ]);
}
}