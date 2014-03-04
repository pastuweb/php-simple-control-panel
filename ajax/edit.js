$(function() {		
	//Delete del record selezionato
	var array_dati_delete = new Array();
	var tabella = "pubblicita";
	var idrecord = "1";		
		
		
	$('#tabs').on("click", ".ico_edit",function() {
		//alert(""+$(this).attr("title"));
		
		array_dati_delete = $(this).attr("title").split(";");
		
		if(array_dati_delete[0] == "tabs1"){
			tabs = "1";
		}else if(array_dati_delete[0] == "tabs2"){
			tabs = "2";
		}else if(array_dati_delete[0] == "tabs3"){
			tabs = "3";
		}else if(array_dati_delete[0] == "tabs5"){
			tabs = "5";
		}else if(array_dati_delete[0] == "tabs6"){
			tabs = "6";
		}else if(array_dati_delete[0] == "tabs7"){
			tabs = "7";
		}else if(array_dati_delete[0] == "tabs9"){
			tabs = "9";
		}else if(array_dati_delete[0] == "tabs10"){
			tabs = "10";
		}
		
		idrecord = ""+array_dati_delete[1];
		var varData = 'idrecord='+parseInt(idrecord)+'&tabs='+tabs;
		$.ajax({
				type: "POST",
				url:'./ajax/process_edit.php',
				data: varData,
				dataType: "xml",
				success: function(resultXML) {

					$(resultXML).find('response').each(function(){
						$(this).children('edit').each(function(){
							$(this).children('riga').each(function(){
								//edit
								if(array_dati_delete[0] == "tabs1"){
									$("#titolo_1").val($(this).attr('titolo'));
									$("#url_1").val($(this).attr('url').substring(7));
									$("#immagine_1").attr('disabled', 'disabled');
									$("#submit_1").hide();
									$("#reset_1").hide();
									
									$("#submit_1_edit").show();
									$("#id_1_edit").val(idrecord);
									
								}else if(array_dati_delete[0] == "tabs2"){
									$("#titolo_2").val($(this).attr('titolo'));
									$("#url_2").val($(this).attr('url').substring(7));
									$("#tipo_links").attr('disabled', 'disabled');
									$("#submit_2").hide();
									$("#reset_2").hide();
									
									$("#submit_2_edit").show();
									$("#id_2_edit").val(idrecord);
								}else if(array_dati_delete[0] == "tabs3"){
									$("#titolo_3").val($(this).attr('titolo'));
									$("#url_3").val($(this).attr('url').substring(7));
									$("#immagine_3").attr('disabled', 'disabled');
									$("#pdf_zip_3").attr('disabled', 'disabled');
									$("#submit_3").hide();
									$("#reset_3").hide();
									
									$("#submit_3_edit").show();
									$("#id_3_edit").val(idrecord);
								}else if(array_dati_delete[0] == "tabs5"){
									$("#titolo_5").val($(this).attr('titolo'));
									$("#descrizione_5").val($(this).text());
									$("#foto_5").attr('disabled', 'disabled');
									$("#tipo_foto").attr('disabled', 'disabled');
									$("#submit_5").hide();
									$("#reset_5").hide();
									
									$("#submit_5_edit").show();
									$("#id_5_edit").val(idrecord);
								}else if(array_dati_delete[0] == "tabs6"){
									$("#titolo_6").val($(this).attr('titolo'));
									$("#url_6").val($(this).attr('url').substring(7));
									$("#descrizione_6").val($(this).text());
									$("#pdf_zip_6").attr('disabled', 'disabled');
									$("#tipo_downloads").attr('disabled', 'disabled');
									$("#submit_6").hide();
									$("#reset_6").hide();
									
									$("#submit_6_edit").show();
									$("#id_6_edit").val(idrecord);
								}else if(array_dati_delete[0] == "tabs7"){
									$("#titolo_7").val($(this).attr('titolo'));
									$("#url_7").val($(this).attr('url').substring(7));
									$("#descrizione_7").val($(this).text());
									$("#pdf_zip_7").attr('disabled', 'disabled');
									$("#immagine_7").attr('disabled', 'disabled');
									$("#tipo_lavori").attr('disabled', 'disabled');
									$("#submit_7").hide();
									$("#reset_7").hide();
									
									$("#submit_7_edit").show();
									$("#id_7_edit").val(idrecord);
								}else if(array_dati_delete[0] == "tabs9"){
									$("#titolo_9").val($(this).attr('titolo'));
									$("#prezzo_9").val($(this).attr('prezzo'));
									$("#descrizione_9").val($(this).text());
									$("#tipo_listino").attr('disabled', 'disabled');
									$("#submit_9").hide();
									$("#reset_9").hide();
									
									$("#submit_9_edit").show();
									$("#id_9_edit").val(idrecord);
								}else if(array_dati_delete[0] == "tabs10"){
									$("#titolo_10").val($(this).attr('titolo'));
									$("#descrizione_10").val($(this).text());
									$("#video_10").attr('disabled', 'disabled');
									$("#tipo_video").attr('disabled', 'disabled');
									$("#submit_10").hide();
									$("#reset_10").hide();
									
									$("#submit_10_edit").show();
									$("#id_10_edit").val(idrecord);
								}
							});
						});
					});
						
				}
			});
			
	});

		
});