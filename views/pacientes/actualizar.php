<h1 class="nombre-pagina">Actualizar Pacientes</h1>
<p class="descripcion-pagina">Modifica Los Datos Del Pacientes</p>

<?php include_once __DIR__ . "/../templates/alertas.php";?>

<form method="POST" class="formulario">


<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" placeholder="Nombre" name="nombre" value="<?php echo $paciente->nombre; ?>">
</div>

<div class="campo">
<label for="apellido">Apellido</label>
<input type="text" id="apellido" placeholder="Apellido" name="apellido" value="<?php echo $paciente->apellido;?>">
</div>

<div class="campo">
    <label for="fecha_nacimiento">Fecha De Nacimiento</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $paciente->fecha_nacimiento; ?>">
</div>

<div class="campo">
    <label for="dni">DNI</label>
    <input type="number" id="dni" placeholder="DNI" name="dni" value="<?php echo $paciente->dni; ?>">
</div>

<div class="campo">
    <label for="direccion">Direccion</label>
    <input type="text" id="direccion" placeholder="Direccion" name="direccion" value="<?php echo $paciente->direccion; ?>">
</div>

<div class="campo">
    <label for="telefono">Telefono</label>
    <input type="tel" id="telefono" placeholder="Telefono" name="telefono" value="<?php echo $paciente->telefono; ?>">
</div>

<h1 class="descripcion-pagina">Datos Corporales</h1>

<div class="campo">
    <label for="altura">Altura</label>
    <input type="" id="altura" placeholder="altura" name="altura" value="<?php echo $paciente->altura; ?>">
</div>


<div class="campo">
    <label for="peso">Peso KG</label>
    <input type="number" id="peso" placeholder="peso" name="peso" value="<?php echo $paciente->peso; ?>">
</div>

<input type="submit" class="boton" value="Actualizar Paciente" onclick="return confirmaractualizar()">
</form>

<?php
$script = "<script src='/build/js/app.js'></script>";
?>