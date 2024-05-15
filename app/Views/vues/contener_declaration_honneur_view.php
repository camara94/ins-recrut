<div style="display: block;text-align: center;background: #2b542c;padding: 5px;color:white;font-weight: bold">SITUATION GEOGRAPHIQUE</div>


 <div class="form-group" style="margin-top:5px;">
    <label for="selectDep" class="col-sm-4 control-label text-bold">
    <?php if($projet['id'] == 19):?>
        PREFECTURE DE TRAVAIL SOUHAITÉ
    <?php else:?>  
        PREFECTURE DE RESIDENCE ACTUELLE
    <?php endif;?>  

    <span style="color:red">(*)</span></label>
    <div class="col-sm-8">
        <?php // echo form_dropdown('departement3', $departementsAll, '', 'class="form-control drop_departement3" '); ?>
    
        <select name="departement3" id="selectDep" class="form-control">
            <option class="optElem0" value="0">Selectionner une Préfecture</option>
            <?php foreach ($listDep as $key => $list):?>
                <option value="<?= $list['CodDep'] ?>" class="optElem<?= strtoupper($list['NomDep'])?>"> <?= strtoupper($list['NomDep'])?> </option>
            <?php endforeach;?>  
        </select>
    
    </div>
 </div>
 <div class="form-group">
    <label for="selectSP" class="col-sm-4 control-label text-bold">
    <?php if($projet['id'] == 19):?>
        SOUS-PREFECTURE DE TRAVAIL SOUHAITÉ
    <?php else:?>  
        SOUS-PREFECTURE DE RESIDENCE ACTUELLE 
    <?php endif;?>      
    
    <span style="color:red">(*)</span></label>

     <div class="col-sm-8">
        <h1><?php // var_dump($listSP); ?></h1>
        <?php //echo form_dropdown('sousprefecture3', $sousprefecturesAll, '', 'class="form-control drop_ssp3" disabled="disabled"'); ?>
        <?php// echo form_dropdown('sousprefecture300', $sousprefecturesAll, '', 'class="form-control drop_ssp300"'); ?>
        <?php // diatas echo form_dropdown('sousprefecture300', $sousprefecturesAll, '', 'class="form-control drop_ssp300"'); ?>
        
        <select name="sousprefecture3" id="selectSP" class="form-control">
            <option class="optElem0" value="0">Selectionner une Sous-Préfecture</option>
            <?php foreach ($listSP as $key => $list):?>
                <option value="<?= $list['CodSp'] ?>" class="optElem<?= strtoupper($list['CodDep']) ?>"> <?= strtoupper($list['NomSp']) ?> </option>
            <?php endforeach;?>  
        </select>

    </div>
</div>

<div class="form-group <?php if($projet['id'] != 19) echo"hidden"; ?>">
    <label for="inputPassword3" class="col-sm-4 control-label text-bold">Situation de Résidence <span style="color:red">(*)</span></label>
    <div class="col-sm-8">
        <label for="residence_situation1">
            <input type="radio" name="residence_situation" id="residence_situation1" autocomplete="off" style="display:inline;" value="1" checked required> 
            Resident de la Sous-préfecture ou Commune de <b class="lbl_sr_sprefect"> ______ </b>
        </label> <br>
        <label for="residence_situation2">
            <input type="radio" name="residence_situation" id="residence_situation2" autocomplete="off" style="display:inline;" value="2"> 
            Ressortissant de la Sous-préfecture ou Commune de <b class="lbl_sr_sprefect"> ______ </b>
        </label> <br>
        <label for="residence_situation3">
            <input type="radio" name="residence_situation" id="residence_situation3" autocomplete="off" style="display:inline;" value="3"> 
            Resident de la Préfecture <b class="lbl_sr_prefect"> ______ </b>
        </label>
    </div>
</div> 

<div class="form-group">
    <label for="inputPassword3" class="col-sm-4 control-label text-bold">DATE DU JOUR (JJ/MM/AAAA)<span style="color:red">(*)</span></label>
    <div class="col-sm-8">
        <input type="text" id="dateSignature" name="date_jour_decla" class="form-control" id="" placeholder="" required>
    </div>
</div>

<div id="<?= $projet['id'] ?>" style="margin:0; margin-top:20px;padding-bottom:10px;font-weight:bold">
    <input type="checkbox" name="ludeclaration" value="1" required>J'ai lu la declaration et j'approuve <br>
</div>

<hr style="border-top: 1px solid #231f1f;">

