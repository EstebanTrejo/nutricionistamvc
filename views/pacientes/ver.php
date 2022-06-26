<h1 class="nombre-pagina">Administracion de Pacientes</h1>
<p class="descripcion-pagina">Todos Los Pacientes</p>

<ul class="pacientes">
    <?php foreach($pacientes as $p) {?>
        <li>
            <p>Nombre: <span> <?php echo $p->nombre ?></span></p>
            <p>Apellido: <span> <?php echo $p->apellido ?></span></p>
            <p>Fecha Nacimiento: <span> <?php echo $p->fecha_nacimiento ?></span></p>
            <p>Edad: <span> <?php echo $p->edad ?></span></p>
            <p>Sexo: <span> <?php echo $p->sexo ?></span></p>
            <p>DNI: <span> <?php echo $p->dni ?></span></p>
            <p>Direccion: <span> <?php echo $p->direccion ?></span></p>
            <p>Telefono: <span> <?php echo $p->telefono ?></span></p>
            <p>Altura Actual: <span> <?php echo $p->altura ?> cm</span></p>
            <p>Peso Actual: <span> <?php echo $p->peso ?> kg</span></p>
            <p>IMC: <span> <?php echo $p->imc ?> kg</span></p>
            <p>Condicion: <span> <?php echo $p->cuerpo ?></span></p>
            <p>Ultima Visita: <span> <?php echo $p->ultima_visita ?></span></p>

            <div class="acciones">
                <a class="boton" href="/pacientes/actualizar?id=<?php echo $p->id; ?>">Actualizar</a>
                
                <form action="/pacientes/eliminar" method="POST" >
                    <input type="hidden" name="id" value="<?php echo $p->id; ?>">

                    <input type="submit" value="Eliminar" class="boton-eliminar" onclick="return confirmareliminar()">
                </form>
            </div>
        </li>
    <?php } ?>
</ul>

<a href="/pacientes" class="boton">Menu Principal</a>

<?php
$script = "<script src='/build/js/app.js'></script>";
?>