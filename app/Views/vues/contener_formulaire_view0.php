<div class="rigthContener">
    <?php if(isset($projet)):?>
        <?php
            //session_start();
            $id_projet = $projet['id'];
            // echo"<h1>PROJECT : "; var_dump($projet); echo"</h1>";
            //$table="recrut_projet";
            //$where = "active=1 and id = $id_projet";
            //$projet = get_by($conn,$table,$where);
            $_SESSION['idProjet'] = $id_projet;
            $_SESSION['codeProjet'] = $projet['Codeprojet'];
            $_SESSION['NomProjet'] = $projet['NomProjet'];
            $_SESSION['titre_poste'] = $projet['titre_poste'];
            $_SESSION['id_nivo_minimum'] = $projet['id_nivo_minimum'];
            $_SESSION['niveau_projet'] = $projet['is_collecte'];
        ?>

        <div id="wizard">
			<?php 
				$attributes = array('class' => 'form-horizontal form_recrut', 'id' => 'multiphase', 'enctype'=>'multipart/form-data');
				echo form_open('register', $attributes);
			?>
            <div>
                <h2>AVIS RECRUTEMENT 1</h2>
                <section>  <?= $this->include('vues/contener_contrat_view.php'); ?> </section>

                <h2>CONDITIONS GENERALES</h2>
                <section>  <?= $this->include('vues/contener_condition_generale_view.php'); ?> </section>

                <h2>CODE DE BONNE CONDUITE</h2>
                <section>  <?= $this->include('vues/contener_bonneconduite_view.php'); ?> </section>

                <h2>INFORMATIONS COMPLEMENTAIRES</h2>
                <section>  <?= $this->include('vues/recrutement_view.php'); ?> </section>

                <h2>DECLARATION SUR L'HONNEUR</h2>
                <section>  <?= $this->include('vues/contener_declaration_honneur_view.php'); ?> </section>

                <h2>RECAPITULATIF</h2>
                <section>  <?= $this->include('vues/contener_recapitulatif_view.php'); ?> </section>                    
            </div>
			<?php echo form_close(); ?>
        </div>

        <div id="wizard_small_screen">
			<?php 
				$attributes = array('class' => 'form-horizontal form_recrut_small', 'id' => 'multiphase_small', 'enctype'=>'multipart/form-data');
				echo form_open('register', $attributes);
			?>
            <div>
                <h2>AVIS RECRUTEMENT DIATAS</h2>
                <section>  <?php $this->include('vues/contener_contrat_small_view.php'); ?> </section>
                <h2>CONDITIONS GENERALES</h2>
                <section> <?php $this->include('vues/contener_condition_generale_small_view.php'); ?> </section>
                <h2>CODE DE BONNE CONDUITE</h2>
                <section> <?php $this->include('vues/contener_bonneconduite_small_view.php');  ?> </section>

                <h2>INFORMATIONS COMPLEMENTAIRES</h2>
                <section> <?php $this->include('vues/recrutement_small_view.php'); ?> </section>
                <h2>DECLARATION SUR L'HONNEUR</h2>
                <section> <?php $this->include('vues/contener_declaration_honneur_small_view.php'); ?> </section>
                <h2>AVIS RECRUTEMENT</h2>
                <section> <?php $this->include('vues/contener_recapitulatif_small_view.php'); ?> </section>
            </div>
			<?php echo form_close(); ?>
        </div>
        <div class="blink form-group top-30" style="text-align:center;color:red;font-weight: bold; text-decoration: blink">
            <span style="font-weight: 500; font-size:15px; ">NB : </span>Veuillez renseigner vos informations correctes, car elles seront verifiées. En cas de constat d'informations incorrectes, votre candidature sera immédiatement rejetée. 
        </div>
 
    <?php else: ?>
        <?php echo "<div style='text-align:center;font-weight: bold'>Veuillez s&eacute;lectionner un projet en cliquant sur le lien : <a href='https://rgph.gov.gn'>ICI</a></div>"; ?>
    <?php endif; ?>   

