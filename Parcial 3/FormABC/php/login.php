<?php

$vLogin   = $_POST['Login'];
$vPassword= $_POST['Password'];

//$vLogin   = 'cajera';
//$vPassword= '12345';

//$vLogin   = 'admin';
//$vPassword= '12345';

//Conexion a la base de datos
$hostname = 'localhost';
$database = 'webj18100229';
$username = 'root';
$password = '';

$link = new mysqli($hostname, $username, $password, $database);

if ($link->connect_error) {
        $row['resultado']  = '1';
        $row['informacion']= 'Error en la base de datos';
		$row['mensaje']    = 'Error conexion';
		$row['detalle']    = 'No hay conexion a la base de datos';
    } else{

//Se realiza la consulta
    $consulta="select id_usuario,nombre from usuario
    	       where  nombre = '".$vLogin."' and contraseña = '".$vPassword."'";

    $result = $link->query($consulta);

    if ($result->num_rows > 0) {
            $registro = $result->fetch_assoc();

			$row['resultado']  = '0';
			$row['informacion']= 'Informacion correcta';
			$row['mensaje']    = 'Inicio de sesion correcto';
			$row['detalle']    = 'Bienvenido';

            session_start();
            $_SESSION['id_usuario']=$registro['id_usuario'];
            $_SESSION['nombre']=$registro['nombre'];

    } else  {
        $row['resultado']  = '1';
        $row['informacion']= 'Informacion incorrecta';
        $row['mensaje']    = 'Inicio de sesion incorrecto';
        $row['detalle']    = 'Usuario o contraseña incorrecto';
    }

    $link->close();
}

$encoded_row = array_map('utf8_encode',$row);
echo json_encode($encoded_row);

?>