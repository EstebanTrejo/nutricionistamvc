<?php

namespace Model;

class Usuario extends ActiveRecord{
protected static $tabla = 'usuarios';
protected static $columnasDB = ['id','nombre','apellido','email','password','telefono','administrador','confirmado','token'];

public $id;
public $nombre;
public $apellido;
public $email;
public $password;
public $telefono;
public $administrador;
public $confirmado;
public $token;

public function __construct($args = [])
{
    $this->id = $args['id'] ?? null;
    $this->nombre = $args['nombre'] ?? '';
    $this->apellido = $args['apellido'] ?? '';
    $this->email = $args['email'] ?? '';
    $this->password = $args['password'] ?? '';
    $this->telefono = $args['telefono'] ?? '';
    $this->administrador = $args['administrador'] ?? 0;
    $this->confirmado = $args['confirmado'] ?? 0;
    $this->token = $args['token'] ?? '';
}

/*mensajes de validacion para crear*/

public function validarNuevaCuenta(){
    if(!$this->nombre){
        self::$alertas['error'][] = 'El Nombre Es Obligatorio';
    }

    if(!$this->apellido){
        self::$alertas['error'][] = 'El Apellido Es Obligatorio';
    }

    if(!$this->email){
        self::$alertas['error'][] = 'El Email Es Obligatorio';
    }

    if(!$this->password){
        self::$alertas['error'][] = 'El Password Es Obligatorio';
    }

    if(strlen($this->password) < 6){
        self::$alertas['error'][] = 'El Password Debe Contener Al Menos 6 Caracteres';
    }

    return self::$alertas;
}

public function validarLogin(){
    if(!$this->email){
        self::$alertas['error'][] = 'El Email Es Obligatorio';
    }

    if(!$this->password){
        self::$alertas['error'][] = 'El Password Es Obligatorio';
    }

    return self::$alertas;
}

public function validarEmail(){
    if(!$this->email){
        self::$alertas['error'][] = 'El Email Es Obligatorio';
    }

    return self::$alertas;
}

public function validadPassword(){
    if(!$this->password){
        self::$alertas['error'][] = 'El Password Es Obligatorio';
    }

    if(strlen($this->password) < 6){
        self::$alertas['error'][] = 'El Password Debe Contener Al Menos 6 Caracteres';
    }

    return self::$alertas;
}

public function existeUsuario(){
    //consultamos a la db

    $query = "SELECT * FROM " . self::$tabla . " WHERE email ='" . $this->email . "'LIMIT 1 ";
    $resultado = self::$db->query($query);


    if($resultado->num_rows){
        self::$alertas['error'][] = 'Ya Existe un usuario con este correo';
    }

    return $resultado;
}

public function hashPassword(){
    $this->password = password_hash($this->password, PASSWORD_BCRYPT);
}

public function crearToken(){
    $this->token = uniqid();
}

public function comprobarPasswordAndVerificado($password){
    $resultado = password_verify($password,$this->password);
    if(!$resultado || !$this->confirmado){
        self::$alertas['error'][] = 'Password Incorrecto o No Confirmaste Tu Correo';
    }else{
        return true;
    }
}

}