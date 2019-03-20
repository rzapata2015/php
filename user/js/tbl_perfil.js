$(document).ready(function (e) {
    $("#tbl_tbl_perfil").tablesorter();
    $('#filtrartbl_perfil').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_perfilCrear").click(function (e) {
        $("#vtn_tbl_perfilCrear").modal();
    });
    $("#vtn_tbl_perfilCrear").on("submit", "#f_tbl_perfilCrear", function (e) {
        e.preventDefault();
        d_nombre_perfil = $("#f_tbl_perfilCrear #nombre_perfil").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_perfilCrear.php",
            beforeSend: function () {
                $("#btn_tbl_perfilCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_perfilCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_perfil: d_nombre_perfil,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_perfil.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_perfilCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_perfilCargar").click(function (e) {
        $("#d_mensajeModaltbl_perfil").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_perfilActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_perfilActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_perfilActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_perfilActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_perfilActualizar").on("submit", "#f_tbl_perfilActualizar", function (e) {
        e.preventDefault();
        d_id_perfil = $("#f_tbl_perfilActualizar #id_perfilAct").val();
        d_nombre_perfil = $("#f_tbl_perfilActualizar #nombre_perfilAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_perfilActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_perfilActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_perfilActualizar").show();
            },
            dataType: 'json',
            data: {
                id_perfil: d_id_perfil,
                nombre_perfil: d_nombre_perfil,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_perfil.php?men=2";
                
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_perfil");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_perfilEliminar").on("click", "#btn_tbl_perfilEliminar", function(e){
        d_codigo = $("#id_perfilAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_perfilEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_perfilActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_perfilEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_perfilActualizar").css('overflow', 'auto');
    });
});
