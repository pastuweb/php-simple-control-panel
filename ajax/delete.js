$(function() {		
	//Delete del record selezionato
	var array_dati_delete = new Array();
	var tabella = "pubblicita";
	var idrecord = "1";		
		
		
	$('#tabs').on("click", ".ico_delete",function() {
		//alert(""+$(this).attr("title"));
		
		array_dati_delete = $(this).attr("title").split(";");
		
		if(array_dati_delete[0] == "tabs1"){
			tabella = "pubblicita";
		}else if(array_dati_delete[0] == "tabs2"){
			tabella = "links";
		}else if(array_dati_delete[0] == "tabs3"){
			tabella = "attestati";
		}else if(array_dati_delete[0] == "tabs5"){
			tabella = "foto";
		}else if(array_dati_delete[0] == "tabs6"){
			tabella = "downloads";
		}else if(array_dati_delete[0] == "tabs7"){
			tabella = "lavori";
		}else if(array_dati_delete[0] == "tabs9"){
			tabella = "listino";
		}else if(array_dati_delete[0] == "tabs10"){
			tabella = "video";
		}
		
		idrecord = ""+array_dati_delete[1];
		var varData = 'idrecord='+parseInt(idrecord)+'&tabella='+tabella;
		$.ajax({
				type: "POST",
				url:'./ajax/process_delete.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('delete').each(function(){
							if($(this).text() == "OK"){
								//refresh
								if(array_dati_delete[0] == "tabs1"){
									$('#tabs1_Pubbl').trigger('click');
								}else if(array_dati_delete[0] == "tabs2"){
									$('#tabs2_Links').trigger('click');
								}else if(array_dati_delete[0] == "tabs3"){
									$('#tabs3_Attest').trigger('click');
								}else if(array_dati_delete[0] == "tabs5"){
									$('#tabs5_Foto').trigger('click');
								}else if(array_dati_delete[0] == "tabs6"){
									$('#tabs6_Download').trigger('click');
								}else if(array_dati_delete[0] == "tabs7"){
									$('#tabs7_Lavori').trigger('click');
								}else if(array_dati_delete[0] == "tabs9"){
									$('#tabs9_Listino').trigger('click');
								}else if(array_dati_delete[0] == "tabs10"){
									$('#tabs10_Video').trigger('click');
								}
							}
						});
					});
						
				}
			});
			
	});

		
});