<?= $this->extend('mobile/base') ?>

<?= $this->section('title') ?>
    RGPH4 - Inscription
<?= $this->endSection() ?>

<?= $this->section('style') ?>
<style>
    .tit{ 
        font-family: 'Baloo', sans-serif;   
        /*font-family: 'Baloo Tammudu', sans-serif; */
        /*font-family: 'Cairo', sans-serif; */
        /*font-family: 'Cuprum', sans-serif; */
        /*font-family: 'Lobster', sans-serif; */
        /*font-family: 'Rajdhani', sans-serif; */
    }
    .footer-section button, .section, .div-experience, .div-disponibilite, .div-phone{
        display: none;
    }
    
    .footer-section .btns-section1, .section-block1{
        display: inline-block;
    }
    .form-label{
        font-weight: bold;
    }


</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<form class="paymentWrap container-fluid" id="frmRegister" method="post" action="/index.php/mregister" enctype="multipart/form-data">
<div class="row py-3">
        <div class="col-sm-4 order-1 order-sm-2">
            <section class="section-block1 section">
                <!-- start block 1 -->
                <div class="card border border-start-0 border-bottom-0">
                    <div class="card-body">
                        <h5 class="card-title"><b><i></i> TERMES DE REFERENCE (TDR)</b></h5>
                        <?php  
                                $projet = 12; //17
                                if($projet==12){ 
                                    // TECHNICIEN LABORATOIRE CARTOGRAPHIE
                                    echo $this->include('avis/avimobile1.php'); 
                                }
                                else if($projet==17){ 
                                    // AGENT DE COLLECTE DE LA CARTOGRAPHIE CENSITAIRE
                                    echo $this->include('avis/avimobile2.php'); 
                                }
                                else if($projet['id']==3){ 
                                    echo $this->include('avis/avimobile3.php'); 
                                }
                                else if($projet['id']==4){ 
                                    echo $this->include('avis/avimobile4.php'); 
                                }
                                else if($projet['id']==5){ 
                                    echo $this->include('avis/avimobile5.php'); 
                                }
                                else echo $projet['contrat'];
                                ?>
                            <div class="my-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="checkboxContract" name="lucontrat" value="1"  />
                                    <label class="form-check-label" for="checkboxContract">J'ai lu l'avis et je comprends</label>
                                </div>
                                
                            </div>
                    </div>
                </div>
                <!-- end block 1 -->
            </section>

            <section class="section-block2 section">
                <!-- start block 2 -->
                <div class="card border border-start-0 border-bottom-0">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fas fa-edit"></i> Informations Personnelles </b></h5>
                        <p class="card-text">

                            <div class="my-2">
                                <label for="userFiles1" class="form-label">Photo D'identite</label>
                                <input class="form-control form-control-sm" name="userFiles1" id="userFiles1" type="file" required />
                                <div id="avatar" class="p-1"></div>
                            </div>
                            
                            <div class="my-2">
                                <div class="form-outline">
                                    <input type="text" id="surname_postulant" name="surname_postulant" class="form-control" required />
                                    <label class="form-label" for="surname_postulant">Pre&#769;noms *</label>
                                </div>
                                <!-- <div class="form-text"> 
                                    Precisez l'adresse de livraison qui peut e&#770;tre votre adresse de domicile, du bureau ou autre.
                                </div> -->
                            </div>              
                            
                            <div class="my-2">
                                <div class="form-outline">
                                <input type="text" id="nom" name="name_postulant" class="form-control" required />
                                <label class="form-label" for="name_postulant">Nom *</label>
                                </div>
                            </div>              

                            <div class="my-2">
                                <div class="form-outline">
                                <input type="text" id="date_naiss" name="date_naiss" class="form-control" required />
                                <label class="form-label" for="date_naiss">Date naissance</label>
                                </div>
                            </div>              
                            
                            <div class="my-2">
                                <div class="form-outline">
                                    <input type="text" id="lieu_naissance" name="lieu_naissance" class="form-control" required />
                                    <label class="form-label" for="lieu_naissance">Lieu naissance</label>
                                </div>
                            </div> 
                            
                        
                            <!-- <div class="my-2">
                                <select class="select" name="typ_immo"> <option value="">Choisir une option</option> </select>                                      
                            </div>  -->

                            <div class="my-2 p-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="radioSexe1" value="1" required checked />
                                    <label class="form-check-label" for="radioSexe1">Homme</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="radioSexe2" value="2" />
                                    <label class="form-check-label" for="radioSexe2">Femme</label>
                                </div>
                            </div> 

                            <!-- <div class="my-2">
                                <label for="formFileSm" class="form-label">Choisissez l'extrait de naissance</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file" />
                            </div>  -->
                        </p>
                    </div>
                </div>

                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <div class="card-body">
                        <h5 class="card-title"> <b><i class="fa fa-phone" aria-hidden="true"></i> Numéro de Téléphone </b> </h5>
                        <p class="card-text">
                            <div class="my-2">
                                <label class="form-check-label" for="">Avez-vous un Numéro de Téléphone ? (*) </label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="radioPhone1" name="possedeNumTel" value="1" required />
                                    <label class="form-check-label" for="radioPhone1">Oui</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="radioPhone2" checked="checked" name="possedeNumTel" value="2" />
                                    <label class="form-check-label" for="radioPhone2">Non</label>
                                </div>                                
                            </div>
                                                    
                            <div class="my-2 div-phone">
                                <div class="form-outline">
                                    <input type="tel" id="contact_1" name="contact_1" required class="form-control"  minlength="9"  maxlength="9s" />
                                    <label class="form-label" for="contact_1"> Saisissez Numéro de Téléphone</label>                                   
                                </div>
                                <div class="form-text"> 
                                    Exemple 600000000
                                </div>
                            </div> 

                        </p>
                    </div>
                </div>
                
                <div class="card border border-start-0 border-bottom-0 mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fas fa-edit"></i> Informations Sur les Parents </b></h5>
                        <p class="card-text">

                            <div class="my-2">
                                <div class="form-outline">
                                    <input type="text" id="namepere" name="namepere" class="form-control" required />
                                    <label class="form-label" for="namepere">Prenom & Nom du Pere</label>
                                </div>
                                <!-- <div class="form-text"> 
                                    Precisez l'adresse de livraison qui peut e&#770;tre votre adresse de domicile, du bureau ou autre.
                                </div> -->
                            </div>              
                            
                            <div class="my-2">
                                <div class="form-outline">
                                <input type="text" id="namemere" name="namemere" class="form-control" required />
                                <label class="form-label" for="nom">Prenom & Nom du Mere</label>
                                </div>
                            </div>        
                        </p>
                    </div>
                </div>

                <div class="card border border-start-0 border-bottom-0 mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fas fa-edit"></i> Informations Personnes a Contacter </b></h5>
                        <p class="card-text">

                            <div class="my-2">
                                <div class="form-outline">
                                    <input type="text" id="nametuteurlegal" name="nametuteurlegal" class="form-control" required />
                                    <label class="form-label" for="nametuteurlegal">Prenom & Nom
                                    </label>
                                </div>
                                <div class="form-text"> 
                                    Premiere personne a contact en cas d'urgence
                                </div>
                            </div>              
                            
                            <div class="my-2">
                                <div class="form-outline">
                                <input type="tel" id="contact_2" name="contact_2" class="form-control" required />
                                <label class="form-label" for="nom">Contact </label>
                                </div>
                                <div class="form-text"> 
                                 Numero de telephone a contact en cas d'urgence 
                                 
                                </div>
                            </div>              
                            <div class="my-2">
                                <div class="form-outline">
                                    <input type="text" id="nametuteurlegal2" name="nametuteurlegal2" class="form-control" />
                                    <label class="form-label" for="email">Prenom & Nom </label>
                                </div>
                                <div class="form-text"> 
                                La 2ÈME personne a contacter en cas d'urgence
                                </div>
                            </div> 
                            <div class="my-2">
                                <div class="form-outline">
                                <input type="tel" id="contact_22" name="contact_22" class="form-control"  />
                                <label class="form-label" for="tel1">Contacter</label>
                                </div>
                                <div class="form-text"> 
                                Contact de la 2ÈME personne a contacter en cas d'urgence
                                </div>
                            </div>              
                        </p>
                    </div>
                </div>              

                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fa fa-info-circle" aria-hidden="true"></i> Disponibilité</b></h5>
                        <p class="card-text">
                            <div class="text-muted">
                                Il s'agit de votre période de disponibilité entière et totale sur la période du RGPH-4 (01/11/2023 au 30/04/2023)
                            </div>
                            <div class="my-2">
                                <label class="form-check-label" for="">Etes vous disponible sur la période définie plus haut ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="radioDisponible1" name="pdispo" value="1" required />
                                    <label class="form-check-label" for="radioDisponible1">Oui</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="radioDisponible2" checked="checked" name="pdispo" value="2" />
                                    <label class="form-check-label" for="radioDisponible2">Non</label>
                                </div>                                
                            </div>

                            <div class="my-2 p-2 div-disponibilite text-danger fw-bold">
                                veuillez confirmer votre choix en cochant le checkbox suivant relatif à la confirmation de votre disponibilité. Nous vous informons 
                                que des mesures seront prises à notre niveau au cas où votre confirmation de disponibilité ne sera pas respectée.
                            </div>                          
                            <div class="my-2 p-2 div-disponibilite">
                                <input class="form-check-input" type="checkbox" id="confirmdispo" name="confirmdispo" value="1" required/>
                                <label class="form-check-label" for="confirmdispo">Je confirme ma disponibilité sur cette période</label>
                            </div>                          

                        </p>
                    </div>
                </div>

                <div class="card border border-start-0 border-bottom-0 mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fas fa-edit"></i> Pieces D'identite </b></h5>
                        <p class="card-text">

                            <div class="my-2">
                                <select class="select"  id="type_piece" name="type_piece">
                                    <option value="">TYPE DE PIECE(*)</option>
                                    <option value="cni">CARTE D'IDENTITE</option>
                                    <option value="attestation">ATTESTATION D'IDENTITÉ</option>
                                    <option value="passport">PASSEPORT</option>
                                    <option value="permis">CARTE ELECTEUR</option>
                                </select>                                      
                            </div> 

                            <div class="my-2">
                                <label for="userFiles4" class="form-label">Joindre les Pieces(*)</label>
                                <input class="form-control form-control-sm" name="userFiles4" id="formFileSm" type="file" required />
                                <div class="form-text"> 
                                    Carte D'identite/Attestation/Passport/Carte Electeur
                                </div>
                            </div> 
                            
                            <div class="my-2">
                                <div class="form-outline">
                                <input type="text" id="numero_cni" name="numero_cni" class="form-control" required />
                                <label class="form-label" for="numero_cni">Numéro de la Pièce D'identité(*)</label>
                                </div>
                                <div class="form-text"> 
                                Carte D'identite/Attestation/Passport/Carte Electeur
                                </div>
                            </div>              

                            <div class="my-2">
                                <label for="formFileSm" class="form-label">Joindre Le Fichier De La 1ere Personne à Contacter </label>
                                <input class="form-control form-control-sm" name="userFiles5" id="userFiles5" type="file" />
                                <div class="form-text"> 
                                Carte Electeur/Attestation/Passport/Carte Electeur
                                </div>
                            </div> 
                        </p>
                    </div>
                </div>            
                <!-- end block 1 -->
            </section>

            <section class="section-block3 section">
                <!-- start block 3 -->
              

                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <div class="card-body">
                    <h5 class="card-title"><b><i class="fas fa-info"></i>Code de Bonne Conduite</b></h5>                     
                        <section>  <?= $this->include('avis/avisconduite.php'); ?> </section>
                        <p class="card-text">
                            <div class="my-2">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="checkboxCodeBonneConduite" value="1" name="val_model1" required />
                                    <label class="form-check-label" for="checkboxCodeBonneConduite">J'ai lu le code de bonne conduite et j'approuve</label>
                                </div>
                                
                            </div> 
                        </p>
                    </div>
                </div>
                <!-- end block 3 -->

            </section>

            <section class="section-block4 section">
                <!-- start block 4 -->
                <h5 class=""><b><i class="fas fa-info"></i>Informations Complementaires</b></h5>
                <div class="card border border-start-0 border-bottom-0 mt-2 <?php if($id_projet == 18){ echo" d-none"; } ?>">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fa fa-envelope" aria-hidden="true"></i>Email</b></h5>
                        <p class="card-text">
                        <div class="my-2">
                                <div class="form-outline">
                                    <input type="email" id="email" name="email" class="form-control" <?php if($id_projet != 18){ echo" required"; } ?>/>
                                    <label class="form-label" for="email">Email</label>
                                </div>
                        </div> 
                        </p>
                    </div>
                </div>

                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <?php
                        // $niveauEtudes = array(
                        //     '' => "Selectionnez votre Niveau d'Etudes  (*)",
                        //     '11' => 'BTS',
                        //     '12' => 'LICENCE 3 / BAC+3',
                        //     '13' => 'MAITRISE / MASTER 1 / BAC+4',
                        //     '14' => 'MASTER 2 / DEA / BAC+5',
                        //     '15' => 'DOCTORAT',
                        // );        
                        
                        // $status = array(
                        //     '' => "Selectionnez votre Statut (*)",
                        //     //'ELEVE' => 'ELEVE',
                        //     'ETUDIANT' => "ETUDIANT ",
                        //     'EMPLOYE' => 'EMPLOYE',                            
                        // );
                    ?>

                    <?php
                        $niveauEtudes = array(
                            '' => "Selectionnez votre Niveau d'Etudes  (*)",
                            '11' => 'DEUG/BAC +2/LICENCE 2/BTS',
                            '12' => 'LICENCE 3 / BAC+3',
                            '13' => 'MAITRISE / MASTER 1 / BAC+4',
                            '14' => 'MASTER 2 / DEA / BAC+5',
                            '15' => 'DOCTORAT',
                        );        
                        
                        $status = array(
                            '' => "Selectionnez votre Statut (*)",                            
                            'ETUDIANT' => "ETUDIANT",
                            'TRAVAILLEUR' => 'TRAVAILLEUR',                          
                            'SANS_EMPLOI' => 'SANS EMPLOI - CHOMEUR',
                        );
                    ?>

                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fa fa-info-circle" aria-hidden="true"></i> Autres Informations Utiles </b></h5>
                        <p class="card-text">

                            <div class="my-2">
                                <select class="select" name="niveau_etude" id="niveau_etude" required> 
                                    <?php 
                                        foreach($niveauEtudes as $key => $value){
                                            echo'<option value="'.$key.'">'.$value.'</option>';
                                        }
                                    ?>
                                </select>                                      
                            </div> 
                            <div class="my-2">
                                <div class="form-outline">
                                    <input type="text" id="last_diplome" name="last_diplome"  class="form-control" required />
                                    <label class="form-label" for="last_diplome">Specialite (Filiere)</label>
                                </div>
                                <!-- <div class="form-text"> 
                                    Precisez l'adresse de livraison qui peut e&#770;tre votre adresse de domicile, du bureau ou autre.
                                </div> -->
                            </div>  
                            
                            <div class="my-2">
                                <select class="select" name="status" id="status"> 
                                    <?php 
                                        foreach($status as $key => $value){
                                            echo'<option value="'.$key.'">'.$value.'</option>';
                                        }
                                    ?>                                    
                                </select>                                      
                            </div>
                        
                        </p>
                    </div>
                </div>

                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fa fa-info-circle" aria-hidden="true"></i> Experience en Collecte de Données</b></h5>
                        <p class="card-text">
                            <div class="my-2">
                                <label class="form-check-label" for="flexSwitchCheckChecked1">Avez vous une expérience en collecte de données ?</label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckboxc1" name="hasexpcollecte" value="1" required />
                                    <label class="form-check-label" for="inlineCheckboxc1">Oui</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckboxc2"  name="hasexpcollecte" value="2" checked />
                                    <label class="form-check-label" for="inlineCheckboxc2">Non</label>
                                </div>
                                
                            </div>
                            <!-- <div class="my-2">
                                <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked1" value="Terrain" name="val_model1" checked />
                                <label class="form-check-label" for="flexSwitchCheckChecked1">Avez vous une expérience en collecte de données ?</label>
                                </div>
                            </div>  -->
                            <div class="my-2 div-experience">
                                <div class="form-outline">
                                    <input type="text" id="projet_name_1" name="projet_name_1" class="form-control" />
                                    <label class="form-label" for="projet_name_1">Activités/Enquête</label>
                                </div>
                            </div> 
                            <div class="my-2 div-experience">
                                <div class="form-outline">
                                <input type="text" id="fontion_1" name="fontion_1" class="form-control" />
                                <label class="form-label" for="fontion_1">Intitule Poste *</label>
                                </div>
                            </div>  
                            <div class="my-2 div-experience">
                                <div class="form-outline">
                                    <input type="text" id="employeur_1" name="employeur_1" class="form-control" />
                                    <label class="form-label" for="employeur_1"> Structure *</label>
                                </div>                                
                            </div>  

                            <div class="my-2 div-experience">
                                <select class="select" name="year_deb_1"> <?php for($k = intval(date('Y')); $k >= 2010; $k--){ echo'<option value="'.$k.'">Année '.$k.'</option>';} ?> </select>                                      
                            </div>  
                            <div class="my-2 div-experience">
                                <label for="userFiles8" class="form-label">Joindre une Attestation</label>
                                <input class="form-control form-control-sm" id="userFiles8" name="userFiles8" type="file" />
                            </div> 


                        </p>
                    </div>
                </div>   

                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fa fa-language" aria-hidden="true"></i> Langues Nationales Parlées </b></h5>
                        <p class="card-text">
                        
                            <div class="my-2">
                                <select class="form-control select-ne-marche-pas" name="first_langue" id="first_langue" required> 
                                    <option class="optElem0" value="0">Première Langue Locale Parlée (*)</option>
                                    <?php foreach ($listEthnie as $key => $list):?>
                                        <option value="<?= $list['id']?>" class="optElem<?= $list['id']?>"> <?= $list['libelle'];?> </option>
                                    <?php endforeach;?>                                     
                                </select>                                      
                            </div> 

                            <div class="my-2">
                                <select class="form-control" name="second_langue" id="second_langue">
                                    <option class="optElem0" value="0">Seconde Langue Locale Parlée</option> 
                                    <?php foreach ($listEthnie as $key => $list):?>
                                        <option value="<?= $list['id']?>" class="optElem<?= $list['id']?>"> <?= $list['libelle'];?> </option>
                                    <?php endforeach;?>                                     
                                </select>                                      
                            </div> 

                            <div class="my-2">
                                <select class="form-control"name="third_langue" id="third_langue">
                                    <option class="optElem0" value="0">Troisième Langue Locale Parlée</option>
                                    <?php foreach ($listEthnie as $key => $list):?>
                                        <option value="<?= $list['id']?>" class="optElem<?= $list['id']?>"> <?= $list['libelle'];?> </option>
                                    <?php endforeach;?>  
                                </select>                                      
                            </div> 
                        
                        </p>
                    </div>
                </div>

                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b> <i class="fa fa-paperclip" aria-hidden="true"></i> Pièces à Joindre </b></h5>
                        <p class="card-text">
                            <div class="my-2">
                                <label for="userFiles3" class="form-label">Joindre le Diplôme le plus élevé / Attestation De Reussite</label>
                                <input class="form-control form-control-sm" name="userFiles3" id="userFiles3" type="file" required />
                            </div> 
                            <div class="my-2">
                                <label for="userFiles2" class="form-label">Joindre Curriculum Vitae </label>
                                <input class="form-control form-control-sm" id="userFiles2" name="userFiles2" type="file" required/>
                            </div> 
                            <div class="my-2">
                                <label for="userFiles6" class="form-label">Joindre Certificat De Residence</label>
                                <input class="form-control form-control-sm" id="userFiles6" name="userFiles6" type="file"required />
                            </div> 
                            
                            <div class="my-2">
                                <label for="userFiles7" class="form-label">Joindre Certificat Medical </label>
                                <input class="form-control form-control-sm" id="userFiles7" name="userFiles7" type="file" required />
                            </div> 
                        
                            <div class="my-2 d-none">
                                <label for="userFiles9" class="form-label">Joindre Casier Judiciaire </label>
                                <input class="form-control form-control-sm" id="userFiles9" name="userFiles9" type="file" />
                            </div> 
                        
                        </p>
                    </div>
                </div>

            <!-- end block 4 -->

            </section>

            <section class="section-block5 section">
                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fas fa-edit"></i> Declaration sur L'honneur </b></h5>
                        <p class="card-text">


                            <div class="my-2">                                                             
                                <select name="departement3" id="selectDep" class="form-control">
                                    <option class="optElem0" value="0">Selectionner une Préfecture (*)</option>
                                    <?php foreach ($listDep as $key => $list):?>
                                        <option value="<?php echo $list['CodDep'];?>" class="optElem<?php echo $list['NomDep'];?>"> <?php echo $list['NomDep'];?> </option>
                                    <?php endforeach;?>  
                                </select>
                            </div> 

                            <div class="my-2">
                                <select name="sousprefecture3" id="selectSP" class="form-control" required>
                                    <option class="optElem0" value="0">Selectionner une Sous-Préfecture (*)</option>
                                    <?php foreach ($listSP as $key => $list):?>
                                        <option value="<?php echo $list['CodSp'];?>" class="optElem<?php echo $list['CodDep'];?>"> <?php echo $list['NomSp'];?> </option>
                                    <?php endforeach;?>  
                                </select>
                            </div> 
                            
                            <div class="my-2">
                                <div class="form-outline">
                                <input type="text" id="dateSignature" name="date_jour_decla" class="form-control" required />
                                <label class="form-label" for="nom">Saisir la Date du Jour (jj/mm/aaaa) (*)</label>
                                </div>
                            </div>              

                            <div class="my-2">
                                <!-- <div class="g-recaptcha" data-sitekey="here_enter_site_key"></div> -->
                                <div class="g-recaptcha" data-sitekey="<?= env('RECAPTCHAV2_SITEKEY') ?>"></div>
                            </div>              

                            <div class="my-3">
                                <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="ludeclaration" id="acceptDeclaration5" value="1" required />
                                <label class="form-check-label" for="acceptDeclaration5">J'ai lu la declaration et j'approuve</label>
                                </div>
                            </div> 

                        </p>
                    </div>
                </div>

            </section>

            <section class="section-block6 section">
                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fas fa-table"></i> Recapitulatif </b></h5>
                        <p class="card-text">
                            <div class="my-2">


                            <table class="table">
                                <tbody>
                                    <tr> <th scope="row">NOM</th> <td class="tableNom"></td></tr>  
                                    <tr> <th scope="row">PRENOMS</th> <td class="tablePrenom"></td></tr> 
                                    <tr> <th scope="row">DATE NAISSANCE</th> <td class="tableDateNaissance"></td> </tr>
                                    <tr> <th scope="row">LIEU NAISSANCE</th> <td class="tableLieuNaissance"></td> </tr>
                                    <tr> <th scope="row"> SEXE </th> <td class="tableSexe"></td> </tr>
                                    <tr> <th scope="row">CONTACTER</th><td class="tableContacter"></td> </tr> 
                                    
                                    <tr> <th scope="row">EMAIL</th> <td class="tableEmail"></td> </tr> 
                                    <tr> <th scope="row"> NUM CNI</th> <td class="tableNUM"></td> </tr>

                                    <tr> <th scope="row">NIVEAU INSTRUCTION</th> <td class="tableNiv"></td> </tr> 
                                    <tr> <th scope="row">SPECIALITE</th> <td class="tableSpecialite"></td> </tr>

                                    <tr> <th scope="row">STATUS</th> <td class="tableStatus"></td> </tr> 
                                    <tr> <th scope="row">PREMIERE LANGUE LOCAL PARLEE</th> <td class="tablePremierLang"></td> </tr>

                                    <tr> <th scope="row">SECOND LANGUE LOCAL PARLEE</th> <td class="tableSecondLang"></td> </tr> 
                                    <tr> <th scope="row">PRENOM ET NOM DE LA PREMIERE PERSONNE A CONTACT</th> <td class="tablePersContact"></td> </tr>

                                    <tr> <th scope="row">CONTACTER DE LA PREMIERE PERSONNE CONTACTER</th> <td class="tableContactPerson"></td> </tr> 
                                    <tr> <th scope="row">PRENOMS ET NOM PERE</th> <td class="tablePere"></td> </tr>
                                    <tr> <th scope="row">PRENOMS ET NOM MERE</th> <td class="tableMere"></td> </tr>

                                    <!-- <tr> <th scope="row">NOM</th> <td class="tableNom">DIATAS</td> </tr>                                   
                                    <tr> <th scope="row">NOM</th> <td class="tableNom">DIATAS</td> </tr>                                   
                                    <tr> <th scope="row">NOM</th> <td class="tableNom">DIATAS</td> </tr>                                   
                                    <tr> <th scope="row">NOM</th> <td class="tableNom">DIATAS</td> </tr>                                   
                                    <tr> <th scope="row">PRENOMS</th> <td class="tablePrenom">Mohamed</td> </tr>                                   
                                    <tr> <th scope="row">PRENOMS</th> <td class="tablePrenom">Mohamed</td> </tr>                                   
                                    <tr> <th scope="row">PRENOMS</th> <td class="tablePrenom">Mohamed</td> </tr> -->                                                            

                                </tbody>
                                </table>

                            </div>

                            <div class="my-2">
                                <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked1" value="Terrain" name="val_model1" />
                                <label class="form-check-label" for="flexSwitchCheckChecked1">Je confirme ma disponibilité et j'atteste la véracité des informations fournies</label>
                                </div>
                            </div> 
                        </p>
                    </div>
                </div>

            </section>

            <div id="divAlertPlaceholder"> <div class="alert alert- alert-dismissible" role="alert"> <div> </div> </div> </div>

            <!-- <button type="button" class="btn btn-primary" id="liveAlertBtn">Show live alert</button> -->

            <!-- <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>Important!</strong> Veuillez renseigner tous les champs obligatoires (*) avant de passer.
            </div> -->

            <section class="btn-section footer-section mt-3"> 
                <button class="btn btn-sm btn-primary float-end btn-next-block2 btns-section1" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <a href="/m.profils" class="btn btn-sm btn-warning btn-prev-block1-1 btns-section1" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Profils </a>

                <button class="btn btn-sm btn-primary float-end btn-next-block3 btns-section2" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <button class="btn btn-sm btn-primary btn-prev-block1 btns-section2" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>  

                <button class="btn btn-sm btn-primary float-end btn-next-block4 btns-section3" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <button class="btn btn-sm btn-primary btn-prev-block2 btns-section3" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>  

                <button class="btn btn-sm btn-primary float-end btn-next-block5 btns-section4" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <button class="btn btn-sm btn-primary btn-prev-block3 btns-section4" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>  

                <button class="btn btn-sm btn-primary float-end btn-next-block6 btns-section5" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <button class="btn btn-sm btn-primary btn-prev-block4 btns-section5" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>

                <button class="btn btn-sm btn-success float-end btn-next-block7 btns-section6" type="submit"> <i class="fa fa-save"></i> Valider</button>  
                <button class="btn btn-sm btn-primary btn-prev-block5 btns-section6" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>

            </section>

        </div>
    </div>


    <input type="hidden" name="nivo_projet" value="<?= $id_nivo_minimum ?>">
    <input type="hidden" name="compteur" value="2">
    <input type="hidden" name="compteur_school" value="2">
    <input type="hidden" name="choix_projet" value="<?= $id_projet ?>">
    <input type="hidden" name="codeProjet" value="<?= $codeProjet ?>">
    <input type="hidden" name="NomProjet" value="<?= $NomProjet ?>">
    <input type="hidden" name="titre_poste" value="<?= $titre_poste ?>">
    <input type="hidden" name="formSubmit" value="1">
    <input type="hidden" name="mobile" value="1">
