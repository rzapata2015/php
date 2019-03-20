$(document).ready(function (e) {
    $("#tbl_tbl_hoja_vida").tablesorter();
    cargarfecha('#fecha_compra');
    cargarfecha('#fecha_expiracion_garantia');
    cargarfecha('#fecha_registrado');
    $('#filtrartbl_hoja_vida').keyup(function () {
        var rex = new RegExp($(this).val(), 'i');
        $('.buscar tr').hide();
        $('.buscar tr').filter(function () {
            return rex.test($(this).text());
        }).show();
     });
    $("#e_tbl_hoja_vidaCrear").click(function (e) {
        $("#vtn_tbl_hoja_vidaCrear").modal();
    });
    $("#vtn_tbl_hoja_vidaCrear").on("submit", "#f_tbl_hoja_vidaCrear", function (e) {
        e.preventDefault();
        d_tbl_dependencias_id_dependencia = $("#f_tbl_hoja_vidaCrear #tbl_dependencias_id_dependencia").val();
        d_equipo_numero = $("#f_tbl_hoja_vidaCrear #equipo_numero").val();
        d_tbl_marcas_id_marca = $("#f_tbl_hoja_vidaCrear #tbl_marcas_id_marca").val();
        d_tbl_tipo_pc_id_tipo_pc = $("#f_tbl_hoja_vidaCrear #tbl_tipo_pc_id_tipo_pc").val();
        d_fecha_compra = $("#f_tbl_hoja_vidaCrear #fecha_compra").val();
        d_valor = $("#f_tbl_hoja_vidaCrear #valor").val();
        d_fecha_expiracion_garantia = $("#f_tbl_hoja_vidaCrear #fecha_expiracion_garantia").val();
        d_fecha_registrado = $("#f_tbl_hoja_vidaCrear #fecha_registrado").val();
        d_tbl_tipo_pc_distribucion_id_tipo_pc_distribucion = $("#f_tbl_hoja_vidaCrear #tbl_tipo_pc_distribucion_id_tipo_pc_distribucion").val();
        d_manija = $("#f_tbl_hoja_vidaCrear #manija").val();
        d_panel_frontal = $("#f_tbl_hoja_vidaCrear #panel_frontal").val();
        d_iluminacion = $("#f_tbl_hoja_vidaCrear #iluminacion").val();
        d_unidades_opticas = $("#f_tbl_hoja_vidaCrear #unidades_opticas").val();
        d_lector_multitarjetas = $("#f_tbl_hoja_vidaCrear #lector_multitarjetas").val();
        d_cantidad_puertos_usb = $("#f_tbl_hoja_vidaCrear #cantidad_puertos_usb").val();
        d_puertos_video = $("#f_tbl_hoja_vidaCrear #puertos_video").val();
        d_ethernet = $("#f_tbl_hoja_vidaCrear #ethernet").val();
        d_plug_audio = $("#f_tbl_hoja_vidaCrear #plug_audio").val();
        d_cantidad_ps2 = $("#f_tbl_hoja_vidaCrear #cantidad_ps2").val();
        d_otros_puertos = $("#f_tbl_hoja_vidaCrear #otros_puertos").val();
        d_tbl_tipo_board_id_tipo_board = $("#f_tbl_hoja_vidaCrear #tbl_tipo_board_id_tipo_board").val();
        d_tbl_tipo_fuente_id_tipo_fuente = $("#f_tbl_hoja_vidaCrear #tbl_tipo_fuente_id_tipo_fuente").val();
        d_marca_fuente = $("#f_tbl_hoja_vidaCrear #marca_fuente").val();
        d_modelo_fuente = $("#f_tbl_hoja_vidaCrear #modelo_fuente").val();
        d_voltaje_fuente = $("#f_tbl_hoja_vidaCrear #voltaje_fuente").val();
        d_watt_fuente = $("#f_tbl_hoja_vidaCrear #watt_fuente").val();
        d_tamano_monitor = $("#f_tbl_hoja_vidaCrear #tamano_monitor").val();
        d_marca_monitor = $("#f_tbl_hoja_vidaCrear #marca_monitor").val();
        d_tbl_tipo_monitor_id_tipo_monitor = $("#f_tbl_hoja_vidaCrear #tbl_tipo_monitor_id_tipo_monitor").val();
        d_marca_dd = $("#f_tbl_hoja_vidaCrear #marca_dd").val();
        d_capacidad_dd = $("#f_tbl_hoja_vidaCrear #capacidad_dd").val();
        d_serial_dd = $("#f_tbl_hoja_vidaCrear #serial_dd").val();
        d_tbl_tipo_dd_id_tipo_dd = $("#f_tbl_hoja_vidaCrear #tbl_tipo_dd_id_tipo_dd").val();
        d_marca_board = $("#f_tbl_hoja_vidaCrear #marca_board").val();
        d_serie_board = $("#f_tbl_hoja_vidaCrear #serie_board").val();
        d_capacidad_ram = $("#f_tbl_hoja_vidaCrear #capacidad_ram").val();
        d_tbl_tipo_ram_id_tipo_ram = $("#f_tbl_hoja_vidaCrear #tbl_tipo_ram_id_tipo_ram").val();
        d_velocidad_ram = $("#f_tbl_hoja_vidaCrear #velocidad_ram").val();
        d_ramas_expansion = $("#f_tbl_hoja_vidaCrear #ramas_expansion").val();
        d_tarjetas_expansion = $("#f_tbl_hoja_vidaCrear #tarjetas_expansion").val();
        d_foto = $("#f_tbl_hoja_vidaCrear #foto").val();
        d_software = $("#f_tbl_hoja_vidaCrear #software").val();
        d_observaciones = $("#f_tbl_hoja_vidaCrear #observaciones").val();
        d_tbl_clientes_id_cliente = $("#f_tbl_hoja_vidaCrear #tbl_clientes_id_cliente").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_hoja_vidaCrear.php",
            beforeSend: function () {
                $("#btn_tbl_hoja_vidaCrear").hide();
            },
            complete: function () {
                $("#btn_tbl_hoja_vidaCrear").show();
            },
            dataType: 'json',
            data: {
                tbl_dependencias_id_dependencia: d_tbl_dependencias_id_dependencia,
                equipo_numero: d_equipo_numero,
                tbl_marcas_id_marca: d_tbl_marcas_id_marca,
                tbl_tipo_pc_id_tipo_pc: d_tbl_tipo_pc_id_tipo_pc,
                fecha_compra: d_fecha_compra,
                valor: d_valor,
                fecha_expiracion_garantia: d_fecha_expiracion_garantia,
                fecha_registrado: d_fecha_registrado,
                tbl_tipo_pc_distribucion_id_tipo_pc_distribucion: d_tbl_tipo_pc_distribucion_id_tipo_pc_distribucion,
                manija: d_manija,
                panel_frontal: d_panel_frontal,
                iluminacion: d_iluminacion,
                unidades_opticas: d_unidades_opticas,
                lector_multitarjetas: d_lector_multitarjetas,
                cantidad_puertos_usb: d_cantidad_puertos_usb,
                puertos_video: d_puertos_video,
                ethernet: d_ethernet,
                plug_audio: d_plug_audio,
                cantidad_ps2: d_cantidad_ps2,
                otros_puertos: d_otros_puertos,
                tbl_tipo_board_id_tipo_board: d_tbl_tipo_board_id_tipo_board,
                tbl_tipo_fuente_id_tipo_fuente: d_tbl_tipo_fuente_id_tipo_fuente,
                marca_fuente: d_marca_fuente,
                modelo_fuente: d_modelo_fuente,
                voltaje_fuente: d_voltaje_fuente,
                watt_fuente: d_watt_fuente,
                tamano_monitor: d_tamano_monitor,
                marca_monitor: d_marca_monitor,
                tbl_tipo_monitor_id_tipo_monitor: d_tbl_tipo_monitor_id_tipo_monitor,
                marca_dd: d_marca_dd,
                capacidad_dd: d_capacidad_dd,
                serial_dd: d_serial_dd,
                tbl_tipo_dd_id_tipo_dd: d_tbl_tipo_dd_id_tipo_dd,
                marca_board: d_marca_board,
                serie_board: d_serie_board,
                capacidad_ram: d_capacidad_ram,
                tbl_tipo_ram_id_tipo_ram: d_tbl_tipo_ram_id_tipo_ram,
                velocidad_ram: d_velocidad_ram,
                ramas_expansion: d_ramas_expansion,
                tarjetas_expansion: d_tarjetas_expansion,
                foto: d_foto,
                software: d_software,
                observaciones: d_observaciones,
                tbl_clientes_id_cliente: d_tbl_clientes_id_cliente,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_hoja_vida.php?men=1";
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_hoja_vidaCrear");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $(".e_tbl_hoja_vidaCargar").click(function (e) {
        $("#d_mensajeModaltbl_hoja_vida").html("");
        d_codigo = $(this).attr("data-cod");
        $("#vtn_tbl_hoja_vidaActualizar").modal({backdrop: "static", keyboard: false});
        $.ajax({
            url: "f_tbl_hoja_vidaActualizar.php",
            type: "POST",
            beforeSend: function () {
                loader("#info_lista_gastoActualizar");
            },
            data: {
                codigo: d_codigo
            },
            success: function (data) {
                $("#info_tbl_hoja_vidaActualizar").html(data);
                cargarfecha('#fecha_compraAct');
                cargarfecha('#fecha_expiracion_garantiaAct');
                cargarfecha('#fecha_registradoAct');
                mostrarArchivos(d_codigo);

                //cargamos el input de archivo
                $("#archivo1tmp").fileinput({
                    uploadUrl: "op_tbl_subirFotoPc.php",
                    language: "es",
                    uploadExtraData: {codigo: d_codigo },
                    showPreview: false
                });

                $('#archivo1tmp').on('fileuploaded', function(event, data, previewId, index) {
                    if(data.response['estado'] == "OK"){
                        $('#archivo1tmp').fileinput('refresh').fileinput('enable');
                        mostrarArchivos(d_codigo);
                    }
                });


            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_hoja_vidaActualizar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'auto');
    });
    $("#vtn_tbl_hoja_vidaActualizar").on("submit", "#f_tbl_hoja_vidaActualizar", function (e) {
        e.preventDefault();
        d_id_hoja_vida = $("#f_tbl_hoja_vidaActualizar #id_hoja_vidaAct").val();
        d_tbl_dependencias_id_dependencia = $("#f_tbl_hoja_vidaActualizar #tbl_dependencias_id_dependenciaAct").val();
        d_equipo_numero = $("#f_tbl_hoja_vidaActualizar #equipo_numeroAct").val();
        d_tbl_marcas_id_marca = $("#f_tbl_hoja_vidaActualizar #tbl_marcas_id_marcaAct").val();
        d_tbl_tipo_pc_id_tipo_pc = $("#f_tbl_hoja_vidaActualizar #tbl_tipo_pc_id_tipo_pcAct").val();
        d_fecha_compra = $("#f_tbl_hoja_vidaActualizar #fecha_compraAct").val();
        d_valor = $("#f_tbl_hoja_vidaActualizar #valorAct").val();
        d_fecha_expiracion_garantia = $("#f_tbl_hoja_vidaActualizar #fecha_expiracion_garantiaAct").val();
        d_fecha_registrado = $("#f_tbl_hoja_vidaActualizar #fecha_registradoAct").val();
        d_tbl_tipo_pc_distribucion_id_tipo_pc_distribucion = $("#f_tbl_hoja_vidaActualizar #tbl_tipo_pc_distribucion_id_tipo_pc_distribucionAct").val();
        d_manija = $("#f_tbl_hoja_vidaActualizar #manijaAct").val();
        d_panel_frontal = $("#f_tbl_hoja_vidaActualizar #panel_frontalAct").val();
        d_iluminacion = $("#f_tbl_hoja_vidaActualizar #iluminacionAct").val();
        d_unidades_opticas = $("#f_tbl_hoja_vidaActualizar #unidades_opticasAct").val();
        d_lector_multitarjetas = $("#f_tbl_hoja_vidaActualizar #lector_multitarjetasAct").val();
        d_cantidad_puertos_usb = $("#f_tbl_hoja_vidaActualizar #cantidad_puertos_usbAct").val();
        d_puertos_video = $("#f_tbl_hoja_vidaActualizar #puertos_videoAct").val();
        d_ethernet = $("#f_tbl_hoja_vidaActualizar #ethernetAct").val();
        d_plug_audio = $("#f_tbl_hoja_vidaActualizar #plug_audioAct").val();
        d_cantidad_ps2 = $("#f_tbl_hoja_vidaActualizar #cantidad_ps2Act").val();
        d_otros_puertos = $("#f_tbl_hoja_vidaActualizar #otros_puertosAct").val();
        d_tbl_tipo_board_id_tipo_board = $("#f_tbl_hoja_vidaActualizar #tbl_tipo_board_id_tipo_boardAct").val();
        d_tbl_tipo_fuente_id_tipo_fuente = $("#f_tbl_hoja_vidaActualizar #tbl_tipo_fuente_id_tipo_fuenteAct").val();
        d_marca_fuente = $("#f_tbl_hoja_vidaActualizar #marca_fuenteAct").val();
        d_modelo_fuente = $("#f_tbl_hoja_vidaActualizar #modelo_fuenteAct").val();
        d_voltaje_fuente = $("#f_tbl_hoja_vidaActualizar #voltaje_fuenteAct").val();
        d_watt_fuente = $("#f_tbl_hoja_vidaActualizar #watt_fuenteAct").val();
        d_tamano_monitor = $("#f_tbl_hoja_vidaActualizar #tamano_monitorAct").val();
        d_marca_monitor = $("#f_tbl_hoja_vidaActualizar #marca_monitorAct").val();
        d_tbl_tipo_monitor_id_tipo_monitor = $("#f_tbl_hoja_vidaActualizar #tbl_tipo_monitor_id_tipo_monitorAct").val();
        d_marca_dd = $("#f_tbl_hoja_vidaActualizar #marca_ddAct").val();
        d_capacidad_dd = $("#f_tbl_hoja_vidaActualizar #capacidad_ddAct").val();
        d_serial_dd = $("#f_tbl_hoja_vidaActualizar #serial_ddAct").val();
        d_tbl_tipo_dd_id_tipo_dd = $("#f_tbl_hoja_vidaActualizar #tbl_tipo_dd_id_tipo_ddAct").val();
        d_marca_board = $("#f_tbl_hoja_vidaActualizar #marca_boardAct").val();
        d_serie_board = $("#f_tbl_hoja_vidaActualizar #serie_boardAct").val();
        d_capacidad_ram = $("#f_tbl_hoja_vidaActualizar #capacidad_ramAct").val();
        d_tbl_tipo_ram_id_tipo_ram = $("#f_tbl_hoja_vidaActualizar #tbl_tipo_ram_id_tipo_ramAct").val();
        d_velocidad_ram = $("#f_tbl_hoja_vidaActualizar #velocidad_ramAct").val();
        d_ramas_expansion = $("#f_tbl_hoja_vidaActualizar #ramas_expansionAct").val();
        d_tarjetas_expansion = $("#f_tbl_hoja_vidaActualizar #tarjetas_expansionAct").val();
        d_foto = $("#f_tbl_hoja_vidaActualizar #fotoAct").val();
        d_software = $("#f_tbl_hoja_vidaActualizar #softwareAct").val();
        d_observaciones = $("#f_tbl_hoja_vidaActualizar #observacionesAct").val();
        d_tbl_clientes_id_cliente = $("#f_tbl_hoja_vidaActualizar #tbl_clientes_id_clienteAct").val();
        $.ajax({
            type: "POST",
            url: "op_tbl_hoja_vidaActualizar.php",
            beforeSend: function () {
                $("#btn_tbl_hoja_vidaActualizar").hide();
            },
            complete: function () {
                $("#btn_tbl_hoja_vidaActualizar").show();
            },
            dataType: 'json',
            data: {
                id_hoja_vida: d_id_hoja_vida,
                tbl_dependencias_id_dependencia: d_tbl_dependencias_id_dependencia,
                equipo_numero: d_equipo_numero,
                tbl_marcas_id_marca: d_tbl_marcas_id_marca,
                tbl_tipo_pc_id_tipo_pc: d_tbl_tipo_pc_id_tipo_pc,
                fecha_compra: d_fecha_compra,
                valor: d_valor,
                fecha_expiracion_garantia: d_fecha_expiracion_garantia,
                fecha_registrado: d_fecha_registrado,
                tbl_tipo_pc_distribucion_id_tipo_pc_distribucion: d_tbl_tipo_pc_distribucion_id_tipo_pc_distribucion,
                manija: d_manija,
                panel_frontal: d_panel_frontal,
                iluminacion: d_iluminacion,
                unidades_opticas: d_unidades_opticas,
                lector_multitarjetas: d_lector_multitarjetas,
                cantidad_puertos_usb: d_cantidad_puertos_usb,
                puertos_video: d_puertos_video,
                ethernet: d_ethernet,
                plug_audio: d_plug_audio,
                cantidad_ps2: d_cantidad_ps2,
                otros_puertos: d_otros_puertos,
                tbl_tipo_board_id_tipo_board: d_tbl_tipo_board_id_tipo_board,
                tbl_tipo_fuente_id_tipo_fuente: d_tbl_tipo_fuente_id_tipo_fuente,
                marca_fuente: d_marca_fuente,
                modelo_fuente: d_modelo_fuente,
                voltaje_fuente: d_voltaje_fuente,
                watt_fuente: d_watt_fuente,
                tamano_monitor: d_tamano_monitor,
                marca_monitor: d_marca_monitor,
                tbl_tipo_monitor_id_tipo_monitor: d_tbl_tipo_monitor_id_tipo_monitor,
                marca_dd: d_marca_dd,
                capacidad_dd: d_capacidad_dd,
                serial_dd: d_serial_dd,
                tbl_tipo_dd_id_tipo_dd: d_tbl_tipo_dd_id_tipo_dd,
                marca_board: d_marca_board,
                serie_board: d_serie_board,
                capacidad_ram: d_capacidad_ram,
                tbl_tipo_ram_id_tipo_ram: d_tbl_tipo_ram_id_tipo_ram,
                velocidad_ram: d_velocidad_ram,
                ramas_expansion: d_ramas_expansion,
                tarjetas_expansion: d_tarjetas_expansion,
                foto: d_foto,
                software: d_software,
                observaciones: d_observaciones,
                tbl_clientes_id_cliente: d_tbl_clientes_id_cliente,
            },
            success: function (rs) {
                if (rs.mensaje == "OK") {
                    window.location.href = "fm_tbl_hoja_vida.php?men=2";
                    
                } else {
                    mensaje('2', rs.mensaje, "#d_mensajeModaltbl_hoja_vida");
                }
            },
            error: function (er1, er2, er3) {
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_hoja_vidaEliminar").on("click", "#btn_tbl_hoja_vidaEliminar", function(e){
        d_codigo = $("#id_hoja_vidaAct").val();
        $.ajax({
            method:"POST",
            url: "op_tbl_hoja_vidaEliminar.php",
            data: {
                codigo: d_codigo 
            },
            success: function(rs){
                $("#vtn_tbl_hoja_vidaActualizar").modal("hide");
                $("tr[data-cod='"+d_codigo+"']").remove();
            },
            error: function(er1, er2, er3){
                console.log(er1);
                console.log(er2);
                console.log(er3);
            }
        });
    });
    $("#vtn_tbl_hoja_vidaEliminar").on('hidden.bs.modal', function () {
        $("body").css('overflow', 'hidden');
        $("#vtn_tbl_hoja_vidaActualizar").css('overflow', 'auto');
    });
});

function mostrarArchivos(codigo){
    $.ajax({
        data: { codigo: codigo },
        url: "f_tbl_hojavida_mostrar_archivos.php",
        type: "POST",
        beforeSend: function () {
            $("#listar_fotos").html("Cargando...");
        },
        complete: function () {
        },
        success: function (rs) {
           $("#listar_fotos").html(rs);
        },
    });
}
