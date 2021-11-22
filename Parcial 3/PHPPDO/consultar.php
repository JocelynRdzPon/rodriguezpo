<?php
include "conectar.php";

try {
       $queryStr="select * from usuarios";
       $query=$con->prepare($queryStr);
       $query->execute();

        while ($row = $query->fetch()) {
            echo $row['id_usuario'].'-'.
                 $row['nombre'].'-'.
                 $row['contraseña'].'<br>';
        }
        $query->closeCursor();

} catch(PDOException $e) {
        echo "Error de consulta a la base de datos";
        echo $e->getMessage();
}

try {
    $queryStr="select * pedidos";
    $query=$con->prepare($queryStr);
    $query->execute();

     while ($row = $query->fetch()) {
         echo $row['id_pedido'].'-'.
              $row['id_usuario'].'-'.
              $row['nombrecliente'].'-'.
              $row['apellidoscliente'].'-'.
              $row['telefono'].'-'.
              $row['direccion'].'-'.
              $row['fechaentrega'].'-'.
              $row['horaentrega'].'-'.
              $row['saborpastel'].'-'.
              $row['rellenopastel'].'-'.
              $row['coberturapastel'].'-'.
              $row['porcionespastel'].'<br>';
     }
     $query->closeCursor();

} catch(PDOException $e) {
     echo "Error de consulta a la base de datos";
     echo $e->getMessage();
}

?>
