$(document).ready(function(e) {
    $.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
		dateFormat: "yy-mm-dd",
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: '',
		yearRange: '-100:+2',
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
	
	$("body").on("keydown", ".vali_num", function(e) {
		letra = e.key || e.char;
		redondeo = validar_redondeo($(this).attr("data-dec"));
		if(redondeo == 0){
			if (!/^[0-9]/.test(letra) && letra!='Backspace' && letra!='Delete' && letra!='ArrowLeft' && letra!='ArrowRight' && letra!='Left' && letra!='Right' && letra!='Del' && letra!='Tab') {
    			e.preventDefault();
  			}
		}else{
			if (!/^[0-9.]/.test(letra) && letra!='Backspace' && letra!='Delete' && letra!='ArrowLeft' && letra!='ArrowRight' && letra!='Left' && letra!='Right' && letra!='Del' && letra!='Tab') {
    			e.preventDefault();
  			}
		}
    });
	$("body").on("change", ".vali_num", function(e) {
		texto = $(this).val();
		if(texto.length > 0){
			if(texto == "."){
				$(this).val("");
			}else{
				redondeo = validar_redondeo($(this).attr("data-dec"));
			
				valorred = Math.pow(10, parseInt(redondeo));
				$(this).val(number_format(Math.round(parseFloat(texto)*valorred)/valorred, redondeo, '.', ''));
				}
		}
    });
	$("body").on("keyup", ".vali_num", function(e) {
		texto = $(this).val();
		if(!/^[0-9]+([.][0-9]+)?$/.test(texto)){
			final = "";
			caract = texto.split("");
			i=0;
			primero = true;
			while(i<caract.length){
				if(caract[i] == '.'){
					if(primero){
						primero = false;
						final += caract[i];
					}else{
						i = caract.length;
					}
				}else{
					final += caract[i];
				}
				i++;
			}
			$(this).val(final);
		}
    });
});

function bloquearFormulario(formulario){
	$("#"+formulario+" input, "+"#"+formulario+" select, "+"#"+formulario+" textarea").prop("readonly", true);
}
function desbloquearFormulario(formulario){
	$("#"+formulario+" input, "+"#"+formulario+" select, "+"#"+formulario+" textarea").prop("readonly", false);	
}


/*
id: Id del input (debe llevar el #)

data-cm:
s->Permite el cambio de mes
n->No permite el cambio de mes
No existe -> No permite el cambio de mes

data-cy:
s->Permite el cambio de año
n->No permite el cambio de año
No existe -> No permite el cambio de año

data-h:
1->Fecha máxima hoy
2->Fecha mínima hoy
No existe -> Sin límite

data-min:
fecha minima
*/
function cargarfecha(id){
	$(id).datepicker({
		dateFormat: "yy-mm-dd"
	});
	
	d_cm = $(id).attr("data-cm");
	if(typeof(d_cm) == "undefined"){
		d_cm = false;
	}else{
		if(d_cm == "s"){
			d_cm = true;
		}else{
			d_cm = false;
		}
	}
	$(id).datepicker( "option", "changeMonth", d_cm );
	d_cy = $(id).attr("data-cy");
	if(typeof(d_cy) == "undefined"){
		d_cy = false;
	}else{
		if(d_cy == "s"){
			d_cy = true;
		}else{
			d_cy = false;
		}
	}
	$(id).datepicker( "option", "changeYear", d_cy );
	d_hoy = $(id).attr("data-h");
	if(typeof(d_hoy) != "undefined"){
		if(d_hoy=="1"){
			$(id).datepicker( "option", "maxDate", "0" );
		}
		if(d_hoy=="2"){
			if($(id).val() != ""){
				$(id).datepicker( "option", "minDate", $(id).val());
			}else{
				$(id).datepicker( "option", "minDate", "0" );
			}
		}
	}
}
function mensaje(tipo, mensaje, div){
	switch(tipo){
		case '1':
			$(div).html('<br><div class="col-md-8 alert alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>'+mensaje+'</div>');
		break;
		case '2':
			$(div).html('<br><div class="col-md-8 alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">×</a> <strong>Error: </strong> '+mensaje+'</div>');
		break;
	}
	
}
function validar_redondeo(num){
	if(num != 'undefined'){
		if(isNaN(parseInt(num))){
			return 0;
		}else{
			if(parseInt(num) < 0){
				return 0;
			}
		}
	}
	return parseInt(num);
}
function number_format(a, b, c, d) {
	a = Math.round(a * Math.pow(10, b)) / Math.pow(10, b);
	e = a + '';
	f = e.split('.');
	if (!f[0]) {
		f[0] = '0';
	}
	if (!f[1]) {
		f[1] = '';
	}
	if (f[1].length < b) {
		g = f[1];
		for (i=f[1].length + 1; i <= b; i++) {
			g += '0';
		}
		f[1] = g;
	}
	if(d != '' && f[0].length > 3) {
		h = f[0];
		f[0] = '';
		for(j = 3; j < h.length; j+=3) {
			i = h.slice(h.length - j, h.length - j + 3);
			f[0] = d + i + f[0] + '';
		}
		j = h.substr(0, (h.length % 3 == 0) ? 3 : (h.length % 3));
		f[0] = j + f[0];
	}
	c = (b <= 0) ? '' : c;
	return f[0] + c + f[1];
}

function loader(div){
	$(div).html("Cargando...");
}

function actualizar_datos(cod, info, valor){
	$("tr[data-cod='"+cod+"'] td[data-i='"+info+"']").html(valor);
}