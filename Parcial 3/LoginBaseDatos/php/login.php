<?php

$vLogin   = $_POST['Login'];
$vPassword= $_POST['Password'];

//$vLogin   = 'cajera';
//$vPassword= '12345';

//$vLogin   = 'admin';
//$vPassword= '12345';

$hostname = 'localhost';
$database = 'web18100229';
$username = 'root';
$password = '';


$link = new mysqli($hostname, $username, $password, $database);


if ($link->connect_error) {
        $row['resultado']  = '1';
        $row['informacion']= 'Error en la base de datos';
		$row['mensaje']    = 'Error conexion';
		$row['detalle']    = 'No hay conexion a la base de datos';
    } else{

    $consulta="select id_usuario,nombre from usuario
    	       where  nombre = '".$vLogin."' and contraseña = '".$vPassword."'";

    $result = $link->query($consulta);

    if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();

			$row['resultado']  = '0';
			$row['informacion']= 'Informacion correcta';
			$row['mensaje']    = 'Correcto';
			$row['detalle']    = 'Bienvenido'.$registro['nombre'];

            session_start();
            $_SESSION['id_usuario']=$registro['id_usuario'];
            $_SESSION['nombre']=$registro['nombre'];

    } else  {
        $row['resultado']  = '1';
        $row['informacion']= 'Informacion incorrecta';
        $row['mensaje']    = 'Incorrecto';
        $row['detalle']    = 'Usuario o contraseña incorrecto';
    }

    $link->close();
}


//var_dump($row);


$encoded_row = array_map('utf8_encode',$row);


echo json_encode($encoded_row);

?>