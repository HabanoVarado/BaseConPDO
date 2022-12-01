<?php
    include ('conBD.php');

    $id=$_GET['id'];

    $operacionBD = new conBD();
    $consultaSQL = "DELETE FROM estudiantes where '$id' =IdEstudiante";

    $operacionBD->AgregarRegistro($consultaSQL,'delete');

?>