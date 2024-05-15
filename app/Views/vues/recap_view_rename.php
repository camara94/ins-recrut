

<div style="width:845px; margin:auto; margin-top:30px; padding-top:30px; padding-bottom:20px;background-color:#f7f7f9; margin-bottom:20px">
    <?php if($_SESSION['statusMsg']): ?>
    <p  class="error_widget " style="background-color: green"><?php echo $_SESSION['statusMsg']; ?></p>
    <?php endif; ?>
<!--    --><?php //echo validation_errors('<div class="error">', '</div>'); ?>
    <div style="width: 600px; margin-left: 122px; margin-right: 122px">
        <?php if($_SESSION['data']): ?>
            <?php $data = $_SESSION['data']; ?>
        <!--        information sur le postulant -->
        <div class="top-30">
            <div style="color: #FF0000;font-size: 16px;font-weight: bold;margin-left:-0px; margin-bottom: 5px; text-align:left">
                IDENTITE</div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-6 control-label text-bold">MATRICULE</label>
                <div class="col-sm-6"><?php echo $data->matricule;?></div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-6 control-label text-bold">NOM</label>
                <div class="col-sm-6"><?php echo $data->nom;?></div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-6 control-label text-bold">PRENOMS</label>
                <div class="col-sm-6"><?php echo $data->prenoms;?></div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-6 control-label text-bold">DATE DE NAISSANCE (JJ/MM/AAAA)</label>
                <div class="col-sm-6"><?php echo $data->date_naiss;?></div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-6 control-label text-bold">LIEU DE NAISSANCE</label>
                <div class="col-sm-6"><?php echo $data->lieu_naiss;?></div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-6 control-label text-bold">CONTACT</label>
                <div class="col-sm-6"><?php echo $data->contact;?></div>
            </div>

        </div>

       <?php endif; ?>

        <div class="form-group top-30" style="text-align:center; color:red;font-weight: bold">
            Veuillez noter votre numéro de matricule qui vous servira pendant la phase de prétest si vous êtes retenu
        </div>


    </div>
</div>

