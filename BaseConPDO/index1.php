<?php
   //0. INCLUIR EL ARCHIVO DONDE ESTA PROGRAMADA NUESTRA CLASE BASEDATOS
   include ('Servidor/conBD.php');

   //1. Crear una copia (crear un objeto) de la clase BD
   $operacionBd = new conBD();

   //2. consulta SQL para seleccionar
   $ConQuery = ("SELECT * FROM estudiantes");
   
   //3. accedemos al metodo consutar y almacenamos la consulta dentro de un arrgelo
   $estudiantes=$operacionBd->Consultar($ConQuery);

    // 5.  ensayo para imprimir datos en pantalla
    // print_r($estudiantes);
    // $estudiantes[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Lista Estudiantes</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <h3 class="text-center">Estudiante Nuevo</h3>

                <form action="servidor/agregar.php" method="POST">
                    <input type="text" class="form-control mb-3" name="identificacion" placeholder="Identificación">
                    <input type="text" class="form-control mb-3" name="apellidos" placeholder="Apellidos">
                    <input type="text" class="form-control mb-3" name="nombres" placeholder="Nombres">
                    <input type="text" class="form-control mb-3" name="celular" placeholder="Celular">
                    <input type="text" class="form-control mb-3" name="programa" placeholder="Programa">
                    <input type="submit" class="btn btn-primary" value="Agregar" name = "agregar"> 
                </form>      

            </div>

            <div class="col-md-9">
                <h2 class="text-center">Listado</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <td>Identificación</td>
                        <td>Apellidos</td>
                        <td>Nombres</td>
                        <td>Celular</td>
                        <td>Programa</td>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($estudiantes as $dato):?>
                                <tr>
                                    <td><?= $dato["IdEstudiante"] ?></td>
                                    <td><?= $dato["Apellidos"] ?></td>
                                    <td><?= $dato["Nombres"] ?></td>
                                    <td><?= $dato["Celular"] ?></td>
                                    <td><?= $dato["Programa"] ?></td>

                                    <th><a href="editar.php?id=<?php echo $dato['IdEstudiante']?>">Editar</a></th>
                                    <th><a href="servidor/eliminar.php?id=<?php echo $dato['IdEstudiante']?>" class="btn btn-danger">Eliminar</a></th>
                                </tr> 
                        <?php endforeach?>                    
                    </tbody>
                </table>            
            </div>
        </div>    
    </div>    
</body>
</html>