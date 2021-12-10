<?php
$vNombre    = $_POST['nom'];
$vApellidos = $_POST['app'];
$vTelefono  = $_POST['tel'];
$vDireccion = $_POST['dir'];
$vFechaEntrega = $_POST['fch'];
$vHoraEntrega = $_POST['hre'];
$vSabor = $_POST['sab'];
$vRelleno = $_POST['rel'];
$vCobertura = $_POST['cob'];
$vPorciones = $_POST['por'];
$vTipo = $_POST['tip'];


$hostname = 'localhost';
$database = 'webj18100229';
$username = 'root';
$password = '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
} catch(PDOException $e) {
    $row['resultado']  = '1';
    $row['informacion']= 'Error DB';
    $row['mensaje']    = 'Exeption';
    $row['detalle']    = $e->getMessage();
}


try {
    if($vTipo==1){

    $query = "INSERT INTO pedido
              SET nombrecliente = ?, apellidoscliente = ?, telefono  = ?, direccion= ?, fechaentrega=?, horaentrega=?, saborpastel=?, rellenopastel=?, coberturapastel=?, porcionespastel=?";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(1, $vNombre);
    $stmt->bindParam(2, $vApellidos);
    $stmt->bindParam(3, $vTelefono);
    $stmt->bindParam(4, $vDireccion);
    $stmt->bindParam(5, $vFechaEntrega);
    $stmt->bindParam(6, $vHoraEntrega);
    $stmt->bindParam(7, $vSabor);
    $stmt->bindParam(8, $vRelleno);
    $stmt->bindParam(9, $vCobertura);
    $stmt->bindParam(10, $vPorciones);

    }else{
        $query = "UPDATE pedido
                  SET nombrecliente = ?, apellidoscliente = ?, telefono  = ?, direccion= ?, fechaentrega=?, horaentrega=?, saborpastel=?, rellenopastel=?, coberturapastel=?, porcionespastel=?
                  WHERE id_pedido = ?";

    $stmt = $dbh->prepare($query);
    $stmt->bindParam(1, $vNombre);
    $stmt->bindParam(2, $vApellidos);
    $stmt->bindParam(3, $vTelefono);
    $stmt->bindParam(4, $vDireccion);
    $stmt->bindParam(5, $vFechaEntrega);
    $stmt->bindParam(6, $vHoraEntrega);
    $stmt->bindParam(7, $vSabor);
    $stmt->bindParam(8, $vRelleno);
    $stmt->bindParam(9, $vCobertura);
    $stmt->bindParam(10, $vPorciones);
    $stmt->bindParam(11, $vTipo);
    }
    
   if ($stmt->execute()) {
        $stmt = $dbh->prepare("select LAST_INSERT_ID() as consecutivo");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        $row['resultado']  = '0';
        $row['informacion']= 'Exito';
        $row['mensaje']    = "Pedido agregado/modificado:)";
        $row['detalle']    = $result['consecutivo'];
   } else {
        $row['resultado']  = '2';
        $row['informacion']= 'Error DB';
        $row['mensaje']    = 'Error Ejecucion de Insert';
        $row['detalle']    = 'Error al hacer sentecia de insercion';
   }

} catch(PDOException $exception) {
    $row['resultado']  = '3';
    $row['informacion']= 'Error DB';
    $row['mensaje']    = 'Exepcion en Insercion';
    $row['detalle']    =  $exception->getMessage();
}


$encoded_row = array_map('utf8_encode',$row);
echo json_encode($encoded_row);
?>
