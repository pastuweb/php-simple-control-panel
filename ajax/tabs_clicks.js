$(function() {		
	//Avvio Iniziale TABS
	$('#titolo_1').val("");
	$('#immagine_1').val("");
	$('#url_1').val("");
	
	$('#tbodyPubbl').html("");
	
	//ripristina per Inserimento
	$("#immagine_1").removeAttr('disabled');
	$("#submit_1").show();
	$("#reset_1").show();
	$("#submit_1_edit").hide();
	$("#id_1_edit").val(00);
	
	var varData = 'tabs=1';
	$.ajax({
			type: "POST",
			url:'./ajax/process_refresh.php',
			data: varData,
			dataType: "xml",
			success: function(resultXML) {

				$(resultXML).find('response').each(function(){
					$(this).children('riga').each(function(){
						$('#tbodyPubbl').append('<tr>'+
								'<td style="text-align:center;color:#FF0000;">'+$(this).attr('id')+'</td>'+
								'<td>'+$(this).attr('titolo')+'</td>'+
								'<td>'+$(this).attr('url')+'</td>'+
								'<td style="text-align:center;"><img src="./images/delete.png" style="cursor:pointer;" class="ico_delete" alt="delete" title="tabs1;'+$(this).attr('id')+'" /></td>'+
								'<td style="text-align:center;"><img src="./images/edit.png" style="cursor:pointer;" class="ico_edit" alt="edit" title="tabs1;'+$(this).attr('id')+'" /></td>'+
							'</tr>'				
						);
					});
				});
				$("#tbodyPubbl tr").hover(
						  function () {
							  jQuery(this).css("background","#ACACAC");
						  }, 
						  function () {
							  jQuery(this).css("background","");
						  }
						);
					
			}
		});
	
	//TABS 1 - Pubblicita
	$('#tabs1_Pubbl').click(function() {
		$('#titolo_1').val("");
		$('#immagine_1').val("");
		$('#url_1').val("");
		
		$('#tbodyPubbl').html("");
		
		//ripristina per Inserimento
		$("#immagine_1").removeAttr('disabled');
		$("#submit_1").show();
		$("#reset_1").show();
		$("#submit_1_edit").hide();
		$("#id_1_edit").val(00);
		
		var varData = 'tabs=1';
		$.ajax({
				type: "POST",
				url:'./ajax/process_refresh.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('riga').each(function(){
							$('#tbodyPubbl').append('<tr>'+
									'<td style="text-align:center;color:#FF0000;">'+$(this).attr('id')+'</td>'+
									'<td>'+$(this).attr('titolo')+'</td>'+
									'<td>'+$(this).attr('url')+'</td>'+
									'<td style="text-align:center;"><img src="./images/delete.png" style="cursor:pointer;" class="ico_delete" alt="delete" title="tabs1;'+$(this).attr('id')+'" /></td>'+
									'<td style="text-align:center;"><img src="./images/edit.png" style="cursor:pointer;" class="ico_edit" alt="edit" title="tabs1;'+$(this).attr('id')+'" /></td>'+
								'</tr>'				
							);
						});
					});
					$("#tbodyPubbl tr").hover(
							  function () {
								  jQuery(this).css("background","#ACACAC");
							  }, 
							  function () {
								  jQuery(this).css("background","");
							  }
							);
						
				}
			});
		
		
		
	});
	//TABS 2 - Links
	$('#tabs2_Links').click(function() {
		$('#titolo_2').val("");
		$('#url_2').val("");
		$('#tipo_links').val("");
		
		$('#tbodyLinks').html("");
		//ripristina per Inserimento
		$("#tipo_links").removeAttr('disabled');
		$("#submit_2").show();
		$("#reset_2").show();
		$("#submit_2_edit").hide();
		$("#id_2_edit").val(00);
		
		var varData = 'tabs=2';
		$.ajax({
				type: "POST",
				url:'./ajax/process_refresh.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

						$(resultXML).find('response').each(function(){
							$(this).children('riga').each(function(){
								$('#tbodyLinks').append('<tr>'+
										'<td style="text-align:center;color:#FF0000;">'+$(this).attr('id')+'</td>'+
										'<td>'+$(this).attr('titolo')+'</td>'+
										'<td>'+$(this).attr('url')+'</td>'+
										'<td>'+$(this).attr('tipo')+'</td>'+
										'<td style="text-align:center;"><img src="./images/delete.png" style="cursor:pointer;" class="ico_delete" alt="delete" title="tabs2;'+$(this).attr('id')+'" /></td>'+
										'<td style="text-align:center;"><img src="./images/edit.png" style="cursor:pointer;" class="ico_edit" alt="edit" title="tabs2;'+$(this).attr('id')+'" /></td>'+
									'</tr>'				
								);
							});
						});
						
						$("#tbodyLinks tr").hover(
								  function () {
									  jQuery(this).css("background","#ACACAC");
								  }, 
								  function () {
									  jQuery(this).css("background","");
								  }
								);
						
				}
			});
		
		
	});
	//TABS 3 - Attestati
	$('#tabs3_Attest').click(function() {
		$('#titolo_3').val("");
		$('#immagine_3').val("");
		$('#url_3').val("");
		$('#pdf_zip_3').val("");
		
		$('#tbodyAttest').html("");
		//ripristina per Inserimento
		$("#immagine_3").removeAttr('disabled');
		$("#pdf_zip_3").removeAttr('disabled');
		$("#submit_3").show();
		$("#reset_3").show();
		$("#submit_3_edit").hide();
		$("#id_3_edit").val(00);
		
		var varData = 'tabs=3';
		$.ajax({
				type: "POST",
				url:'./ajax/process_refresh.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

						$(resultXML).find('response').each(function(){
							$(this).children('riga').each(function(){
								$('#tbodyAttest').append('<tr>'+
										'<td style="text-align:center;color:#FF0000;">'+$(this).attr('id')+'</td>'+
										'<td>'+$(this).attr('titolo')+'</td>'+
										'<td>'+$(this).attr('url')+'</td>'+
										'<td style="text-align:center;"><img src="./images/delete.png" style="cursor:pointer;" class="ico_delete" alt="delete" title="tabs3;'+$(this).attr('id')+'" /></td>'+
										'<td style="text-align:center;"><img src="./images/edit.png" style="cursor:pointer;" class="ico_edit" alt="edit" title="tabs3;'+$(this).attr('id')+'" /></td>'+
									'</tr>'				
								);
							});
						});
						$("#tbodyAttest tr").hover(
								  function () {
									  jQuery(this).css("background","#ACACAC");
								  }, 
								  function () {
									  jQuery(this).css("background","");
								  }
								);
						
				}
			});
		
		
	});
	//TABS 5 - Foto
	$('#tabs5_Foto').click(function() {
		$('#titolo_5').val("");
		$('#descrizione_5').val("");
		$('#foto_5').val("");
		$('#tipo_foto').val("");
		
		$('#tbodyFoto').html("");
		//ripristina per Inserimento
		$("#foto_5").removeAttr('disabled');
		$("#tipo_foto").removeAttr('disabled');
		$("#submit_5").show();
		$("#reset_5").show();
		$("#submit_5_edit").hide();
		$("#id_5_edit").val(00);
		
		var varData = 'tabs=5';
		$.ajax({
				type: "POST",
				url:'./ajax/process_refresh.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

						$(resultXML).find('response').each(function(){
							$(this).children('riga').each(function(){
								$('#tbodyFoto').append('<tr>'+
										'<td style="text-align:center;color:#FF0000;">'+$(this).attr('id')+'</td>'+
										'<td>'+$(this).attr('titolo')+'</td>'+
										'<td>'+$(this).text()+'</td>'+
										'<td>'+$(this).attr('tipo')+'</td>'+
										'<td style="text-align:center;"><img src="./images/delete.png" style="cursor:pointer;" class="ico_delete" alt="delete" title="tabs5;'+$(this).attr('id')+'" /></td>'+
										'<td style="text-align:center;"><img src="./images/edit.png" style="cursor:pointer;" class="ico_edit" alt="edit" title="tabs5;'+$(this).attr('id')+'" /></td>'+
									'</tr>'				
								);
							});
						});
						$("#tbodyFoto tr").hover(
								  function () {
									  jQuery(this).css("background","#ACACAC");
								  }, 
								  function () {
									  jQuery(this).css("background","");
								  }
								);
						
				}
			});
		

	});
	//TABS 6 - Download
	$('#tabs6_Download').click(function() {
		$('#titolo_6').val("");
		$('#descrizione_6').val("");
		$('#url_6').val("");
		$('#pdf_zip_6').val("");
		$('#tipo_downloads').val("");
		
		$('#tbodyDown').html("");
		//ripristina per Inserimento
		$("#pdf_zip_6").removeAttr('disabled');
		$("#tipo_downloads").removeAttr('disabled');
		$("#submit_6").show();
		$("#reset_6").show();
		$("#submit_6_edit").hide();
		$("#id_6_edit").val(00);
		
		var varData = 'tabs=6';
		$.ajax({
				type: "POST",
				url:'./ajax/process_refresh.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

						$(resultXML).find('response').each(function(){
							$(this).children('riga').each(function(){
								$('#tbodyDown').append('<tr>'+
										'<td style="text-align:center;color:#FF0000;">'+$(this).attr('id')+'</td>'+
										'<td>'+$(this).attr('titolo')+'</td>'+
										'<td>'+$(this).text()+'</td>'+
										'<td>'+$(this).attr('url')+'</td>'+
										'<td>'+$(this).attr('tipo')+'</td>'+
										'<td style="text-align:center;"><img src="./images/delete.png" style="cursor:pointer;" class="ico_delete" alt="delete" title="tabs6;'+$(this).attr('id')+'" /></td>'+
										'<td style="text-align:center;"><img src="./images/edit.png" style="cursor:pointer;" class="ico_edit" alt="edit" title="tabs6;'+$(this).attr('id')+'" /></td>'+
									'</tr>'				
								);
							});
						});
						$("#tbodyDown tr").hover(
								  function () {
									  jQuery(this).css("background","#ACACAC");
								  }, 
								  function () {
									  jQuery(this).css("background","");
								  }
								);
						
				}
			});
		
	});
	//TABS 7 - Lavori
	$('#tabs7_Lavori').click(function() {
		$('#titolo_7').val("");
		$('#descrizione_7').val("");
		$('#url_7').val("");
		$('#pdf_zip_7').val("");
		$('#immagine_7').val("");
		$('#tipo_lavori').val("");
		
		$('#tbodyLavori').html("");
		//ripristina per Inserimento
		$("#pdf_zip_7").removeAttr('disabled');
		$("#tipo_lavori").removeAttr('disabled');
		$("#immagine_7").removeAttr('disabled');
		$("#submit_7").show();
		$("#reset_7").show();
		$("#submit_7_edit").hide();
		$("#id_7_edit").val(00);
		
		var varData = 'tabs=7';
		$.ajax({
				type: "POST",
				url:'./ajax/process_refresh.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

						$(resultXML).find('response').each(function(){
							$(this).children('riga').each(function(){
								$('#tbodyLavori').append('<tr>'+
										'<td style="text-align:center;color:#FF0000;">'+$(this).attr('id')+'</td>'+
										'<td>'+$(this).attr('titolo')+'</td>'+
										'<td>'+$(this).text()+'</td>'+
										'<td>'+$(this).attr('url')+'</td>'+
										'<td>'+$(this).attr('tipo')+'</td>'+
										'<td style="text-align:center;"><img src="./images/delete.png" style="cursor:pointer;" class="ico_delete" alt="delete" title="tabs7;'+$(this).attr('id')+'" /></td>'+
										'<td style="text-align:center;"><img src="./images/edit.png" style="cursor:pointer;" class="ico_edit" alt="edit" title="tabs7;'+$(this).attr('id')+'" /></td>'+
									'</tr>'				
								);
							});
						});
						$("#tbodyLavori tr").hover(
								  function () {
									  jQuery(this).css("background","#ACACAC");
								  }, 
								  function () {
									  jQuery(this).css("background","");
								  }
								);
						
				}
			});
	});
	//TABS 8 - Altro
	$('#tabs8_Altro').click(function() {
		
		$('#contenuto1_8').val("");
		$('#contenuto2_8').val("");
		$('#contenuto3_8').val("");
				
		var varData = 'tabs=8';
		$.ajax({
				type: "POST",
				url:'./ajax/process_refresh.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

						$(resultXML).find('response').each(function(){
							$(this).children('riga').each(function(){
								$(this).children('contenuto').each(function(){
									if( $(this).attr('tipo') == "testata"){
										$('#contenuto1_8').val($(this).text());
									}else if( $(this).attr('tipo') == "cv_ita"){
										$('#contenuto2_8').val($(this).text());
									}else if( $(this).attr('tipo') == "cv_eng"){
										$('#contenuto3_8').val($(this).text());
									}else if( $(this).attr('tipo') == "omaggi"){
										$('#contenuto4_8').val($(this).text());
									}else if( $(this).attr('tipo') == "novita"){
										$('#contenuto5_8').val($(this).text());
									}else if( $(this).attr('tipo') == "news"){
										$('#contenuto6_8').val($(this).text());
									}else if( $(this).attr('tipo') == "messaggio_aziendale"){
										$('#contenuto7_8').val($(this).text());
									}
								});
							}); 
						});
					
						
				}
			});

	});
	//TABS 9 - Listino
	$('#tabs9_Listino').click(function() {
		$('#titolo_9').val("");
		$('#descrizione_9').val("");
		$('#prezzo_9').val("");
		$('#tipo_listino').val("");
		
		$('#tbodyListino').html("");
		//ripristina per Inserimento
		$("#tipo_listino").removeAttr('disabled');
		$("#submit_9").show();
		$("#reset_9").show();
		$("#submit_9_edit").hide();
		$("#id_9_edit").val(00);
		
		var varData = 'tabs=9';
		$.ajax({
				type: "POST",
				url:'./ajax/process_refresh.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

						$(resultXML).find('response').each(function(){
							$(this).children('riga').each(function(){
								$('#tbodyListino').append('<tr>'+
										'<td style="text-align:center;color:#FF0000;">'+$(this).attr('id')+'</td>'+
										'<td>'+$(this).attr('titolo')+'</td>'+
										'<td>'+$(this).text()+'</td>'+
										'<td>'+$(this).attr('prezzo')+'</td>'+
										'<td>'+$(this).attr('tipo')+'</td>'+
										'<td style="text-align:center;"><img src="./images/delete.png" style="cursor:pointer;" class="ico_delete" alt="delete" title="tabs9;'+$(this).attr('id')+'" /></td>'+
										'<td style="text-align:center;"><img src="./images/edit.png" style="cursor:pointer;" class="ico_edit" alt="edit" title="tabs9;'+$(this).attr('id')+'" /></td>'+
									'</tr>'				
								);
							});
						});
						
						$("#tbodyListino tr").hover(
								  function () {
									  jQuery(this).css("background","#ACACAC");
								  }, 
								  function () {
									  jQuery(this).css("background","");
								  }
								);
						
				}
			});

	});
	//TABS 10 - Video
	$('#tabs10_Video').click(function() {
		$('#titolo_10').val("");
		$('#descrizione_10').val("");
		$('#video_10').val("");
		$('#tipo_video').val("");
		
		$('#tbodyVideo').html("");
		//ripristina per Inserimento
		$("#video_10").removeAttr('disabled');
		$("#tipo_video").removeAttr('disabled');
		$("#submit_10").show();
		$("#reset_10").show();
		$("#submit_10_edit").hide();
		$("#id_10_edit").val(00);
		
		var varData = 'tabs=10';
		$.ajax({
				type: "POST",
				url:'./ajax/process_refresh.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

						$(resultXML).find('response').each(function(){
							$(this).children('riga').each(function(){
								$('#tbodyVideo').append('<tr>'+
										'<td style="text-align:center;color:#FF0000;">'+$(this).attr('id')+'</td>'+
										'<td>'+$(this).attr('titolo')+'</td>'+
										'<td>'+$(this).text()+'</td>'+
										'<td>'+$(this).attr('tipo')+'</td>'+
										'<td style="text-align:center;"><img src="./images/delete.png" style="cursor:pointer;" class="ico_delete" alt="delete" title="tabs10;'+$(this).attr('id')+'" /></td>'+
										'<td style="text-align:center;"><img src="./images/edit.png" style="cursor:pointer;" class="ico_edit" alt="edit" title="tabs10;'+$(this).attr('id')+'" /></td>'+
									'</tr>'				
								);
							});
						});
						$("#tbodyVideo tr").hover(
								  function () {
									  jQuery(this).css("background","#ACACAC");
								  }, 
								  function () {
									  jQuery(this).css("background","");
								  }
								);
						
				}
			});
		
		
		
	});
		
		
});