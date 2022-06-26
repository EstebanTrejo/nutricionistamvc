function confirmareliminar(){
    var respuesta = confirm("Estas seguro que deseas elminar este paciente?");

    if (respuesta == true){
        return true;
    }
    else {
        return false;
    }
}

function confirmaractualizar(){
    var respuesta = confirm("Estas seguro que deseas actualizar este paciente?");

    if (respuesta == true){
        return true;
    }
    else {
        return false;
    }
}

function confirmarcrear(){
    var respuesta = confirm("Estas seguro que deseas crear este paciente?");

    if (respuesta == true){
        return true;
    }
    else {
        return false;
    }
}
