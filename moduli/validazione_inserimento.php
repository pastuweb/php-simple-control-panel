<?php if($login == 1){?>	

		<?php if($flag_pubblicita == 1){ ?>
        $( "#submit_1" ).click(function(){
        	
        	 var temp_tit = $("#titolo_1" ).val(); //Obbligatorio
        	 var temp_url = $("#url_1" ).val();
        	         	 
        	if(temp_tit != ""){
        		if( temp_url.indexOf("http") != -1 ){
        			$( "#descrizioneErrore" ).html("Errore: nell'url NON deve comparire http:// .");
         			$( "#errore_dialog" ).dialog( "open" );
					event.preventDefault();
        		}else{
         			//OK
         			$( "#vero_submit_1" ).trigger('click');
         		}
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        $( "#submit_1_edit" ).click(function(){
        	
        	 var temp_tit = $("#titolo_1" ).val(); //Obbligatorio
        	 var temp_url = $("#url_1" ).val();
        	         	 
        	if(temp_tit != ""){
        		if( temp_url.indexOf("http") != -1 ){
        			$( "#descrizioneErrore" ).html("Errore: nell'url NON deve comparire http:// .");
         			$( "#errore_dialog" ).dialog( "open" );
					event.preventDefault();
        		}else{
         			//OK
         			$( "#vero_submit_1" ).trigger('click');
         		}
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
       //controlla immagine
		$('#immagine_1').on('focusout',function() {
			var temp_img = $("#immagine_1" ).val();
			if(temp_img.indexOf(".png") !=-1 || temp_img.indexOf(".PNG") !=-1 || temp_img == ""){
				//OK
			}else{
				$( "#descrizioneErrore" ).html("Errore: sono accettate solo .png .");
				$("#immagine_1" ).val("");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
			}
		});
        <?php } ?>
        
        <?php if($flag_links == 1){ ?>
        $( "#submit_2" ).click(function(){
        	
        	 var temp_tit = $("#titolo_2" ).val(); //Obbligatorio
        	 var temp_url = $("#url_2" ).val(); //Obbligatorio
        	 var temp_tipo = $("#tipo_links" ).val(); //Obbligatorio
        	         	 
        	if(temp_tit != "" && temp_url != "" && temp_url.indexOf("http") == -1 && temp_tipo != ""){
         		//OK
         		$( "#vero_submit_2" ).trigger('click');
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori e nell'url NON deve comparire http://.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        $( "#submit_2_edit" ).click(function(){
        	
        	 var temp_tit = $("#titolo_2" ).val(); //Obbligatorio
        	 var temp_url = $("#url_2" ).val(); //Obbligatorio
        	         	 
        	if(temp_tit != "" && temp_url != "" && temp_url.indexOf("http") == -1){
         		//OK
         		$( "#vero_submit_2" ).trigger('click');
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori e nell'url NON deve comparire http://.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        <?php } ?>
        
        <?php if($flag_attestati == 1){ ?>
        $( "#submit_3" ).click(function(){
        	
        	 var temp_tit = $("#titolo_3" ).val(); //Obbligatorio
        	 var temp_url = $("#url_3" ).val();
        	         	 
        	if(temp_tit != ""){
        		if( temp_url.indexOf("http") != -1 ){
        			$( "#descrizioneErrore" ).html("Errore: nell'url NON deve comparire http:// .");
         			$( "#errore_dialog" ).dialog( "open" );
					event.preventDefault();
        		}else{
         			//OK
         			$( "#vero_submit_3" ).trigger('click');
         		}
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        $( "#submit_3_edit" ).click(function(){
        	
        	 var temp_tit = $("#titolo_3" ).val(); //Obbligatorio
        	 var temp_url = $("#url_3" ).val();
        	         	 
        	if(temp_tit != ""){
        		if( temp_url.indexOf("http") != -1 ){
        			$( "#descrizioneErrore" ).html("Errore: nell'url NON deve comparire http:// .");
         			$( "#errore_dialog" ).dialog( "open" );
					event.preventDefault();
        		}else{
         			//OK
         			$( "#vero_submit_3" ).trigger('click');
         		}
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        //controlla immagine
		$('#immagine_3').on('focusout',function() {
			var temp_img = $("#immagine_3" ).val();
			if(temp_img.indexOf(".png") !=-1 || temp_img.indexOf(".PNG") !=-1 || temp_img == ""){
				//OK
			}else{
				$( "#descrizioneErrore" ).html("Errore: sono accettate solo .png .");
				$("#immagine_3" ).val("");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
			}
		});
		//controlla PDF e ZIP
		$('#pdf_zip_3').on('focusout',function() {
			var temp_pdf_zip = $("#pdf_zip_3" ).val();
			if(temp_pdf_zip.indexOf(".pdf") !=-1 || temp_pdf_zip.indexOf(".PDF") !=-1 
				|| temp_pdf_zip.indexOf(".zip") !=-1 || temp_pdf_zip.indexOf(".ZIP") !=-1 
				|| temp_pdf_zip == ""){
				//OK
			}else{
				$( "#descrizioneErrore" ).html("Errore: sono accettate solo .pdf o .zip .");
				$("#pdf_zip_3" ).val("");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
			}
		});
        <?php } ?>
        
         <?php if($flag_foto == 1){ ?>
        $( "#submit_5" ).click(function(){
        	
        	 var temp_tit = $("#titolo_5" ).val(); //Obbligatorio
        	 var temp_foto = $("#foto_5" ).val();//Obbligatorio
        	 var temp_tipo = $("#tipo_foto" ).val(); //Obbligatorio
        	         	 
        	if(temp_tit != "" && temp_tipo != "" && (temp_foto.indexOf(".png") != -1 || temp_foto.indexOf(".PNG") != -1 || temp_foto.indexOf(".jpg") != -1 || temp_foto.indexOf(".JPG") != -1) ){
         		//OK
         		$( "#vero_submit_5" ).trigger('click');
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori la foto deve essere un .png o .jpg.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        $( "#submit_5_edit" ).click(function(){
        	
        	 var temp_tit = $("#titolo_5" ).val(); //Obbligatorio
        	         	 
        	if(temp_tit != "" ){
         		//OK
         		$( "#vero_submit_5" ).trigger('click');
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        <?php } ?>
        
        <?php if($flag_downloads == 1){ ?>
        $( "#submit_6" ).click(function(){
        	
        	 var temp_tit = $("#titolo_6" ).val(); //Obbligatorio
        	 var temp_tipo = $("#tipo_downloads" ).val(); //Obbligatorio
        	 var temp_url = $("#url_6" ).val();
        	         	 
        	if(temp_tit != "" && temp_tipo != ""){
        		if( temp_url.indexOf("http") != -1 ){
         			$( "#descrizioneErrore" ).html("Errore: nell'url NON deve comparire http:// .");
         			$( "#errore_dialog" ).dialog( "open" );
					event.preventDefault();
         		}else{
         			//OK
         			$( "#vero_submit_6" ).trigger('click');
         		}
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        $( "#submit_6_edit" ).click(function(){
        	
        	 var temp_tit = $("#titolo_6" ).val(); //Obbligatorio
        	 var temp_url = $("#url_6" ).val();
        	         	 
        	if(temp_tit != "" ){
        		if( temp_url.indexOf("http") != -1 ){
         			$( "#descrizioneErrore" ).html("Errore: nell'url NON deve comparire http:// .");
         			$( "#errore_dialog" ).dialog( "open" );
					event.preventDefault();
         		}else{
         			//OK
         			$( "#vero_submit_6" ).trigger('click');
         		}
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        
		//controlla PDF e ZIP
		$('#pdf_zip_6').on('focusout',function() {
			var temp_pdf_zip = $("#pdf_zip_6" ).val();
			if(temp_pdf_zip.indexOf(".pdf") !=-1 || temp_pdf_zip.indexOf(".PDF") !=-1 
				|| temp_pdf_zip.indexOf(".zip") !=-1 || temp_pdf_zip.indexOf(".ZIP") !=-1 
				|| temp_pdf_zip == ""){
				//OK
			}else{
				$( "#descrizioneErrore" ).html("Errore: sono accettate solo .pdf o .zip .");
				$("#pdf_zip_6" ).val("");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
			}
		});
        <?php } ?>
        
        <?php if($flag_lavori == 1){ ?>
        $( "#submit_7" ).click(function(){
        	
        	 var temp_tit = $("#titolo_7" ).val(); //Obbligatorio
        	 var temp_tipo = $("#tipo_lavori" ).val(); //Obbligatorio
        	 var temp_url = $("#url_7" ).val();
        	         	 
        	if(temp_tit != "" && temp_tipo != ""){
        		if( temp_url.indexOf("http") != -1 ){
         			$( "#descrizioneErrore" ).html("Errore: nell'url NON deve comparire http:// .");
         			$( "#errore_dialog" ).dialog( "open" );
					event.preventDefault();
         		}else{
         			//OK
         			$( "#vero_submit_7" ).trigger('click');
         		}
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        $( "#submit_7_edit" ).click(function(){
        	
        	 var temp_tit = $("#titolo_7" ).val(); //Obbligatorio
        	 var temp_url = $("#url_7" ).val();
        	         	 
        	if(temp_tit != "" ){
        		if( temp_url.indexOf("http") != -1 ){
         			$( "#descrizioneErrore" ).html("Errore: nell'url NON deve comparire http:// .");
         			$( "#errore_dialog" ).dialog( "open" );
					event.preventDefault();
         		}else{
         			//OK
         			$( "#vero_submit_7" ).trigger('click');
         		}
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        //controlla immagine
		$('#immagine_7').on('focusout',function() {
			var temp_img = $("#immagine_7" ).val();
			if(temp_img.indexOf(".png") !=-1 || temp_img.indexOf(".PNG") !=-1 || temp_img == ""){
				//OK
			}else{
				$( "#descrizioneErrore" ).html("Errore: sono accettate solo .png .");
				$("#immagine_7" ).val("");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
			}
		});
		//controlla PDF e ZIP
		$('#pdf_zip_7').on('focusout',function() {
			var temp_pdf_zip = $("#pdf_zip_7" ).val();
			if(temp_pdf_zip.indexOf(".pdf") !=-1 || temp_pdf_zip.indexOf(".PDF") !=-1 
				|| temp_pdf_zip.indexOf(".zip") !=-1 || temp_pdf_zip.indexOf(".ZIP") !=-1 
				|| temp_pdf_zip == ""){
				//OK
			}else{
				$( "#descrizioneErrore" ).html("Errore: sono accettate solo .pdf o .zip .");
				$("#pdf_zip_7" ).val("");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
			}
		});
        <?php } ?>
        
        
        <?php if($flag_listino == 1){ ?>
        $( "#submit_9" ).click(function(){
        	
        	 var temp_tit = $("#titolo_9" ).val(); //Obbligatorio
        	 var temp_prezzo = $("#prezzo_9" ).val(); //Obbligatorio
        	 var temp_tipo = $("#tipo_listino" ).val(); //Obbligatorio
        	         	 
        	if(temp_tit != ""  && temp_tipo != "" && temp_prezzo != "" && temp_prezzo > 0 ){
         		//OK
         		$( "#vero_submit_9" ).trigger('click');
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori e il prezzo deve essere un numero.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        $( "#submit_9_edit" ).click(function(){
        	
        	 var temp_tit = $("#titolo_9" ).val(); //Obbligatorio
        	 var temp_prezzo = $("#prezzo_9" ).val(); //Obbligatorio
        	         	 
        	if(temp_tit != ""  && temp_prezzo != "" && temp_prezzo > 0 ){
         		//OK
         		$( "#vero_submit_9" ).trigger('click');
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori e il prezzo deve essere un numero.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        <?php } ?>

        
        <?php if($flag_video == 1){ ?>
        $( "#submit_10" ).click(function(){
        	
        	 var temp_tit = $("#titolo_10" ).val(); //Obbligatorio
        	 var temp_tipo = $("#tipo_video" ).val(); //Obbligatorio
        	 var temp_video = $("#video_10" ).val(); //Obbligatorio
        	         	 
        	if(temp_tit != "" && temp_tipo != "" && (temp_video.indexOf(".mp4") != -1 || temp_video.indexOf(".MP4") != -1) ){
         			//OK
         			$( "#vero_submit_10" ).trigger('click');
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori e il video deve essere .mp4.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        
        $( "#submit_10_edit" ).click(function(){
        	
        	 var temp_tit = $("#titolo_10" ).val(); //Obbligatorio
        	         	 
        	if(temp_tit != ""){
         			//OK
         			$( "#vero_submit_10" ).trigger('click');
         	}else{
         		$( "#descrizioneErrore" ).html("Errore: alcuni campi sono obbligatori.");
         		$( "#errore_dialog" ).dialog( "open" );
				event.preventDefault();
         	}
         	
        });
        <?php } ?>

<?php }?>	