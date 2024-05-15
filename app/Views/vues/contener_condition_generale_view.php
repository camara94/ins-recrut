<?php
?>

<div style="display: block;text-align: center;background: #2b542c;padding: 5px;color:white;font-weight: bold">CONDITIONS GENERALES</div>

<?php $niveau_projet = $_SESSION['niveau_projet'];  ?>
<?php if ($niveau_projet == 1 || $niveau_projet ==2): ?>

<div class="top-30 hidden">
    <div style="position:absolute;width:200px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #abc598;;margin-bottom: -45px;">
        LIEU D'AFFECTATION SOUHAITÉ
    </div>
</div>

<div style="width:645px; margin:auto; margin-top:5px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px" class="hidden">
    <div class="" style="margin-top:70px">
        <div class="col-xs-12">           
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">PREFECTURE D'
                    AFFECTATION(<span style="color:red;">*</span>)</label>
                <div class="col-sm-8">
                    <?php // echo form_dropdown('departement', $departements, '', 'class="form-control drop_departement" '); ?>
                </div>
            </div>
            <?php //if ($id_projet == 9): ?>
            <?php if ($niveau_projet == 2): ?>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">SOUS-PREFECTURE / COMMUNE D'
                    AFFECTATION (<span style="color:red;">*</span>)</label>
                <div class="col-sm-8">
                    <?php //echo form_dropdown('sousprefecture', $sousprefectures, '', 'class="form-control drop_ssp" disabled="disabled"'); ?>
                </div>
            </div>

            <?php endif; ?>
        </div>
        <div class="col-xs-12">
           
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">2ÈME PREFECTURE D'
                    AFFECTATION</label>
                <div class="col-sm-8">
                    <?php //echo form_dropdown('departement2', $departements, '', 'class="form-control drop_departement2"'); ?>
                </div>
            </div>
            <?php if ($niveau_projet == 2): ?>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">2ÈME SOUS-PREFECTURE / COMMUNE D'
                    AFFECTATION</label>
                <div class="col-sm-8">
                    <?php //echo form_dropdown('sousprefecture2', $sousprefectures, '', 'class="form-control drop_ssp2" '); ?>
                </div>
            </div>

            <?php endif; ?>
        </div>
        <div class="col-xs-12">
           
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">3ÈME PREFECTURE D'
                    AFFECTATION</label>
                <div class="col-sm-8">
                    <?php //echo form_dropdown('departement4', $departements, '', 'class="form-control drop_departement4"'); ?>
                </div>
            </div>
            <?php if ($niveau_projet == 2): ?>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">3ÈME SOUS-PREFECTURE / COMMUNE D'
                    AFFECTATION</label>
                <div class="col-sm-8">
                    <?php //echo form_dropdown('sousprefecture4', $sousprefectures, '', 'class="form-control drop_ssp4" '); ?>
                </div>
            </div>

            <?php endif; ?>
        </div>
    </div>
    <div style="clear:both"></div>
</div>    
<?php endif; ?>




















<div class="top-30">
    <div style="position:absolute;width:200px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #abc598;margin-bottom: -45px;">
        INFORMATIONS PERSONNELLES
    </div>
</div>

