<?php require_once('views/part_left.php'); ?>
<div style="margin-left:350px"> 
<div style="margin-bottom:25px;text-align:center; font-size:18px; text-decoration:underline;">VERIFICATION DU MATRICULE</div>
<?php //$drop_projet = dropdownProjetActif();?> 
<form id="form_matricule" action="<?php echo BASE_URL.'recrutement.php'?>" method="post" enctype="multipart/form-data"
      class="form-horizontal form_update_recrut">

    <div class="form-group" style="text-align:center">
        Veuillez saisir votre matricule afin de continuer le processus
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-4 control-label text-bold">Matricule <span style="color:red">(*)</span></label>
        <div class="col-sm-5">
            <input type="text" name="matricule" class="form-control"  id="" placeholder="" style="text-transform:uppercase"  >
        </div>
    </div>
    <div class="form-group top-30" >

        <div class="col-sm-offset-5 col-sm-7">
            <input type="submit" name="formSubmitMatricule" class="btn btn-default" value="Verification du Matricule" />
        </div>
    </div>     
</form>
</div>