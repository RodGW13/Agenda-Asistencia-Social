////////FUNCIONES GLOBALES
//formatea RUT
function checkFields(objTextoStrRut, objTextoRut) { 
// Validacion de todos los elementos del formulario 
rut = rut; 
if( rut == 0 ){
	
}
else {
var rut = objTextoStrRut.value; 
var tmpstr = ""; 
for ( i=0; i < rut.length ; i++ ) 
if ( rut.charAt(i) != ' ' && rut.charAt(i) != '.' && rut.charAt(i) != '-' ) 
tmpstr = tmpstr + rut.charAt(i); 
rut = tmpstr; 
if ( validaRut(objTextoStrRut) ) { 


return true; 
} 
else { 
return false; 
} 
} 
} 

function checkDV(crut) { 
largo = crut.length; 

if ( largo > 2 ) 
rut = crut.substring(0, largo - 1); 
else 
rut = crut.charAt(0); 
dv = crut.charAt(largo-1); 

if ( rut == null || dv == null ) 
return 0; 

var dvr = '0'; 
suma = 0; 
mul = 2; 
for (i= rut.length -1 ; i >= 0; i--) { 
suma = suma + rut.charAt(i) * mul; 
if (mul == 7) 
mul = 2; 
else 
mul++; 
} 

res = suma % 11; 
if (res==1) 
dvr = 'k'; 
else if (res==0) 
dvr = '0'; 
else { 
dvi = 11-res; 
dvr = dvi + ""; 
} 

if ( dvr != dv.toLowerCase() ) 
return false; 
return true; 
} 

function validaRut(objTextoStrRut) { 
texto = objTextoStrRut.value; 
var tmpstr = ""; 
for ( i=0; i < texto.length ; i++ ) 
if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' ) 
tmpstr = tmpstr + texto.charAt(i); 
texto = tmpstr; 
largo = texto.length; 

if ( largo < 2 ) { 
objTextoStrRut.focus(); 
objTextoStrRut.select(); 
return false; 
} 
for (i=0; i < largo ; i++ ) { 
if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" ) {

objTextoStrRut.focus(); 
objTextoStrRut.select(); 
return false; 
} 
} 
var invertido = ""; 

for ( i=(largo-1),j=0; i>=0; i--,j++ ) 
invertido = invertido + texto.charAt(i); 
var dtexto = ""; 

dtexto = dtexto + invertido.charAt(0); 
dtexto = dtexto + '-'; 
cnt = 0; 

for (i=1,j=2; i<largo; i++,j++) { 
if ( cnt == 3 ) { 
dtexto = dtexto + '.'; 
j++; 
dtexto = dtexto + invertido.charAt(i); 
cnt = 1; 
} 
else { 
dtexto = dtexto + invertido.charAt(i); 
cnt++; 
} 
} 

invertido = ""; 

for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ ) 
invertido = invertido + dtexto.charAt(i); 

objTextoStrRut.value = invertido; 

if ( checkDV(texto) ) { 
return true; 
} 
else { 
objTextoStrRut.focus(); 
objTextoStrRut.select(); 
return false; 
} 
}

// isMail: devuelve verdadero si value es una direccion de correo valida
function isMail(value) {
    try
	{
		var pattern=new RegExp("\\w+([-+.]\\w+)*@\\w+([-.]\\w+)*\\.\\w+([-.]\\w+)*");
		return value.match(pattern);
	}
	catch(e)
	{
		return false;
	}
}

