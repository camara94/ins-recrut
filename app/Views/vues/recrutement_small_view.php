<?php
//    $pick_data = get_by('projet',"Codeprojet = 'INS0001'");
////
//    echo $pick_data['libelle_nivo_minimum'];
?>

<?php if(isset($_POST['projet'])): ?>
    <?php
    $id_projet = $_POST['projet'];

//$table="recrut_projet";
//$where = "active=1 and id = $id_projet";
//$projetppp = get_by($table,$where);

    //session_start();
    $id_nivo_minimum = $_SESSION['id_nivo_minimum'];
    $codeProjet = $_SESSION['codeProjet'];
    $NomProjet = $_SESSION['NomProjet'];
    $titre_poste = $_SESSION['titre_poste'];
?>

<?php if(isset($_SESSION['statusMsg'])): ?>
    <!--  <p  class="error_widget " style="background-color: green"><?php //echo $_SESSION['statusMsg']; ?></p> -->
<?php endif;
//session_destroy(); ?>

<!--
<div style="display: block;text-align: center;background: #2b542c;padding: 5px;color:white;font-weight: bold">IDENTIFICATION DU POSTULANT</div>
-->

<div style="margin:auto; margin-top:5px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
    <!--    --><?php //if($_SESSION['statusMsg']): ?>
    <!--        <p  class="error_widget " style="background-color: green">-->
    <?php //echo $_SESSION['statusMsg']; ?><!--</p>-->
    <!--    --><?php //endif; session_destroy(); ?>
    <!--    --><?php //echo validation_errors('<div class="error">', '</div>'); ?>
    <div style=" margin-left: 52px; margin-right: 52px">


        <div id="div_info_pers">

            <div>
                <!--        information sur le postulant -->
                <!--<div class="top-30">
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">PHOTO D'IDENTITE
                            <span style="font-weight:500;">Format 35x45, Taille Maxi 2 Mo en <span
                                        style="color:red;">jpeg,png,jpg </span> (<span style="color:red;">*</span>)</span>
                        </label>
                        <div class="col-sm-8">
                            <input type="file" name="userFiles1" class="form-control c_file_css" id="input_photo"
                                    placeholder="" required>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold"></label>
                        <div class="col-sm-8">
                            <img for="inputPassword3" class="col-sm-6 control-label text-bold" id="view_photo"
                                    src="assets/images/icone_photo.jpg"/>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">LIEU DE NAISSANCE <span
                                    style="color:red">(*)</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="lieu_naissance" class="form-control" pattern="[A-Z\s]{1,}"
                                    title="SAISIR EN MAJUSCULE ET SANS ACCENT"
                                    id="" placeholder="" required>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    -->
                    <!--            --><?php
                    //            $profession = array(
                    //                    '0'  => 'Selectionnez votre Profession',
                    //                    'Plomberie'   => 'Plomberie',
                    //                    'Psychologie'    => 'Psychologie',
                    //                    'Qualite'   => 'Qualit�',
                    //                    'Ressources_animales' => 'Ressources Animales et Halieutiques',
                    //                    'Ressources_humaines ' => 'Ressources Humaines ',
                    //                    'Sciences_halieutes' => 'Sciences halieutes',
                    //                    'Sciences_politiques' => 'Sciences politiques',
                    //                    'Sciences_sociales' => 'Sciences sociales',
                    //                    'Secretariat' => 'Secr�tariat',
                    //                    'Securite' => 'S�curit�/D�fense',
                    //                    'Sociologie' => 'Sociologie',
                    //                    'Soudure' => 'Soudure',
                    //                    'Sports' => 'Sports',
                    //                    'Statistiques' => 'Statistiques',
                    //                    'Tapisserie' => 'Tapisserie',
                    //                    'Telecommunications' => 'T�l�communications',
                    //                    'Thermodynamique' => 'Thermodynamique',
                    //                    'Topographie' => 'Topographie',
                    //                    'Tourisme' => 'Tourisme/Loisirs',
                    //                    'Interpretariat' => 'Traduction/Interpr�tariat',
                    //                    'Transit' => 'Transit/Transport',
                    //                    'Chauffeur'   => 'Transport (Chauffeur)',
                    //                    'Urbanisme'    => 'Urbanisme',
                    //                    'Vitrerie'   => 'Vitrerie',
                    //                    'Zootechnie' => 'Zootechnie',
                    //                );
                    //            ?>
                    <!--            <div class="form-group">-->
                    <!--                <label for="inputPassword3" class="col-sm-6 control-label text-bold">PROFESSION</label>-->
                    <!--                <div class="col-sm-6">-->
                    <!--                    <input type="text" name="profession" class="form-control"  id="" placeholder="" required>-->
                    <!--<!--                    --><?php ////echo form_dropdown('profession', $profession, '','class="form-control drop_profession" ');?>
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--<div class="form-group">
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
                        <div style="clear:both"></div>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>


