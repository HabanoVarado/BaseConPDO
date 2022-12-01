<?php
    //0 incluir nuestra clase de la base datos
    include ('conBD.php');

    if(isset($_POST['agregar'])){
        //1. recibir todos los datos que viajan a trabes del NAME (elementos del formulario)
        $identificacion=$_POST["identificacion"];
        $apellidos=$_POST["apellidos"];
        $nombres=$_POST["nombres"];
        $celular=$_POST["celular"];
        $programa=$_POST["programa"];

        //2. instaciar la clase de base de datos ConBD
        $operacionBD= new conBD();

        //3. definir la consulta sql a ejecutar
        $consultarSQL = "INSERT INTO estudiantes(IdEstudiante,apellidos,nombres,celular,programa) VALUES ($identificacion,'$apellidos','$nombres','$celular','$programa')";
      
        //4. Llamar el metodo de la clase para AGREGAR EL REGISTRO
        $operacionBD->AgregarRegistro($consultarSQL, "insert");
    }


  
?>