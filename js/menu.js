$(document).ready(main);
	var contador=1;
 
function main(){
	$('.menu_bar').click(function() {
		/* Act on the event */
		if (contador ==1) {
			$('nav').animate({ 
            left: '0'
			});
			contador = 0;
		} else {
			contador =1	;
			$('nav').animate({ 
            left: '-100%'
		});

	});
}