<div style="margin:auto; margin-top:5px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">

    <div style=" margin-left: 52px; margin-right: 52px">


        <div id="div_info_pers">

            <div>
                <div class="top-30">
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">EMAIL <span
                                    style="color:red">(*)</span></label>
                        <div class="col-sm-8">
                            <input type="email" name="email" class="form-control" autocomplete="off" id=""
                                    placeholder="">
                        </div>
                        <div style="clear:both"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div style=" margin:auto; margin-top:20px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">

    <div style=" margin-left: 52px; margin-right: 52px">


        <div id="div_info_pers">

            <div>
                <div class="top-30">

                    <?php
                    /*
                    $options = array(
                        '' => "Selectionnez votre Niveau d'Etudes",
                        '1' => 'CM2',
                        '2' => 'CEPE',
                        '3' => 'CAP',
                        '4' => 'SIXIEME',
                        '5' => 'CINQUIEME',
                        '6' => 'QUATRIEME',
                        '7' => 'TROISIEME',
                        '8' => 'BP',
                        '9' => 'BEP',
                        '10' => 'BEPC',
                        '11' => 'SECONDE',
                        '12' => 'PREMIERE',
                        '13' => 'TERMINALE',
                        '14' => 'BT',
                        '15' => 'BAC',
                        '16' => 'BAC+1',
                        '17' => 'DEUG/DUT/LICENCE 2/BTS',
                        '18' => 'LICENCE 3',
                        '19' => 'MAITRISE / MASTER 1',
                        '20' => 'MASTER 2 / DEA',
                        '21' => 'DOCTORAT',
                    );
                    */
                    $options = array(
                        '' => "Selectionnez votre Niveau d'Etudes",
                        '11' => 'DEUG/BAC +2/LICENCE 2/BTS',
                        '12' => 'LICENCE 3 / BAC+3',
                        '13' => 'MAITRISE / MASTER 1 / BAC+4',
                        '14' => 'MASTER 2 / DEA / BAC+5',
                        '15' => 'DOCTORAT',
                    );
                        
                    ?>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">NIVEAU D'ETUDES <span
                                    style="color:red">(*)</span></label>
                        <div class="col-sm-8">
                            <?php echo form_dropdown('niveau_etude', $options, '', 'class="form-control drop_niveau_etude" '); ?>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <!--            --><?php
                    //            $last_diploma = array(
                    //                '0' => "Selectionnez votre dernier dipl�me",
                    //                'agent'  => 'Agent',
                    //                'chef_equipe'   => "Chef d'�quipe ",
                    //                'superviseur_tic'    => 'Superviseur TIC',
                    //                'superviseur_admin'   => 'Superviseur ',
                    //            );
                    //            ?>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">SPECIALITE
                            (FILIERE) </label>
                        <div class="col-sm-8">
                            <input type="text" name="last_diplome" class="form-control" autocomplete="off" id=""
                                    placeholder="SAISIR EN MAJUSCULE ET SANS CARACTERES SPECIAUX"
                                    pattern="[A-Z1-3\s]{1,}" title="SAISIR EN MAJUSCULE ET SANS CARACTERES SPECIAUX" 
                                    oninput="this.value = this.value.toUpperCase()">
                            <!--                    --><?php //echo form_dropdown('last_diplome', $last_diploma, '','class="form-control drop_last_diplome" ');?>
                        </div>
                        <div style="clear:both"></div>
                    </div>

                    <?php
                    $status = array(
                        '' => "Selectionnez votre statut",
                        'ELEVE' => 'ELEVE',
                        'ETUDIANT' => "ETUDIANT ",
                        'TRAVAILLEUR' => 'TRAVAILLEUR',
                        //'CHOMEUR' => 'CHOMEUR ',
                        'SANS_EMPLOI' => 'SANS EMPLOI - CHOMEUR',
                    );
                    ?>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">STATUT <span
                                    style="color:red">(*)</span></label>
                        <div class="col-sm-8">
                            <!--                    <input type="text" name="statut" class="form-control"  id="" placeholder="" required>-->
                            <?php echo form_dropdown('status', $status, '', 'class="form-control " '); ?>
                        </div>
                        <div style="clear:both"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<div>
    <div class="" style="">

        <div class="col-xs-12" style="background-color: #f1f1f1; padding:30px">
            <div  style="text-align: center;font-weight: bold;color:red">EXPERIENCE PROFESSIONNELLE EN COLLECTE D'INFORMATION</div>
            <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">Avez vous une expérience en collecte de données ? <span
                                    style="color:red">(*)</span></label>
                        <div class="col-sm-8">
                            <label class="radio-inline">
                                <input type="radio" id="inlineCheckboxc1" name="hasexpcollecte" value="1" required> Oui
                            </label>
                            <label class="radio-inline">
                                <input type="radio" id="inlineCheckboxc2" name="hasexpcollecte" value="2"> Non
                            </label>
                        </div>
            </div>
            <div id="tab_exp">
                <div class="tr">
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">STRUCTURE</label>
                        <div class="col-sm-8">
                            <input type="text" name="employeur_1">
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">ANNEE</label>
                        <div class="col-sm-8">
                            <select name="year_deb_1" placeholder="Ann&eacute;e" class="year"></select>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">INTITULE POSTE</label>
                        <div class="col-sm-8">
                            <input type="text" name="fontion_1">
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">INTITULE DU PROJET</label>
                        <div class="col-sm-8">
                            <input type="text" name="projet_name_1">
                        </div>
                        <div style="clear:both"></div>
                    </div>

                </div>
            </div>
            <!--
            <div class="form-group top-10">
                <div class="col-sm-offset-5 col-sm-7">
                    <button name="part_add_exp" id="part_add_exp">Ajouter une exp&eacute;rience</button>
                </div>
            </div>
            -->
        </div>
    </div>
    <div style="clear:both"></div>
