$(document).ready( function() {

    $("#botonCelcius").click(presionBoton);
    
    
    function presionBoton() {
        var tempFarh = $("#temp").val();
    
        $.get("conversor.php", {temp: tempFarh}, llegadaDatos);
        //return false;
    }
    
    function llegadaDatos(datos) {
        $('#resultado').html('<h3>La temperatura en Celsius es '+datos+' °C</h3>');
    }
    });