
	<!-- Help Dialog -->
	<div id="help_dialog" title="Contattami">
			<p><strong style="color:#FF0000;">Indicare il Nome:</strong></p>
			<p><input  name="txtnome_c" id="txtnome_c" type="text" maxlength="30" size="30"></p>
			<p><strong style="color:#FF0000;">Indirizzo Email:</strong></p>
			<p><input  name="txtemail_c" id="txtemail_c" type="text" maxlength="30" size="30"></p>
			<p><strong style="color:#FF0000;">Oggetto del messaggio:</strong></p>
			<p><input  name="txtogg_c" id="txtogg_c" type="text"  maxlength="30" size="30"></p>
			<p><strong style="color:#FF0000;">Inserire il messaggio:</strong></p>
			<p><textarea name="txttesto_c" id="txttesto_c" rows="3" cols="30">testo</textarea></p>
			<p id="result_email" style="display:none;text-align:center;color:#088A29;font-weight:bold;background:#FFFFFF;font-size:13px;"></p>
			
			<div style="float:right;">
				<button  id="inviaEmail" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" style="padding:3px;">Invia</button>
				<button  id="resetEmail" class="ui-button ui-widget  ui-corner-all ui-button-text-only pulsanti" style="padding:3px;">Reset</button>
			</div>
	</div>
	
	<!-- Errore Dialog -->
	<div id="errore_dialog" title="Errore">
			<p id="descrizioneErrore" style="color:#FF0000;font-size:15px;"></p>
	</div>