// isModule11: devuelve verdadero si value es valido para el modulo 11
function isRut(value) {
    var pattern=new RegExp("^(([0-9]{1,2}\\.[0-9]{3}\\.[0-9]{3})|([0-9]{7,8}))\\-([0-9K])$", "i");
    var pattern_point=new RegExp("\\.", "g");
    var pattern_dv=new RegExp("([0-9]+)\\-([0-9K])", "i");

    value=Trim(value);
    if (value.match(pattern)) {
        value=value.replace(pattern_point, "");
        if (value.match(pattern_dv)) {
            number=new String(RegExp.$1);
            dv=new String(RegExp.$2);
            sum = 0;
            mul = 2;
            for (i = number.length - 1 ; i >= 0; i--) {
                sum += number.charAt(i) * mul;
                mul == 7 ? mul = 2:mul++;
            }
            rest = sum % 11;
            if (rest == 1) dvr = 'K';
            else if (rest == 0) dvr = '0';
            else  {
                dvr = 11-rest;
            }
            return dvr==dv.toUpperCase();

        }
    }
}

// LTrim: Quita espacios en blanco a la izquerda de una cadena
function LTrim(value) {
    var pattern=new RegExp("^\\s+", "g")
    return value.replace(pattern, "");
}

// RTrim: Quita espacios en blanco a la derecha de una cadena
function RTrim(value) {
    var pattern=new RegExp("\\s+$", "g")
    return value.replace(pattern, "");
}

// Trim: Quita espacios en blanco a la derecha y a la izquierda de una cadena
function Trim(value) {
    return RTrim(LTrim(value));
}

// isDate: devuelve verdadero si value es una fecha valida en formato dd/mm/aaaa
function isDate(value) {
    var pattern1=new RegExp("^(0[0-9]|[1-2][0-9]|30|31)/(0[13-9]|1[0-2])/[1-9][0-9][0-9][0-9]");
    var pattern2=new RegExp("^(0[0-9]|[1-2][0-9])-(0[0-9]|1[0-2])-[1-9][0-9][0-9][0-9]");

    if (value.match(pattern1) || value.match(pattern2)) {
        if (parseInt(value.substr(6,4))%4!=0 && parseInt(value.substr(3,2))==2 && parseInt(value.substr(0,2))==29) {
            return false;
        } else return true;
    } else return false;
}
//////

$(document).ready(function(){
	$('.solo_rut').keyValue(/[0-9\k\.\-]/);
	$('.solo_numeros').keyValue(/[0-9]/);
	
	//resetea formulario
	$('.reset-form').on('click', function(event){
        $('input[type="text"]').val('');
    });
	
});

//valida formulario cargas vigentes
function validaFormCargasVigentes(form)
{
	if (!isRut($('input[name$="form-run"]').val()))
	{
		$('input[name$="form-run"]').addClass('obligatorio').attr('placeholder','Ej: 17246723-3').select();
		$('input[name$="form-run"]').keypress(function() {
			$('input[name$="form-run"]').removeClass('obligatorio');
		});
		return false;
	}
	if ($('input[name$="form-presentar"]').val() < 3)
	{
		$('input[name$="form-presentar"]').addClass('obligatorio').attr('placeholder','Ingrese lugar de presentación').focus();
		$('input[name$="form-presentar"]').keypress(function() {
			$('input[name$="form-presentar"]').removeClass('obligatorio');
		});
		return false;
	}
	
	else{
		$('.mensajes-error').show();
		return false;
		}
	
}

//valida formulario intereses ptmo
function validaFormIntereses(form)
{
	if (!isRut($('input[name$="form-run"]').val()))
	{
		$('input[name$="form-run"]').addClass('obligatorio').attr('placeholder','Ej: 17246723-3').select();
		$('input[name$="form-run"]').keypress(function() {
			$('input[name$="form-run"]').removeClass('obligatorio');
		});
		return false;
	}
	
}

//valida formulario intereses ptmo
function validaFormCalidades(form)
{
	if (!isRut($('input[name$="form-run"]').val()))
	{
		$('input[name$="form-run"]').addClass('obligatorio').attr('placeholder','Ej: 17246723-3').select();
		$('input[name$="form-run"]').keypress(function() {
			$('input[name$="form-run"]').removeClass('obligatorio');
		});
		return false;
	}
	
}