</div>

<script src="<?php echo base_url('assets/js/modernizr-2.6.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.cookie-1.3.1.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.steps.js'); ?>"></script>

<script src="<?php echo base_url('assets/js/jQuery_ui.js'); ?>"></script>
<script src="i18n/datepicker-fr.js"></script>
<script src="<?php echo base_url().'assets/js/jquery-mask.js';?>"></script>
<script src="<?php echo base_url().'assets/js/jquery.validate.min.js'; ?>"></script>
<script src="<?php echo base_url().'assets/js/additional-methods.min.js';?>"></script>

<script>

	$.validator.addMethod("valueNotEquals", function(value, element, arg){
          return arg !== value;
     }, "Value must not equal arg.");
	

     $.validator.addMethod('fileexistesize', function(value, element, param){
        // param = size (in bytes)
        // element = element to validate (<input>)
        // value = value of the element (file name)
        if(element.files[0] == null){
            return true;
        }
        else{
            var file_size = element.files[0].size;
            if(file_size>param) {
                return false;
            }
            else{
                return true;
            }
        }		
    });
     
    $.validator.addMethod('filesize', function(value, element, param) {
        // param = size (in bytes)
        // element = element to validate (<input>)
        // value = value of the element (file name)
		var file_size = element.files[0].size;
        if(file_size>param) {
			return false;
		}
		else{
			return true;
		}
        //return this.optional(element) || (element.files[0].size <= param)
    });
	
	$.validator.addMethod('verifDateFormat',function(value, element, param){
		var d1s = value.split("/");
        var d1f = d1s[1]+"/"+d1s[0]+"/"+d1s[2];
		if(Date.parse(d1f)){
            return true;
         }
        else{
            return false;
         }   
	});
	
	$.validator.addMethod('verifDateSignature',function(value, element, param){
		var d1s = value.split("/");
        var d1f = d1s[1]+"/"+d1s[0]+"/"+d1s[2];
		var yrAgt = d1s[2];
		if (yrAgt != 2023 || parseInt(d1s[1])>=9 || parseInt(d1s[1])<=1) {
            return false;
        } 
        else{
			return true;
        }   
	});
	
	$.validator.addMethod("maxDate", function(value, element) {
		 var d1s = value.split("/");
         var d1f = d1s[1]+"/"+d1s[0]+"/"+d1s[2];
         //controle difference d'age
         var yrAgt = d1s[2];
         var difY = 2023 - yrAgt;
         if (difY <= 46)
	     	return true;
	     return false;
    }, "Vous devez avoir 45ans maximum!");
	
	$.validator.addMethod("minDate", function(value, element) {
	     var d1s = value.split("/");
         var d1f = d1s[1]+"/"+d1s[0]+"/"+d1s[2];
         //controle difference d'age
         var yrAgt = d1s[2];
         var difY = 2023 - yrAgt;
         if (difY >= 18)
	     	return true;
	     return false;
    }, "Vous devez avoir 18ans minimum!");

    $("form.form_recrut").validate({
        rules: {
            userFiles1: {
                required: true,
                extension: "jpeg|jpg|png",
                filesize: 2097152
            },
            name_postulant:"required",
            surname_postulant:"required",
            date_naiss:{
				required:true,
				maxDate: true,
				minDate: true,
				verifDateFormat:true
			},
            confirmdispo:"required",
            pdispo:"required",
            lieu_naissance:"required",
            status:"required",
            sex:"required",
            possedeNumTel:"required",
            nametuteurlegal:"required",
            namepere:"required",
            namemere:"required",
            lubonneconduite:"required",
            lucontrat:"required",
            ludeclaration:"required",
            confirmlieuaffect:"required",
            email: {
                email: true,
				required:true
            },
            date_jour_decla:{
				required : true,
				verifDateFormat:true,
				verifDateSignature:true
			},
            localite_actuel_decla:"required",
            hasexpcollecte:"required",
            contact_1: {
				required:true,
				maxlength: 17,
				minlength:17
			},
            contact_2:  {
				required:true,
				maxlength: 17,
				minlength:17
			},
            numero_cni:"required",
            first_langue: "required",
            userFiles2: {
                required: true,
                extension: "jpeg|jpg|png|pdf",
                filesize: 2097152
            },
            userFiles3: {
                required: true,
                extension: "jpeg|jpg|png|pdf",
                filesize: 2097152
            },
            userFiles4: {
                required: true,
                extension: "jpeg|jpg|png|pdf",
                filesize: 2097152
            },
            userFiles5: {
                required: true,
                extension: "jpeg|jpg|png|pdf",
                filesize: 2097152
            },
            status: {
                required: true,
            },
            niveau_etude: {
                required: true,
            },
            sex: {
                required: true,
            },
            lieuresidence:{
                required:true,
            },
            lieuresidence2:{
                required:true,
            },
            lieuresidence3:{
                required:true,
            },
			
            departement:{ valueNotEquals: "0" },
            sousprefecture:{ valueNotEquals: "0" },
            departement3:{ valueNotEquals: "0" },
            sousprefecture3:{ valueNotEquals: "0" }
           

        },
        messages: {
            lieuresidence: "Veuillez renseigner le champs lieu de r&eacute;sidence en majuscule et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            name_postulant: "Veuillez renseigner le champs nom en majuscule  et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            surname_postulant: "Veuillez renseigner le champs pr&eacute;nom(s) en majuscule  et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            date_naiss: {
				required : "Veuillez renseigner le champs date de naissance",
				maxDate : "vous devez avoir moins de 45 ans pour postuler",
				minDate : "vous devez avoir plus de 17 ans pour postuler",
				verifDateFormat:"veuillez saisir une date correcte au format (JJ/MM/AAAA)"
			},
            confirmdispo: "Veuillez confirmer votre  disponibilit&eacute;",
            lieu_naissance: "Veuillez renseigner le champs lieu de naissance en majuscule  et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            status: "Veuillez renseigner le champs  statut",
            possedeNumTel: "",
            lubonneconduite: "veuillez cocher si vous prenez acte du code de bonne conduite",
            lucontrat: "veuillez cocher si vous prenez acte du contrat",
            ludeclaration: "veuillez cocher si vous prenez acte du code de la declaration sur honneur",
            confirmlieuaffect: "veuillez cocher si vous confirmez votre choix sur la sous-préfecture d'affectation",
            sex: "",
            hasexpcollecte:"",
            date_jour_decla:{
				required : "Veuillez renseigner la date de signature",
				verifDateFormat : "veuillez saisir une date correcte au format (JJ/MM/AAAA)",	
				verifDateSignature : "l'année de signature doit être 2023 et le mois doit être en xxxx"
			},
            localite_actuel_decla:"veuillez saisir votre localité actuelle",
            pdispo:"cocher votre période de disponibilité",
            lieuresidence:"veuillez saisir votre première localité souhaitée",
            lieuresidence2:"veuillez saisir votre deuxième localité souhaitée",
            lieuresidence3:"veuillez saisir votre troisième localité souhaitée",
			region:"veuillez selectionner la region",
            departement:"veuillez selectionner la préfecture d'affectation",
            sousprefecture:"veuillez selectionner la sous prefecture d'affectation",
            departement3:"veuillez selectionner la préfecture de résidence",
            sousprefecture3:"veuillez selectionner la sous prefecture de résidence",
            nametuteurlegal:"Saisir le nom et prenoms du tuteur legal",
            namepere:"Saisir le nom et prenoms du père",
            namemere:"Saisir le nom et prenoms de la mère",
            contact_1: {
				required : "Veuillez renseigner le champs contact",
				maxlength : "Veuillez saisir un numéro de téléphone correcte à 9 chiffres",
				minlength : "Veuillez saisir un numéro de téléphone correcte à 9 chiffres"
			},
            contact_2: {
				required : "Veuillez renseigner le champs contact",
				maxlength : "Veuillez saisir un numéro de téléphone correcte à 9 chiffres",
				minlength : "Veuillez saisir un numéro de téléphone correcte à 9 chiffres"
			},
            numero_cni:"Veuillez saisir le numéro de votre CNI",
            first_langue: "Veuillez renseigner le champs 1&egrave;re langue nationale parl&eacute;e si aucune langue saisir aucune",
            userFiles1: {
                required: "Veuillez joindre une photo",
                extension: "La photo doit &ecirc;tre au format jpeg, png, jpg ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            email: {
				required: "Veuillez saisir une addresse email ",
				email: "Veuillez saisir un email correcte"
			},
            userFiles2: {
                required: "Veuillez joindre un cv",
                extension: "Le cv doit &ecirc;tre au format jpeg, png, jpg,pdf ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            userFiles3: {
                required: "Veuillez joindre votre dernier dipl&ocirc;me",
                extension: "Le dernier dipl&ocirc;me doit &ecirc;tre au format jpeg, png, jpg,pdf ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            userFiles4: {
                required: "Veuillez joindre une cni",
                extension: "La cni doit &ecirc;tre au format jpeg, png, jpg, pdf ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            userFiles5: {
                required: "Veuillez joindre la cni du tuteur legal",
                extension: "La cni doit &ecirc;tre au format jpeg, png, jpg, pdf ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            status: {
                required: "Veillez selectionner le status",
            },
            niveau_etude: {
                required: "Veillez selectionner le niveau d'&eacute;tudes",
            },
            sex: {
                required: "Veillez selectionner le sexe",
            }
        },
    });	
	
	$("form.form_recrut_small").validate({
        rules: {
            userFiles1: {
                required: true,
                extension: "jpeg|jpg|png",
                filesize: 2097152
            },
            name_postulant:"required",
            surname_postulant:"required",
            date_naiss:{
				required:true,
				maxDate: true,
				minDate: true,
				verifDateFormat:true
			},
            confirmdispo:"required",
            pdispo:"required",
            lieu_naissance:"required",
            status:"required",
            sex:"required",
            possedeNumTel:"required",
            nametuteurlegal:"required",
            namepere:"required",
            namemere:"required",
            lubonneconduite:"required",
            lucontrat:"required",
            ludeclaration:"required",
            confirmlieuaffect:"required",
            email: {
				required : true,
                email: true
            },
            date_jour_decla:{
				required : true,
				verifDateFormat:true,
				verifDateSignature:true
			},
            localite_actuel_decla:"required",
            hasexpcollecte:"required",
            contact_1: {
				required:true,
				maxlength: 17,
				minlength:17
			},
            contact_2:  {
				required:true,
				maxlength: 17,
				minlength:17
			},
            numero_cni:"required",
            first_langue: "required",
            userFiles2: {
                required: true,
                extension: "jpeg|jpg|png|pdf",
                filesize: 2097152
            },
            userFiles3: {
                required: true,
                extension: "jpeg|jpg|png|pdf",
                filesize: 2097152
            },
            userFiles4: {
                required: true,
                extension: "jpeg|jpg|png|pdf",
                filesize: 2097152
            },
            userFiles5: {
                required: true,
                extension: "jpeg|jpg|png|pdf",
                filesize: 2097152
            },
            status: {
                required: true,
            },
            niveau_etude: {
                required: true,
            },
            sex: {
                required: true,
            },
            lieuresidence:{
                required:true,
            },
            lieuresidence2:{
                required:true,
            },
            lieuresidence3:{
                required:true,
            },
			//region:{ valueNotEquals: "0" },
            departement:{ valueNotEquals: "0" },
            sousprefecture:{ valueNotEquals: "0" },
            departement3:{ valueNotEquals: "0" },
            sousprefecture3:{ valueNotEquals: "0" }	
        },
        messages: {
            lieuresidence: "Veuillez renseigner le champs lieu de r&eacute;sidence en majuscule et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            name_postulant: "Veuillez renseigner le champs nom en majuscule  et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            surname_postulant: "Veuillez renseigner le champs pr&eacute;nom(s) en majuscule  et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            date_naiss: {
				required : "Veuillez renseigner le champs date de naissance",
				maxDate : "vous devez avoir moins de 45 ans pour postuler",
				minDate : "vous devez avoir plus de 17 ans pour postuler",
				verifDateFormat:"veuillez saisir une date correcte au format (JJ/MM/AAAA)"
			},
            confirmdispo: "Veuillez confirmer votre  disponibilit&eacute;",
            lieu_naissance: "Veuillez renseigner le champs lieu de naissance en majuscule  et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            status: "Veuillez renseigner le champs  statut",
            possedeNumTel: "",
            lubonneconduite: "veuillez cocher si vous prenez acte du code de bonne conduite",
            lucontrat: "veuillez cocher si vous prenez acte du contrat",
            ludeclaration: "veuillez cocher si vous prenez acte du code de la declaration sur honneur",
            confirmlieuaffect: "veuillez cocher si vous confirmez votre choix sur la sous-préfecture d'affectation",
            sex: "",
            hasexpcollecte:"",
            date_jour_decla:{
				required : "Veuillez renseigner la date de signature",
				verifDateFormat : "veuillez saisir une date correcte au format (JJ/MM/AAAA)",	
				verifDateSignature : "l'année de signature doit être 2023 et le mois doit être en xxxxx"
			},
            localite_actuel_decla:"veuillez saisir votre localité actuelle",
            pdispo:"cocher votre période de disponibilité",
            lieuresidence:"veuillez saisir votre première localité souhaitée",
            lieuresidence2:"veuillez saisir votre deuxième localité souhaitée",
            lieuresidence3:"veuillez saisir votre troisième localité souhaitée",
			region:"veuillez selectionner la region",
            departement:"veuillez selectionner le departement",
            sousprefecture:"veuillez selectionner la sous prefecture",
            departement3:"veuillez selectionner la préfecture de résidence",
            sousprefecture3:"veuillez selectionner la sous prefecture de résidence",
            nametuteurlegal:"Saisir le nom et prenoms du tuteur legal",
            namepere:"Saisir le nom et prenoms du père",
            namemere:"Saisir le nom et prenoms de la mère",
            contact_1: {
				required : "Veuillez renseigner le champs contact",
				maxlength : "Veuillez saisir un numéro de téléphone correcte à 9 chiffres",
				minlength : "Veuillez saisir un numéro de téléphone correcte à 9 chiffres"
			},
            contact_2: {
				required : "Veuillez renseigner le champs contact",
				maxlength : "Veuillez saisir un numéro de téléphone correcte à 9 chiffres",
				minlength : "Veuillez saisir un numéro de téléphone correcte à 9 chiffres"
			},
            numero_cni:"Veuillez saisir le numéro de votre CNI",
            first_langue: "Veuillez renseigner le champs 1&egrave;re langue nationale parl&eacute;e si aucune langue saisir aucune",
            userFiles1: {
                required: "Veuillez joindre une photo",
                extension: "La photo doit &ecirc;tre au format jpeg, png, jpg ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            email: {
				required: "Veuillez saisir une addresse email ",
				email: "Veuillez saisir un email correcte"
			},
            userFiles2: {
                required: "Veuillez joindre un cv",
                extension: "Le cv doit &ecirc;tre au format jpeg, png, jpg,pdf ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            userFiles3: {
                required: "Veuillez joindre votre dernier dipl&ocirc;me",
                extension: "Le dernier dipl&ocirc;me doit &ecirc;tre au format jpeg, png, jpg,pdf ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            userFiles4: {
                required: "Veuillez joindre une cni",
                extension: "La cni doit &ecirc;tre au format jpeg, png, jpg, pdf ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            userFiles5: {
                required: "Veuillez joindre la cni du tuteur legal",
                extension: "La cni doit &ecirc;tre au format jpeg, png, jpg, pdf ",
                filesize: "La taille du fichier doit &ecirc;tre 2Mo Maxi"
            },
            status: {
                required: "Veillez selectionner le status",
            },
            niveau_etude: {
                required: "Veillez selectionner le niveau d'&eacute;tudes",
            },
            sex: {
                required: "Veillez selectionner le sexe",
            }
        },
    });
	
