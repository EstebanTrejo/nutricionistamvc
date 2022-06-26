<h1 class="nombre-pagina">Olvidaste tu contraseña?</h1>
<p class="descripcion-pagina">reestablece tu password por favor escribe tu email</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php";
?>

<form action="/olvide" class="formulario" method="POST">
    <div class="campo">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="tu email">
    </div>
    <input type="submit" class="boton" value="Reestablecer Mi Contraseña">
</form>

<div class="acciones">
    <a href='/'>Ya tienes una cuenta? Inicia Sesion!</a>
    <a href='/crear-cuenta'>Aun no tienes una cuenta? Registrate!</a>
</div>