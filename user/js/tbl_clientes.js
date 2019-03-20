$(document).ready(function (e) {
    $("#tbl_tbl_clientes").tablesorter();
    $('#filtrartbl_clientes').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_clientesCrear").click(function (e) { 
        $("#vtn_tbl_clientesCrear").modal();
    });
    $("#vtn_tbl_clientesCrear").on("submit", "#f_tbl_clientesCrear", function (e) {
        e.preventDefault();
        d_nombre_completo = $("#f_tbl_clientesCrear #nombre_completo").val();
        d_celular = $("#f_tbl_clientesCrear #celular").val();
        d_correo = $("#f_tbl_clientesCrear #correo").val();
        d_nombre_usuario = $("#f_tbl_clientesCrear #nombre_usuario").val();
        d_clave = $("#f_tbl_clientesCrear #clave").val();
        d_tbl_perfil_id_perfil = $("#f_tbl_clientesCrear #tbl_perfil_id_perfil").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_clientesCrear.php",
            beforeSend: function () {
                $("#btn_tbl_clientesCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_clientesCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_completo: d_nombre_completo,
                celular: d_celular,
                correo: d_correo,
                nombre_usuario: d_nombre_usuario,
                clave: d_clave,
                tbl_perfil_id_perfil: d_tbl_perfil_id_perfil,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_clientes.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_clientesCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_clientesCargar").click(function (e) {
        $("#d_mensajeModaltbl_clientes").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_clientesActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_clientesActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_clientesActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_clientesActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_clientesActualizar").on("submit", "#f_tbl_clientesActualizar", function (e) {
        e.preventDefault();
        d_id_cliente = $("#f_tbl_clientesActualizar #id_clienteAct").val();
        d_nombre_completo = $("#f_tbl_clientesActualizar #nombre_completoAct").val();
        d_celular = $("#f_tbl_clientesActualizar #celularAct").val();
        d_correo = $("#f_tbl_clientesActualizar #correoAct").val();
        d_nombre_usuario = $("#f_tbl_clientesActualizar #nombre_usuarioAct").val();
        d_clave = $("#f_tbl_clientesActualizar #claveAct").val();
        d_tbl_perfil_id_perfil = $("#f_tbl_clientesActualizar #tbl_perfil_id_perfilAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_clientesActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_clientesActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_clientesActualizar").show();
            },
            dataType: 'json',
            data: {
                id_cliente: d_id_cliente,
                nombre_completo: d_nombre_completo,
                celular: d_celular,
                correo: d_correo,
                nombre_usuario: d_nombre_usuario,
                clave: d_clave,
                tbl_perfil_id_perfil: d_tbl_perfil_id_perfil,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_clientes.php?men=2";
                    /*mensaje('1', 'Actualizado correctamente', "#d_mensajeModaltbl_clientes");
                    actualizar_datos(d_codigo, "id_", d_id_cliente);
                    actualizar_datos(d_codigo, "nom", d_nombre_completo);
                    actualizar_datos(d_codigo, "cel", d_celular);
                    actualizar_datos(d_codigo, "cor", d_correo);
                    actualizar_datos(d_codigo, "nom", d_nombre_usuario);
                    actualizar_datos(d_codigo, "cla", d_clave);
                    actualizar_datos(d_codigo, "tbl", d_tbl_perfil_id_perfil);*/
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_clientes");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_clientesEliminar").on("click", "#btn_tbl_clientesEliminar", function(e){
        d_codigo = $("#id_clienteAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_clientesEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_clientesActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_clientesEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_clientesActualizar").css('overflow', 'auto');
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
    $("#d_contenedor").on("submit", "#f_clientes_cambiarClave", function (e) {

        e.preventDefault();

        d_clave_actual = $("#f_clientes_cambiarClave #clave_actual").val();
        d_clave_nueva = $("#f_clientes_cambiarClave #clave").val();
        d_clave2 = $("#f_clientes_cambiarClave #clave2").val();

        if (d_clave_nueva == d_clave2) {
            $.ajax({
                type: "POST",
                url: "op_clientesCambiarClave.php",
                beforeSend: function () {
                    $("#btn_f_clientes_cambiarClave").addClass("disabled");
                },
                complete: function () {
                    $("#btn_f_clientes_cambiarClave").removeClass("disabled");
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
    $("body").on("submit", "#f_clientesPerfilActualizar", function (e) {

        e.preventDefault();

        d_id_cliente = $("#f_clientesPerfilActualizar #codigo").val();
        d_nombreCompleto = $("#f_clientesPerfilActualizar #nombreCompletoPerAct").val();
        d_correo = $("#f_clientesPerfilActualizar #correoPerAct").val();
        d_celular = $("#f_clientesPerfilActualizar #celularPerAct").val();

        $.ajax({
            type: "POST",
            url: "op_clientesPerfilActualizar.php",

            beforeSend: function () {
                $("#btn_f_clientesPerfilActualizar").addClass("disabled");
            },
            complete: function () {
                $("#btn_f_clientesPerfilActualizar").removeClass("disabled");
            },

            data: {
                id_cliente: d_id_cliente,
                nombreCompleto: d_nombreCompleto,
                correo: d_correo,
                celular: d_celular,
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