</div>

<div style="margin:auto; margin-top:20px; padding-top:20px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">

    <div style=" margin-left: 52px; margin-right: 52px">


        <div id="div_info_pers">

            <div>
                <div class="top-30">


                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">PREMIERE LANGUE LOCALE PARLÉE
                            <span style="color:red">(*)</span></label>
                        <div class="col-sm-8">
                            <!--
                            <input type="text" name="first_langue" class="form-control" id="inputEmail3"
                                    placeholder=""
                                    style="text-transform:uppercase">
                                -->
                                <?php echo form_dropdown('first_langue', $ethnie, '', 'class="form-control drop_first_langue" '); ?>
                        </div>
                        <div style="clear:both"></div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">SECONDE LANGUE LOCALE PARLÉE</label>
                        <div class="col-sm-8">
                            <!--
                            <input type="text" name="second_langue" class="form-control" id="" placeholder=""
                                    style="text-transform:uppercase">
                                -->
                                <?php echo form_dropdown('second_langue', $ethnie, '', 'class="form-control drop_second_langue" '); ?>
                        </div>
                        <div style="clear:both"></div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-4 control-label text-bold">SECONDE LANGUE LOCALE PARLÉE</label>
                        <div class="col-sm-8">
                            <!--
                            <input type="text" name="second_langue" class="form-control" id="" placeholder=""
                                    style="text-transform:uppercase">
                                -->
                                <?php echo form_dropdown('third_langue', $ethnie, '', 'class="form-control drop_third_langue" '); ?>
                        </div>
                        <div style="clear:both"></div>
                    </div>


                </div>
            </div>

        </div>
    </div>
</div>


<div style=" margin:auto;  padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
    <div style=" margin-left: 52px; margin-right: 52px">
        <div id="div_second_pers">

            <!--        information sur le postulant -->
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">JOINDRE DERNIER DIPLOME / ATTESTATION DE REUSSITE
                    <span style="font-weight:500;"> Taille Maxi 2 Mo en <span
                                style="color:red;">jpeg,png,jpg,pdf </span> (<span
                                style="color:red;">*</span>)</span></label>
                <div class="col-sm-8">
                    <input type="file" name="userFiles3" class="form-control c_file_css" id="" placeholder=""
                            required>
                </div>
                <div style="clear:both"></div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label text-bold">JOINDRE CURRICULUM VITAE
                    <span style="font-weight:500;"> Taille Maxi 2 Mo en <span
                                style="color:red;">jpeg,png,jpg,pdf </span> (<span
                                style="color:red;">*</span>)</span></label>
                <div class="col-sm-8">
                    <input type="file" name="userFiles2" class="form-control c_file_css" id="" placeholder=""
                            required>
                </div>
                <div style="clear:both"></div>
            </div>
        </div>
    </div>