//valida formulario cargas vigentes
function validaFormTimbre(form)
{
	if ($('input[name$="form-timbre"]').val() < 3)
	{
		$('input[name$="form-timbre"]').addClass('obligatorio').attr('placeholder','Ingrese número de timbre').focus();
		$('input[name$="form-timbre"]').keypress(function() {
			$('input[name$="form-timbre"]').removeClass('obligatorio');
		});
		return false;
	}
	
	if ($('input[name$="form-folio"]').val() < 3)
	{
		$('input[name$="form-folio"]').addClass('obligatorio').attr('placeholder','Ingrese número de folio').focus();
		$('input[name$="form-folio"]').keypress(function() {
			$('input[name$="form-folio"]').removeClass('obligatorio');
		});
		return false;
	}
	
}

//valida formulario prestamo habitacional
function validaFormHabitacional(form)
{
	if (!isRut($('input[name$="form-rut"]').val()))
	{
		$('input[name$="form-rut"]').addClass('obligatorio').attr('placeholder','Ej: 17246723-3').select();
		$('input[name$="form-rut"]').keypress(function() {
			$('input[name$="form-rut"]').removeClass('obligatorio');
		});
		return false;
	}
}

//valida formulario pensiones - fecha de pago
function validaFormFechaPago()
{
	$('.resultado').slideDown('normal');
	return false;
}

//valida formulario pensiones - actualizacion lugar de pago
function validaFormActualizacionLugarPago(form)
{
	if (!isRut($('input[name$="form-run"]').val()))
	{
		$('input[name$="form-run"]').addClass('obligatorio').attr('placeholder','Ej: 17246723-3').select();
		$('input[name$="form-run"]').keypress(function() {
			$('input[name$="form-run"]').removeClass('obligatorio');
		});
		return false;
	}
	
	if ($('input[name$="form-cuenta-deposito"]').val() < 3)
	{
		$('input[name$="form-cuenta-deposito"]').addClass('obligatorio').attr('placeholder','Ingrese número de cuenta').focus();
		$('input[name$="form-cuenta-deposito"]').keypress(function() {
			$('input[name$="form-cuenta-deposito"]').removeClass('obligatorio');
		});
		return false;
	}
	
	else{
		$('.resultado').slideDown('normal');
		}
}

//valida formulario mis datos - cambio de clave
function validaFormCambioClave()
{
	if ($('input[name$="form-clave-actual"]').val() < 6)
	{
		$('input[name$="form-clave-actual"]').addClass('obligatorio').attr('type','text').attr('placeholder','Ingrese su clave actual (entre 6 y 15 caracteres)').focus();
		$('input[name$="form-clave-actual"]').keypress(function() {
			$('input[name$="form-clave-actual"]').removeClass('obligatorio').attr('type','password');
		});
		return false;
	}
	
	if ($('input[name$="form-clave-nueva"]').val() < 6)
	{
		$('input[name$="form-clave-nueva"]').addClass('obligatorio').attr('type','text').attr('placeholder','Ingrese su clave nueva (entre 6 y 15 caracteres)').focus();
		$('input[name$="form-clave-nueva"]').keypress(function() {
			$('input[name$="form-clave-nueva"]').removeClass('obligatorio').attr('type','password');
		});
		return false;
	}
	
	if ($('input[name$="form-clave-nueva-reeingreso"]').val() != $('input[name$="form-clave-nueva"]').val())
	{
		$('input[name$="form-clave-nueva-reeingreso"]').addClass('obligatorio').attr('type','text').attr('placeholder','Claves deben ser iguales').focus().val("");
		$('input[name$="form-clave-nueva-reeingreso"]').keypress(function() {
			$('input[name$="form-clave-nueva-reeingreso"]').attr('type','password').removeClass('obligatorio');
		});
		return false;
	}
	
	else{
		$('.resultado').slideDown('normal');
		}
}

