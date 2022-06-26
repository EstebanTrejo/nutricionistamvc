<?php 

namespace Model;

class Paciente extends ActiveRecord {
    // Base de datos
    protected static $tabla = 'pacientes';
    protected static $columnasDB = ['id', 'nombre', 'apellido','fecha_nacimiento','edad','sexo','dni','direccion','telefono','activo'
    ,'altura','peso','imc','ultima_visita','cuerpo'];

    public $id;
    public $nombre;
    public $apellido;
    public $fecha_nacimiento;
    public $edad;
    public $sexo;
    public $dni;
    public $direccion;
    public $telefono;
    public $activo;
    public $altura;
    public $peso;
    public $imc;
    public $ultima_visita;
    public $cuerpo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->fecha_nacimiento = $args['fecha_nacimiento'] ?? '';
        $this->edad = $args['edad'] ?? '';
        $this->sexo = $args['sexo'] ?? '';
        $this->dni = $args['dni'] ?? '';
        $this->direccion = $args['direccion'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->activo = $args['activo'] ?? 1;
        $this->altura = $args['altura'] ?? '';
        $this->peso = $args['peso'] ?? '';
        $this->imc = $args['imc'] ?? '';
        $this->ultima_visita = $args['ultima_visita'] ?? '';
        $this->cuerpo = $args['cuerpo'] ?? '';
    }

    public function calculos(){
        //fecha actual del servidor
        date_default_timezone_set("America/Argentina/Buenos_Aires");
        $this->ultima_visita = date('Y-m-d');
        // calculos de imc
        $altura2 = $this->altura / 100;
        $altura3 = $altura2 * $altura2;
        $imccalculo = $this->peso / $altura3;
        $this->imc = $imccalculo;
        // calculo de edad
        $fecha_nacimiento = $this->fecha_nacimiento;
        $fechaservidor = date('Y-m-d');
        $edad_diff = date_diff(date_create($fecha_nacimiento), date_create($fechaservidor));
        $this->edad = $edad_diff->format('%y');
        //estado del cuerpo
        if($this->imc < 18.5){
            $this->cuerpo = "Bajopeso";
        }

        if($this->imc >= 18.5 & $this->imc <= 24.9 ){
            $this->cuerpo = "Normal";
        }

        if($this->imc >= 25 & $this->imc <= 29.9 ){
            $this->cuerpo = "Sobrepeso";
        }

        if($this->imc >= 30){
            $this->cuerpo = "Obesidad";
        }
    }


    public function validar(){

        if(!$this->nombre){
            self::$alertas['error'][] = 'el nombre del paciente es obligatorio';
        }

        if(!$this->apellido){
            self::$alertas['error'][] = 'el apellido del paciente es obligatorio';
        }

        if(!$this->direccion){
            self::$alertas['error'][] = 'la direccion Del Paciente es obligatoria';
        }

        if(!$this->telefono){
            self::$alertas['error'][] = 'El Telefono Del Paciente es obligatoria';
        }

        if(!$this->dni) {
            self::$alertas['error'][] = 'El DNI del Paciente es Obligatorio';
        }

        if(!$this->sexo) {
            self::$alertas['error'][] = 'Por favor seleccione un sexo';
        }

        if(!is_numeric($this->dni)) {
            self::$alertas['error'][] = 'El DNI Es solo Numerico';
        }


        return self::$alertas;
    }

}