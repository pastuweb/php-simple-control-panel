$(function() {		
	//EMAIL
		$('#result_email').hide();
		$('#result_email').html("");
		$( "#help_dialog" ).dialog({
			autoOpen: false,
			modal:true,
			draggable:false,
			resizable:false,
			width: 450
		});
		$( "#help" ).click(function( event ) {
			$('#result_email').hide();
			$('#result_email').html("");
			$( "#help_dialog" ).dialog( "open" );
			event.preventDefault();
		});
		$('#inviaEmail').click(function() {
			var nome = $('#txtnome_c').val();
			var email = $('#txtemail_c').val();
			var ogg = $('#txtogg_c').val();
			var testo = $('#txttesto_c').val();
						
			var varData = 'nome=' + nome + '&email=' + email + '&ogg=' + ogg + '&testo=' + testo;
			
			$.ajax({
				type: "POST",
				url:'./ajax/process_contattami.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

						$(resultXML).find('response').each(function(){
							$(this).children('email').each(function(){
								if($(this).text() == "OK"){
									$('#result_email').show();
									$('#result_email').html("Messaggio inviato correttamente!");
									$('#txtnome_c').val("");
									$('#txtemail_c').val("");
									$('#txtogg_c').val("");
									$('#txttesto_c').val("testo");
								}else{
									$('#result_email').show();
									$('#result_email').html("Errore: Messaggio NON INVIATO!");
								}
							});
						});
						
				}
			});
		});
		$('#resetEmail').click(function() {
			$('#txtnome_c').val("");
			$('#txtemail_c').val("");
			$('#txtogg_c').val("");
			$('#txttesto_c').val("testo");
			$('#result_email').hide();
			$('#result_email').html("");
		});
		
});