//valida formulario mis datos - actualizar email
function validaFormActualizarEmail()
{
	if (!isMail($('input[name$="form-email-actual"]').val()))
	{
		$('input[name$="form-email-actual"]').addClass('obligatorio').attr('placeholder','Ej: usuario@dominio.cl').select();
		$('input[name$="form-email-actual"]').keypress(function() {
			$('input[name$="form-email-actual"]').removeClass('obligatorio');
		});
		return false;
	}
	
	if (!isMail($('input[name$="form-email-nuevo"]').val()))
	{
		$('input[name$="form-email-nuevo"]').addClass('obligatorio').attr('placeholder','Ej: usuario@dominio.cl').select();
		$('input[name$="form-email-nuevo"]').keypress(function() {
			$('input[name$="form-email-nuevo"]').removeClass('obligatorio');
		});
		return false;
	}
	
	else{
		$('.resultado').slideDown('normal');
		}
}

//valida formulario mis datos - actualizacion domicilio
function validaFormActualizacionDomicilio()
{
	if (!isRut($('input[name$="form-run"]').val()))
	{
		$('input[name$="form-run"]').addClass('obligatorio').attr('placeholder','Ej: 17246723-3').select();
		$('input[name$="form-run"]').keypress(function() {
			$('input[name$="form-run"]').removeClass('obligatorio');
		});
		return false;
	}
	
	if ($('input[name$="form-calle"]').val() < 6)
	{
		$('input[name$="form-calle"]').addClass('obligatorio').attr('placeholder','Ingrese calle)').focus();
		$('input[name$="form-calle"]').keypress(function() {
			$('input[name$="form-calle"]').removeClass('obligatorio');
		});
		return false;
	}
	
	else{
		$('.resultado').slideDown('normal');
		}
}


//valida formulario area salud - descuentos
function validaFormSaludDescuentos()
{
	
	if ($('input[name$="form-cuenta"]').val() < 3)
	{
		$('input[name$="form-cuenta"]').addClass('obligatorio').attr('placeholder','Ingrese n° de la cuenta)').focus();
		$('input[name$="form-cuenta"]').keypress(function() {
			$('input[name$="form-cuenta"]').removeClass('obligatorio');
		});
		return false;
	}
	
	else{
		$('.resultado').slideDown('normal');
		}
}

//valida formulario solicitud de tramite
function validaFormSolicitudTramite()
{
	
	if ($('input[name$="form-telefono-celular"]').val() < 8)
	{
		$('input[name$="form-telefono-celular"]').addClass('obligatorio').attr('placeholder','Ingrese n° de celular)').focus();
		$('input[name$="form-telefono-celular"]').keypress(function() {
			$('input[name$="form-telefono-celular"]').removeClass('obligatorio');
		});
		return false;
	}
	
	if ($('input[name$="form-entrega"]').val() < 3)
	{
		$('input[name$="form-entrega"]').addClass('obligatorio').attr('placeholder','Ingrese forma de entrega)').focus();
		$('input[name$="form-entrega"]').keypress(function() {
			$('input[name$="form-entrega"]').removeClass('obligatorio');
		});
		return false;
	}
	
	if (!isMail($('input[name$="form-email"]').val()))
	{
		$('input[name$="form-email"]').addClass('obligatorio').attr('placeholder','Ej: usuario@dominio.cl').select();
		$('input[name$="form-email"]').keypress(function() {
			$('input[name$="form-email"]').removeClass('obligatorio');
		});
		return false;
	}
	
	if ($('input[name$="form-direccion"]').val() < 6)
	{
		$('input[name$="form-direccion"]').addClass('obligatorio').attr('placeholder','Ingrese dirección)').focus();
		$('input[name$="form-direccion"]').keypress(function() {
			$('input[name$="form-direccion"]').removeClass('obligatorio');
		});
		return false;
	}
	
	else{
		$('.resultado').slideDown('normal');
		}
}

