var tipoOperacion=0;

$('document').ready(function () {
    $("#b_grabar").click(function () {
        var vidu = $('#id_pedido').val();
        var vnom = $('#nombrecliente').val();
        var vapp = $('#apellidoscliente').val();
        var vtel = $('#telefono').val();
        var vdir = $('#direccion').val();
        var vfch = $('#fechaentrega').val();
        var vhre = $('#horaentrega').val();
        var vsab = $('#saborpastel').val();
        var vrel = $('#rellenopastel').val();
        var vcob = $('#coberturapastel').val();
        var vpor = $('#porcionespastel').val();


        $.post('php/pedidoAlta.php',{idu: vidu, nom: vnom, app: vapp, tel: vtel, dir: vdir, fch: vfch, hre: vhre, sab: vsab, rel: vrel, cob: vcob, por: vpor, tip: tipoOperacion},function (ret) {          
                if (ret['resultado'] != 0) {
                console.log('Error Insercion');

                $('#modalMensaje .modal-header').addClass('modal-header-danger');
                $('#modalMensaje .modal-header h2').text(ret['mensaje']);
                $('#modalMensaje .modal-body h3').text(ret['detalle']);
                $('#modalMensaje').modal();

                $("#modalMensaje").on('shown.bs.modal', function () {
                    $('#botonCerrar').focus();
                });
                $("#modalMensaje").on('hidden.bs.modal', function () {
                    $('#modalMensaje .modal-header').removeClass('modal-header-danger');
                });
                }
                else {
                $('#id_pedido').val(ret['detalle']);

                $('#modalMensaje .modal-header').addClass('modal-header-success');
                $('#modalMensaje .modal-header h2').text(ret['mensaje']);
                $('#modalMensaje .modal-body h3').text("Num de pedido : "+ret['detalle']);
                $('#modalMensaje').modal();

                $("#modalMensaje").on('shown.bs.modal', function () {
                    $('#botonCerrar').focus();
                });
                $("#modalMensaje").on('hidden.bs.modal', function () {
                    $('#myModal .modal-header').removeClass('modal-header-success');
                });

                $('#b_nuevo').prop("disabled", false);    //Se activa el boton NUEVO
                $('#b_grabar').prop("disabled", true);    //Se desactiva el boton GRABAR
                $('#b_eliminar').prop("disabled", false); //Se activa el boton ELIMINAR
                
            }
        },'json');

        $('.form-control').prop("disabled", true); //BLOQUEADO
        $('#b_nuevo').prop("disabled",true); //BLOQUEADO
        $('#b_grabar').prop("disabled",false);//ACTIVADO
        $('#b_eliminar').prop("disabled",true);//ACTIVADO
        $("#nombre").focus();//SE SELECCIONA
    });


    $("#b_eliminar").click( function() {
        var vidu = $('#id_pedido').val();
    
        if (confirm('Borrar')) {
            $.post('./php/pedidoBajas.php',
            {id_pedido: vidu},  
            function () {
              alert("Borrado");
            },'json');
    
            $('input').val('');
            $('.form-control').prop("disabled", true);
            $('#b_nuevo').prop("disabled", false);
            $('#b_grabar').prop("disabled", true);
            $('#b_eliminar').prop("disabled", true);
        } else {
            alert("No se borra");
        }
    });
    
    $("#b_limpia").click(function () {
        $('input').val('');
        $('select').val('');
        $('.form-control').prop("disabled", true);
        $('#b_nuevo').prop("disabled", false);
        $('#b_grabar').prop("disabled", true);
        
    });

    $("#b_modificar").click(function () {
        tipoOperacion=2;
        $('#b_grabar').prop("disabled", false);
        $('.form-control').prop("disabled", false);
        $('.form-select').prop("disabled", false);
        $('#id_pedido').prop("disabled", true);


    });
    
    $("#b_nuevo").click(function () {
        tipoOperacion=1;
        $('input').val('');
        $('#b_nuevo').prop("disabled", true);//DESHABILITADO
        $('#b_grabar').prop("disabled", false);//HABILITADO
        $('#b_eliminar').prop("disabled", true);//DESHABILITADO

        $('.form-control').prop("disabled", false);
        $('#id_pedido').prop("disabled", true);
        $("#nombrecliente").focus();


    });

    $("#b_consulta").click(function () {
        $('input').val('');
        var vidu = prompt("Numero del pedido:");

        $.post('./php/pedidoConsulta.php',
                {id_pedido: vidu},
                function (ret) {
                if (ret['resultado'] != 0) {

                console.log("Error");

                $('#modalMensaje .modal-header').addClass('modal-header-danger');
                $('#modalMensaje .modal-header h2').text(ret['mensaje']);
                $('#modalMensaje .modal-body h3').text(ret['detalle']);
                $('#modalMensaje').modal();

                $("#modalMensaje").on('shown.bs.modal', function () {
                    $('#botonCerrar').focus();
                });
                $("#modalMensaje").on('hidden.bs.modal', function () {
                    $('#modalMensaje .modal-header').removeClass('modal-header-danger');
                });
                }
                else {

                console.log(ret);
                console.log(ret.detalle);
                console.log(ret.detalle.nombrecliente);
                console.log(ret.detalle.apellidoscliente);


                $('#id_pedido').val(ret.detalle.id_pedido);
                $('#nombrecliente').val(ret.detalle.nombrecliente);
                $('#apellidoscliente').val(ret.detalle.apellidoscliente);
                $('#telefono').val(ret.detalle.telefono);
                $('#direccion').val(ret.detalle.direccion);
                $('#fechaentrega').val(ret.detalle.fechaentrega);
                $('#horaentrega').val(ret.detalle.horaentrega);
                $('#saborpastel').val(ret.detalle.saborpastel);
                $('#rellenopastel').val(ret.detalle.rellenopastel);
                $('#coberturapastel').val(ret.detalle.coberturapastel);
                $('#porcionespastel').val(ret.detalle.porcionespastel);


                $('#modalMensaje .modal-header').addClass('modal-header-success');
                $('#modalMensaje .modal-header h2').text(ret['mensaje']);
                $('#modalMensaje .modal-body h3').text("Nombre del cliente : "+ret.detalle.nombrecliente);
                $('#modalMensaje').modal();

                $("#modalMensaje").on('shown.bs.modal', function () {
                    $('#botonCerrar').focus();
                });
                $("#modalMensaje").on('hidden.bs.modal', function () {
                    $('#myModal .modal-header').removeClass('modal-header-success');
                });

                $('#b_nuevo').prop("disabled", false);    //ACTIVADO
               // $('#b_grabar').prop("disabled", true);    //DESACTIVADO
                $('#b_eliminar').prop("disabled", false); //ACTIVADO
                $('.form-control').prop("disabled", true);
                $('.form-select').prop("disabled", true);
            }
        },'json');

    });






});