<?php

// peticion de busqueda
$arrayEstud = [
    "data"=>[],
    "mensaje"=>''
];

if (isset($_GET['peticion-api'])){
    if($_GET['peticion-api']== 'Listar'){
        //.. porque la conexion esta fuera de la carpeta APPI
        include ('../servidor/conBD.php');   
        $operacionBd = new conBD();        
        $ConQuery = ("SELECT * FROM Estudiantes");  
        $estudiantes=$operacionBd->Consultar($ConQuery);
        $arrayEstud['data']= $estudiantes;
    }

    if($_GET['peticion-api']== 'consultar'){
        
    }
    // $arrayEstud['data']="Peticion recibida en GET";
    echo json_encode($arrayEstud);
    return true;

}

if (isset($_POST['peticion-api'])){
    if($_POST['poticion-api']=='guardar'){
        include ('../servidor/conBD.php');   
        $IdIdentificacion=$_POST["Identificacion"];
        $apellidos=$_POST["Apellidos"];
        $nombres=$_POST["Nombres"];
        $celular=$_POST["Celular"];
        $programa=$_POST["Programa"];        
        $operacionBD= new conBD();
        
        $consultarSQL = "INSERT INTO estudiantes(IdIdentificacion,Apellidos,Nombres,Celular,Programa) VALUES ($IdIdentificacion,'$Apellidos','$Nombres','$Celular','$Programa')";
      
        $operacionBD->AgregarRegistro($consultarSQL, "insert");

    }
    
    echo json_encode($arrayEstud);
    return true;
}

?>