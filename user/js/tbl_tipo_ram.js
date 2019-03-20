$(document).ready(function (e) {
    $("#tbl_tbl_tipo_ram").tablesorter();
    $('#filtrartbl_tipo_ram').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_tipo_ramCrear").click(function (e) {
        $("#vtn_tbl_tipo_ramCrear").modal();
    });
    $("#vtn_tbl_tipo_ramCrear").on("submit", "#f_tbl_tipo_ramCrear", function (e) {
        e.preventDefault();
        d_nombre_tipo_ram = $("#f_tbl_tipo_ramCrear #nombre_tipo_ram").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_ramCrear.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_ramCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_ramCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_tipo_ram: d_nombre_tipo_ram,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_ram.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_ramCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_tipo_ramCargar").click(function (e) {
        $("#d_mensajeModaltbl_tipo_ram").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_tipo_ramActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_tipo_ramActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_tipo_ramActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_ramActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_tipo_ramActualizar").on("submit", "#f_tbl_tipo_ramActualizar", function (e) {
        e.preventDefault();
        d_id_tipo_ram = $("#f_tbl_tipo_ramActualizar #id_tipo_ramAct").val();
        d_nombre_tipo_ram = $("#f_tbl_tipo_ramActualizar #nombre_tipo_ramAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_tipo_ramActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_tipo_ramActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_tipo_ramActualizar").show();
            },
            dataType: 'json',
            data: {
                id_tipo_ram: d_id_tipo_ram,
                nombre_tipo_ram: d_nombre_tipo_ram,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_tipo_ram.php?men=2";
                   /* mensaje('1', 'Actualizado correctamente', "#d_mensajeModaltbl_tipo_ram");
                    actualizar_datos(d_codigo, "id_", d_id_tipo_ram);
                    actualizar_datos(d_codigo, "nom", d_nombre_tipo_ram);*/
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_tipo_ram");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_ramEliminar").on("click", "#btn_tbl_tipo_ramEliminar", function(e){
        d_codigo = $("#id_tipo_ramAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_tipo_ramEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_tipo_ramActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_tipo_ramEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_tipo_ramActualizar").css('overflow', 'auto');
    });
});
