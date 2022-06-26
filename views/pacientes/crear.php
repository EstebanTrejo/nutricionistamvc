<h1 class="nombre-pagina">Nuevo Paciente</h1>
<p class="descripcion-pagina">Ingrese Los Datos Del Pacientes</p>

<?php include_once __DIR__ . "/../templates/alertas.php";?>



<form action="/pacientes/crear" method="POST" class="formulario">


<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" placeholder="Nombre" name="nombre">
</div>

<div class="campo">
<label for="apellido">Apellido</label>
<input type="text" id="apellido" placeholder="Apellido" name="apellido">
</div>

<div class="campo">
    <label for="fecha_nacimiento">Fecha De Nacimiento</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento">
</div>

<!-- sexo -->
<div class="campo">
    <label for="sexo">Sexo</label>
    <select name="sexo" id="sexo">
        <option value="" selected disabled>Seleccione su Sexo</option>
        <option value="H">Hombre</option>
        <option value="M">Mujer</option>
    </select>
</div>

<div class="campo">
    <label for="dni">DNI</label>
    <input type="number" id="dni" placeholder="DNI" name="dni">
</div>

<div class="campo">
    <label for="direccion">Direccion</label>
    <input type="text" id="direccion" placeholder="Direccion" name="direccion">
</div>

<div class="campo">
    <label for="telefono">Telefono</label>
    <input type="tel" id="telefono" placeholder="Telefono" name="telefono">
</div>

<h1 class="descripcion-pagina">Datos Corporales</h1>

<div class="campo">
    <label for="altura">Altura CM</label>
    <input type="" id="altura" placeholder="altura" name="altura" step="0.1" min="0">
</div>


<div class="campo">
    <label for="peso">Peso KG</label>
    <input type="number" id="peso" placeholder="peso" name="peso" step="0.1" min="0">
</div>

<input type="submit" class="boton" value="Guardar Paciente" onclick="return confirmarcrear()">
</form>

<a href="/pacientes" class="boton">Menu Principal</a>

<?php
$script = "<script src='/build/js/app.js'></script>";
?>