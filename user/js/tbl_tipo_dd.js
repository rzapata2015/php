$(document).ready(function (e) {
    $("#tbl_tbl_tipo_dd").tablesorter();
    $('#filtrartbl_tipo_dd').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_tipo_ddCrear").click(function (e) {
        $("#vtn_tbl_tipo_ddCrear").modal();
    });
    $("#vtn_tbl_tipo_ddCrear").on("submit", "#f_tbl_tipo_ddCrear", function (e) {
        e.preventDefault();
        d_nombre_tipo_dd = $("#f_tbl_tipo_ddCrear #nombre_tipo_dd").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_ddCrear.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_ddCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_ddCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_tipo_dd: d_nombre_tipo_dd,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_dd.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_ddCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_tipo_ddCargar").click(function (e) {
        $("#d_mensajeModaltbl_tipo_dd").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_tipo_ddActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_tipo_ddActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_tipo_ddActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_ddActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_tipo_ddActualizar").on("submit", "#f_tbl_tipo_ddActualizar", function (e) {
        e.preventDefault();
        d_id_tipo_dd = $("#f_tbl_tipo_ddActualizar #id_tipo_ddAct").val();
        d_nombre_tipo_dd = $("#f_tbl_tipo_ddActualizar #nombre_tipo_ddAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_ddActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_ddActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_ddActualizar").show();
            },
            dataType: 'json',
            data: {
                id_tipo_dd: d_id_tipo_dd,
                nombre_tipo_dd: d_nombre_tipo_dd,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_dd.php?men=2";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_dd");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_ddEliminar").on("click", "#btn_tbl_tipo_ddEliminar", function(e){
        d_codigo = $("#id_tipo_ddAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_tipo_ddEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_tipo_ddActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_ddEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_tipo_ddActualizar").css('overflow', 'auto');
    });
});