<script>
    $(document).ready(function(){
        $("#selectDep").change(function(){$idElem=$(this).val(); 
            $("#selectSP").val("0"); $("#selectSP option").hide(); 
            $('#selectSP .optElem'+$idElem+', #selectSP .optElem0').show();
            $(".lbl_sr_prefect").html($('#selectDep option:selected').text());
        })

        $("#selectSP").change(function(){$idElem=$(this).val(); 
            $(".lbl_sr_sprefect").html($('#selectSP option:selected').text());
        })

        $('form.form_recrut #dateSignature').mask ('00/00/0000');
        $("form.form_recrut #dateSignature").on("focusout",function(){
            var d1 = $(this).val();
            var d1s = d1.split("/");
            var d1f = d1s[1]+"/"+d1s[0]+"/"+d1s[2];
            //controle difference d'age
            var yrAgt = d1s[2];
            var monthAgt = parseInt(d1s[1]);
            if (yrAgt != 2024 || monthAgt > 12 || monthAgt < 1) {$(this).focus();
                $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
            } 
            else{
                $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
            }
        });

        $("form.form_recrut input[name=ludeclaration]").on('click',function(){
            if($(this).is(':checked')){
                var name = $('form.form_recrut input[name=name_postulant]').val();
                var surname = $('form.form_recrut input[name=surname_postulant]').val();
                var dateNaiss = $('form.form_recrut input[name=date_naiss]').val();
                var lieuNaiss = $('form.form_recrut input[name=lieu_naissance]').val();
                 var sex = $('form.form_recrut input[name=sex]:checked').val();
                 var sexe = "MASCULIN";
                 if(sex == 2){
                    sexe = "FEMININ"
                 }
                var contactPerso = $('form.form_recrut input[name=contact_1]').val();
                var emailPerso = $('form.form_recrut input[name=email]').val();
                var NumCni = $('form.form_recrut input[name=numero_cni]').val();
                //var v = $("form.form_recrut input[name=niveau_etude]").val();
                var niveau_instruction = $("form.form_recrut select[name=niveau_etude] option:selected").text();
                var specialite = $('form.form_recrut input[name=last_diplome]').val();
                //var vS = $("form.form_recrut input[name=status]").val();
                var status = $("form.form_recrut select[name=status] option:selected").text();
                var first_langue = $('form.form_recrut select[name=first_langue] option:selected').text();
                var second_langue = $('form.form_recrut select[name=second_langue] option:selected').text();
                //var reg = $("form.form_recrut select[name=region]").val();
                //var region = $("form.form_recrut select[name=region] option:selected").text();
                //var dept = $("form.form_recrut input[name=departement]").val();
                var departement = $("form.form_recrut select[name=departement] option:selected").text();
                //var sp = $("form.form_recrut input[name=sousprefecture]").val();
                var sousprefecture = $("form.form_recrut select[name=sousprefecture] option:selected").text();
                //var localite1 = $('form.form_recrut input[name=lieuresidence]').val();
                //var localite2 = $('form.form_recrut input[name=lieuresidence2]').val();
                //var localite3 = $('form.form_recrut input[name=lieuresidence3]').val();
                
                var NameTuteur = $('form.form_recrut input[name=nametuteurlegal]').val();
                var contactTuteur = $('form.form_recrut input[name=contact_2]').val();
                var NamePere = $('form.form_recrut input[name=namepere]').val();
                var NameMere = $('form.form_recrut input[name=namemere]').val();

                //mettre dans les labels
                $('form.form_recrut div#div_recapitulatif label#recap_name').html(name);
                $('form.form_recrut div#div_recapitulatif label#recap_surname').html(surname);
                $('form.form_recrut div#div_recapitulatif label#recap_datenaiss').html(dateNaiss);
                $('form.form_recrut div#div_recapitulatif label#recap_lieunaiss').html(lieuNaiss);
                $('form.form_recrut div#div_recapitulatif label#recap_sexe').html(sexe);
                $('form.form_recrut div#div_recapitulatif label#recap_contact').html(contactPerso);
                $('form.form_recrut div#div_recapitulatif label#recap_email').html(emailPerso);
                $('form.form_recrut div#div_recapitulatif label#recap_numcni').html(NumCni);
                $('form.form_recrut div#div_recapitulatif label#recap_niveauinstruction').html(niveau_instruction);
                $('form.form_recrut div#div_recapitulatif label#recap_specialite').html(specialite);
                $('form.form_recrut div#div_recapitulatif label#recap_statut').html(status);
                $('form.form_recrut div#div_recapitulatif label#recap_firstlangue').html(first_langue);
                $('form.form_recrut div#div_recapitulatif label#recap_secondlangue').html(second_langue);
                //$('form.form_recrut div#div_recapitulatif label#recap_region').html(region);
                $('form.form_recrut div#div_recapitulatif label#recap_departement').html(departement);
                $('form.form_recrut div#div_recapitulatif label#recap_sousprefecture').html(sousprefecture);
                //$('form.form_recrut div#div_recapitulatif label#recap_localite1').html(localite1);
                //$('form.form_recrut div#div_recapitulatif label#recap_localite2').html(localite2);
                //$('form.form_recrut div#div_recapitulatif label#recap_localite3').html(localite3);
                $('form.form_recrut div#div_recapitulatif label#recap_nametuteur').html(NameTuteur);
                $('form.form_recrut div#div_recapitulatif label#recap_contacttuteur').html(contactTuteur);
                $('form.form_recrut div#div_recapitulatif label#recap_namepere').html(NamePere);
                $('form.form_recrut div#div_recapitulatif label#recap_namemere').html(NameMere);
                
            }
        })
    }); 
</script>