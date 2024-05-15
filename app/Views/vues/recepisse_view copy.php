<div  style="margin:auto; margin-top:30px; padding-top:30px; padding-bottom:20px;background-color:#f7f7f9; margin-bottom:20px">
      <div class="top-10" >
            <div style="color: #FF0000;font-size: 16px;font-weight: bold;margin-left:-0px; margin-bottom: 5px; text-align:center">
                RECUPERATION MON RECEPISSE</div>
      </div>
	<?php 
	$attributes = array('class' => 'form-horizontal form_up top-20', 'id' => 'multiphase', 'enctype'=>'multipart/form-data');
			echo form_open('getRecepisse', $attributes);
	?>
                  
    <?php
    $status = array(
        '' => "Selectionnez le projet",
        //'12' => 'Géomaticiens',
        //'13' => "Agents Préparateurs ",
        '14' => 'AGENT DE COLLECTE DE LA CARTOGRAPHIE CENSITAIRE PILOTE',
        // '9' => 'Agents de collecte',
        // '11' => 'Assistants TIC',
        //'15' => 'Superviseur',
    );
    ?>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-4 control-label text-bold">Profil <span
                    style="color:red">(*)</span></label>
        <div class="col-sm-8">
            <?php echo form_dropdown('id_projet', $status, '', 'class="form-control " '); ?>
        </div>
    </div>

<div class="top-30">
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-4 control-label text-bold">VOTRE NUMERO DE TELEPHONE A L'INSCRIPTION <span
                    style="color:red">(*)</span></label>
        <div class="col-sm-8">
            <input type="text" id="contact_1x" name="contact_1x" class="form-control phoner"   placeholder=""    required>
        </div>
    </div>
</div>
<div class="form-group top-30" > 
<div class="col-sm-offset-5 col-sm-7">
        <input type="submit" name="formSubmitUpRecep" class="btn btn-default"  style="background-color:#006700; color:white" 
        value="RECHERCHER" />
</div>
</div>
	<?php echo form_close(); ?>

</div>


<script src="<?php echo base_url().'assets/js/jquery-mask.js';?>"></script>
<script>
  $('form.form_up .phoner').mask ('+224 600-00-00-00');
	$(document).ready(function() {
		$('div#m_plateforme').css('display','none');
	});
	
</script>