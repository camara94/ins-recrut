
<?= $this->extend('admin/includes/base') ?>

<?= $this->section('title') ?>
    Online recruitment INS
<?= $this->endSection() ?>

<?= $this->section('style') ?>
    <style>
        .docs{
            height:900px; 
            /* border:5px solid red; */
            overflow-y: scroll; 
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- pour recupere  la variable prefecture id -->

<section class="dasbord_section">
    <div class="row">       
        
        <form class="col-12 mt-3" action="/index.php/postulant/depouille" method="POST">
            <?php foreach ($person as $key => $value):?>
                <div class="row border-bottom mb-2">
                    <div class="col">
                        <div class="h2 pb-3 text-uppercase">DEPOUILLEMENT DE DOSSIERS (<?= $value->matricule ?> <?= $value->name ?> <?= $value->last_name ?> )</div>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-1 image"> 
                    <?php
                        $project_id = $value->id_projet; 
                        $project_name = $value->project_name; 
                        
                        $image_path = 'uploads/files/'.$value->photo;
                        if(file_exists($image_path)) {
                            echo '<img src="' .base_url($image_path).'" alt="PHOTO ..." class="rounded">';
                        }else {
                            echo'<img src="'.base_url('assets/images/logo-rgph4.jpg').'" alt="PHOTO ..." class="img-flui" class="rounded" />';
                        }
                    ?>                         
                    </div>
                    <div class="col-3">
                        <div class="row mb-1"> <div class="col"><h3 class="bg-warning p-1 text- " style="border-radius:3px;">Informations </h3> </div> </div>                         
                        <div class="row mb-1"> <div class="col font-weight-bold"> Matricule </div> <div class="col"> <?= $value->matricule ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Prénoms </div> <div class="col"> <?= $value->name ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Nom </div> <div class="col"> <?= $value->last_name ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Sexe </div> <div class="col"> <?= $value->sexe ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Phone </div> <div class="col"> <?= $value->contact1 ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Email </div> <div class="col"> <?= $value->email ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Pièce </div> <div class="col"> <?= strtoupper($value->type_piece) ?> <?= $value->numero_cni ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Naissance </div> <div class="col"> <?= strtoupper($value->lieu_naiss) ?> - <?= $value->date_naiss ?> </div> </div>  
                        <?php 
                            $annee_naiss = intval(substr($value->date_naiss, 0, 4));
                            if($annee_naiss < 1900){
                                $annee_naiss = intval(substr($value->date_naiss, -4));
                            }
                            $age = intval(date('Y')) - $annee_naiss;
                        ?>                
                        <div class="row mb-1"> <div class="col font-weight-bold"> Age </div> <div class="col"> <?= $age ?> ans</div> </div>                  
                        <div class="row mb-1"> <div class="col font-weight-bold"> Papa </div> <div class="col"> <?= $value->namepere ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Maman </div> <div class="col"> <?= $value->namemere ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Tuteur </div> <div class="col"> <?= $value->nomtuteurlegal ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Contact Tuteur </div> <div class="col"> <?= $value->contact2 ?> </div> </div>
                        <!-- <div class="row mb-1"> <div class="col font-weight-bold"> Statut </div> <div class="col"> <?= $value->status ?> </div> </div> -->
                        <div class="row mb-1"> <div class="col font-weight-bold"> Niveaux d'Etudes </div> <div class="col"> <?= $value->niveau_etude ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Langues Parlées </div> <div class="col"> <?= $value->langue1.'/'.$value->langue2.'/'.$value->langue3 ?> </div> </div>
                        <div class="row mb-1"> <div class="col font-weight-bold"> Experiences </div> <div class="col"> <?= $value->exp_intitule_poste ?> </div> </div>
                        <div class="row mt-3"> 
                            <div class="col">
                                <h3 class="bg-warning p-1 text- " style="border-radius:3px;">Sélectionner les dossiers et conformité </h3>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <?php if(!empty($value->cv)){?>  
                                                <div class="custom-control  custom-checkbox mt-2">
                                                    <input type="checkbox" class="custom-control-input" name="checkCV" value="1" id="checkCV" <?php if(isset($depouillements->cv) == 1 && $depouillements->cv == 1) echo " checked"; ?>>
                                                    <label class="custom-control-label" for="checkCV">Curriculum Vitae</label>
                                                </div> &nbsp;&nbsp;
                                            <?php }?>  
                                            <?php if(!empty($value->cni)){?>
                                                <div class="custom-control  custom-checkbox mt-2">
                                                    <input type="checkbox" class="custom-control-input" name="checkPI" value="1" id="checkPI" <?php if(isset($depouillements->pi) == 1 && $depouillements->pi == 1) echo " checked"; ?>>
                                                    <label class="custom-control-label" for="checkPI"> Pièce d'Identité</label>
                                                </div> &nbsp;&nbsp;
                                            <?php }?> 
                                            <?php if(!empty($value->certifmedical)){?>
                                                <div class="custom-control  custom-checkbox mt-2">
                                                    <input type="checkbox" class="custom-control-input" name="checkCM" value="1" id="checkCM" <?php if(isset($depouillements->cm) == 1 && $depouillements->cm == 1) echo " checked"; ?>>
                                                    <label class="custom-control-label" for="checkCM">Certificat Médical</label>
                                                </div> &nbsp;&nbsp;
                                            <?php }?>
                                            <?php if(!empty($value->attestcollecte)){?>
                                                <div class="custom-control  custom-checkbox mt-2">
                                                    <input type="checkbox" class="custom-control-input" id="checkAE" name="checkAE" value="1" <?php if(isset($depouillements->ae) == 1 && $depouillements->ae == 1) echo " checked"; ?>>
                                                    <label class="custom-control-label" for="checkAE">Attestation d'Expérience</label>
                                                </div> &nbsp;&nbsp; 
                                            <?php }?>
                                            <?php if(!empty($value->doc_last_diplome)){?>
                                                <div class="custom-control  custom-checkbox mt-2">
                                                    <input type="checkbox" class="custom-control-input" id="checkDE" name="checkDE" value="1" <?php if(isset($depouillements->de) == 1 && $depouillements->de == 1) echo " checked"; ?>>
                                                    <label class="custom-control-label" for="checkDE">Diplome d'Etude</label>
                                                </div> &nbsp;&nbsp; 
                                            <?php }?>
                                            <?php if(!empty($value->certifresidence)){?>
                                                <div class="custom-control  custom-checkbox mt-2">
                                                    <input type="checkbox" class="custom-control-input" id="checkCR" name="checkCR" value="1" <?php if(isset($depouillements->cr) == 1 && $depouillements->cr == 1) echo " checked"; ?>>
                                                    <label class="custom-control-label" for="checkCR">Certificat de Residence</label>
                                                </div> &nbsp;&nbsp; 
                                            <?php }?>
                                            <?php if(!empty($value->casier)){?>
                                                <div class="custom-control  custom-checkbox mt-2">
                                                    <input type="checkbox" class="custom-control-input" id="checkCJ" name="checkCJ" value="1" <?php if(isset($depouillements->cj) == 1 && $depouillements->cj == 1) echo " checked"; ?>>
                                                    <label class="custom-control-label" for="checkCJ">Casier Judiciaire</label>
                                                </div> 
                                            <?php }?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="row mt-3"> 
                            <div class="col font-weight-bold"> 
                                <h3 class="bg-warning p-1 text- " style="border-radius:3px;">Sélectionner les Indicateurs (<?= strtoupper($project_name) ?>) </h3>                            
                            </div>
                        </div>


                        <div class="row py-2"> 
                            <div class="col-12">  
                                <?php if(intval($project_id) == 12){ ?>
                                <!-- TECHNICIENS DE LABORATOIRE -->
                                <div class="card">
                                    <!-- <div class="card-header">  </div> -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Age : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age121" name="age12" class="custom-control-input" value="0" <?php if($age < 18) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age121"> Moins de 18 ans </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age122" name="age12" class="custom-control-input" value="3" <?php if($age > 17 && $age < 40) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age122"> 18-39 ans </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age123" name="age12" class="custom-control-input" value="2" <?php if($age > 39 && $age < 51) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age123"> 40-50 ans </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Niveau d'études : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="niv_etu1" name="niv_etu" class="custom-control-input"value="2">
                                                    <label class="custom-control-label" for="niv_etu1"> Inférieur au BAC (CEP, CAP, BEP, BEPC) </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="niv_etu2" name="niv_etu" class="custom-control-input"value="3">
                                                    <label class="custom-control-label" for="niv_etu2"> BAC+2, DEUG, DUT, DES </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="niv_etu3" name="niv_etu" class="custom-control-input"value="5">
                                                    <label class="custom-control-label" for="niv_etu3"> BAC+3 au moins (Licence, Maitrise , Master, DESS, Doctorat). </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Spécialisation : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="sp1" name="sp" class="custom-control-input" value="5">
                                                    <label class="custom-control-label" for="sp1"> Diplômé en Géomatique, SIG, cartographie </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="sp2" name="sp" class="custom-control-input" value="3">
                                                    <label class="custom-control-label" for="sp2"> Diplômé en  informatique </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="sp3" name="sp" class="custom-control-input" value="2">
                                                    <label class="custom-control-label" for="sp3"> Diplômé en géographie </label>
                                                </div>

                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="sp" name="sp" class="custom-control-input" value="1">
                                                    <label class="custom-control-label" for="sp">Autres Diplômes  </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Connaissance en logiciel de cartographie et traitement d'images : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="co_lg_carto_trait_img1" name="co_lg_carto_trait_img" class="custom-control-input" value="5">
                                                    <label class="custom-control-label" for="co_lg_carto_trait_img1"> ArcGis </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="co_lg_carto_trait_img2" name="co_lg_carto_trait_img" class="custom-control-input" value="3">
                                                    <label class="custom-control-label" for="co_lg_carto_trait_img2"> Qgis </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="co_lg_carto_trait_img" class="custom-control-input" name="co_lg_carto_trait_img" value="3">
                                                    <label class="custom-control-label" for="co_lg_carto_trait_img"> MOBAC, GlobalMapper, SAS Planete, Google Earth </label>
                                                </div>

                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="co_lg_carto_trait_img3" name="co_lg_carto_trait_img" class="custom-control-input"value="1">
                                                    <label class="custom-control-label" for="co_lg_carto_trait_img3">Autres logiciels cartographiques</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Travaux cartographiques réalisés : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="trav_carto_realise1" name="trav_carto_realise" class="custom-control-input"value="2">
                                                    <label class="custom-control-label" for="trav_carto_realise1"> Participation à la cartographie censitaire RGPH3 </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="trav_carto_realise2" name="trav_carto_realise" class="custom-control-input"value="10">
                                                    <label class="custom-control-label" for="trav_carto_realise2"> Participation au travaux préparatoires du RGPH4 en cours </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="trav_carto_realise3" name="trav_carto_realise" class="custom-control-input"value="2">
                                                    <label class="custom-control-label" for="trav_carto_realise3">Participation au travaux cartographique à l'IGN</label>
                                                </div>

                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="trav_carto_realise4" name="trav_carto_realise" class="custom-control-input"value="1">
                                                    <label class="custom-control-label" for="trav_carto_realise4">Participation à autres cartographie Assistée par ordinateur (CAO)</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                          
                                <?php } ?>

                                <?php if(intval($project_id) == 18){ ?>
                                <!-- CHAUFFEUR -->
                                <div class="card">
                                    <!-- <div class="card-header">  </div> -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Age : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age18" name="age18" class="custom-control-input" value="0" <?php if($age < 18) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age18"> Moins de 18 ans </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age18-1" name="age18" class="custom-control-input" value="3" <?php if($age > 17 && $age < 35) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age18-1"> 18-34 ans </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age18-2" name="age18" class="custom-control-input" value="3" <?php if($age > 34 && $age < 56) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age18-2"> 35-55 ans </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age18-3" name="age18" class="custom-control-input" value="0" <?php if($age > 55) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age18-3"> Plus de 55 ans </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Diplôme (Permis de conduire) : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dp_chauffeur18" name="dp_chauffeur18" class="custom-control-input" value="3">
                                                    <label class="custom-control-label" for="dp_chauffeur18">Permis de conduire biométrique valide</label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dp_chauffeur18_1" name="dp_chauffeur18" class="custom-control-input" value="2">
                                                    <label class="custom-control-label" for="dp_chauffeur18_1"> Permis de conduire non biométrique valide </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dp_chauffeur18_2" name="dp_chauffeur18" class="custom-control-input" value="0">
                                                    <label class="custom-control-label" for="dp_chauffeur18_2">Pas de permis de conduire </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Expériences  (durée du permis) : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="exp_chauffeur18" name="exp_chauffeur18" class="custom-control-input"  value="5" >
                                                    <label class="custom-control-label" for="exp_chauffeur18">Obtenu avant 2010 </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="exp_chauffeur18_1" name="exp_chauffeur18" class="custom-control-input"  value="3" >
                                                    <label class="custom-control-label" for="exp_chauffeur18_1">Obtenu entre 2010 et 2020 </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="exp_chauffeur18_2" name="exp_chauffeur18" class="custom-control-input"  value="1" >
                                                    <label class="custom-control-label" for="exp_chauffeur18_2"> Obtenu après 2020 </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Occupation antérieure : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="occ_ant" name="occ_ant" class="custom-control-input" value="5">
                                                    <label class="custom-control-label" for="occ_ant"> Chauffeur en entreprise </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="occ_ant_1" name="occ_ant" class="custom-control-input"value="3">
                                                    <label class="custom-control-label" for="occ_ant_1">Chauffeur libéral (transporteur) </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="occ_ant_2" name="occ_ant" class="custom-control-input"value="1">
                                                    <label class="custom-control-label" for="occ_ant_2"> Conduite personnelle usuelle </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Langue nationales parlées : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="nb_langue18" name="nb_langue18" class="custom-control-input"value="1">
                                                    <label class="custom-control-label" for="nb_langue18">Une </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="nb_langue18_1" name="nb_langue18" class="custom-control-input"value="2">
                                                    <label class="custom-control-label" for="nb_langue18_1"> Deux </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="nb_langue18_2" name="nb_langue18" class="custom-control-input"value="3">
                                                    <label class="custom-control-label" for="nb_langue18_2">Trois ou plus</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <?php } ?>

                                <?php if(intval($project_id) == 17){ ?>
                                <!-- AGENTS DE COLLECTE DE CARTO PRINCIPALE -->
                                <div class="card">
                                    <!-- <div class="card-header">  </div> -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Age : </label>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="age171-6" name="age17" class="custom-control-input" value="0" />
                                                    <label class="custom-control-label" for="age171-6"> Non Conforme </label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="age171" name="age17" class="custom-control-input" value="0" <?php if($age < 18) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age171"> Moins de 18 ans </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age17-2" name="age17" class="custom-control-input" value="3" <?php if($age > 17 && $age < 30) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age17-2"> 18-29 ans </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age17-3" name="age17" class="custom-control-input" value="2" <?php if($age > 29 && $age < 40) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age17-3"> 30-39 ans </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age17-4" name="age17" class="custom-control-input" value="1" <?php if($age > 39 && $age < 46) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age17-4"> 40-45 ans </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="age17-5" name="age17" class="custom-control-input" value="1" <?php if($age > 44) echo " checked"; ?> />
                                                    <label class="custom-control-label" for="age17-5"> Plus de 45 ans </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Diplôme : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dp_collect17_6" name="dp_collect17" class="custom-control-input" value="0" />
                                                    <label class="custom-control-label" for="dp_collect17_6"> Non Conforme </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dp_collect17-1" name="dp_collect17" class="custom-control-input" value="1">
                                                    <label class="custom-control-label" for="dp_collect17-1"> CEP, CAP, BEP, BEPC, BAC, </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dp_collect17-2" name="dp_collect17" class="custom-control-input" value="5">
                                                    <label class="custom-control-label" for="dp_collect17-2">BAC+2, DEUG, DUT, Licence, Maitrise, Master, DES, DESS </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Experience dans la collecte : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="exp_collect17-1" name="exp_collect17" class="custom-control-input" value="1">
                                                    <label class="custom-control-label" for="exp_collect17-1"> Aucune enquête statistique </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="exp_collect17-2" name="exp_collect17" class="custom-control-input" value="3">
                                                    <label class="custom-control-label" for="exp_collect17-2"> 1-2 enquêtes statistiques </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="exp_collect17-3" name="exp_collect17" class="custom-control-input" value="5">
                                                    <label class="custom-control-label" for="exp_collect17-3">3 enquêtes statistiques et plus </label>
                                                </div>

                                                
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Utilisation de la tablette CAPI : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="utilis_tablette-1" name="utilis_tablette" class="custom-control-input"value="1">
                                                    <label class="custom-control-label" for="utilis_tablette-1">Enquêtes avant 2018 </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="utilis_tablette-2" name="utilis_tablette" class="custom-control-input" value="2">
                                                    <label class="custom-control-label" for="utilis_tablette-2">Enquetes Entre 2018-2020 </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="utilis_tablette-3" name="utilis_tablette" class="custom-control-input" value="3">
                                                    <label class="custom-control-label" for="utilis_tablette-3">Enquêtes après 2020</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Connaissance informatqiue : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="cons_informatique-1" name="cons_informatique" class="custom-control-input" value="3">
                                                    <label class="custom-control-label" for="cons_informatique-1">Bonne (World, Excel et autres logiciels) </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="cons_informatique-2" name="cons_informatique" class="custom-control-input" value="2">
                                                    <label class="custom-control-label" for="cons_informatique-2">Moyenne (World et Excel) </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="cons_informatique-3" name="cons_informatique" class="custom-control-input" value="1">
                                                    <label class="custom-control-label" for="cons_informatique-3">Faible </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Nombre de langue parlée : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="nb_langue17" name="nb_langue17" class="custom-control-input"  value="1">
                                                    <label class="custom-control-label" for="nb_langue17">Une </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="nb_langue17_1" name="nb_langue17" class="custom-control-input"  value="3">
                                                    <label class="custom-control-label" for="nb_langue17_1"> Deux </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="nb_langue17_2" name="nb_langue17" class="custom-control-input"  value="5">
                                                    <label class="custom-control-label" for="nb_langue17_2">Trois ou plus</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Residence (conakry/hors conakry) : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="residence" name="residence" class="custom-control-input"  value="1">
                                                    <label class="custom-control-label" for="residence">Conakry </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="residence1" name="residence" class="custom-control-input"  value="2">
                                                    <label class="custom-control-label" for="residence1"> Hors Conakry </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col">
                                                <label class="font-weight-bold">Disponibilité : </label>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dispoP" name="dispo" class="custom-control-input" value="0" />
                                                    <label class="custom-control-label" for="dispoP"> Non Conforme </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dispo" name="dispo" class="custom-control-input"  value="3">
                                                    <label class="custom-control-label" for="dispo"> Chomeur/sans emploi </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dispo1" name="dispo" class="custom-control-input"  value="1">
                                                    <label class="custom-control-label" for="dispo1"> Etudiant/eleve </label>
                                                </div>
                                                <div class="custom-control custom-radio ">
                                                    <input type="radio" id="dispo2" name="dispo" class="custom-control-input"  value="1">
                                                    <label class="custom-control-label" for="dispo2">En activité </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <?php } ?>
                            </div>
                        </div>

                        <div class="row my-3"> 
                            <div class="col text-center"> 
                                <?php  if(isset($_SESSION['user_type']) && $_SESSION['user_type'] != 1){ ?>
                                    <button class="btn btn-primary">Valider le depouillement</button>
                                <?php } ?>
                            </div> 
                        </div>
                    </div>
                    <div class="col-8 docs">   
                        <!-- cv -->
                        <?php if(!empty($value->cv)){?>  
                            <div class="row mb-1"> 
                                <div class="col p-0"> 
                                    <div class="font-weight-bold text-center">
                                        <h2 class="display-6 font-weight-bold text-primary"> CV </h2> 
                                    </div>
                                    <section class="border">
                                        <?php if(strtolower(strrchr($value->cv, '.')) == ".pdf"){ ?>  
                                            <iframe src="<?= base_url("uploads/files/".$value->cv) ?>" width="100%" height="1000"></iframe>
                                        <?php } else{ ?>
                                            <img src="<?= base_url("uploads/files/".$value->cv) ?>" alt="CV..." class="img-fluid">
                                        <?php } ?>
                                    </section>                              
                                </div> 
                            </div>   
                        <?php } ?> 
                        <!-- cni -->
                        <?php if(!empty($value->cni)){?>  
                            <div class="row mb-1"> 
                                <div class="col p-0"> 
                                    <div class="font-weight-bold text-center">
                                        <h2 class="display-6 font-weight-bold text-primary"> PIECE D'IDENTITE </h2> 
                                    </div>
                                    <section class="border">
                                        <?php if(strtolower(strrchr($value->cni, '.')) == ".pdf"){ ?>  
                                            <iframe src="<?= base_url("uploads/files/".$value->cni) ?>" width="100%" height="1000"></iframe>
                                        <?php } else{ ?>
                                            <img src="<?= base_url("uploads/files/".$value->cni) ?>" alt="CNI..." class="img-fluid">
                                        <?php } ?>
                                    </section>                              
                                </div> 
                            </div>   
                        <?php } ?> 

                        <?php if(!empty($value->certifmedical)){?>  
                            <div class="row mb-1"> 
                                <div class="col p-0"> 
                                    <div class="font-weight-bold text-center">
                                        <h2 class="display-6 font-weight-bold text-primary"> Certificat Médical </h2> 
                                    </div>
                                    <section class="border">
                                        <?php if(strtolower(strrchr($value->certifmedical, '.')) == ".pdf"){ ?>  
                                            <iframe src="<?= base_url("uploads/files/".$value->certifmedical) ?>" width="100%" height="1000"></iframe>
                                        <?php } else{ ?>
                                            <img src="<?= base_url("uploads/files/".$value->certifmedical) ?>" alt="Certificat Médical..." class="img-fluid">
                                        <?php } ?>
                                    </section>                              
                                </div> 
                            </div>   
                        <?php } ?> 
                        
                        <!-- Attestation d'Expérience -->
                        <?php if(!empty($value->attestcollecte)){?>  
                            <div class="row mb-1"> 
                                <div class="col p-0"> 
                                    <div class="font-weight-bold text-center">
                                        <h2 class="display-6 font-weight-bold text-primary"> Attestation d'Expérience </h2> 
                                    </div>
                                    <section class="border">
                                        <?php if(strtolower(strrchr($value->attestcollecte, '.')) == ".pdf"){ ?>  
                                            <iframe src="<?= base_url("uploads/files/".$value->attestcollecte) ?>" width="100%" height="1000"></iframe>
                                        <?php } else{ ?>
                                            <img src="<?= base_url("uploads/files/".$value->attestcollecte) ?>" alt="Attestation d'Expérience..." class="img-fluid">
                                        <?php } ?>
                                    </section>                              
                                </div> 
                            </div>   
                        <?php } ?>

                        <!-- Diplome d'Etude -->
                        <?php if(!empty($value->doc_last_diplome)){?>  
                            <div class="row mb-1"> 
                                <div class="col p-0"> 
                                    <div class="font-weight-bold text-center">
                                        <h2 class="display-6 font-weight-bold text-primary"> Diplome d'Etude </h2> 
                                    </div>
                                    <section class="border">
                                        <?php if(strtolower(strrchr($value->doc_last_diplome, '.')) == ".pdf"){ ?>  
                                            <iframe src="<?= base_url("uploads/files/".$value->doc_last_diplome) ?>" width="100%" height="1000"></iframe>
                                        <?php } else{ ?>
                                            <img src="<?= base_url("uploads/files/".$value->doc_last_diplome) ?>" alt=" Diplome d'Etude ..." class="img-fluid">
                                        <?php } ?>
                                    </section>                              
                                </div> 
                            </div>   
                        <?php } ?>

                        <!-- Certificat de Residence -->
                        <?php if(!empty($value->certifresidence)){?>  
                            <div class="row mb-1"> 
                                <div class="col p-0"> 
                                    <div class="font-weight-bold text-center">
                                        <h2 class="display-6 font-weight-bold text-primary"> Certificat de Residence </h2> 
                                    </div>
                                    <section class="border">
                                        <?php if(strtolower(strrchr($value->certifresidence, '.')) == ".pdf"){ ?>  
                                            <!-- <iframe src="<?= base_url("uploads/files/".$value->certifresidence) ?>" width="100%" height="1000"></iframe> -->
                                            <iframe src="<?= base_url("uploads/files/".$value->certifresidence) ?>" width="100%" height="1000"></iframe>
                                        <?php } else{ ?>
                                            <img src="<?= base_url("uploads/files/".$value->certifresidence) ?>" alt="Certificat de Residence ..." class="img-fluid">
                                        <?php } ?>
                                    </section>                              
                                </div> 
                            </div>   
                        <?php } ?>

                        <!-- Casier Judiciaire -->
                        <?php if(!empty($value->casier)){?>  
                            <div class="row mb-1"> 
                                <div class="col p-0"> 
                                    <div class="font-weight-bold text-center">
                                        <h2 class="display-6 font-weight-bold text-primary"> Casier Judiciaire </h2> 
                                    </div>
                                    <section class="border">
                                        <?php if(strtolower(strrchr($value->casier, '.')) == ".pdf"){ ?>  
                                            <iframe src="<?= base_url("uploads/files/".$value->casier) ?>" width="100%" height="1000"></iframe>
                                        <?php } else{ ?>
                                            <img src="<?= base_url("uploads/files/".$value->casier) ?>" alt="Certificat de Residence ..." class="img-fluid">
                                        <?php } ?>
                                    </section>                              
                                </div> 
                            </div>   
                        <?php } ?>

                    </div>
                </div>
                <input type="hidden" value="<?= $value->id ?>" name="postulant_id">
            <?php endforeach;?>           
        </form>             
    </div>
</section>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $(document).ready(function () {
        // $('#example').DataTable();
        $("#prefecture_id").change(function(){$idElem=$(this).val(); 
            $("#sp_id").val("0"); $("#sp_id option").hide(); 
            $('#sp_id .optElem'+$idElem+', #sp_id .optElem0').show();
        })

    });
</script>
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<style>
    .image img{
        max-width:150px;
        max-height:150px;
    }
</style>
<?= $this->endSection() ?>








































