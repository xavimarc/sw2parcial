function confirmuser() {
    var datosform = $('#loginform').serialize(); //alert(datosform);
    $.ajax({
        url: 'controller/usuarioController.php',
        type: 'POST',
        data: datosform + '&funcion=ingresar'
    }).done(function(resp) {
        if (resp == 'fallo') { //alert(resp);
            $('#wronglog').show().fadeToggle(5000);
        } else {
            location.href = 'view/include/main.php';
        }
    });
}

function registeruser() {
    var datosform = $('#regform').serialize(); //alert(datosform);
    var name=$('#name').val(); //alert(name);
    $.ajax({
        url: 'controller/usuarioController.php',
        type: 'POST',
        data: datosform + '&funcion=registrar'
    }).done(function(resp) { //alert(resp);
        if (resp == 'exito') {
            newfolder(name);
            $('#admexit').show().fadeToggle(5000);
        } else {
            alert(resp);
        }
    });
    clearform('regform');
}

function clearform(form) {
    $("#"+form+" :input").each(function() {
        $(this).val('');
    });
}

function cerrar() {
    $.ajax({
        url: '../../controller/usuarioController.php',
        type: 'POST',
        data: 'funcion=cerrar'
    }).done(function(resp) {
        //alert(resp);
        $('#salida').show().fadeToggle(10000);
        location.href = '../../';
    });
}

function updateuser() {
    var datosform = $('#updform').serialize(); //alert(datosform);
    $.ajax({
        url: '../../controller/usuarioController.php',
        type: 'POST',
        data: datosform + '&funcion=actualizar'
    }).done(function(resp) { //alert(resp);
        if (resp == 'exito') {
            $('#updadmexit').show().fadeToggle(8000);
            location.href='main.php';
        } else {
            alert(resp);
        }
    });
    clearform('updform');
}

