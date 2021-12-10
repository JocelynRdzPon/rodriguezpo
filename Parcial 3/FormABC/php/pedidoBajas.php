<?php
$IdPedido = $_POST['id_pedido'];


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

$sql = "DELETE FROM pedido WHERE id_pedido = ?";
$stmt = $dbh->prepare($sql);
$stmt->bindParam(1, $IdPedido);

 if($stmt->execute()){
       $row['resultado']  = '0';
       $row['informacion']= 'Eliminado';
       $row['mensaje']    = 'Pedido eliminado';
       $row['detalle']    = "Pedido eliminado";
} else {
       $row['resultado']  = '2';
       $row['informacion']= 'Error Execute';
       $row['mensaje']    = 'Error';
       $row['detalle']    = "Error al ejectar delete";
}

$encoded_row = array_map('utf8_encode',$row);
echo json_encode($encoded_row);
?>
