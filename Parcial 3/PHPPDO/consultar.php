<?php
include "conectar.php";


try {
    $queryStr="select * from pedido";
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
