<div  style="margin:auto; margin-top:30px; padding-top:30px; padding-bottom:20px;background-color:#f7f7f9; margin-bottom:20px">
      <div class="top-10" >
        <h3 class="text-uppercase text-center text-danger"> <b> Verification des Resultats </b> </h3>
            <!-- <div style="color: #FF0000;font-size: 16px;font-weight: bold;margin-left:-0px; margin-bottom: 5px; text-align:center">
                Verification du Resultat
            </div> -->
      </div>
	<?php 
	    $attributes = array('class' => 'form-horizontal form_up top-20', 'id' => 'multiphase', 'enctype'=>'multipart/form-data');
		echo form_open('getcheckapp', $attributes);
	?>
        
    <div class="top-30">
        <div class="form-group">
            <label for="searchapp" class="col-sm-offset-3 col-sm-6 control-label text-bold hide">
                Saisissez votre matricule ou téléphone ou email 
                <span style="color:red">(*)</span>
            </label>
            <div class="col-sm-offset-3 col-sm-6 text-center">
                <input type="text" id="searchapp" name="searchapp" class="form-control input-lg text-center" placeholder="Saisissez votre matricule ou téléphone ou email" required>
            </div>
        </div>
    </div>

    <div class="form-group top-30" > 
        <div class="col-sm-offset-3 col-sm-6 text-center">
            <input type="submit" name="formSubmitUpRecep" class="btn btn-default btn-lg" style="background-color:#006700; color:white" value="RECHERCHER" />
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