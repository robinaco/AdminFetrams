//Funcion para enviar a grabar un usuario
function regCustomer() {
    var url = "http://127.0.0.1/AdminFetrams/grabacl.php";
    var nombre = $("#name").val();
    var tipdocto = $("#tipodocto").val();
    var documento = $("#docto").val();
    var dir = $("#adress").val();
    var representante = $("#rtel").val();
    var ciudad = $("#city").val();
    var celular = $("#cel").val();
    var rcobro = $("#remision").val();
    var email = $("#email").val();
    var Data = {
        name: nombre,
        tdocto: tipdocto,
        docto: documento,
        direccion: dir,
        presidente: representante,
        municipio: ciudad,
        contacto: celular,
        remision: rcobro,
        email: email,
    };
    if (nombre == "") {

        alert({
            title: 'Mensaje del Sistema!',
            content: 'Algunos Campos no pueden estar vacios.',
        });
    } else {

        $.ajax({
                url: url,
                type: "POST",
                data: Data,
                datatype: "json",
            })
            .done(function(data) {
                $('#regCliente').trigger("reset");
                $("#msg").show(300).delay(3000).text("Registro Almacenado Correctamente.");
                setTimeout(function() {
                    $("#msg").hide(300);
                    relocationu();
                }, 3000);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {});
    }

}

function relocationu() {

    var link = ("http://127.0.0.1/AdminFetrams/index.php");
    window.location.href = link;
}

$(document).ready(function() {
    $("#search-focus").keyup(function() {
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#clientesFT tbody tr"), function() {
            if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });



    $("#search-focusv").keyup(function() {
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#vehiculosFT tbody tr"), function() {
            if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });



    $("#search-focusp").keyup(function() {
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#polizasFT tbody tr"), function() {
            if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                $(this).hide();
            else
                $(this).show();
        });
    });


});

function validarcreacion() {
    $("#regCliente").validate({
        errorClass: "error",
        rules: {
            name: {
                required: true
            },
            tipodocto: {
                required: true
            },
            docto: {
                required: true
            },

        },
        messages: {
            name: {
                required: "Seleccione una Sede"
            },
            tipodocto: {
                required: "Seleccione Fecha Inicial, no puede estar vacía"
            },
            docto: {
                required: "Seleccione Fecha Final, no puede estar vacía"
            },


        }
    });
}







//Funcion para agregar un vehiculo
function regVehicule() {
    var url = "http://127.0.0.1/AdminFetrams/grabavh.php";
    var cod = $("#cod").val();
    var placa = $("#placa").val();
    var marca = $("#marca").val();
    var modelo = $("#modelo").val();
    var kms = $("#kms").val();
    var chasis = $("#chasis").val();
    var motor = $("#motor").val();
    var docprop = $("#docprop").val();
    var nameprop = $("#nameprop").val();
    var celprop = $("#celprop").val();
    var Data = {
        cod: cod,
        placa: placa,
        marca: marca,
        modelo: modelo,
        kms: kms,
        chasis: chasis,
        motor: motor,
        docprop: docprop,
        nameprop: nameprop,
        celprop: celprop,
    };
    $.ajax({
            url: url,
            type: "POST",
            data: Data,
            datatype: "json",
        })
        .done(function(data) {
            $('#regVehiculo').trigger("reset");
            $("#msg").show(300).delay(3000).text("Registro Almacenado Correctamente.");
            setTimeout(function() {
                $("#msg").hide(300);
                relocation();
            }, 3000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {});

}


function relocation() {
    var link = ("http://127.0.0.1/AdminFetrams/vehiculos.php");
    window.location.href = link;
}




function regpoliza() {


    var url = "http://127.0.0.1/AdminFetrams/grabapo.php";
    var codvh = $("#codvh").val();
    var npoliz = $("#nropoliza").val();
    var nanexo = $("#nroanexo").val();
    var ncertificado = $("#nrocertificado").val();
    var nriesgo = $("#nroriesgo").val();
    var sucursal = $("#sucursal").val();
    var tpoliza = $("#tipoliza").val();
    var fexp = $("#fechaexp").val();
    var vigini = $("#vigini").val();
    var horaini = $("#horaini").val();
    var vigfin = $("#vigfin").val();
    var horafin = $("#horafin").val();
    var Data = {
        codvhiculo: codvh,
        nupoliza: npoliz,
        nuanexo: nanexo,
        nucertificado: ncertificado,
        nuriesgo: nriesgo,
        sucursal: sucursal,
        tipoliza: tpoliza,
        fechaexp: fexp,
        vigenciaini: vigini,
        hourini: horaini,
        vigenciafin: vigfin,
        hourfin: horafin,
    };
    $.ajax({
            url: url,
            type: "POST",
            data: Data,
            datatype: "json",
        })
        .done(function(data) {
            $('#regPoliza').trigger("reset");
            $("#msg").show(300).delay(3000).text("Registro Almacenado Correctamente.");
            setTimeout(function() {
                $("#msg").hide(300);
                relocationp();
            }, 3000);
        })
        .fail(function(jqXHR, textStatus, errorThrown) {});

}

function relocationp() {

    var link = ("http://127.0.0.1/AdminFetrams/polizas.php");
    window.location.href = link;
}