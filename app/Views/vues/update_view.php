<div style="margin-bottom:25px;text-align:center; font-size:18px; text-decoration:underline;">MODIFICATION DES INFORMATIONS RENSEIGNEES</div>
<?php $drop_projet = dropdownProjetActif();?>
<form action="<?php echo BASE_URL.'recrutement.php'?>" method="post" enctype="multipart/form-data"
      class="form-horizontal form_update_recrut">

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-4 control-label text-bold">Selectionnez un projet <span style="color:red">(*)</span></label>
        <div class="col-sm-5">
            <?php echo form_dropdown('id_projet', $drop_projet, '','class="form-control drop_list_projet_actif" ');?>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-4 control-label text-bold">Matricule <span style="color:red">(*)</span></label>
        <div class="col-sm-5">
            <input type="text" name="matricule" class="form-control"  id="" placeholder="" style="text-transform:uppercase"  >
        </div>
    </div>
    <div class="form-group top-30" >

        <div class="col-sm-offset-5 col-sm-7">
            <input type="submit" name="formSubmitUpdate" class="btn btn-default" value="Rechercher Mes Informations" disabled="disabled" />
        </div>
    </div>

</form>

<script>
    $(document).ready(function($) {
        $('form input[name=formSubmitUpdate]').removeAttr('disabled');
    })
</script>