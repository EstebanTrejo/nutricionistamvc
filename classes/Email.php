<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
public $email;
public $nombre;
public $token;

    public function __construct($email, $nombre, $token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        //crear el email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = 'e8c420eb77e087';
        $mail->Password = 'e5bf275c52bb89';

        $mail->setFrom('NutricionistaAlicia@gmail.com');
        $mail->addAddress('NutricionistaAlicia@gmail.com','nutricionista.com');
        $mail->Subject ='Confirma Tu Cuenta';


        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
            // llenando el cuerpo
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ". $this->nombre . " Felicidades! Creaste Tu Cuenta En Nutricionista Alicia
        Confirmala Presionando El Siguiente Enlace</strong></p>";
        $contenido .= "<p>Presiona Aqui: <a href='http://localhost:3000/confirmar-cuenta?token="
        .$this->token ."'>Confirma Tu Cuenta Aqui!</a></p>";
        $contenido.= "<p>Si Tu No Solicitaste Esta Cuenta, Puedes Ignorar Este Mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;
        // enviamos el email
        $mail->send();
    }

   public function enviarInstrucciones(){

//crear el email
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.mailtrap.io';
$mail->SMTPAuth = true;
$mail->Port = 2525;
$mail->Username = 'e8c420eb77e087';
$mail->Password = 'e5bf275c52bb89';

$mail->setFrom('NutricionistaAlicia@gmail.com');
$mail->addAddress('NutricionistaAlicia@gmail.com','nutricionista.com');
$mail->Subject ='Resetear Tu Contraseña';


$mail->isHTML(TRUE);
$mail->CharSet = 'UTF-8';
    // llenando el cuerpo
$contenido = "<html>";
$contenido .= "<p><strong>Hola ". $this->nombre . " Has Solicitado Reestablecer tu password</strong></p>";
$contenido .= "<p>Presiona Aqui: <a href='http://localhost:3000/recuperar?token="
.$this->token ."'>Reestablecer Password!</a></p>";
$contenido.= "<p>Si Tu No Solicitaste Esta Cuenta, Puedes Ignorar Este Mensaje</p>";
$contenido .= "</html>";

$mail->Body = $contenido;
// enviamos el email
$mail->send();

   }
}