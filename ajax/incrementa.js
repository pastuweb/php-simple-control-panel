$(function() {		
	//Modifica Prezzi Listino - Incrementa
	$('#applica_incr_9').click(function() {
		var cifra;
		var tipo;
		if($('#tipo_listino_cifra').val() == "" || $('#tipo_listino_cifra').val() == null){
			cifra = parseFloat("0.00").toFixed(2);
		}else{
			cifra = parseFloat($('#tipo_listino_cifra').val()).toFixed(2);
		}
		
		if($('#tipo_listino_incremento').val() == "" || $('#tipo_listino_incremento').val() == null){
			tipo = "";
		}else{
			tipo = $('#tipo_listino_incremento').val();
		}
		var tabella = "listino";
		
		var varData = 'cifra='+cifra+'&tipo='+tipo+'&tabella='+tabella;
		$('#attesaAJAX').show();
		$.ajax({
				type: "POST",
				url:'./ajax/process_incrementa.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('edit').each(function(){
							if($(this).text() == "OK"){
								//refresh
								$('#tabs9_Listino').trigger('click');
							}
						});
					});
						
				}
			});
	});

		
});