</form>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">  
    $(document).ready(function(){ 

        $divAlertPlaceholder = $('#divAlertPlaceholder');

        function appendAlert(message, type){
            $divAlertPlaceholder.html(
                `<div class="alert alert-${type} alert-dismissible" role="alert">`+
                `   <div>${message}</div>`+
                // '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+
                '</div>'
            )
        }       

        // block 1
        $(".btn-next-block2").click(function(e){e.preventDefault();     
            if($("#checkboxContract").is(':checked')) { appendAlert('', '');
                $(".section-block1, .btns-section1").fadeOut(10, function(){ $(".section-block2, .btns-section2").fadeIn(50); }); 
            }else{
                appendAlert('<strong>Important!</strong> Veuillez lire et accepter le contrat avant de passer!', 'warning');
            }
        })

        $(".btn-prev-block1").click(function(e){e.preventDefault(); 
            $(".section-block2, .btns-section2").fadeOut(10, function(){ $(".section-block1, .btns-section1").fadeIn(50); });  
        })

        // block 2          
        $(".btn-next-block3").click(function(e){e.preventDefault();  
            // alert($.trim($("#name_postulant").val()).length);
           
            if($("#userFiles1").val().length > 0 && $("#surname_postulant").val().length > 0 && $("#nom").val().length > 0 &&
             $("#date_naiss").val().length > 0 && $("#lieu_naissance").val().length > 0 && $("#type_piece").val().length > 0 
               && $("#formFileSm").val().length > 0 && $("#numero_cni").val().length > 0 && $("#userFiles5").val().length > 0 && $("#confirmdispo").is(':checked') && $("#contact_1").val().length ==9) 
             { appendAlert('', '');
                $(".section-block2, .btns-section2").fadeOut(10, function(){ $(".section-block3, .btns-section3").fadeIn(50); });  
            }else{
                appendAlert('<strong>Important!</strong> Veuillez renseigner tous les champs obligatoires (*) avant de passer!', 'danger');
            }
        })

        $(".btn-prev-block2").click(function(e){e.preventDefault();  
            $(".section-block3, .btns-section3").fadeOut(10, function(){ $(".section-block2, .btns-section2").fadeIn(50); });  
        })

        // block 3
        $(".btn-next-block4").click(function(e){e.preventDefault(); 
            
            if($("#checkboxCodeBonneConduite").is(':checked')) { appendAlert('', '');
                $(".section-block3, .btns-section3").fadeOut(10, function(){ $(".section-block4, .btns-section4").fadeIn(50); }); 
            }else{
                appendAlert('<strong>Important!</strong> Veuillez lire et accepter le code de bonne conduite avant de passer!', 'warning');
            }
            
        })

        $(".btn-prev-block3").click(function(e){e.preventDefault();  
            $(".section-block4, .btns-section4").fadeOut(10, function(){ $(".section-block3, .btns-section3").fadeIn(50); });   
        })

        // block 4
        $(".btn-next-block5").click(function(e){e.preventDefault();  
            if($("#email").val().length > 0 && $("#niveau_etude").val().length > 0  && $("#last_diplome").val().length > 0  && $("#status").val().length > 0
                && $("#first_langue").val().length > 0 && $("#userFiles3").val().length > 0 
                && $("#userFiles2").val().length > 0 && $("#userFiles6").val().length > 0 
                && $("#userFiles7").val().length > 0){ appendAlert('', '');
                $(".section-block4, .btns-section4").fadeOut(10, function(){ $(".section-block5, .btns-section5").fadeIn(50); });  
            }else{
                appendAlert('<strong>Important!</strong> Veuillez renseigner tous les champs obligatoires (*) avant de passer!', 'danger');
            }

        })

        $(".btn-prev-block4").click(function(e){e.preventDefault();  
            $(".section-block5, .btns-section5").fadeOut(10, function(){ $(".section-block4, .btns-section4").fadeIn(50); });
        })

        // block 5
        $(".btn-next-block6").click(function(e){e.preventDefault(); 
            if($("#selectDep").val().length > 0 && $("#selectSP").val().length > 0  && $("#dateSignature").val().length > 0 && $("#acceptDeclaration5").is(':checked')){ appendAlert('', '');
                
                $(".section-block5, .btns-section5").fadeOut(10, function(){ 
                $(".section-block6, .btns-section6").fadeIn(50); 
                
                $(".tableNom").text($("#nom").val());
                $(".tablePrenom").text($("#surname_postulant").val());

                $(".tableDateNaissance").text($("#date_naiss").val());
                $(".tableLieuNaissance").text($("#lieu_naissance").val());

                $(".tableSexe").text(($("#radioSexe1").is(':checked')) ? "Homme" : "Femme");

                $(".tableContacter").text($("#contact_1").val());
                $(".tableEmail").text($("#email").val());
                $(".tableNUM").text($("#numero_cni").val());

                $(".tablePersContact").text($("#nametuteurlegal").val());
                $(".tableContactPerson").text($("#contact_2").val());

                $(".tablePere").text($("#namepere").val());
                $(".tableMere").text($("#namemere").val());
                

                $(".tableSpecialite").text($("#last_diplome").val());

                $(".tableStatus").text($("#status").val());

                // $(".tablePremierLang").text($("#first_langue").val());
                $(".tablePremierLang").text($("#first_langue option[value='"+$("#first_langue").val()+"']").text());
                $(".tableSecondLang").text($("#second_langue option[value='"+$("#second_langue").val()+"']").text());
                // $(".tableSecondLang").text($("#second_langue").val());
                $(".tableNiv").text($("#niveau_etude option[value='"+$("#niveau_etude").val()+"']").text());              
                
            
            }); 
                    
            }else{
                appendAlert('<strong>Important!</strong> Veuillez renseigner tous les champs obligatoires (*) avant de passer!', 'danger');
            }
            
        })

        $(".btn-prev-block5").click(function(e){e.preventDefault(); 
            $(".section-block6, .btns-section6").fadeOut(10, function(){ $(".section-block5, .btns-section5").fadeIn(50); });  
        })         
      
        $("#inlineCheckboxc1").click(function(e){ $(".div-experience").slideDown(500); })        
        $("#inlineCheckboxc2").click(function(e){ $(".div-experience").slideUp(500); })   
        
        $("#radioDisponible1").click(function(e){ $(".div-disponibilite").slideDown(500); })        
        $("#radioDisponible2").click(function(e){ $(".div-disponibilite").slideUp(500); })   
        
        $("#radioPhone1").click(function(e){ $(".div-phone").slideDown(500); })        
        $("#radioPhone2").click(function(e){ $(".div-phone").slideUp(500); })   
        
        // start filter language
        $("#first_langue, #second_langue, #third_langue").change(function(){$idElem=$(this).val(); 
            $langues = [$("#first_langue").val(), $("#second_langue").val(), $("#third_langue").val()];     
            $("#first_langue option, #second_langue option, #third_langue option").show(); 

            $('#first_langue .optElem'+$langues[1]+', #first_langue .optElem'+$langues[2]).hide();
            $('#second_langue .optElem'+$langues[0]+', #third_langue .optElem'+$langues[0]).hide();

            $('#second_langue .optElem'+$langues[0]+', #second_langue .optElem'+$langues[2]).hide();
            $('#first_langue .optElem'+$langues[1]+', #third_langue .optElem'+$langues[1]).hide();

            $('#third_langue .optElem'+$langues[0]+', #third_langue .optElem'+$langues[1]).hide();
            $('#first_langue .optElem'+$langues[2]+', #second_langue .optElem'+$langues[2]).hide();            
        })
        // end filter language
        
        $("#selectDep").change(function(){$idElem=$(this).val(); 
            $("#selectSP").val("0"); $("#selectSP option").hide(); 
            $('#selectSP .optElem'+$idElem+', #selectSP .optElem0').show();
        })

        /**  Control du formulaire mobile */
        $(document).on("change", "form.paymentWrap #userFiles1", function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("form.paymentWrap #avatar").html("<img id='view_photo' style=\"width: 120px; height: 120px; text-align: center;\">")
                    $("form.paymentWrap #view_photo").attr("src", e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });



    // $red={'border':'1px solid #FF0033'}; $ray={'border':'1px solid #DDDDDD'}; $supAn=""; 
    // $tab1=$.jStorage.get("tab",[]); $.jStorage.setTTL("tab",10000000000); $tab=[];
    // $nbAdd=0; $duree=4000; $durEnt=1000; $durSort=2000; $tab1=$.jStorage.get("tab",[]); $tab=[];
    // $(".nbPanier").text($tab1.length); for($i=0;$i<$tab1.length;$i++){ $(".txtQte"+$tab1[$i][0]).val($tab1[$i][1]); }
    // $pren=$("#pren"); $nom=$("#nom"); $tel1=$("#tel1"); $tel2=$("#tel2"); $email=$("#email");

    // if($tab1.length>0){/* $.jStorage.set("tab",$tab1); $.jStorage.setTTL("tab",10000000000);*/
    //     $tab2=[]; $tab3=[]; for($i=0;$i<$tab1.length;$i++){$tab2.push($tab1[$i][0]); $tab3.push($tab1[$i][1]);} $j=$tab2.join(','); $j3=$tab3.join(',');
    //     $(".loadCmd").load('ficBoutique.php',{idRub:"listeVal",liste:$j,liste1:$j3},function(code_html){ /*listEnPanier(); alert(code_html);*/ });
    // }
    
    // $("#btnTerm").click(function(e){e.preventDefault(); //  cpt  ref     adres    typPay    #frmValPan  .cBtnOpt
    //     // if(Number($("#idVil").val())<1){$("#idVil").css($red);}else{$("#idVil").css($ray);}
    //     // ,pren,nom,tel1,tel2,email
    //     if($tab1.length>0 && $pren.val().length>0 && $nom.val().length>0 && $tel1.val().length>0 /*&& Number($("#idVil").val())>0*/){
    //         $tab2=[]; $tab3=[]; $tab4=[]; for($i=0;$i<$tab1.length;$i++){$tab2.push($tab1[$i][0]); $tab3.push($tab1[$i][1]); $tab4.push($tab1[$i][2]);}
    //         $j=$tab2.join(','); $j3=$tab3.join(','); $j4=$tab4.join(','); $("#liste").val($j); $("#liste1").val($j3); $("#liste3").val($j4);
    //         $('#frmValPan').ajaxForm({url:'ficBoutique.php',
    //             beforeSubmit: function(){ $(".loadCmd1").html('<i class="fa fa-circle-o-notch fa-spin"></i> loading paiement ...'); },
    //             success: function(code_html,statut){ $t=code_html.split(' '); // alert(code_html);
    //                 if($t[0]=="reussi"){ $tab1=[];
    //                     if($t[2]==1 || $t[2]==2){
    //                         $(".loadCmd1").html('<b class="text-primary"> <i class="fa fa-check"></i> paiement &eacute;ffectu&eacute;s...</b>');
    //                         $(".block2").fadeOut(300,function(){ $(".block3").fadeIn(300); }); $.jStorage.set("tab",$tab1);
    //                         $('#frmValPan').resetForm(); window.location="facture.php?page="+$t[4];
    //                     }
    //                     else if($t[2]==3 || $t[2]==4){  
    //                         $("#amount_1").val($t[1]); $("#custom").val($t[3]);
    //                         $(".loadCmd1").html('<i class="fa fa-circle-o-notch fa-spin"></i> paiement en cours chez PayPal pour la validation...');
    //                         $("#formPayPal input:image").trigger('click');
    //                     }
    //                     else if($t[2]==5){  
    //                         $("#paycard-amount").val($t[1]); $("#order_id").val($t[3]);  
    //                         $(".loadCmd1").html('<i class="fa fa-circle-o-notch fa-spin"></i> paiement en cours chez PayCard pour la validation...');
    //                         $("#formPayCard input:image").trigger('click');
    //                     }
    //                     else{ $(".loadCmd1").html('<i class="fa fa-circle-o-notch fa-spin"></i> error de paiement. Veillez actualiser la page'); }
    //                 }
    //                 else if($t[0]=="no"){ $(".loadCmd1").html('<i class="fa fa-times"></i> commande annul&eacute;e par faute de stock &eacute;puis&eacute;'); }
    //                 else if($t[0]=="vilVide"){ $(".loadCmd1").html('<i class="fa fa-alert"></i> la ville de livraison est obligatoire '); }
    //                 else{ $(".loadCmd1").html('<i class="fa fa-remove-circle"></i> error reseau '); }
    //             },
    //             error:function(jqXHR,textStatus,errorThrown){ }
    //         }).submit();
    //     }else{ $(".loadCmd1").html('<b class="text-danger"> <i class="fa fa-remove-circle"></i> champs vide non autoris&eacute; ou votre panier est vide</b>'); }
    // })

    // $("#frmValPan").on('click',".cBtnOpt",function(e){e.preventDefault();
    //     $("#typ").val($(this).parent().find(":hidden").val()); 
    //     if(Number($("#typ").val())==3 || Number($("#typ").val())==4 || Number($("#typ").val())==5){ 
    //         $("#btnTerm").fadeOut(200); 
    //     }else{ $("#btnTerm").fadeIn(200); }
    // })

    // $("#btnCont1, #btnPayCard").click(function(e){e.preventDefault(); 
    //     $("#btnAnn,#btnTerm,#btnCont1").fadeOut(10); $("#btnTerm").trigger('click'); 
    // })
    // // $("#btnPayCard").click(function(e){e.preventDefault(); $("#btnAnn,#btnTerm,#btnCont1").fadeOut(10); $("#btnTerm").trigger('click'); })




    })    
    
</script>
<?= $this->endSection() ?>
