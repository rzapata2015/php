$(document).ready(function (e) {
    $("#tbl_tbl_tipo_pc").tablesorter();
    $('#filtrartbl_tipo_pc').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_tipo_pcCrear").click(function (e) {
        $("#vtn_tbl_tipo_pcCrear").modal();
    });
    $("#vtn_tbl_tipo_pcCrear").on("submit", "#f_tbl_tipo_pcCrear", function (e) {
        e.preventDefault();
        d_nombre_tipo_pc = $("#f_tbl_tipo_pcCrear #nombre_tipo_pc").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_pcCrear.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_pcCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_pcCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_tipo_pc: d_nombre_tipo_pc,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_pc.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_pcCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_tipo_pcCargar").click(function (e) {
        $("#d_mensajeModaltbl_tipo_pc").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_tipo_pcActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_tipo_pcActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_tipo_pcActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_pcActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_tipo_pcActualizar").on("submit", "#f_tbl_tipo_pcActualizar", function (e) {
        e.preventDefault();
        d_id_tipo_pc = $("#f_tbl_tipo_pcActualizar #id_tipo_pcAct").val();
        d_nombre_tipo_pc = $("#f_tbl_tipo_pcActualizar #nombre_tipo_pcAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_pcActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_pcActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_pcActualizar").show();
            },
            dataType: 'json',
            data: {
                id_tipo_pc: d_id_tipo_pc,
                nombre_tipo_pc: d_nombre_tipo_pc,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_pc.php?men=2";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_pc");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_pcEliminar").on("click", "#btn_tbl_tipo_pcEliminar", function(e){
        d_codigo = $("#id_tipo_pcAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_tipo_pcEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_tipo_pcActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_pcEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_tipo_pcActualizar").css('overflow', 'auto');
    });
});
