$(document).ready(function (e) {
    $("#tbl_tbl_tipo_fuente").tablesorter();
    $('#filtrartbl_tipo_fuente').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_tipo_fuenteCrear").click(function (e) {
        $("#vtn_tbl_tipo_fuenteCrear").modal();
    });
    $("#vtn_tbl_tipo_fuenteCrear").on("submit", "#f_tbl_tipo_fuenteCrear", function (e) {
        e.preventDefault();
        d_nombre_fuente_poder = $("#f_tbl_tipo_fuenteCrear #nombre_fuente_poder").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_fuenteCrear.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_fuenteCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_fuenteCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_fuente_poder: d_nombre_fuente_poder,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_fuente.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_fuenteCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_tipo_fuenteCargar").click(function (e) {
        $("#d_mensajeModaltbl_tipo_fuente").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_tipo_fuenteActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_tipo_fuenteActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_tipo_fuenteActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_fuenteActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_tipo_fuenteActualizar").on("submit", "#f_tbl_tipo_fuenteActualizar", function (e) {
        e.preventDefault();
        d_id_tipo_fuente = $("#f_tbl_tipo_fuenteActualizar #id_tipo_fuenteAct").val();
        d_nombre_fuente_poder = $("#f_tbl_tipo_fuenteActualizar #nombre_fuente_poderAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_fuenteActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_fuenteActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_fuenteActualizar").show();
            },
            dataType: 'json',
            data: {
                id_tipo_fuente: d_id_tipo_fuente,
                nombre_fuente_poder: d_nombre_fuente_poder,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_fuente.php?men=2";
                    /*mensaje('1', 'Actualizado correctamente', "#d_mensajeModaltbl_tipo_fuente");
                    actualizar_datos(d_codigo, "id_", d_id_tipo_fuente);
                    actualizar_datos(d_codigo, "nom", d_nombre_fuente_poder);*/
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_fuente");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_fuenteEliminar").on("click", "#btn_tbl_tipo_fuenteEliminar", function(e){
        d_codigo = $("#id_tipo_fuenteAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_tipo_fuenteEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_tipo_fuenteActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_fuenteEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_tipo_fuenteActualizar").css('overflow', 'auto');
    });
});