<div style="width:645px; margin:auto; margin-top:60px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
    <div style="width: 500px; margin-left: 52px; margin-right: 52px">
        <div id="div_second_pers">
            <div class="top-30">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">PHOTO D'IDENTITE
                        <span style="font-weight:500;">Format 35x45, Taille Maxi 2Mo en 
                        <span style="color:red;">jpeg,png,jpg </span> (<span style="color:red;">*</span>)</span>
                    </label>
                    <div class="col-sm-8">
                        <input type="file" name="userFiles1" class="form-control c_file_css" id="input_photo" placeholder="" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold"></label>
                    <div class="col-sm-8">
                        <img for="inputPassword3" class="col-sm-6 control-label text-bold" id="view_photo" src="<?php echo base_url('assets/images/icone_photo.jpg') ?>"/>
                    </div>
                </div>                
            
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">NOM <span
                                style="color:red">(*)</span></label>
                    <div class="col-sm-8">
                        <input type="text" name="name_postulant" class="form-control" pattern="[A-Z'\s]{1,}"
                                title="saisir en majuscule et sans accent"
                                id="name_postulant" placeholder="" oninput="this.value = this.value.toUpperCase()" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS <span
                                style="color:red">(*)</span></label>
                    <div class="col-sm-8">
                        <input type="text" name="surname_postulant" class="form-control" id="surname_postulant" placeholder=""
                                pattern="[A-Z'\s]{1,}" title="saisir en majuscule et sans accent" required oninput="this.value = this.value.toUpperCase()">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">DATE DE NAISSANCE
                        (JJ/MM/AAAA) <span style="color:red">(*)</span></label>
                    <div class="col-sm-8">
                        <input type="text" name="date_naiss" class="form-control" id="datepicker" placeholder=""
                                required title="saisir votre date de naissance">
                        <span id="idspanAge" class="fg-color-red hidden">vous devez avoir entre 18 et 55 ans maxi pour postuler, veuillez aussi respecter le format demandé</span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">LIEU DE NAISSANCE <span
                                style="color:red">(*)</span></label>
                    <div class="col-sm-8">
                        <input type="text" name="lieu_naissance" class="form-control" pattern="[A-Z\s]{1,}"
                                title="SAISIR EN MAJUSCULE ET SANS ACCENT"
                                id="" placeholder="" required oninput="this.value = this.value.toUpperCase()">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">SEXE <span
                                style="color:red">(*)</span></label>
                    <div class="col-sm-8">
                        <label class="radio-inline">
                            <input type="radio" id="inlineCheckbox1" name="sex" value="1" required> M
                        </label>
                        <label class="radio-inline">
                            <input type="radio" id="inlineCheckbox2" name="sex" value="2"> F
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top-30">
    <div style="position:absolute;width:200px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #abc598;margin-bottom: -45px;">
        VERIFICATION NUMERO TEL/CEL
    </div>
</div>

<div style="width:645px; margin:auto; margin-top:60px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
    <div style="width: 500px; margin-left: 52px; margin-right: 52px">
        <div id="div_second_pers">
            <!--        information sur le postulant -->
            <div class="form-group hidden">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">Avez-vous un numéro de téléphone ? <span style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox3" name="possedeNumTel" checked="checked" value="1" required> Oui
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckbox4" name="possedeNumTel" value="2"> Non
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="contact_1" class="col-sm-4 control-label text-bold">N° TELEPHONE <span style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" id="contact_1" name="contact_1" class="form-control phoner" placeholder="SAISIR VOTRE NUMERO DE TELEPHONE" required title="SAISIR VOTRE NUMERO DE TELEPHONE">
					<span id="idspantel" class="fg-color-red hidden">veuillez saisir les 9 chiffres de votre numéro de téléphone</span>
                </div>
            </div>

            <div class="form-group">
                <label for="phone_om" class="col-sm-4 control-label text-bold">N° ORANGE MONEY <span style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" id="phone_om" name="phone_om" class="form-control phoner" placeholder="SAISIR VOTRE NUMERO ORANGE MONEY" required title="SAISIR VOTRE NUMERO ORANGE MONEY">
					<span id="idspantel" class="fg-color-red hidden">veuillez saisir les 9 chiffres de votre numéro de téléphone</span>
                    <div class="form-text text-muted text-"> 
                        <input type="checkbox" name="confirmOM" value="1" required /> 
                        Je confirme que ce numéro Orange Money est le mien <span style="color:red">(*)</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="top-30">
    <div style="position:absolute;width:200px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #abc598;margin-bottom: -45px;">
        INFORMATION SUR LES PARENTS
    </div>
</div>

<div style="width:645px; margin:auto; margin-top:60px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
    <div style="width: 500px; margin-left: 52px; margin-right: 52px">
        <div id="div_second_pers">

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS ET NOM DU PERE <span style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" name="namepere" class="form-control" autocomplete="off"  id="" placeholder="SAISIR EN MAJUSCULE ET SANS CARACTERES SPECIAUX"
                           pattern="[A-Z'\s]{1,}" title="saisir en majuscule et sans caractères spéciaux"  oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS ET NOM DE LA MERE <span style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" name="namemere" class="form-control" autocomplete="off"  id="" placeholder="SAISIR EN MAJUSCULE ET SANS CARACTERES SPECIAUX"
                           pattern="[A-Z'\s]{1,}" title="saisir en majuscule et sans caractères spéciaux"  oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>


        </div>
    </div>
</div>

