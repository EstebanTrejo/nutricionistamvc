<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Complete El Siguiente Formulario</p>

<?php 
include_once __DIR__ . "/../templates/alertas.php";
?>


<form action="/crear-cuenta" method="post" class="formulario">
<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" value="<?php echo s($usuario->nombre); ?>">
</div>

<div class="campo">
    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="apellido" placeholder="Tu apellido" value="<?php echo s($usuario->apellido); ?>">
</div>

<div class="campo">
    <label for="telefono">telefono</label>
    <input type="tel" id="telefono" name="telefono" placeholder="Tu telefono" value="<?php echo s($usuario->telefono); ?>">
</div>

<div class="campo">
    <label for="email">E-MAIL</label>
    <input type="email" id="email" name="email" placeholder="Tu email" value="<?php echo s($usuario->email); ?>">
</div>

<div class="campo">
    <label for="password">Password</label>
    <input type="password" id="password" name="password" placeholder="Tu password">
</div>
<input type="submit" value="Crear Cuenta" class="boton">

</form>

<div class="acciones">
    <a href='/'>Ya tienes una cuenta? Inicia Sesion!</a>
    <a href='/olvide'>Olvidaste tu contraseña?</a>
</div>