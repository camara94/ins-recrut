
<div style="display: block;text-align: center;background: #2b542c;padding: 5px;color:white;font-weight: bold">RECAPITULATIF DES INFORMATIONS RENSEIGNÉES</div>

<div class="center-text top-30"><button type="button" id="btnActuRecap">Actualiser le recapitulatif</button></div>

<div style="margin:auto; margin-top:60px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
    <div style="margin-left: 52px; margin-right: 52px">
        <div id="div_recapitulatif">
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">NOM</label>
                            <label id="recap_name" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS</label>
                            <label id="recap_surname" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">DATE DE NAISSANCE</label>
                            <label id="recap_datenaiss" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">LIEU DE NAISSANCE</label>
                            <label id="recap_lieunaiss" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">SEXE</label>
                            <label id="recap_sexe" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">CONTACT</label>
                            <label id="recap_contact" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">EMAIL</label>
                            <label id="recap_email" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">NUMERO DE LA CARTE D'IDENTITE NATIONALE</label>
                            <label id="recap_numcni" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">NIVEAU INSTRUCTION</label>
                            <label id="recap_niveauinstruction" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">SPECIALITE</label>
                            <label id="recap_specialite" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...></label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">STATUT</label>
                            <label id="recap_statut" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">PREMIER LANGUE LOCAL PARLÉE</label>
                            <label id="recap_firstlangue" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">SECOND LANGUE LOCAL PARLÉE</label>
                            <label id="recap_secondlangue" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
			            <?php if ($projet['id'] == 11 || $projet['id'] == 9): ?>
                            <!--
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">REGION</label>
                            <label id="recap_region" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        -->
			            
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">DEPARTEMENT</label>
                            <label id="recap_departement" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
			              <?php if ($$projet['id'] == 11): ?>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">SOUS PREFECTURE</label>
                            <label id="recap_sousprefecture" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <!--
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">LOCALITE 1</label>
                            <label id="recap_localite1" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">LOCALITE 2</label>
                            <label id="recap_localite2" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">LOCALITE 3</label>
                            <label id="recap_localite3" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                          -->
			              <?php endif; ?>
			           <?php endif; ?>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS ET NOM DE LA PREMIÈRE PERSONNE À CONTACTER </label>
                            <label id="recap_nametuteur" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">CONTACT DE LA PREMIÈRE PERSONNE À CONTACTER</label>
                            <label id="recap_contacttuteur" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS ET NOM DU PERE</label>
                            <label id="recap_namepere" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS ET NOM DE LA MERE</label>
                            <label id="recap_namemere" for="inputPassword3" class="col-sm-4 text-bold fg-color-red ">...</label>
                        </div>


                       
                        <div class="form-group divconfirlieutravail">
                                        <div class="col-sm-8" style='font-weight: bold;'>
                                            <input type="checkbox" name="confirmlieuaffect" value="1" required>Je confirme ma disponibilité et j'atteste la véracité des informations fournies.
                                        </div>
                        </div>
 
                        
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
	$('form.form_recrut button#btnActuRecap').on('click',function(e){
		var name = $('form.form_recrut input[name=name_postulant]').val();
        var surname = $('form.form_recrut input[name=surname_postulant]').val();
        var dateNaiss = $('form.form_recrut input[name=date_naiss]').val();
        var lieuNaiss = $('form.form_recrut input[name=lieu_naissance]').val();
        var sex = $('form.form_recrut input[name=sex]:checked').val();
            
        var sexe = "MASCULIN";
        if(sex == 2){ sexe = "FEMININ";}

        var contactPerso = $('form.form_recrut input[name=contact_1]').val();
        var emailPerso = $('form.form_recrut input[name=email]').val();
        var NumCni = $('form.form_recrut input[name=numero_cni]').val();
        //var v = $("form.form_recrut input[name=niveau_etude]").val();
        var niveau_instruction = $("form.form_recrut select[name=niveau_etude] option:selected").text();
        var specialite = $('form.form_recrut input[name=last_diplome]').val();
        //var vS = $("form.form_recrut input[name=status]").val();
        var status = $("form.form_recrut select[name=status] option:selected").text();
        var first_langue = $('form.form_recrut input[name=first_langue]').val();
        var second_langue = $('form.form_recrut input[name=second_langue]').val();
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
	});

   //check 
   
    $('input[name=confirmlieuaffect]').on('click',function(){
        if($(this).is(':checked')){
            //verification du premier choix
            // var departement = $("form.form_recrut select[name=departement]").val();
            // var sousprefecture = $("form.form_recrut select[name=sousprefecture]").val();
            // $.post(BASE_URL+"welcome/verifquotas", {
            //     verificationplace:1,
            //     id_dep: departement,
            //     id_sp: sousprefecture,
            // },
            // function(data){
            //     var c = 'ok';
            //     if(data == "ok"){
            //         $(this).attr('checked',false);
            //         $.alert({
            //             title: 'INFORMATION',
            //             content: "Désolé, vous avez déjà candidaté sur notre plateforme, merci de bien vouloir mettre fin à votre processus ou contactez l'administteur",
            //             buttons: {
            //                 OK: function(){
            //                 //$(location).attr('href','http://localhost:8888/recrutement.rp2023.gn/');
            //                 }
            //             }
            //         });
                    
            //         $("form.form_recrut div.actions ul li:nth-child(2) a").addClass("disabledA").attr("aria-disabled", "true");
            //     }
            //     else{
            //         $("form.form_recrut div.actions ul li:nth-child(2) a").removeClass("disabledA").removeAttr("aria-disabled");
            //         //$('form#multiphase').submit();
            //     }
            //     //alert("Data: " + data + ");
            // });
        }
    })   

}); 


</script>

