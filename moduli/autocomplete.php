<?php if($login == 1){?>		
		
        
        <?php if($flag_listino == 1){ ?>
		var elencoTipoListinoIncremento = new Array();
		var elencoTipoListinoCifra = new Array();
			<?php 
				while($row_listino = mysql_fetch_array($result_tipo_listino)){
					extract($row_listino);
			?>
			elencoTipoListinoIncremento.push("<?php echo $tipo?>");
			<?php } ?>
        
        
        $( "#tipo_listino_incremento" ).autocomplete({
         	source: elencoTipoListinoIncremento,
         	autoFocus: true
        });
        
        <?php 
        		$i = 0.10;
				while($i<=1.00){
		?>
        	elencoTipoListinoCifra.push("<?php echo  number_format($i, 2, '.', ''); ?>");
         <?php 
         		$i = $i + 0.10;
				} ?>
        $( "#tipo_listino_cifra" ).autocomplete({
         	source: elencoTipoListinoCifra,
         	autoFocus: true
        });
        <?php } ?>
        
        
<?php }?>	