</div>
<!--
<?php if ($id_projet == 11 || $id_projet == 9): ?>
    <div style=" margin:auto; margin-top:5px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
        <div class="" style="margin-top:10px">
             <div style="text-align: center;font-weight: bold;color:red">CHOIX DU LIEU DE TRAVAIL</div>
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">REGION DE RESIDENCE (<span style="color:red;">*</span>)

                    </label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('region', $regions, '', 'class="form-control drop_region" '); ?>
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">DEPARTEMENT DE
                        RESIDENCE (<span style="color:red;">*</span>)</label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('departement', $departements, '', 'class="form-control drop_departement" disabled="disabled"'); ?>
                    </div>
                    <div style="clear:both"></div>
                </div>
				<?php if ($id_projet == 11): ?>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">SOUS-PREFECTURE / COMMUNE DE
                        RESIDENCE (<span style="color:red;">*</span>)</label>
                    <div class="col-sm-8">
                        <?php echo form_dropdown('sousprefecture', $sousprefectures, '', 'class="form-control drop_ssp" disabled="disabled"'); ?>
                    </div>
                    <div style="clear:both"></div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">1ère LOCALITE/QUARTIER D'AFFECTATION
                        SOUHAITÉ (<span style="color:red;">*</span>)</label>
                    <div class="col-sm-8">
                        <input type="text" name="lieuresidence" class="form-control" disabled="disabled"
                               id="inputEmail3" placeholder=""
                               style="text-transform:uppercase">
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">2ème LOCALITE/QUARTIER D'AFFECTATION
                        SOUHAITÉ (<span style="color:red;">*</span>)</label>
                    <div class="col-sm-8">
                        <input type="text" name="lieuresidence2" class="form-control" disabled="disabled"
                               id="inputEmail3" placeholder=""
                               style="text-transform:uppercase">
                    </div>
                    <div style="clear:both"></div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-4 control-label text-bold">3ème LOCALITE/QUARTIER D'AFFECTATION
                        SOUHAITÉ (<span style="color:red;">*</span>)</label>
                    <div class="col-sm-8">
                        <input type="text" name="lieuresidence3" class="form-control" disabled="disabled"
                               id="inputEmail3" placeholder=""
                               style="text-transform:uppercase">
                    </div>
                    <div style="clear:both"></div>
                </div>
				 <?php endif; ?>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
 <?php endif; ?>
-->

    <input type="hidden" name="nivo_projet" class="" id="" placeholder="" value="<?php echo $id_nivo_minimum; ?>">
    <input type="hidden" name="compteur" class="" id="compteur" placeholder="" value="2">
    <input type="hidden" name="compteur_school" class="" id="compteur_school" placeholder="" value="2">
    <input type="hidden" name="choix_projet" class="" id="choix_projet" placeholder=""
           value="<?php echo $id_projet; ?>">
    <input type="hidden" name="codeProjet" class="" id="code_projet" placeholder="" value="<?php echo $codeProjet; ?>">
    <input type="hidden" name="NomProjet" class="" id="nom_projet" placeholder="" value="<?php echo $NomProjet; ?>">
    <input type="hidden" name="titre_poste" class="" id="titre_post" placeholder="" value="<?php echo $titre_poste; ?>">
    <input type="hidden" name="formSubmit" class="" placeholder="" value="1">

    <div class="form-group top-30">

        <div class="col-sm-offset-5 col-sm-7">
            <!-- <input type="submit" name="formSubmit" class="btn btn-default" value="Valider Formulaire" disabled="disabled" />-->
        </div>
    </div>
    <div class="form-group top-30" style="text-align:left; ">
        <span style="color:red;font-weight: bold">NB:</span> Tous les champs comportant <span
                style="color:red;font-weight: bold">(*)</span> sont obligatoires.
    </div>

<?php else: ?>
    <?php echo "<div style='text-align:center;font-weight: bold'>Veuillez s&eacute;lectionner un projet en cliquant sur le lien : 
                      <a href='https://rgph.gov.gn'>ICI</a></div>"; ?>
<?php endif; ?>


