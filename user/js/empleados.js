$(document).ready(function (e) {
    $("#tbl_empleados").tablesorter();

    $('#filtrarempleados').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_empleadosCrear").click(function (e) {
        $("#vtn_empleadosCrear").modal();
    });
    $("#vtn_empleadosCrear").on("submit", "#f_empleadosCrear", function (e) {
        e.preventDefault();
        d_cedula = $("#f_empleadosCrear #cedula").val();
        d_nombre_completo = $("#f_empleadosCrear #nombre_completo").val();
        d_correo = $("#f_empleadosCrear #correo").val();
        d_celular = $("#f_empleadosCrear #celular").val();
        d_direccion = $("#f_empleadosCrear #direccion").val();
        d_usuario = $("#f_empleadosCrear #usuario").val();
        d_clave = $("#f_empleadosCrear #clave").val();
        d_perfil = $("#f_empleadosCrear #perfil").val();
        //d_foto = $("#f_empleadosCrear #foto").val();
        $.ajax({
            type: "POST",
            url: "op_empleadosCrear.php",
            beforeSend: function () {
                $("#btn_empleadosCrear").hide();
            },
            complete: function () {
                $("#btn_empleadosCrear").show();
            },
            dataType: 'json',
            data: {
                cedula: d_cedula,
                nombre_completo: d_nombre_completo,
                correo: d_correo,
                celular: d_celular,
                direccion: d_direccion,
                usuario: d_usuario,
                clave: d_clave,
                perfil: d_perfil,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_empleados.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModalempleadosCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_empleadosCargar").click(function (e) {
        $("#d_mensajeModalempleados").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_empleadosActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_empleadosActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_empleadosActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_empleadosActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_empleadosActualizar").on("submit", "#f_empleadosActualizar", function (e) {
        e.preventDefault();
        d_id_empleado = $("#f_empleadosActualizar #id_empleadoAct").val();
        d_cedula = $("#f_empleadosActualizar #cedulaAct").val();
        d_nombre_completo = $("#f_empleadosActualizar #nombre_completoAct").val();
        d_correo = $("#f_empleadosActualizar #correoAct").val();
        d_celular = $("#f_empleadosActualizar #celularAct").val();
        d_direccion = $("#f_empleadosActualizar #direccionAct").val();
        d_perfil= $("#f_empleadosActualizar #perfilAct").val();
        //d_usuario = $("#f_empleadosActualizar #usuarioAct").val();
        //d_clave = $("#f_empleadosActualizar #claveAct").val();
        //d_foto = $("#f_empleadosActualizar #fotoAct").val();
        $.ajax({
            type: "POST",
            url: "op_empleadosActualizar.php",
            beforeSend: function () {
                $("#btn_empleadosActualizar").hide();
            },
            complete: function () {
                $("#btn_empleadosActualizar").show();
            },
            dataType: 'json',
            data: {
                id_empleado: d_id_empleado,
                cedula: d_cedula,
                nombre_completo: d_nombre_completo,
                correo: d_correo,
                celular: d_celular,
                direccion: d_direccion,
                perfil: d_perfil,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_empleados.php?men=2";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModalempleados");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_empleadosEliminar").on("click", "#btn_empleadosEliminar", function(e){
        d_codigo = $("#id_empleadoAct").val();
        $.ajax({
            method:"POST",
            url: "op_empleadosEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_empleadosActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_empleadosEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_empleadosActualizar").css('overflow', 'auto');
    });

    //Compara si las claves coinciden al "cambiar mi clave"
    $("#clave2, #clave").keyup(function (e) {
        $("#d_mensajeCambioClave").html('');

        d_clave = $("#clave").val();
        d_clave2 = $("#clave2").val();

        if (d_clave == d_clave2) {

            $("#m_clave2").html('<span class="label label-success">Las claves coinciden</span>')
        } else {

            $("#m_clave2").html('<span class="label label-danger">Las claves no coinciden</span>')
        }
    });

    $("#clave_actual").keyup(function (e) {
        $("#d_mensajeCambioClave").html('');
    });

    //actualiza la clave 
    $("#d_contenedor").on("submit", "#f_empleados_cambiarClave", function (e) {

        e.preventDefault();

        d_clave_actual = $("#f_empleados_cambiarClave #clave_actual").val();
        d_clave_nueva = $("#f_empleados_cambiarClave #clave").val();
        d_clave2 = $("#f_empleados_cambiarClave #clave2").val();

        if (d_clave_nueva == d_clave2) {
            $.ajax({
                type: "POST",
                url: "op_empleadosCambiarClave.php",
                beforeSend: function () {
                    $("#btn_f_empleados_cambiarClave").addClass("disabled");
                },
                complete: function () {
                    $("#btn_f_empleados_cambiarClave").removeClass("disabled");
                },
                data: {
                    clave_actual: d_clave_actual,
                    clave_nueva: d_clave_nueva
                },
                dataType: 'json',
                success: function (rs) {
                    if (rs.mensaje == "OK") {
                        $("#d_mensajeCambioClave").html('<span class="label label-success">Clave Actualizada</span>');
                        $("#clave").val('');
                        $("#clave_actual").val('');
                        $("#clave2").val('');
                    } else {
                        $("#d_mensajeCambioClave").html('Error');
                    }
                },
                error: function (er1, er2, er3) {
                    console.log(er1);
                    console.log(er2);
                    console.log(er3);
                }
            });
        }
    });

    //actualiza los datos del administrador que este logueado
    $("body").on("submit", "#f_empleadosPerfilActualizar", function (e) {

        e.preventDefault();

        d_cedula = $("#f_empleadosPerfilActualizar #cedulaPerAct").val();
        d_nombreCompleto = $("#f_empleadosPerfilActualizar #nombreCompletoPerAct").val();
        d_correo = $("#f_empleadosPerfilActualizar #correoPerAct").val();
        d_celular = $("#f_empleadosPerfilActualizar #celularPerAct").val();
        d_direccion = $("#f_empleadosPerfilActualizar #direccionPerAct").val();

        $.ajax({
            type: "POST",
            url: "op_empleadosPerfilActualizar.php",

            beforeSend: function () {
                $("#btn_f_empleadosPerfilActualizar").addClass("disabled");
            },
            complete: function () {
                $("#btn_f_empleadosPerfilActualizar").removeClass("disabled");
            },

            data: {
                cedula: d_cedula,
                nombreCompleto: d_nombreCompleto,
                correo: d_correo,
                celular: d_celular,
                direccion: d_direccion,
            },
            dataType: 'json',
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    $("#actualizado").html('<span class="label label-success">Registro Actualizado</span>');
                } else {
                    $("#actualizado").html('Error');
                }

            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }

        });

    });
    
});