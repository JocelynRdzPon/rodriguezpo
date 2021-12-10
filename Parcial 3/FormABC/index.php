<!DOCTYPE html>
<html lang="es">
    <?php
session_start();
if ( !isset($_SESSION['nombre']) || empty($_SESSION['nombre']) ) {
    header("Location: ./login.html");
}
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Descripción">
    <meta name="author" content="Contenido">
    <title>Sistema Pasteleria</title>
 
    <link rel="stylesheet" href="./resources/bootstrap/css/bootstrap.min.css">
    <script src="./resources/jquery/jquery-1.11.3.min.js"></script>
    <script src="./resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="./resources/jqueryui/jquery-ui.min.js"></script>
    <link rel='stylesheet' href='./css/ModalHeaderColor.css'/>

    <link rel="stylesheet" href="./css/formulario.css">
    <link rel="stylesheet" href="./resources/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/main.css">
    <script src="./js/index.js"></script>
    <script src="./js/abc.js"></script>
</head>

<body>
    <div id="contenedorPrin" class="toggled">

        <div class="modal fade" id="modalSalida" role="dialog">
        <div class="modal-dialog modal-xs">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal">X</button>
                <h2 class="modal-title text-center">Cerrar sesión</h2>
            </div>
            <div class="modal-body text-center">
                <h3>¿Desea salir del sistema de la pasteleria?</h3>
            </div>
            <div class="modal-footer">
               <a href="./php/logout.php" class="btn btn-default">Si</a>
               <a href="#" data-dismiss="modal" class="btn btn-default">No</a>
            </div>
        </div>
        </div>
        </div>

     <!-- Modal de Confirmación -->
     <div class="modal fade" id="modalSalida" role="dialog">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header modal-header-primary">
                          <button type="button" class="close" data-dismiss="modal">X</button>
                          <h2 class="modal-title text-center">Confirmación</h2>
                      </div>
                      <div class="modal-body text-center">
                          <h3>Desea Borrar el registro?</h3>
            </div>
      </div>
           </div>
           </div>



          <!-- Modal de Dialogo -->
      <div class="modal fade" id="modalMensaje" role="dialog">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">X</button>
              <h2 class="modal-title text-center">Acceso</h2>
          </div>

          <div class="modal-body text-center">
              <h3>Message</h3>
          </div>

          <div class="modal-footer">
              <button id="botonCerrar" type="button" class="btn btn-default" data-dismiss="modal" autofocus>Cerrar</button>
          </div>
      </div>
      </div>
      </div>
                <div class="row encabezado">
                     <div class="col-xs-6 col-sm-2 enca2">
                         <button type="button" class="btn btn-info btn-lg" id="botonUsuario"><?php echo $_SESSION['nombre'];?><i class="fa fa-user"></i></button>
                         <button type="button" class="btn btn-dark btn-lg" id="botonSalir">Salir<i class="fa fa-sign-out"></i></button>
                     </div>
                </div>
<!--FORMULARIO-->
<form class="form">