</script>


<script>
    $.extend({
        redirectPost: function (location,input_name,arg) {
            var form = $('<form>', { action: location, method: 'post' });
            $(form).append(
                $('<input>', { type: 'hidden', name: input_name, value: arg })
            );
            $(form).appendTo('body').submit();
        }
    });

    $( function() {
        $('#datepicker').mask ('00/00/0000');
        var minOffset = 0, maxOffset = 100; // Change to whatever you want // minOffset = 0 for current year
        var thisYear = (new Date()).getFullYear();
        for (var i = minOffset; i <= maxOffset; i++) { var year = thisYear - i; $('<option>', {value: year, text: year}).appendTo(".year");}
    } );

    $(document).ready(function() {

        var form = $("form.form_recrut");

        var form_small = $("form.form_recrut_small");

		$('#m_plateforme').css('display','none');

        $('form input[name=formSubmit]').removeAttr('disabled');

        //popup div information inscription caractere
        var w = $(this).width();
        if (w >= 960){
            $('#p_u_inscript').css('display','block');
        }

        $(document).on("click","button#submitpopupmsg", function(e){
            e.preventDefault();
            $('#p_u_inscript').css('display','none');
        });

        $("#multiphase").children("div").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            labels: {
                next: "Suivant",
                finish: "Enregistrer",
                previous: "Précédent",
                loading: "Chargement ..."
            },
            onStepChanging: function (event, currentIndex, newIndex)
            {
				$('form#multiphase').find('div.wizard div.content').scrollTop(0);
                form.validate().settings.ignore = ":disabled,:hidden";
				if(!form.valid()){
					$.alert({
                           title: 'Attention!',
                           content: "Veuillez renseigner tous les champs obligatoires ou cocher les checkbox obligatoires",
                        });
				}
                return form.valid();
            },
            onFinishing: function (event, currentIndex)
            {
                form.validate().settings.ignore = ":disabled";
                return form.valid();                            
            },
            onFinished: function (event, currentIndex) {
                $('form#multiphase').submit();
            },
        });

        $("#multiphase_small").children("div").steps({
            headerTag: "h2",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            labels: {
                next: "Suivant",
                finish: "Enregistrer",
                previous: "Précédent",
                loading: "Chargement ..."
            },
            onStepChanging: function (event, currentIndex, newIndex)
            {
				$('form#multiphase_small').find('div.wizard div.content').scrollTop(0);
                form_small.validate().settings.ignore = ":disabled,:hidden";
				if(!form_small.valid()){
					$.alert({
                           title: 'Attention!',
                           content: "Veuillez renseigner tous les champs obligatoires ou cocher les checkbox obligatoires",
                        });
				}
                return form_small.valid();
            },
            onFinishing: function (event, currentIndex)
            {
                form_small.validate().settings.ignore = ":disabled";
                return form_small.valid();
            },
            onFinished: function (event, currentIndex) {
                $('form#multiphase_small').submit();
            },
        });

    } );
</script>