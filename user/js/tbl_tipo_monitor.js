$(document).ready(function (e) {
    $("#tbl_tbl_tipo_monitor").tablesorter();
    $('#filtrartbl_tipo_monitor').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_tipo_monitorCrear").click(function (e) {
        $("#vtn_tbl_tipo_monitorCrear").modal();
    });
    $("#vtn_tbl_tipo_monitorCrear").on("submit", "#f_tbl_tipo_monitorCrear", function (e) {
        e.preventDefault();
        d_nombre_tipo_monitor = $("#f_tbl_tipo_monitorCrear #nombre_tipo_monitor").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_monitorCrear.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_monitorCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_monitorCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_tipo_monitor: d_nombre_tipo_monitor,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_monitor.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_monitorCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_tipo_monitorCargar").click(function (e) {
        $("#d_mensajeModaltbl_tipo_monitor").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_tipo_monitorActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_tipo_monitorActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_tipo_monitorActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_monitorActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_tipo_monitorActualizar").on("submit", "#f_tbl_tipo_monitorActualizar", function (e) {
        e.preventDefault();
        d_id_tipo_monitor = $("#f_tbl_tipo_monitorActualizar #id_tipo_monitorAct").val();
        d_nombre_tipo_monitor = $("#f_tbl_tipo_monitorActualizar #nombre_tipo_monitorAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_monitorActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_monitorActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_monitorActualizar").show();
            },
            dataType: 'json',
            data: {
                id_tipo_monitor: d_id_tipo_monitor,
                nombre_tipo_monitor: d_nombre_tipo_monitor,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_monitor.php?men=2";
                   
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_monitor");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_monitorEliminar").on("click", "#btn_tbl_tipo_monitorEliminar", function(e){
        d_codigo = $("#id_tipo_monitorAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_tipo_monitorEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_tipo_monitorActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_monitorEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_tipo_monitorActualizar").css('overflow', 'auto');
    });
});