<div align= center>
        <br> <a href="https://www.fontspace.com/category/cursive"><img src="https://see.fontimg.com/api/renderfont4/rg3Wp/eyJyIjoiZnMiLCJoIjo5NSwidyI6MTAwMCwiZnMiOjk1LCJmZ2MiOiIjMUQxQjFCIiwiYmdjIjoiI0ZGRkFGQSIsInQiOjF9/RmljaGEgZGUgY290aXphY2nDs24/denalova.png" alt="Cursive fonts"></a>
        <br> <a href="https://www.fontspace.com/category/basic"><img src="https://see.fontimg.com/api/renderfont4/onJB/eyJyIjoiZnMiLCJoIjoxOSwidyI6MTAwMCwiZnMiOjE5LCJmZ2MiOiIjMUQxQjFCIiwiYmdjIjoiI0ZGRkFGQSIsInQiOjF9/UEFTVEVMRVJJQQ/isle-body-personal-use-medium.png" alt="Basic fonts"></a>
        <br>
       </div>
        </div>
            <fieldset>
                <legend>Datos Personales</legend>
                <div class="row">
                    
                    <div class="form-group col-xs-4">
                    <label for="id_pedido" class="control-label">ID</label>
                     <input id="id_pedido" type="text" class="form-control" placeholder="00"disabled/>
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="nombrecliente">Nombre</label>
                        <input id="nombrecliente" type="text" class="form-control" placeholder="Nombre">
                    </div>
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                      <label for="apellidoscliente">Apellidos</label>
                      <input id="apellidoscliente" type="text" class="form-control" placeholder="Apellidos">
                      <br>
                    </div>
                    <div class="form-group col-sm-12 col-md-8 col-lg-4">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" type="text" class="form-control" placeholder="(Lada)-Teléfono">
                        <br>
                      </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>Datos de entrega</legend>
                <br>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-8 col-lg-12">
                        <label for="direccion">Dirección</label>
                        <input id="direccion" type="text" class="form-control" placeholder="Calle Número Colonia y Código Postal"/>
                  </div>
                </div>

                <div class="row">
                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="fechaentrega"> Fecha de entrega</label>
                        <input id="fechaentrega" type="date" name="Fecha" min="12-10-2021" class="form-control">
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-6">
                        <label for="horaentrega">Hora</label>
                        <input id="horaentrega" type="time" name="Hora" max="20:00" min="8:00" step="3600" class="form-control" placeholder="9:00 am">

                    </div>
                </div>
                <br>
            </fieldset>

            <fieldset>
                <legend>Datos del Pastel</legend>
                <div class="row">
                    <div class="form-group col-sm-12 col-md-8 col-lg-3">
                        <label for="saborpastel">Sabor</label>
                        <select class="form-select" id="saborpastel">
                          <option selected>   </option>
                          <option value="1">Vainilla</option>
                          <option value="2">Fresa</option>
                          <option value="3">Chocolate</option>
                          <option value="4">Red Velvet</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-md-8 col-lg-3">
                        <label for="rellenopastel">Relleno</label>
                        <select class="form-select" id="rellenopastel">
                            <option selected>   </option>
                            <option value="1">Mermelada de fresa</option>
                            <option value="2">Betun de mantequilla</option>
                            <option value="3">Mermelada de piña</option>
                            <option value="4">Cajeta</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-md-8 col-lg-3">
                        <label for="coberturapastel">Cobertura</label>
                        <select class="form-select" id="coberturapastel">
                          <option selected>   </option>
                          <option value="1">Mantequilla</option>
                          <option value="2">Queso crema</option>
                          <option value="3">Chocolate</option>
                        </select>
                    </div>

                    <div class="form-group col-sm-12 col-md-8 col-lg-3">
                        <label for="porcionespastel">Porciones</label>
                        <input id="porcionespastel" type="text" class="form-control" placeholder="5-10">
                        <br>
                    </div>
                </div>            
                      <br>
                      <br>
                      <br> 
        <!--Botones-->
                      <div align= center class="row">
                            <div class="form-group col-xl-8">
                            <button id="b_limpia"    type="button" class="btn btn-info">Limpiar</button>
                            <button id="b_nuevo" type="button" class="btn btn-primary">Nuevo pedido</button>
                            <button id="b_grabar"     type="button" class="btn btn-succes">Agregar pedido</button>
                            <button id="b_eliminar"   type="button" class="btn btn-danger">Eliminar pedido</button>
                            <button id="b_modificar"  type="button" class="btn btn-primary">Modificar pedido</button>
                            <button id="b_consulta" type="button" class="btn btn-primary">Consultar pedido</button>

                     </div>                   
                      <br>
                      <br>
            </fieldset>    
</form>
                </div>
            </div>
        </div>

    </div>
</body>
</html>