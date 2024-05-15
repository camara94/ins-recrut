
<?php if(isset($_POST['matricule']) && $_POST['matricule'] != ''):?>
<?php
    $matricule = $_POST['matricule'];

   $table="recrut_personne_recrut";
   $where = "matricule = '$matricule'";
   $info_candidat = get_by($table,$where);

   //fil departement
    $where = 'CodReg = '.$info_candidat['region'];
    $departements = array('0'=>'selectionnez un departement');
    $departements +=  dropdown('recrut_departement','CodDep','NomDep',$where);

    //fil sousprefecture
    $where = 'CodDep = '.$info_candidat['departement'];
    $sousprefectures = array('0'=>'selectionnez une sousprefecture');
    $sousprefectures +=  dropdown('recrut_sprefecture','CodSp','NomSp',$where);

?>

    <div style="display: block;text-align: center;background: #2b542c;padding: 5px;color:white;font-weight: bold">MODIFICATION MES INFORMATIONS</div>


    <form id="multiphase" action="<?php echo BASE_URL.'recrutement.php'?>" method="post" enctype="multipart/form-data"
          class="form-horizontal form_recrut_update">

        <div>
            <div style="position:absolute;width:200px;color: black;font-size: 14px;font-weight:normal;margin-left:70px; padding:10px;background-color: #f29400;margin-bottom: -45px;">
                IDENTIFICATION DU POSTULANT</div>
        </div>



        <div style="width:645px; margin:auto; margin-top:5px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
            <!--    --><?php //if($_SESSION['statusMsg']): ?>
            <!--        <p  class="error_widget " style="background-color: green">--><?php //echo $_SESSION['statusMsg']; ?><!--</p>-->
            <!--    --><?php //endif; session_destroy(); ?>
            <!--    --><?php //echo validation_errors('<div class="error">', '</div>'); ?>
            <div style="width: 500px; margin-left: 52px; margin-right: 52px">


                <div id="div_info_pers">

                    <div>
                        <!--        information sur le postulant -->
                        <div class="top-30">

                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-6 control-label text-bold"></label>
                                <div class="col-sm-6">
                                    <img for="inputPassword3" class="col-sm-6 control-label text-bold" id="view_photo" src="uploads/files/<?php echo $info_candidat['photo'] ;?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">NOM <span style="color:red">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="name_postulant" class="form-control" pattern="[A-Z\s]{1,}" title="SAISIR EN MAJUSCULE ET SANS ACCENT"
                                           id="" placeholder="" required value="<?php echo $info_candidat['name'];?>"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">PRENOMS <span style="color:red">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="surname_postulant" class="form-control"  id="" placeholder=""
                                           pattern="[A-Z\s]{1,}" title="SAISIR EN MAJUSCULE ET SANS ACCENT" value="<?php echo $info_candidat['last_name'];?>"  required  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">DATE DE NAISSANCE (JJ/MM/AAAA) <span style="color:red">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="date_naiss" class="form-control datepicker"  value="<?php echo $info_candidat['date_naiss'];?>" placeholder="" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">LIEU DE NAISSANCE <span style="color:red">(*)</span></label>
                                <div class="col-sm-8">
                                    <input type="text" name="lieu_naissance" class="form-control" pattern="[A-Z\s]{1,}" title="SAISIR EN MAJUSCULE ET SANS ACCENT"
                                           id="" placeholder="" required  value="<?php echo $info_candidat['lieu_naiss'];?>" >
                                </div>
                            </div>
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
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">SEXE <span style="color:red">(*)</span></label>
                                <div class="col-sm-8">
                                    <label class="radio-inline">
                                        <input type="radio" id="inlineCheckbox1" name="sex" value="1" required <?php if($info_candidat['sexe'] == 1)  echo 'checked';?>> M
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" id="inlineCheckbox2" name="sex" value="2" <?php if($info_candidat['sexe'] == 2)  echo 'checked';?>> F
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <div style="position:absolute;width:200px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #f29400;;margin-bottom: -45px;">
                CONTACTS ET EMAIL</div>
        </div>

        <div style="width:645px; margin:auto; margin-top:5px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">

            <div style="width: 500px; margin-left: 52px; margin-right: 52px">


                <div id="div_info_pers">

                    <div>
                        <div class="top-30">
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">EMAIL </label>
                                <div class="col-sm-8">
                                    <input type="email" name="email" class="form-control" autocomplete="off"  id="" placeholder=""
                                           value="<?php echo $info_candidat['email'];?>" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <div style="position:absolute;width:200px;color:black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #f29400;;margin-bottom: -45px;">
                AUTRES INFORMATIONS UTILS</div>
        </div>

        <div style="width:645px; margin:auto; margin-top:5px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">

            <div style="width: 500px; margin-left: 52px; margin-right: 52px">


                <div id="div_info_pers">

                    <div>
                        <div class="top-30">

                            <?php
                            $options = array(
                                '' => "Selectionnez votre Niveau d'Etudes",
                                '1'  => 'CM2',
                                '2'    => 'CEPE',
                                '3'   => 'CAP',
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
                                '17' => 'DEUG/DUT/LICENCE 2',
                                '18' => 'LICENCE 3',
                                '19' => 'MAITRISE / MASTER 1',
                                '20' => 'MASTER 2 / DEA',
                                '21' => 'DOCTORAT',
                            );
                            ?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">NIVEAU D'ETUDES <span style="color:red">(*)</span></label>
                                <div class="col-sm-8">
                                    <?php echo form_dropdown('niveau_etude', $options,$info_candidat['niveau_etude'],'class="form-control drop_niveau_etude" ');?>
                                </div>
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
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">SPECIALITE (FILIERE) </label>
                                <div class="col-sm-8">
                                    <input type="text" name="last_diplome" class="form-control" autocomplete="off"  id="" placeholder="SAISIR EN MAJUSCULE ET SANS CARACTERES SPECIAUX"
                                           pattern="[A-Z\s]{1,}" title="SAISIR EN MAJUSCULE ET SANS CARACTERES SPECIAUX"
                                           value="<?php echo $info_candidat['last_diplome'];?>">
                                    <!--                    --><?php //echo form_dropdown('last_diplome', $last_diploma, '','class="form-control drop_last_diplome" ');?>
                                </div>
                            </div>

                            <?php
                            $status = array(
                                '' => "Selectionnez votre statut",
                               // 'ELEVE'  => 'ELEVE',
                                'ETUDIANT'   => "ETUDIANT ",
                                'TRAVAILLEUR'    => 'TRAVAILLEUR',
                                'CHOMEUR'   => 'CHOMEUR ',
                                'SANS_EMPLOI'   => 'SANS EMPLOI ',
                            );
                            ?>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">STATUT <span style="color:red">(*)</span></label>
                                <div class="col-sm-8">
                                    <!--                    <input type="text" name="statut" class="form-control"  id="" placeholder="" required>-->
                                    <?php echo form_dropdown('status', $status, $info_candidat['statut_recrut'],'class="form-control " ');?>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div>
            <div style="position:absolute;width:210px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #f29400;;margin-bottom: -45px;">
                LANGUES NATIONALES PARLEES COURAMMENT</div>
        </div>

        <div style="width:645px; margin:auto; margin-top:0px; padding-top:20px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">

            <div style="width: 500px; margin-left: 52px; margin-right: 52px">


                <div id="div_info_pers">

                    <div>
                        <div class="top-30">


                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">PREMIERE LANGUE  <span style="font-weight:500;">
                          (saisir <span style="color:red">aucune</span> si l'on ne parle aucune langue)</span></label>
                                <div class="col-sm-8">
                                    <select  name="first_langue" class="form-control combobox"  required ">
                                        <option value="">selectionner langue</option>
                                        <option value="ABBEY">ABBEY</option>
                                        <option value="ABIDJI">ABIDJI</option><option value="ABOURE">ABOURE</option><option value="ABRON">ABRON</option>
                                        <option value="ADJOUKROU">ADJOUKROU</option><option value="AGNI">AGNI</option><option value="AHIZI">AHIZI</option>
                                        <option value="ALLADIAN">ALLADIAN</option><option value="APPOLO">APPOLO OU N'ZIMA</option><option value="AKYE">AKYE OU ATTIE</option>
                                        <option value="AVIKAM">AVIKAM OU BRIGAM</option><option value="BAKWE">BAKWE</option><option value="BAMBARA">BAMBARA</option>
                                        <option value="BAOULE">BAOULE</option><option value="BETE">BETE</option><option value="BIRIFOR">BIRIFOR</option>
                                        <option value="CONJA">CONJA</option><option value="DEGHA">DEGHA</option><option value="DIDA">DIDA</option>
                                        <option value="DIOULA">DIOULA</option><option value="DJIMINI">DJIMINI</option><option value="DOMA">DOMA</option>
                                        <option value="EBRIE">EBRIE</option><option value="EGA">EGA</option><option value="EHOTILE">EHOTILE</option>
                                        <option value="ESSOUMA">ESSOUMA</option><option value="FOULA">FOULA</option><option value="GAGOU">GAGOU</option>
                                        <option value="GBIN">GBIN</option><option value="GNABOUA">GNABOUA</option><option value="GODIE">GODIE</option>
                                        <option value="GOUIN">GOUIN OU KIRMA</option><option value="GOURO">GOURO</option><option value="GUERE">GUERE</option>
                                        <option value="KAMARA">KAMARA OU KOMARA</option><option value="KODIA">KODIA</option><option value="KOMONO">KOMONO</option>
                                        <option value="KORO">KORO</option><option value="KOTROHOU">KOTROHOU</option><option value="KOULANGO">KOULANGO</option>
                                        <option value="KOUYA">KOUYA</option><option value="KOUZIE">KOUZIE</option><option value="KOYAKA">KOYAKA OU KOYARA</option>
                                        <option value="KROBOU">KROBOU</option><option value="KROUMIEN">KROUMIEN</option><option value="LOBI">LOBI</option>
                                        <option value="LOHRON">LOHRON</option><option value="MAHOU">MAHOU OU MAHOUKA</option><option value="MALINKE">MALINKE OU MANINKA</option>
                                        <option value="MBATTO">MBATTO</option><option value="MONA">MONA OU MOUAN</option><option value="NAFANA">NAFANA</option>
                                        <option value="NEYO">NEYO</option><option value="NGAIN">NGAIN</option><option value="NIEDEBOUA">NIEDEBOUA</option>
                                        <option value="NIGBI">NIGBI</option><option value="OUADOUGOU">OUADOUGOU</option><option value="OUAN">OUAN</option>
                                        <option value="OUBI">OUBI</option><option value="OUODOUGOU">OUODOUGOU</option><option value="SAMOGHO">SAMOGHO</option>
                                        <option value="SENOUFO">SENOUFO</option><option value="SITI">SITI</option><option value="TAGOUANA">TAGOUANA</option>
                                        <option value="TOURA">TOURA</option><option value="WANE">WANE</option><option value="WOBE">WOBE</option>
                                        <option value="YACOUBA">YACOUBA OU DAN</option><option value="YAOURE">YAOURE</option><option value="AUCUNE">AUCUNE</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-4 control-label text-bold">SECONDE LANGUE </label>
                                <div class="col-sm-8">
                                    <!--<input type="text" name="second_langue" class="form-control"  id="" placeholder="" style="text-transform:uppercase"  >-->
                                    <select  name="second_langue" class="form-control combobox"  required>
                                        <option value="">selectionner langue</option>
                                        <option value="ABBEY">ABBEY</option>
                                        <option value="ABIDJI">ABIDJI</option><option value="ABOURE">ABOURE</option><option value="ABRON">ABRON</option>
                                        <option value="ADJOUKROU">ADJOUKROU</option><option value="AGNI">AGNI</option><option value="AHIZI">AHIZI</option>
                                        <option value="ALLADIAN">ALLADIAN</option><option value="APPOLO">APPOLO OU N'ZIMA</option><option value="AKYE">AKYE OU ATTIE</option>
                                        <option value="AVIKAM">AVIKAM OU BRIGAM</option><option value="BAKWE">BAKWE</option><option value="BAMBARA">BAMBARA</option>
                                        <option value="BAOULE">BAOULE</option><option value="BETE">BETE</option><option value="BIRIFOR">BIRIFOR</option>
                                        <option value="CONJA">CONJA</option><option value="DEGHA">DEGHA</option><option value="DIDA">DIDA</option>
                                        <option value="DIOULA">DIOULA</option><option value="DJIMINI">DJIMINI</option><option value="DOMA">DOMA</option>
                                        <option value="EBRIE">EBRIE</option><option value="EGA">EGA</option><option value="EHOTILE">EHOTILE</option>
                                        <option value="ESSOUMA">ESSOUMA</option><option value="FOULA">FOULA</option><option value="GAGOU">GAGOU</option>
                                        <option value="GBIN">GBIN</option><option value="GNABOUA">GNABOUA</option><option value="GODIE">GODIE</option>
                                        <option value="GOUIN">GOUIN OU KIRMA</option><option value="GOURO">GOURO</option><option value="GUERE">GUERE</option>
                                        <option value="KAMARA">KAMARA OU KOMARA</option><option value="KODIA">KODIA</option><option value="KOMONO">KOMONO</option>
                                        <option value="KORO">KORO</option><option value="KOTROHOU">KOTROHOU</option><option value="KOULANGO">KOULANGO</option>
                                        <option value="KOUYA">KOUYA</option><option value="KOUZIE">KOUZIE</option><option value="KOYAKA">KOYAKA OU KOYARA</option>
                                        <option value="KROBOU">KROBOU</option><option value="KROUMIEN">KROUMIEN</option><option value="LOBI">LOBI</option>
                                        <option value="LOHRON">LOHRON</option><option value="MAHOU">MAHOU OU MAHOUKA</option><option value="MALINKE">MALINKE OU MANINKA</option>
                                        <option value="MBATTO">MBATTO</option><option value="MONA">MONA OU MOUAN</option><option value="NAFANA">NAFANA</option>
                                        <option value="NEYO">NEYO</option><option value="NGAIN">NGAIN</option><option value="NIEDEBOUA">NIEDEBOUA</option>
                                        <option value="NIGBI">NIGBI</option><option value="OUADOUGOU">OUADOUGOU</option><option value="OUAN">OUAN</option>
                                        <option value="OUBI">OUBI</option><option value="OUODOUGOU">OUODOUGOU</option><option value="SAMOGHO">SAMOGHO</option>
                                        <option value="SENOUFO">SENOUFO</option><option value="SITI">SITI</option><option value="TAGOUANA">TAGOUANA</option>
                                        <option value="TOURA">TOURA</option><option value="WANE">WANE</option><option value="WOBE">WOBE</option>
                                        <option value="YACOUBA">YACOUBA OU DAN</option><option value="YAOURE">YAOURE</option><option value="AUCUNE">AUCUNE</option>
                                    </select>

                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div>
            <div style="position:absolute;width:200px;color: black;font-size: 14px;font-weight: normal;margin-left:70px; padding:10px;background-color: #f29400;;margin-bottom: -45px;">
                LIEU D'AFFECTATION SOUHAITÉ
            </div>
        </div>

        <div style="width:645px; margin:auto; margin-top:5px; padding-top:10px; padding-bottom:20px;background-color:#f1f1f1; margin-bottom:20px">
            <div class="" style="margin-top:70px">

                <div class="col-xs-12">
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-6 control-label text-bold">REGION DE RESIDENCE

                        </label>
                        <div class="col-sm-6">
                            <?php echo form_dropdown('region', $regions,$info_candidat['region'] ,'class="form-control drop_region" ');?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-6 control-label text-bold">DEPARTEMENT DE RESIDENCE </label>
                        <div class="col-sm-6">
                            <?php echo form_dropdown('departement', $departements, $info_candidat['departement'],'class="form-control drop_departement" ');?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-6 control-label text-bold">SOUS-PREFECTURE / COMMUNE DE RESIDENCE </label>
                        <div class="col-sm-6">
                            <?php echo form_dropdown('sousprefecture', $sousprefectures, $info_candidat['sousprefecture'],'class="form-control drop_ssp" ');?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-6 control-label text-bold">1ère LOCALITE D'AFFECTATION SOUHAITÉ  </label>
                        <div class="col-sm-6">
                            <input type="text" name="lieuresidence" class="form-control"  id="inputEmail3" placeholder=""
                                   style="text-transform:uppercase"  value="<?php echo $info_candidat['localite1'];?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-6 control-label text-bold">2ème LOCALITE D'AFFECTATION SOUHAITÉ  </label>
                        <div class="col-sm-6">
                            <input type="text" name="lieuresidence2" class="form-control"  id="inputEmail3" placeholder=""
                                   style="text-transform:uppercase" value="<?php echo $info_candidat['localite2'];?>" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-6 control-label text-bold">3ème LOCALITE D'AFFECTATION SOUHAITÉ  </label>
                        <div class="col-sm-6">
                            <input type="text" name="lieuresidence3" class="form-control"  id="inputEmail3" placeholder=""
                                   style="text-transform:uppercase"  value="<?php echo $info_candidat['localite3'];?>">
                        </div>
                    </div>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>







        <hr style="border-top: 1px solid #231f1f;">

        <div class="form-group top-30" style="text-align:center;color:red;font-weight: bold">
            Cliquez sur le bouton "Modifier mes information" si vous avez fini de les modifier , Nous vous recontacterons si vous &ecirc;tes pr&eacute;selectionn&eacute;.
        </div>

        <input type="hidden" name="matricule" class=""  id="matricule" placeholder="" value="<?php echo $matricule;?>">
        <input type="hidden" name="idPerson" class=""  id="idPers" placeholder="" value="<?php echo $info_candidat['id'];?>">
        <input type="hidden" name="photo" class=""  id="photo" placeholder="" value="<?php echo $info_candidat['photo'];?>">


        <div class="form-group top-30" >

            <div class="col-sm-offset-5 col-sm-7">
                <input type="submit" name="formSubmitUpdate" class="btn btn-default" value="Modifier Mes Informations"  />
            </div>
        </div>
        <div class="form-group top-30" style="text-align:left; ">
            <span style="color:red;font-weight: bold">NB:</span> Tous les champs comportant <span style="color:red;font-weight: bold">(*)</span> sont obligatoires.
        </div>
        </div>

    </form>
    </div>
    </div>
<?php else: ?>
    <?php echo "<div style='text-align:center;font-weight: bold'>Veuillez cliquer puis saisir correctement votre matricule : 
                      <a href='http://www.ins.ci/n/recrutementRp'>ICI</a></div>"; ?>
<?php endif; ?>



<script>
    $(document).ready(function($){


        $('#part_one').on('click',function(e){
            e.preventDefault();
            $( "form.form_recrut" ).validate();
            var divParent = $(this).parents('#div_info_pers');
            divParent.hide();
            divParent.next().show();
        })

        $('#part_two').on('click',function(e){
            e.preventDefault();
            var divParent = $(this).parents('#div_second_pers');
            divParent.hide();
            divParent.prev().show();
        })




        $('#part_add_exp').on('click',function(e){
            e.preventDefault();
            var compteur = $("#compteur").val();
            var minOffset = 0, maxOffset = 100; // Change to whatever you want // minOffset = 0 for current year
            var thisYear = (new Date()).getFullYear();
            var select1 ='<select name="mois_deb_'+compteur+'" class="form-control drop_fonction_1 valid" aria-invalid="false">' +
                '<option value="janvier">Janvier</option>'+
                '<option value="fevrier">F&eacute;vrier</option>'+
                '<option value="mars">Mars</option>'+
                '<option value="avril">Avril</option>'+
                '<option value="mai">Mai</option>'+
                '<option value="juin">Juin</option>'+
                '<option value="juillet">Juillet</option>'+
                '<option value="aout">Ao&ucirc;t </option>'+
                '<option value="septembre">Septembre </option>'+
                '<option value="octobre">Octobre</option>'+
                '<option value="novembre">Novembre</option>'+
                '<option value="decembre">D&eacute;cembre</option>'+
                '</select>';
            var select2 ='<select name="mois_end_'+compteur+'" class="form-control drop_fonction_1 valid" aria-invalid="false">' +
                '<option value="janvier">Janvier</option>'+
                '<option value="fevrier">F&eacute;vrier</option>'+
                '<option value="mars">Mars</option>'+
                '<option value="avril">Avril</option>'+
                '<option value="mai">Mai</option>'+
                '<option value="juin">Juin</option>'+
                '<option value="juillet">Juillet</option>'+
                '<option value="aout">Ao&ucirc;t </option>'+
                '<option value="septembre">Septembre </option>'+
                '<option value="octobre">Octobre</option>'+
                '<option value="novembre">Novembre</option>'+
                '<option value="decembre">D&eacute;cembre</option>'+
                '</select>';
            var html = '<tr><td><input type="text" name="employeur_'+compteur+'"></td>'+
                '<td>'+select1+'<select class="year" name="year_deb_'+compteur+'" placeholder="Ann&eacute;e">';
            for (var i = minOffset; i <= maxOffset; i++) {
                var year = thisYear - i;
                html += "<option value='"+year+"'>"+year+"</option>";
            }
            html += '</select></td>'+

                '<td>'+select2+'<select class="year" name="year_end_'+compteur+'" placeholder="Ann&eacute;e">';
            for (var i = minOffset; i <= maxOffset; i++) {
                var year = thisYear - i;
                html += "<option value='"+year+"'>"+year+"</option>";
            }
            html +='</select></td>'+

                '<td><input type="text" name="fontion_'+compteur+'" ></td>'+
                '<td><input type="text" name="projet_name_'+compteur+'" ></td>'+
                '<td><a href="#" class="delete_exp">SUPPRIMER</a></td></tr>';
            var tab_exp = $('#tab_exp');
            tab_exp.find('tbody').append(html);
            compteur++;
            $("#compteur").val(compteur);
        })

        $(document).on('click','a.delete_exp',function(e){
            $(this).parents('tr').remove();
            var compteur = $("#compteur").val();
            compteur--;
            $("#compteur").val(compteur);
        })


        $('#part_add_formation').on('click',function(e){
            e.preventDefault();
            var compteur_school = $("#compteur_school").val();
            var minOffset = 0, maxOffset = 100; // Change to whatever you want // minOffset = 0 for current year
            var thisYear = (new Date()).getFullYear();
            var select1 ='<select name="school_mois_deb_'+compteur_school+'" class="form-control drop_fonction_1 valid" aria-invalid="false">' +
                '<option value="janvier">Janvier</option>'+
                '<option value="fevrier">F&eacute;vrier</option>'+
                '<option value="mars">Mars</option>'+
                '<option value="avril">Avril</option>'+
                '<option value="mai">Mai</option>'+
                '<option value="juin">Juin</option>'+
                '<option value="juillet">Juillet</option>'+
                '<option value="aout">Ao&ucirc;t </option>'+
                '<option value="septembre">Septembre </option>'+
                '<option value="octobre">Octobre</option>'+
                '<option value="novembre">Novembre</option>'+
                '<option value="decembre">D&eacute;cembre</option>'+
                '</select>';
            var select2 ='<select name="school_mois_end_'+compteur_school+'" class="form-control drop_fonction_1 valid" aria-invalid="false">' +
                '<option value="janvier">Janvier</option>'+
                '<option value="fevrier">F&eacute;vrier</option>'+
                '<option value="mars">Mars</option>'+
                '<option value="avril">Avril</option>'+
                '<option value="mai">Mai</option>'+
                '<option value="juin">Juin</option>'+
                '<option value="juillet">Juillet</option>'+
                '<option value="aout">Ao&ucirc;t </option>'+
                '<option value="septembre">Septembre </option>'+
                '<option value="octobre">Octobre</option>'+
                '<option value="novembre">Novembre</option>'+
                '<option value="decembre">D&eacute;cembre</option>'+
                '</select>';

            var select3 ='<select name="school_type_'+compteur_school+'" class="form-control drop_fonction_1 valid" aria-invalid="false">' +
                '<option value="universite">Universit&eacute;</option>'+
                '<option value="grd_ecole">Grande Ecole</option>'+
                '<option value="ets_secondaire">Etablissement Secondaire</option>'+
                '</select>';
            var html = '<tr>'+
                '<td>'+select3+'</td>'+
                '<td><input type="text" name="school_name_'+compteur_school+'"></td>'+
                '<td>'+select1+'<select class="year" name="school_year_deb_'+compteur_school+'" placeholder="Ann&eacute;e">';
            for (var i = minOffset; i <= maxOffset; i++) {
                var year = thisYear - i;
                html += "<option value='"+year+"'>"+year+"</option>";
            }
            html +='</select></td>'+

                '<td>'+select2+'<select class="year" name="school_year_end_'+compteur_school+'" placeholder="Ann&eacute;e">';
            for (var i = minOffset; i <= maxOffset; i++) {
                var year = thisYear - i;
                html += "<option value='"+year+"'>"+year+"</option>";
            }
            html +='</select></td>'+
                '<td><input type="text" name="school_classe_'+compteur_school+'" ></td>'+
                '<td><a href="#" class="delete_school">SUPPRIMER</a></td></tr>';
            var tab_formation = $('#tab_formation');
            tab_formation.find('tbody').append(html);
            compteur_school++;
            $("#compteur_school").val(compteur_school);
        })

        $(document).on('click','a.delete_school',function(e){
            $(this).parents('tr').remove();
            var compteur_school = $("#compteur_school").val();
            compteur_school--;
            $("#compteur_school").val(compteur_school);
        })
    });
</script>

<script>
    $( function() {
        $.widget( "custom.combobox", {
            _create: function() {
                this.wrapper = $( "<span>" )
                    .addClass( "custom-combobox" )
                    .insertAfter( this.element );

                this.element.hide();
                this._createAutocomplete();
                this._createShowAllButton();
            },

            _createAutocomplete: function() {
                var selected = this.element.children( ":selected" ),
                    value = selected.val() ? selected.text() : "";

                this.input = $( "<input>" )
                    .appendTo( this.wrapper )
                    .val( value )
                    .attr( "title", "" )
                    .addClass( "custom-combobox-input ui-widget ui-widget-content ui-state-default ui-corner-left" )
                    .autocomplete({
                        delay: 0,
                        minLength: 0,
                        source: $.proxy( this, "_source" )
                    })
                    .tooltip({
                        classes: {
                            "ui-tooltip": "ui-state-highlight"
                        }
                    });

                this._on( this.input, {
                    autocompleteselect: function( event, ui ) {
                        ui.item.option.selected = true;
                        this._trigger( "select", event, {
                            item: ui.item.option
                        });
                    },

                    autocompletechange: "_removeIfInvalid"
                });
            },

            _createShowAllButton: function() {
                var input = this.input,
                    wasOpen = false;

                $( "<a>" )
                    .attr( "tabIndex", -1 )
                    .attr( "title", "Lister tous" )
                    .tooltip()
                    .appendTo( this.wrapper )
                    .button({
                        icons: {
                            primary: "ui-icon-triangle-1-s"
                        },
                        text: false
                    })
                    .removeClass( "ui-corner-all" )
                    .addClass( "custom-combobox-toggle ui-corner-right hidden" )
                    .on( "mousedown", function() {
                        wasOpen = input.autocomplete( "widget" ).is( ":visible" );
                    })
                    .on( "click", function() {
                        input.trigger( "focus" );

                        // Close if already visible
                        if ( wasOpen ) {
                            return;
                        }

                        // Pass empty string as value to search for, displaying all results
                        input.autocomplete( "search", "" );
                    });
            },

            _source: function( request, response ) {
                var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
                response( this.element.children( "option" ).map(function() {
                    var text = $( this ).text();
                    if ( this.value && ( !request.term || matcher.test(text) ) )
                        return {
                            label: text,
                            value: text,
                            option: this
                        };
                }) );
            },

            _removeIfInvalid: function( event, ui ) {

                // Selected an item, nothing to do
                if ( ui.item ) {
                    return;
                }

                // Search for a match (case-insensitive)
                var value = this.input.val(),
                    valueLowerCase = value.toLowerCase(),
                    valid = false;
                this.element.children( "option" ).each(function() {
                    if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                        this.selected = valid = true;
                        return false;
                    }
                });

                // Found a match, nothing to do
                if ( valid ) {
                    return;
                }

                // Remove invalid value
                this.input
                    .val( "" )
                    .attr( "title", value + " n'existe pas dans la liste des ethnies" )
                    .tooltip( "open" );
                this.element.val( "" );
                this._delay(function() {
                    this.input.tooltip( "close" ).attr( "title", "" );
                }, 2500 );
                this.input.autocomplete( "instance" ).term = "";
            },

            _destroy: function() {
                this.wrapper.remove();
                this.element.show();
            }
        });

        $( ".combobox" ).combobox();

    } );
