$(document).ready(function (e) {
    $("#tbl_tbl_tipo_pc_distribucion").tablesorter();
    $('#filtrartbl_tipo_pc_distribucion').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_tipo_pc_distribucionCrear").click(function (e) {
        $("#vtn_tbl_tipo_pc_distribucionCrear").modal();
    });
    $("#vtn_tbl_tipo_pc_distribucionCrear").on("submit", "#f_tbl_tipo_pc_distribucionCrear", function (e) {
        e.preventDefault();
        d_nombre_tipo_distribucion = $("#f_tbl_tipo_pc_distribucionCrear #nombre_tipo_distribucion").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_pc_distribucionCrear.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_pc_distribucionCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_pc_distribucionCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_tipo_distribucion: d_nombre_tipo_distribucion,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_pc_distribucion.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_pc_distribucionCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_tipo_pc_distribucionCargar").click(function (e) {
        $("#d_mensajeModaltbl_tipo_pc_distribucion").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_tipo_pc_distribucionActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_tipo_pc_distribucionActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_tipo_pc_distribucionActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_pc_distribucionActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_tipo_pc_distribucionActualizar").on("submit", "#f_tbl_tipo_pc_distribucionActualizar", function (e) {
        e.preventDefault();
        d_id_tipo_pc_distribucion = $("#f_tbl_tipo_pc_distribucionActualizar #id_tipo_pc_distribucionAct").val();
        d_nombre_tipo_distribucion = $("#f_tbl_tipo_pc_distribucionActualizar #nombre_tipo_distribucionAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_pc_distribucionActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_pc_distribucionActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_pc_distribucionActualizar").show();
            },
            dataType: 'json',
            data: {
                id_tipo_pc_distribucion: d_id_tipo_pc_distribucion,
                nombre_tipo_distribucion: d_nombre_tipo_distribucion,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_pc_distribucion.php?men=2";
                
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_pc_distribucion");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_pc_distribucionEliminar").on("click", "#btn_tbl_tipo_pc_distribucionEliminar", function(e){
        d_codigo = $("#id_tipo_pc_distribucionAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_tipo_pc_distribucionEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_tipo_pc_distribucionActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_pc_distribucionEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_tipo_pc_distribucionActualizar").css('overflow', 'auto');
    });
});
