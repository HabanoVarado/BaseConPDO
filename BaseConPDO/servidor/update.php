<?php

//1. INCLUIR EL ARCHIVO DONDE ESTA PROGRAMADA NUESTRA CLASE BASEDATOS
    include("conBD.php");  
    //2. Recibo los datos a editar    
    $IdEstudiante=$_POST["identificacion"];
    $apellidos=$_POST["apellidos"];
    $nombres=$_POST["nombres"];
    $celular=$_POST["celular"];
    $programa=$_POST["programa"];

    //3.Crear un objeto(sacarle copia  a la clase) de la clase BaseDatos
    //TODOS LOS OBJETOS SON VARIABLES
    $operacionBD= new conBD();
    echo "Se instancio la bd";

    //4. Crear la consulta SQL para EDITAR REGISTROS
    $consultaSQL="UPDATE estudiantes SET apellidos='$apellidos',nombres='$nombres',celular='$celular', programa='$programa' 
                WHERE IdEstudiante='$IdEstudiante'";
    //5. LLamar el metodo editarregistros
    $operacionBD->AgregarRegistro($consultaSQL,"update");   

?>