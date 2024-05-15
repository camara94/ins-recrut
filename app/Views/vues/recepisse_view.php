<!-- <div style="margin:auto; margin-top:30px; padding-top:30px; padding-bottom:20px;background-color:#f7f7f9; margin-bottom:20px"> -->
<div class="container">
    <div class="row">  
    <div class="col-sm-3"> &nbsp; </div> 
    <div class="col-sm-6">  
        <div class="top-10">
            <div style="color: #FF0000;font-size: 16px;font-weight: bold;margin-left:-0px; margin-bottom: 5px; text-align:center"> RECUPERATION MON RECEPISSE</div>
        </div>
        <?php 
            $attributes = array('class' => 'form-horizontal form_up top-20', 'id' => 'multiphase', 'enctype'=>'multipart/form-data');
            echo form_open('getRecepisse', $attributes);

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
            <label for="id_projet" class="col-sm-12 text-bold text-center"> 
                <h2>Selectionnez le poste </h2>            
            </label>
            <div class="col-sm-12">
                <?php // echo form_dropdown('id_projet', $status, '', 'class="form-control " '); ?>

                <select class="form-control" name="id_projet" id="id_projet" required> 
                    <option value="0"></option>
                    <?php 
                        foreach($lists as $list){
                            echo'<option value="'.$list['id'].'">'.strtoupper($list['NomProjet']).'</option>';
                        }
                    ?>
                </select>                                
            </div>
        </div>

        <div class="top-30">
            <div class="form-group">
                <label for="contact_1x" class="col-sm-12 text-bold text-center">
                    <h2>Saisissez votre numéro de téléphone, numéro d'inscription ou email </h2>
                </label>
                <div class="col-sm-12">
                    <input type="text" id="contact_1x" name="contact_1x" class="form-control phoner" required>
                </div>
            </div>
        </div>

        <div class="form-group top-30" style="margin-bottom:10px"> 
            <?php if(isset($_SESSION['errorRecepisse'])){ ?>   
                <h2 class="text-danger text-center text-bold"> Votre inscription est introuvable </h2>
            <?php }?>
        </div>

        <div class="form-group top-30" style="margin-bottom:50px"> 
            <div class="col-sm-offset-5 col-sm-7">
                <!-- <input type="submit" name="formSubmitUpRecep" class="btn btn-primary btn-lg" value="Trouver" /> -->
                <button type="submit" name="formSubmitUpRecep" class="btn btn-primary btn-lg"> <span class="glyphicon glyphicon-search" aria-hidden="true"></span> Trouver </button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>  
    </div>  
</div>

<script src="<?php echo base_url().'assets/js/jquery-mask.js';?>"></script>
<script>
    // $('form.form_up .phoner').mask ('+224 600-00-00-00');
	// $(document).ready(function() {
	// 	$('div#m_plateforme').css('display','none');
	// });
	
</script>