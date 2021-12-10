<?php
$Id_pedido = $_POST['id_pedido'];


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

$sql = "SELECT * FROM pedido WHERE id_pedido = ?";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(1, $Id_pedido);

 if($stmt->execute()){
       $result = $stmt->fetch(PDO::FETCH_ASSOC);

       $row['resultado']  = '0';
       $row['informacion']= 'Consulta realizada';
       $row['mensaje']    = 'Pedido encontrado';
       $row['detalle']    = $result;
} else {
       $row['resultado']  = '2';
       $row['informacion']= 'Error de consulta';
       $row['mensaje']    = 'Error';
       $row['detalle']    = "Error al ejectar la consulta";
}
echo json_encode($row);
?>