<div class="top-30">
    <div style="position:absolute;width:240px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #abc598;margin-bottom: -45px;">
        INFORMATION PERSONNES A CONTACTER 
    </div>
</div>

<div style="width:645px; margin:auto; margin-top:60px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
    <div style="width: 500px; margin-left: 52px; margin-right: 52px">
        <div id="div_second_pers">

            <!--        information sur le postulant -->

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS ET NOM DE LA 1ERE PERSONNE A CONTACTER EN CAS D'URGENCE <span style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" name="nametuteurlegal" class="form-control" autocomplete="off"  id="" placeholder="SAISIR EN MAJUSCULE ET SANS CARACTERES SPECIAUX"
                           pattern="[A-Z'\s]{1,}" title="saisir en majuscule et sans caractères spéciaux"  oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">CONTACT DE LA 1ÈRE PERSONNE A CONTACTER EN CAS D'URGENCE<span style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" id="contact_2" name="contact_2" class="form-control phoner"  id="" placeholder=""  
						   title="saisir le contact de votre tuteur légal" required>
					<span id="idspanteltut" class="fg-color-red hidden">veuillez saisir les 9 chiffres du numéro de téléphone</span>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS ET NOM DE LA 2ÈME PERSONNE A CONTACTER EN CAS D'URGENCE</label>
                <div class="col-sm-8">
                    <input type="text" name="nametuteurlegal2" class="form-control" autocomplete="off"  id="" placeholder="SAISIR EN MAJUSCULE ET SANS CARACTERES SPECIAUX"
                           pattern="[A-Z'\s]{1,}" title="saisir en majuscule et sans caractères spéciaux"  oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">CONTACT DE LA 2ÈME PERSONNE A CONTACTER EN CAS D'URGENCE</label>
                <div class="col-sm-8">
                    <input type="text" id="contact_22" name="contact_22" class="form-control phoner"  id="" placeholder=""  
						   title="" >
					<span id="idspanteltut2" class="fg-color-red hidden">veuillez saisir les 9 chiffres du numéro de téléphone</span>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="top-30">
    <div style="position:absolute;width:200px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #abc598;margin-bottom: -45px;">
        DISPONIBILITE
    </div>
</div>
<div style="width:645px; margin:auto; margin-top:60px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
  <div class="center-text top-10 bottom-10"><span style="color:red">(*)</span> Il s'agit de votre disponibilité entière et totale sur une durée minimale de 6 mois de façon continue sur le RGPH-4 ;</div>
    <div style="width: 500px; margin-left: 52px; margin-right: 52px">
        <div id="div_second_pers">
           <!--
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">PERIODE DE DISPONIBILITE (JJ/MM/AAAA) <span style="color:red">(*)</span></label>
                <div class="col-sm-1">De</div>
                <div class="col-sm-3">
                    <input type="text" name="date_disponibilite_deb" class="form-control"  id="datepicker2" placeholder="" required>
                </div>
                <div class="col-sm-1">A</div>
                <div class="col-sm-3">
                    <input type="text" name="date_disponibilite_fin" class="form-control"  id="datepicker3" placeholder="" required>
                </div>
            </div>
            -->
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">Etes vous disponible sur la période définie plus haut ? <span
                            style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckboxp1" name="pdispo" value="1" required> Oui
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="inlineCheckboxp2" name="pdispo" value="2"> Non
                    </label>
                </div>
            </div>
            <div class="form-group divperiodedispo">
                <div class="col-sm-12" style='font-weight: bold; color:red'>
                    veuillez confirmer votre choix en cochant le checkbox suivant relatif à la confirmation de votre disponibilité. Nous vous informons que des mesures seront prises à notre niveau au cas où votre confirmation de disponibilité ne sera pas respectée.
                </div>
            </div>
            <div class="form-group divperiodedispo">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold"></label>
                <div class="col-sm-8" style='font-weight: bold;'>
                    <input type="checkbox" name="confirmdispo" value="1" required>Je confirme ma disponibilité sur cette période
                </div>
            </div>
        </div>
    </div>
</div>



<div class="top-30">
    <div style="position:absolute;width:200px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #abc598;margin-bottom: -45px;">
        PIECES D'IDENTITE
    </div>
</div>

