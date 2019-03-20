$(document).ready(function (e) {
    $("#tbl_tbl_dependencias").tablesorter();
    $('#filtrartbl_dependencias').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_dependenciasCrear").click(function (e) {
        $("#vtn_tbl_dependenciasCrear").modal();
    });
    $("#vtn_tbl_dependenciasCrear").on("submit", "#f_tbl_dependenciasCrear", function (e) {
        e.preventDefault();
        d_nombre_dependencia = $("#f_tbl_dependenciasCrear #nombre_dependencia").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_dependenciasCrear.php",
            beforeSend: function () {
                $("#btn_tbl_dependenciasCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_dependenciasCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_dependencia: d_nombre_dependencia,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_dependencias.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_dependenciasCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_dependenciasCargar").click(function (e) {
        $("#d_mensajeModaltbl_dependencias").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_dependenciasActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_dependenciasActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_dependenciasActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_dependenciasActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_dependenciasActualizar").on("submit", "#f_tbl_dependenciasActualizar", function (e) {
        e.preventDefault();
        d_id_dependencia = $("#f_tbl_dependenciasActualizar #id_dependenciaAct").val();
        d_nombre_dependencia = $("#f_tbl_dependenciasActualizar #nombre_dependenciaAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_dependenciasActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_dependenciasActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_dependenciasActualizar").show();
            },
            dataType: 'json',
            data: {
                id_dependencia: d_id_dependencia,
                nombre_dependencia: d_nombre_dependencia,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_dependencias.php?men=2";
        
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_dependencias");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_dependenciasEliminar").on("click", "#btn_tbl_dependenciasEliminar", function(e){
        d_codigo = $("#id_dependenciaAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_dependenciasEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_dependenciasActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_dependenciasEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_dependenciasActualizar").css('overflow', 'auto');
    });
});
