$(document).ready(function (e) {
    $("#tbl_tbl_marcas").tablesorter();
    $('#filtrartbl_marcas').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_marcasCrear").click(function (e) {
        $("#vtn_tbl_marcasCrear").modal();
    });
    $("#vtn_tbl_marcasCrear").on("submit", "#f_tbl_marcasCrear", function (e) {
        e.preventDefault();
        d_nombre_marca = $("#f_tbl_marcasCrear #nombre_marca").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_marcasCrear.php",
            beforeSend: function () {
                $("#btn_tbl_marcasCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_marcasCrear").show();
            },
            dataType: 'json',
            data: {
                nombre_marca: d_nombre_marca,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_marcas.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_marcasCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_marcasCargar").click(function (e) {
        $("#d_mensajeModaltbl_marcas").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_marcasActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_marcasActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_marcasActualizar").html(data);
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_marcasActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_marcasActualizar").on("submit", "#f_tbl_marcasActualizar", function (e) {
        e.preventDefault();
        d_id_marca = $("#f_tbl_marcasActualizar #id_marcaAct").val();
        d_nombre_marca = $("#f_tbl_marcasActualizar #nombre_marcaAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_marcasActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_marcasActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_marcasActualizar").show();
            },
            dataType: 'json',
            data: {
                id_marca: d_id_marca,
                nombre_marca: d_nombre_marca,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_marcas.php?men=2";
                    
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_marcas");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_marcasEliminar").on("click", "#btn_tbl_marcasEliminar", function(e){
        d_codigo = $("#id_marcaAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_marcasEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_marcasActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_marcasEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_marcasActualizar").css('overflow', 'auto');
    });
});