<div style="width:645px; margin:auto; margin-top:5px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
    <div style="width: 500px; margin-left: 52px; margin-right: 52px">
        <div id="div_second_pers">

            <!--        information sur le postulant -->
            <div class="top-30  form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">TYPE DE PIECE<span style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <select id="type_piece" name="type_piece" class="form-control">
                         <option value="cni">CARTE D'IDENTITE NATIONALE</option>
                         <option value="attestation">ATTESTATION D'IDENTITÉ</option>
                         <option value="passport">PASSEPORT</option>
                         <option value="permis">CARTE D'ELECTEUR</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">JOINDRE LA PIECE <!--/ ATTESTATION / PASSPORT / CARTE D'ELECTEUR -->
                    <span style="font-weight:500;"> Taille Maxi 2Mo en <span style="color:red;">jpeg,png,jpg,pdf </span> (<span style="color:red;">*</span>)</span></label>
                <div class="col-sm-6">
                    <input type="file" name="userFiles4" class="form-control c_file_css"  id="" placeholder="" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">NUMERO DE LA PIECE <!--/ ATTESTATION / PASSPORT / CARTE D'ELECTEUR --><span style="color:red">(*)</span></label>
                <div class="col-sm-8">
                    <input type="text" id="numero_cni" name="numero_cni" class="form-control"  id="" placeholder="" 
                     pattern="[A-Z0-9a-z'/\-_\s]{1,}"  required oninput="this.value = this.value.toUpperCase()">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">JOINDRE LA PIECE DE LA 1ERE PERSONNE A CONTACTER<!--/ ATTESTATION / PASSPORT / CARTE D'ELECTEUR   -->
                    <span style="font-weight:500;"> Taille Maxi 2Mo en <span style="color:red;">jpeg,png,jpg,pdf </span> (<span style="color:red;">*</span>)</span></label>
                <div class="col-sm-8">
                    <input type="file" name="userFiles5" class="form-control c_file_css"  id="" placeholder="" required>
                </div>
            </div>

			<!--
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">JOINDRE CERTIFIAT DE RESIDENCE
                    <span style="font-weight:500;"> Taille Maxi 2Mo en <span style="color:red;">jpeg,png,jpg,pdf </span> </span></label>
                <div class="col-sm-8">
                    <input type="file" name="userFiles6" class="form-control c_file_css"  id="" placeholder="">
                </div>
            </div>
			
			 
			
			 <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">JOINDRE CERTIFIAT MÉDICAL
                    <span style="font-weight:500;"> Taille Maxi 2Mo en <span style="color:red;">jpeg,png,jpg,pdf </span> </span>(<span style="color:red;">*</span>)</label>
                <div class="col-sm-8">
                    <input type="file" name="userFiles7" class="form-control c_file_css"  id="" placeholder="">
                </div>
            </div> 
           -->

        </div>
    </div>
</div>


