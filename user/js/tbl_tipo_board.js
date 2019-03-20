$(document).ready(function (e) {
    $("#tbl_tbl_tipo_board").tablesorter();
    $('#filtrartbl_tipo_board').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_tipo_boardCrear").click(function (e) {
        $("#vtn_tbl_tipo_boardCrear").modal();
    });
    $("#vtn_tbl_tipo_boardCrear").on("submit", "#f_tbl_tipo_boardCrear", function (e) {
        e.preventDefault();
        d_nombre_tipo_board = $("#f_tbl_tipo_boardCrear #nombre_tipo_board").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_boardCrear.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_boardCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_boardCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_tipo_board: d_nombre_tipo_board,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_board.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_boardCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_tipo_boardCargar").click(function (e) {
        $("#d_mensajeModaltbl_tipo_board").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_tipo_boardActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_tipo_boardActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_tipo_boardActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_boardActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_tipo_boardActualizar").on("submit", "#f_tbl_tipo_boardActualizar", function (e) {
        e.preventDefault();
        d_id_tipo_board = $("#f_tbl_tipo_boardActualizar #id_tipo_boardAct").val();
        d_nombre_tipo_board = $("#f_tbl_tipo_boardActualizar #nombre_tipo_boardAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_boardActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_boardActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_boardActualizar").show();
            },
            dataType: 'json',
            data: {
                id_tipo_board: d_id_tipo_board,
                nombre_tipo_board: d_nombre_tipo_board,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_board.php?men=2";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_board");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_boardEliminar").on("click", "#btn_tbl_tipo_boardEliminar", function(e){
        d_codigo = $("#id_tipo_boardAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_tipo_boardEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_tipo_boardActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_boardEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_tipo_boardActualizar").css('overflow', 'auto');
    });
});
