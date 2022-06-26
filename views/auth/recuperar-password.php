<h1 class="nombre-pagina">Recuperar Password</h1>
<p class="descripcion-pagina">Coloca Tu Nuevo Password Acontinuacion</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php";
?>

<?php if($error) return; ?>
<form method="post" class="formulario">
<div class="campo">
<label for="password">Password</label>
<input type="password" id="password" name="password" placeholder="Tu Nuevo Password">
</div>

<input type="submit" class="boton" value="Guardar contraseña">
</form>

<div class="acciones">
    <a href='/'>Ya tienes una cuenta? Inicia Sesion!</a>
</div>