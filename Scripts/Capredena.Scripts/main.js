//separador de miles
function format(input)
	{
	var num = input.value.replace(/\./g,'');
	if(!isNaN(num)){
	num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
	num = num.split('').reverse().join('').replace(/^[\.]/,'');
	input.value = num;
	}
	  
	else{ alert('Solo se permiten numeros');
	input.value = input.value.replace(/[^\d\.]*/g,'');
	}
}

// Tamano de fuentes en posts
$(".fontsize a").click(function() {
	var fsize = $(this).attr('data-size');
	$(".fontsize li").removeClass('current'); 		
	$(this).parent().addClass('current'); 		
	$('#contenidos').css('fontSize', fsize + 'em'); 		
});

// cerrar sesión
$("#modalCerrarSesion .btn-success").click(function() {
	document.location.href='login.html'		
});

//detecta posicion scroll
$(document).ready(function(){
	//detecta posicion scroll
	var scrll = $(this).scrollTop();
	if(scrll > 100)
	{
		$('body').addClass('fixed');
	}
	else
	{
		$('body').removeClass('fixed');
	}

});
//detecta posicion scroll
$(window).scroll(function (){
	var scrll = $(this).scrollTop();
	if(scrll > 100)
	{
		$('body').addClass('fixed');
	}
	else
	{
		$('body').removeClass('fixed');
	}
});

 $(document).ready(function(e) {	
  $( ".mostrar-menu-extra" ).click(function() {
  $( ".menu-extra" ).slideToggle( "fast" );
});
});


// input-top reset

function bloqueaydesbloqueinput(){
	if ($('#nombreCliente').prop('disabled')==true){
			$('#nombreCliente').prop('disabled', false);
			$('#nombreCliente').val("");
			$('#rutCliente').prop('disabled', false);
			$('#rutCliente').val("");
			$('#lblRutCliente').hide();
			$('#lblNombreCliente').hide();
	}
	else{
	   $('#nombreCliente').prop('disabled', true);
	   $('#rutCliente').prop('disabled', true);
	   $('#lblNombreCliente').show();
	   $('#lblRutCliente').show();

	 
	}
  return;
}