<script>

    $(document).ready(function() {

        $('form.form_recrut .phoner').mask('+224 600-00-00-00');

        //$("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");


        $('form.form_recrut #inlineCheckbox3').on("click",function(){
            if($(this).is(":checked")){
                $("form.form_recrut input[name='contact_1']").removeAttr("disabled");
                $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
            }
            else{
                $("form.form_recrut input[name='contact_1']").attr("disabled","disabled");
                $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
            }
        })

        $('form.form_recrut #inlineCheckbox4').on("click",function(){
            if($(this).is(":checked")){
                $("form.form_recrut input[name='contact_1']").attr("disabled","disabled");
                $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
				$.alert({
                    title: 'INFORMATION',
                    content: "Veuillez disposer d'un numéro de téléphone personnel et valide avant de continuer l'enregistrement. Merci!",
                });
                //alert("Veuillez disposer d'un numéro de téléphone personnel et valide avant de continuer l'enregistrement. Merci!");
            }
            else{
                $("form.form_recrut input[name='contact_1']").removeAttr("disabled");
                $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
            }
        });

         $('form.form_recrut #inlineCheckboxp1').on("click",function(){
            if($(this).is(":checked")){
                $("form.form_recrut div.divperiodedispo").css("display","block");
            }
            else{
                $("form.form_recrut div.divperiodedispo").css("display","none");
            }
        })

        $('form.form_recrut #inlineCheckboxp2').on("click",function(){
            if($(this).is(":checked")){
				//alert("ok");
                $("form.form_recrut div.divperiodedispo").css("display","none");
                $("form.form_recrut div.divperiodedispo input[name=confirmdispo]" ).prop( "checked", false );
				$.alert({
                    title: 'INFORMATION',
                    content: "Désolé, vous ne pouvez continuer le processus car vous n'êtes pas totalement disponible sur notre période de recensement; Merci",
                    buttons: {
                        OK: function(){
                            $(location).attr('href',BASE_URL);
                        }
                    }
                });
            }

        });

        
        $('form.form_recrut #datepicker').mask('00/00/0000');
        //$('form.form_recrut #datepicker2').mask ('00/00/0000');
        //$('form.form_recrut #datepicker3').mask ('00/00/0000');
        
       $("form.form_recrut #datepicker").on("focusout",function(){
            var d1 = $("form.form_recrut #datepicker").val();
            var d1s = d1.split("/");
            var d1f = d1s[1]+"/"+d1s[0]+"/"+d1s[2];
            //controle difference d'age
            var yrAgt = d1s[2];
            var difY = 2023 - yrAgt;
            if (difY < 18 || difY > 55) {
                $(this).focus();
				$("form.form_recrut #idspanAge").removeClass("hidden");
            } 
            else{
                if(Date.parse(d1f)){
                    $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
                    $("form.form_recrut #idspanAge").addClass("hidden");
                }
                else{
                    //alert("Veuillez choisir une date correcte a la periode de fin"+d1f);
                    $(this).focus();
                    $("form.form_recrut #idspanAge").removeClass("hidden");
                    $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");

                }   
           }
        });

       /*

       $("form.form_recrut #datepicker2").on("focusout",function(){
               var d1 = $("form.form_recrut #datepicker2").val();
               var d1s = d1.split("/");
               var d1f = d1s[1]+"/"+d1s[0]+"/"+d1s[2];
             //controle difference d'age
            var yrDispo = d1s[2];
            if (yrDispo != 2020) {
                  $(this).focus();
            } 
            else{
             if(Date.parse(d1f)){
                   $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
             }
             else{
               //alert("Veuillez choisir une date correcte a la periode de fin"+d1f);
                 $(this).focus();
                 $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");

             }   
           }
        });


        $("form.form_recrut #datepicker3").on("focusout",function(){
               var d1 = $("form.form_recrut #datepicker2").val();
               var d2 = $("form.form_recrut #datepicker3").val();
               var d2s = d2.split("/");
               var d2f = d2s[1]+"/"+d2s[0]+"/"+d2s[2];

            var yrDispo = d2s[2];
            if (yrDispo != 2020) {
                  $(this).focus();
            } 
            else{
              if(Date.parse(d2f)){
                 var date1 = new Date(d1);
                 var date2 = new Date(d2);
              
                 if(date1 > date2){
                     $(this).focus();
                    $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
                 }
                 else{
                    $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
                 }
             }
             else{
                  $(this).focus();
                //alert("Veuillez choisir une date correcte a la periode de fin");
                 $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");

             } 
           }  

        });

        */

        $("form.form_recrut #numero_cni").on('focusout',function(){
            var numero_cni = $(this).val();
            $.post(BASE_URL+"welcome/verify_cni",
                {
                    numero_cni_ajax: numero_cni,
                },
                function(data){
                    var dt = data.replace(' ', '').trim();
                  var c = 'ok';
                    if(dt == "ok"){
                        $(this).focus();
						$.alert({
                           title: 'INFORMATION',
                           content: "Désolé, vous avez déjà candidaté sur notre plateforme, merci de bien vouloir mettre fin à votre processus ou contactez l'administteur",
							buttons: {
                                 OK: function(){
                                    $(location).attr('href',BASE_URL);
                                 }
                             }
                        });
                        
                        $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
                    }
                    else{
                        $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
                    }

                    //alert("Data: " + data + ");
                });
        });

        //controle sur le contact du tuteur legal pour le nombre de caractere egals à 11
        $("form.form_recrut #contact_2").on('focusout',function(){
            var contact_2 = $(this).val();
            if(contact_2.length != 17){
                $(this).focus();
				$("form.form_recrut #idspanteltut").removeClass("hidden");
                $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
            }
            else{
				 $("form.form_recrut #idspanteltut").addClass("hidden");
              $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
            }
          });

            //controle sur le contact du tuteur legal pour le nombre de caractere egals à 11
        $("form.form_recrut #contact_22").on('focusout',function(){
            var contact_2 = $(this).val();
            if(contact_2.length != 17){
                $(this).focus();
				$("form.form_recrut #idspanteltut2").removeClass("hidden");
                $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
            }
            else{
				 $("form.form_recrut #idspanteltut2").addClass("hidden");
              $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
            }
          });

        $("form.form_recrut #contact_1").on('focusout',function(){
            var contact_1 = $(this).val();
            var name_postulant = $('form.form_recrut input#name_postulant').val();
            var surname_postulant = $('form.form_recrut input#surname_postulant').val();
            var datenaiss = $('form.form_recrut input#datepicker').val();
            if(contact_1.length != 17){
                $(this).focus();
				$("form.form_recrut #idspantel").removeClass("hidden");
                $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
            }
            else{
				$("form.form_recrut #idspantel").addClass("hidden");
              $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
              if(name_postulant == '' || surname_postulant == '' || datenaiss == '' || contact_1 ==''){
                //alert(contact_1);
                $.post(BASE_URL+"welcome/verify_contact",
                    {
                        contact_1_ajax :contact_1,
                        single_contact : 1
                    },
                function(data){
				  var dt = data.replace(' ', '').trim();
                  //alert(data);
                  var c = 'ok';
                    if(dt == "ok"){
                        $(this).focus();
						$.alert({
                           title: 'INFORMATION',
                           content: "Désolé, vous avez déjà candidaté sur notre plateforme, merci de bien vouloir mettre fin à votre processus ou contactez l'administteur",
							buttons: {
                                 OK: function(){
                                    $(location).attr('href',BASE_URL);
                                 }
                             }
                        }); 
                        $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
                    }
                    else{
                        $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
                    }

                    //alert("Data: " + data + ");
                });
              }
              else{
                $.post(BASE_URL+"welcome/verify_infoperso",
                    {
                        contact_1_ajax :contact_1,
                        name_postulant_ajax :name_postulant,
                        surname_postulant_ajax :surname_postulant,
                        datenaiss_ajax :datenaiss,
                    },
                function(data){
                    var dt = data.replace(' ', '').trim();
                  var c = 'ok';
                    if(dt == "ok"){
                        $(this).focus();
						$.alert({
                           title: 'INFORMATION',
                           content: "Désolé, vous êtes déjà inscrit, merci",
						   buttons: {
                                 OK: function(){
                                    $(location).attr('href',BASE_URL);
                                 }
                             }
                        });
                        $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
                    }
                    else{
                        $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
                    }

                    //alert("Data: " + data + ");
                });
              }
            
            }
            
        });

        $("form.form_recrut input#name_postulant, form.form_recrut input#surname_postulant, form.form_recrut input#datepicker").on('focusout',function(){
            var name_postulant = $('form.form_recrut input#name_postulant').val();
            var surname_postulant = $('form.form_recrut input#surname_postulant').val();
            var datenaiss_postulant = $('form.form_recrut input#datepicker').val();
            var contact_postulant = $('form.form_recrut input#contact_1').val();

            //set div declaration honner
             $('form.form_recrut div#namesurname').html(name_postulant+" "+surname_postulant);

            if(name_postulant != '' && surname_postulant != '' && datenaiss_postulant != '' && contact_postulant !=''){
               $.post(BASE_URL+"welcome/verify_infoperso",
                {
                    name_postulant_ajax: name_postulant,
                    surname_postulant_ajax: surname_postulant,
                    datenaiss_ajax: datenaiss_postulant,
                    contact_postulant_ajax: contact_postulant
                },
                function(data){
                    var dt = data.replace(' ', '').trim();
                  var c = 'ok';
                    if(dt == "ok"){
                        $(this).focus();
						$.alert({
                           title: 'INFORMATION',
                           content: "Désolé, vous avez déjà candidaté sur notre plateforme, merci de bien vouloir mettre fin à votre processus ou contactez l'administteur",
						   buttons: {
                                 OK: function(){
                                    $(location).attr('href',BASE_URL);
                                 }
                             }
                        });
                        $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
                    }
                    else{
                        $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
                    }

                    //alert("Data: " + data + ");
                });
            } 
        });

        var minOffset = 0, maxOffset = 100; // Change to whatever you want // minOffset = 0 for current year
        var thisYear = (new Date()).getFullYear();
        for (var i = minOffset; i <= maxOffset; i++) { var year = thisYear - i; $('<option>', {value: year, text: year}).appendTo(".year");}

    } );
</script>
