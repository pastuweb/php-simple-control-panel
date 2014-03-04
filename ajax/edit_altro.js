$(function() {		
	//Modifica Tabella Altro
	var campo = "testata";
	
	$('#button1_8').click(function() {
		campo = "testata";
		testo = $('#contenuto1_8').val();
		
		var varData = 'campo='+campo+'&testo='+testo;
		$.ajax({
				type: "POST",
				url:'./ajax/process_edit_altro.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('edit').each(function(){
							if($(this).text() == "OK"){
								//refresh
								$('#tabs8_Altro').trigger('click');
							}
						});
					});
						
				}
			});
	});
	
	$('#button2_8').click(function() {
		campo = "CV_ita";
		testo = $('#contenuto2_8').val();
		
		var varData = 'campo='+campo+'&testo='+testo;
		$.ajax({
				type: "POST",
				url:'./ajax/process_edit_altro.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('edit').each(function(){
							if($(this).text() == "OK"){
								//refresh
								$('#tabs8_Altro').trigger('click');
							}
						});
					});
						
				}
			});
	});
	
	
	$('#button3_8').click(function() {
		campo = "CV_eng";
		testo = $('#contenuto3_8').val();
		
		var varData = 'campo='+campo+'&testo='+testo;
		$.ajax({
				type: "POST",
				url:'./ajax/process_edit_altro.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('edit').each(function(){
							if($(this).text() == "OK"){
								//refresh
								$('#tabs8_Altro').trigger('click');
							}
						});
					});
						
				}
			});
	});
	
	$('#button4_8').click(function() {
		campo = "omaggi";
		testo = $('#contenuto4_8').val();
		
		var varData = 'campo='+campo+'&testo='+testo;
		$.ajax({
				type: "POST",
				url:'./ajax/process_edit_altro.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('edit').each(function(){
							if($(this).text() == "OK"){
								//refresh
								$('#tabs8_Altro').trigger('click');
							}
						});
					});
						
				}
			});
	});
	
	$('#button5_8').click(function() {
		campo = "novita";
		testo = $('#contenuto5_8').val();
		
		var varData = 'campo='+campo+'&testo='+testo;
		$.ajax({
				type: "POST",
				url:'./ajax/process_edit_altro.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('edit').each(function(){
							if($(this).text() == "OK"){
								//refresh
								$('#tabs8_Altro').trigger('click');
							}
						});
					});
						
				}
			});
	});
	
	$('#button6_8').click(function() {
		campo = "news";
		testo = $('#contenuto6_8').val();
		
		var varData = 'campo='+campo+'&testo='+testo;
		$.ajax({
				type: "POST",
				url:'./ajax/process_edit_altro.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('edit').each(function(){
							if($(this).text() == "OK"){
								//refresh
								$('#tabs8_Altro').trigger('click');
							}
						});
					});
						
				}
			});
	});
	
	$('#button7_8').click(function() {
		campo = "messaggio_aziendale";
		testo = $('#contenuto7_8').val();
		
		var varData = 'campo='+campo+'&testo='+testo;
		$.ajax({
				type: "POST",
				url:'./ajax/process_edit_altro.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('edit').each(function(){
							if($(this).text() == "OK"){
								//refresh
								$('#tabs8_Altro').trigger('click');
							}
						});
					});
						
				}
			});
	});

		
});