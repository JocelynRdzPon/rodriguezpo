<?php

$hostname='localhost';
$database='web18100229';
$username='root';
$password='Jocy26';

try {
      $con = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
} catch(PDOException $e) {
      echo "Error de conexion a la base de datos";
      echo $e->getMessage();
      exit();
}

$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

?>