<script>
    $(document).ready(function ($) {

        var minOffset = 0, maxOffset = 100; // Change to whatever you want // minOffset = 0 for current year
        var thisYear = (new Date()).getFullYear();
        for (var i = minOffset; i <= maxOffset; i++) {
            var year = thisYear - i;
            $('<option>', {value: year, text: year}).appendTo(".year");
        }


        $('#part_one').on('click', function (e) {
            e.preventDefault();
            $("form.form_recrut").validate();
            var divParent = $(this).parents('#div_info_pers');
            divParent.hide();
            divParent.next().show();
        })

        $('#part_two').on('click', function (e) {
            e.preventDefault();
            var divParent = $(this).parents('#div_second_pers');
            divParent.hide();
            divParent.prev().show();
        })

        $('form.form_recrut_small #inlineCheckboxc1').on("click",function(){
            if($(this).is(":checked")){
                $("form.form_recrut_small div#tab_exp").css("display","block");
            }
            else{
                $("form.form_recrut_small div#tab_exp").css("display","none");
            }
        })

        $('form.form_recrut_small #inlineCheckboxc2').on("click",function(){
            if($(this).is(":checked")){
                $("form.form_recrut_small div#tab_exp").css("display","none");
            }
            
        });


        $(document).on('click', '#part_add_exp', function (e) {
            e.preventDefault();
            var compteur = $("#compteur").val();
            var minOffset = 0, maxOffset = 100; // Change to whatever you want // minOffset = 0 for current year
            var thisYear = (new Date()).getFullYear();
            var select1 = '<select name="mois_deb_' + compteur + '" class="form-control drop_fonction_1 valid" aria-invalid="false">' +
                '<option value="janvier">Janvier</option>' +
                '<option value="fevrier">F&eacute;vrier</option>' +
                '<option value="mars">Mars</option>' +
                '<option value="avril">Avril</option>' +
                '<option value="mai">Mai</option>' +
                '<option value="juin">Juin</option>' +
                '<option value="juillet">Juillet</option>' +
                '<option value="aout">Ao&ucirc;t </option>' +
                '<option value="septembre">Septembre </option>' +
                '<option value="octobre">Octobre</option>' +
                '<option value="novembre">Novembre</option>' +
                '<option value="decembre">D&eacute;cembre</option>' +
                '</select>';
            var select2 = '<select name="mois_end_' + compteur + '" class="form-control drop_fonction_1 valid" aria-invalid="false">' +
                '<option value="janvier">Janvier</option>' +
                '<option value="fevrier">F&eacute;vrier</option>' +
                '<option value="mars">Mars</option>' +
                '<option value="avril">Avril</option>' +
                '<option value="mai">Mai</option>' +
                '<option value="juin">Juin</option>' +
                '<option value="juillet">Juillet</option>' +
                '<option value="aout">Ao&ucirc;t </option>' +
                '<option value="septembre">Septembre </option>' +
                '<option value="octobre">Octobre</option>' +
                '<option value="novembre">Novembre</option>' +
                '<option value="decembre">D&eacute;cembre</option>' +
                '</select>';
            var html = '<tr><td><input type="text" name="employeur_' + compteur + '"></td>' +
                '<td>' + select1 + '<select class="year" name="year_deb_' + compteur + '" placeholder="Ann&eacute;e">';
            for (var i = minOffset; i <= maxOffset; i++) {
                var year = thisYear - i;
                html += "<option value='" + year + "'>" + year + "</option>";
            }
            html += '</select></td>' +

                '<td>' + select2 + '<select class="year" name="year_end_' + compteur + '" placeholder="Ann&eacute;e">';
            for (var i = minOffset; i <= maxOffset; i++) {
                var year = thisYear - i;
                html += "<option value='" + year + "'>" + year + "</option>";
            }
            html += '</select></td>' +

                '<td><input type="text" name="fontion_' + compteur + '" ></td>' +
                '<td><input type="text" name="projet_name_' + compteur + '" ></td>' +
                '<td><a href="#" class="delete_exp">SUPPRIMER</a></td></tr>';
            var tab_exp = $('#tab_exp');
            tab_exp.find('tbody').append(html);
            compteur++;
            $("#compteur").val(compteur);
        })

        $(document).on('click', 'a.delete_exp', function (e) {
            $(this).parents('tr').remove();
            var compteur = $("#compteur").val();
            compteur--;
            $("#compteur").val(compteur);
        })


    });
</script>

    