</script>


<script src="<?php echo BASE_URL.'assets/js/jquery-mask.js';?>"></script>
<script src="<?php echo BASE_URL.'assets/js/jquery.validate.min.js'; ?>"></script>
<script src="<?php echo BASE_URL.'assets/js/additional-methods.min.js';?>"></script>

<script>

    $.validator.addMethod('filesize', function(value, element, param) {
        // param = size (in bytes)
        // element = element to validate (<input>)
        // value = value of the element (file name)
        return this.optional(element) || (element.files[0].size <= param)
    });

    $( "form.form_recrut_update" ).validate({
        rules: {
            name_postulant:"required",
            surname_postulant:"required",
            date_naiss:"required",
            lieu_naissance:"required",
            status:"required",
            sex:"required",
            email: {
                email: true,
                required: true,
            },
            contact_1: "required",
            first_langue: "required",

            status: {
                required: true,
            },
            niveau_etude: {
                required: true,
            },
            sex: {
                required: true,
            }

        },
        messages: {
            lieuresidence: "Veuillez renseigner le champs lieu de r&eacute;sidence en majuscule et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            name_postulant: "Veuillez renseigner le champs nom en majuscule  et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            surname_postulant: "Veuillez renseigner le champs pr&eacute;nom(s) en majuscule  et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            date_naiss: "Veuillez renseigner le champs date de naissance",
            lieu_naissance: "Veuillez renseigner le champs lieu de naissance en majuscule  et sans caracteres speciaux (Ex: &eacute;, &egrave;, &Eacute;,&ecirc; ,&Egrave;,  &agrave;, &ocirc;,...)",
            status: "Veuillez renseigner le champs  statut",
            sex: "",
            contact_1: "Veuillez renseigner le champs contact",
            first_langue: "Veuillez renseigner le champs 1&egrave;re langue nationale parl&eacute;e si aucune langue saisir aucune",

            email: "Veuillez saisir une addresse email correcte",

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
//        submitHandler: function(form) {
//            // some other code
//            // maybe disabling submit button
//            // then:
//            $(form).submit();
//        }
    });
</script>