//valida formulario login
function validaFormLogin()
{
	if (!isRut($('input[name$="form-run"]').val()))
	{
		$('input[name$="form-run"]').addClass('obligatorio').attr('placeholder','Ej: 17246723-3').select();
		$('input[name$="form-run"]').keypress(function() {
			$('input[name$="form-run"]').removeClass('obligatorio');
		});
		return false;
	}
	
	if ($('input[name$="form-clave"]').val() < 6)
	{
		$('input[name$="form-clave"]').addClass('obligatorio').attr('type','text').attr('placeholder','Ingrese su clave').focus();
		$('input[name$="form-clave"]').keypress(function() {
			$('input[name$="form-clave"]').removeClass('obligatorio').attr('type','password');
		});
		return false;
	}
}

//valida formulario solicitud de clave
function validaFormSolicitudClave()
{
	if (!isRut($('input[name$="form-run"]').val()))
	{
		$('input[name$="form-run"]').addClass('obligatorio').attr('placeholder','Ej: 17246723-3').select();
		$('input[name$="form-run"]').keypress(function() {
			$('input[name$="form-run"]').removeClass('obligatorio');
		});
		return false;
	}
	
	if ($('input[name$="form-cuenta"]').val() < 6)
	{
		$('input[name$="form-cuenta"]').addClass('obligatorio').attr('placeholder','Ingrese su cuenta').focus();
		$('input[name$="form-cuenta"]').keypress(function() {
			$('input[name$="form-cuenta"]').removeClass('obligatorio');
		});
		return false;
	}

	if ($('input[name$="form-pension"]').val() < 4)
	{
		$('input[name$="form-pension"]').addClass('obligatorio').attr('placeholder','Ingrese su pensión líquida').focus();
		$('input[name$="form-pension"]').keypress(function() {
			$('input[name$="form-pension"]').removeClass('obligatorio');
		});
		return false;
	}

}

//valida formulario solicitud de clave paso 02
function validaFormSolicitudClavePaso2()
{
	if ($('input[name$="form-clave"]').val() < 6)
	{
		$('input[name$="form-clave"]').addClass('obligatorio').attr('placeholder','Ingrese su clave (6 a 15 caracteres)').focus().attr('type','text');
		$('input[name$="form-clave"]').keypress(function(e) {
			$('input[name$="form-clave"]').attr('type','password').removeClass('obligatorio');
		});
		return false;
	}
	
	if ($('input[name$="form-clave-reeingreso"]').val() != $('input[name$="form-clave"]').val())
	{
		$('input[name$="form-clave-reeingreso"]').addClass('obligatorio').attr('type','text').attr('placeholder','Claves deben ser iguales').focus();
		$('input[name$="form-clave-reeingreso"]').keypress(function() {
			$('input[name$="form-clave-reeingreso"]').attr('type','password').removeClass('obligatorio');
		});
		return false;
	}
	
	if (!isMail($('input[name$="form-email"]').val()))
	{
		$('input[name$="form-email"]').addClass('obligatorio').attr('placeholder','Ej: usuario@dominio.cl').select();
		$('input[name$="form-email"]').keypress(function() {
			$('input[name$="form-email"]').removeClass('obligatorio');
		});
		return false;
	}
	
}

//valida formulario recuperar clave
function validaFormRecuperClave()
{
	if (!isMail($('input[name$="form-email"]').val()))
	{
		$('input[name$="form-email"]').addClass('obligatorio').attr('placeholder','Ej: usuario@dominio.cl').select();
		$('input[name$="form-email"]').keypress(function() {
			$('input[name$="form-email"]').removeClass('obligatorio');
		});
		return false;
	}
	
}


//valida formulario recuperar clave paso 2
function validaFormRecuperClavePaso2()
{
	if ($('input[name$="form-clave"]').val() < 6)
	{
		$('input[name$="form-clave"]').addClass('obligatorio').attr('placeholder','Ingrese su clave (6 a 15 caracteres)').focus().attr('type','text');
		$('input[name$="form-clave"]').keypress(function(e) {
			$('input[name$="form-clave"]').attr('type','password').removeClass('obligatorio');
		});
		return false;
	}
	
}


