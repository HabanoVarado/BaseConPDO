<?php
//0 Crear una clase, metodos para conectar, consultar, agregar, eliminar.
class conBD{
    //1 declarar las propiedades o atributos
    // esta clase no contiene propiedades   
    //2 crear un constructor
    public function __construct(){}
    
    //3. crear métodos
    public function Conectar(){
        try{            
            $conexion = new PDO('mysql:host=localhost;dbname=estudiantescrud', "root", "");
            return ($conexion);
        }
        catch(PDOException ){
            header("Location:error.php");
        }
    }
    
    public function AgregarRegistro($consultaSQL, $tipoConsulta){
        // 1* conectarme a la base de datos
        $conexion=$this->Conectar();
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);        
        try{
            // 2* Prepara la BD para ejecutar una consulta sql, que puede ser agregar o eliminar
            $operacion = $conexion->prepare($consultaSQL);
            // 3* ejecutar consulta que acaba de recibir
            $resultado=$operacion->execute();
            //4* Clasificar la consulta            
            $this->ClasificarConsultar($tipoConsulta);
        }
        catch(PDOException $mensajeError){
            header("Location:error.php");
        }
    }

    public function Consultar($ConQuery){
         //1. Conectarme a la base datos
         $conexion = $this->Conectar();

         //2. Preparar la BD para enviar una consulta SQL
         $operacion=$conexion->prepare($ConQuery);

         //3. FETCH_ASSOC-->ENVIA LOS DATOS EN FORMA DE ARRAY MULTIDIMENSIONAL
         $operacion->setFetchMode(PDO::FETCH_ASSOC);

          //4 Ejecutar la operacion
          $resultado=$operacion->execute();

          //5. Retornar la información solicitada
          return($operacion->fetchAll());
    }

    public function ClasificarConsultar($tipoConsulta){
        switch ($tipoConsulta){
        case 'insert':
            header("Location:../index1.php");
        break;
        case 'delete':
            header("Location:../index1.php");
        break;
        case 'update':
            header("Location:../index1.php");
        break;
        }
    }
}
?>