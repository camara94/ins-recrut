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
    .footer-section button, .section, .div-experience{
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
<form class="paymentWrap container-fluid" id="frmValPan" method="post" action="#">
    <div class="row py-3">
        <div class="col-sm-4 order-1 order-sm-2">
            <section class="section-block1 section">
                <!-- start block 1 -->

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
                                <input class="form-control form-control-sm" name="userFiles1" id="userFiles1" type="file" />
                                
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
                                    <input type="text" id="lieu_naissance" name="lieu_naissance" class="form-control" />
                                    <label class="form-label" for="lieu_naissance">Lieu naissance</label>
                                </div>
                            </div> 
                            
                        
                            <!-- <div class="my-2">
                                <select class="select" name="typ_immo"> <option value="">Choisir une option</option> </select>                                      
                            </div>  -->

                            <div class="my-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="inlineCheckbox1" value="1" v />
                                    <label class="form-check-label" for="inlineRadio1">M</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sex" id="inlineCheckbox2" value="2" />
                                    <label class="form-check-label" for="inlineRadio2">F</label>
                                </div>
                            </div> 

                            <!-- <div class="my-2">
                                <label for="formFileSm" class="form-label">Choisissez l'extrait de naissance</label>
                                <input class="form-control form-control-sm" id="formFileSm" type="file" />
                            </div>  -->


                        </p>
                    </div>
                </div>

                <div class="card border border-start-0 border-bottom-0 mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fas fa-edit"></i> Verification numero tel/cel </b></h5>
                        <p class="card-text">

                            <div class="my-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox3" name="possedeNumTel" value="1" checked />
                                    <label class="form-check-label" for="inlineRadio1">Oui</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckbox4" name="possedeNumTel" value="2" />
                                    <label class="form-check-label" for="inlineRadio2">Non</label>
                                </div>
                            </div> 
                            <div class="my-2">
                                <div class="form-outline">
                                    <input type="text" id="contact_1" name="contact_1"disabled="disabled"  required  title="saisir votre contact" class="form-control" />
                                    <span id="idspantel" class="fg-color-red hidden">veuillez saisir les 9 chiffres de votre numéro de téléphone</span>
                                    <label class="form-label" for="telephone"></label>
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
                                La personne a contacter en cas d'urgence
                                </div>
                            </div> 
                            <div class="my-2">
                                <div class="form-outline">
                                <input type="tel" id="contact_22" name="contact_22" class="form-control" required />
                                <label class="form-label" for="tel1">Contacter</label>
                                </div>
                                <div class="form-text"> 
                                contact de la 2ÈME personne a contacter en cas d'urgence
                                </div>
                            </div>              
                        </p>
                    </div>
                </div>

                <div class="card border border-start-0 border-bottom-0 mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fas fa-edit"></i>Disponibilite</b></h5>
                        <p class="card-text">
                            <div class="my-2">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckboxp1" name="pdispo" value="1" checked />
                                    <label class="form-check-label" for="inlineRadio1">Oui</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" id="inlineCheckboxp2" name="pdispo" value="2" />
                                    <label class="form-check-label" for="inlineRadio2">Non</label>
                                </div>
                                
                            </div>   
                            <div>
                            <input class="form-check-input" type="checkbox"  name="confirmdispo" value="1" checked />
                            <label class="form-check-label" for="flexSwitchCheckChecked1">Je confirme ma disponibilité sur cette période</label>
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
                                    <option value="cni">CNI</option>
                                    <option value="attestation">ATTESTATION D'IDENTITÉ</option>
                                    <option value="passport">PASSPORT</option>
                                    <option value="permis">PERMIS</option>
                                </select>                                      
                            </div> 

                            <div class="my-2">
                                <label for="userFiles4" class="form-label">Joindre les Pieces(*)</label>
                                <input class="form-control form-control-sm" name="userFiles4" id="formFileSm" type="file" />
                                <div class="form-text"> 
                                    Cni/Attestation/Passport/Permis
                                </div>
                            </div> 
                            
                            <div class="my-2">
                                <div class="form-outline">
                                <input type="text" id="numero_cni" name="numero_cni" class="form-control" required />
                                <label class="form-label" for="numero_cni">Numero Pieces(*)</label>
                                </div>
                                <div class="form-text"> 
                                    Cni/Attestation/Passport/permis
                                </div>
                            </div>              

                            <div class="my-2">
                                <label for="formFileSm" class="form-label">Joindre</label>
                                <input class="form-control form-control-sm" name="userFiles5" id="userFiles5" type="file" />
                                <div class="form-text"> 
                                    Cni/Attestation/Passport/permis de la premiere personne a Contacter
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
                        <h5 class="card-title"><b><i class="fas fa-edit"></i>Code de Bonne Conduite</b></h5>                        
                        
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero ipsa sunt nemo quos tempora in adipisci deleniti id totam voluptates eum hic natus ab dolorum necessitatibus repellat, aut asperiores doloribus. 
                        </p>

                        <p class="card-text">
                            <div class="my-2">
                                <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked1" value="Terrain" name="val_model1" checked />
                                <label class="form-check-label" for="flexSwitchCheckChecked1">J'ai lu le code de bonne conduite et j'approuve</label>
                                </div>
                                
                            </div> 
                        </p>
                    </div>
                </div>
                <!-- end block 3 -->

            </section>

            <section class="section-block4 section">
                <!-- start block 4 -->
                <h5 class=""><b><i class="fas fa-info"></i>nformations Complementaires</b></h5>
                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fa fa-envelope" aria-hidden="true"></i> Email</b></h5>
                        <p class="card-text">
                        <div class="my-2">
                                <div class="form-outline">
                                    <input type="email" id="email" name="email" class="form-control" />
                                    <label class="form-label" for="email">Email</label>
                                </div>
                        </div> 
                        </p>
                    </div>
                </div>

                <div class="card border border-start-0 border-bottom-0  mt-2">
                    <?php
                        $niveauEtudes = array(
                            '' => "Selectionnez votre Niveau d'Etudes",
                            '11' => 'DEUG/BAC +2/LICENCE 2/BTS',
                            '12' => 'LICENCE 3 / BAC+3',
                            '13' => 'MAITRISE / MASTER 1 / BAC+4',
                            '14' => 'MASTER 2 / DEA / BAC+5',
                            '15' => 'DOCTORAT',
                        );        
                        
                        $status = array(
                            '' => "Selectionnez votre Statut (*)",
                            //'ELEVE' => 'ELEVE',
                            'ETUDIANT' => "ETUDIANT ",
                            'TRAVAILLEUR' => 'TRAVAILLEUR',
                            //'CHOMEUR' => 'CHOMEUR ',
                            'SANS_EMPLOI' => 'SANS EMPLOI - CHOMEUR',
                        );
                    ?>

                    <div class="card-body">
                        <h5 class="card-title"><b><i class="fa fa-info-circle" aria-hidden="true"></i> Autres Informations Utiles </b></h5>
                        <p class="card-text">

                            <div class="my-2">
                                <select class="select" name="niveau_etude" id="niveau_etude"> 
                                    <option value="">Selectionnez votre Niveau d'Etudes (*)</option> 
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
                                    <label class="form-label" for="pren">Specialite (Filiere)</label>
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
                                    <input class="form-check-input" type="radio" id="inlineCheckboxc2" checked="checked" name="hasexpcollecte" value="2" />
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
                                    <input type="text" id="employeur_1" name="employeur_1" class="form-control" required />
                                    <label class="form-label" for="employeur_1"> Structure *</label>
                                </div>                                
                            </div>  

                            <div class="my-2 div-experience">
                                <select class="select" name="year_deb_1"> <?php for($k = intval(date('Y')); $k >= 2010; $k--){ echo'<option value="'.$k.'">Année '.$k.'</option>';} ?> </select>                                      
                            </div>  

                            <div class="my-2 div-experience">
                                <div class="form-outline">
                                <input type="text" id="fontion_1" name="fontion_1" class="form-control" required />
                                <label class="form-label" for="fontion_1">Intitule Poste *</label>
                                </div>
                            </div>              
                            <div class="my-2 div-experience">
                                <div class="form-outline">
                                    <input type="text" id="projet_name_1" name="projet_name_1" class="form-control" />
                                    <label class="form-label" for="projet_name_1">Intitule du Projet</label>
                                </div>
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
                                <select class="form-control select-ne-marche-pas" name="first_langue" id="first_langue"> 
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
                                <label for="formFileSm" class="form-label">Joindre Dernier Diplome / Attestation De Reussite</label>
                                <input class="form-control form-control-sm" name="userFiles3" id="userFiles3" type="file" />
                            </div> 
                            <div class="my-2">
                                <label for="formFileSm" class="form-label">Joindre Curriculum Vitae </label>
                                <input class="form-control form-control-sm" id="userFiles2" name="userFiles2" type="file" />
                            </div> 
                            <div class="my-2">
                                <label for="formFileSm" class="form-label">Joindre Certificat De Residence</label>
                                <input class="form-control form-control-sm" id="userFiles6" name="userFiles6" type="file" />
                            </div> 
                            
                            <div class="my-2">
                                <label for="formFileSm" class="form-label">Joindre Certificat Medical </label>
                                <input class="form-control form-control-sm" id="userFiles7" name="userFiles7" type="file" />
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
                                <select name="sousprefecture3" id="selectSP" class="form-control">
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

                            <div class="my-3">
                                <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="ludeclaration" id="acceptDeclaration5" value="1" />
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
                        <h5 class="card-title"><b><i class="fas fa-info"></i> Recapitulatif Des Informations Renseignées </b></h5>
                        <p class="card-text">
                        <div class="my-2">
                                <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked1" value="Terrain" name="val_model1" checked />
                                <label class="form-check-label" for="flexSwitchCheckChecked1"> Je confirme le lieu d'affectation choisi</label>
                                </div>
                            </div> 
                        </p>
                    </div>
                </div>


            </section>

            <section class="btn-section footer-section mt-3"> 
                <button class="btn btn-sm btn-primary float-end btn-next-block2 btns-section1" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <a href="/m.profils" class="btn btn-sm btn-warning btn-prev-block1-1 btns-section1" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Profils </a>  

                <button class="btn btn-sm btn-primary float-end btn-next-block3 btns-section2" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <button class="btn btn-sm btn-primary btn-prev-block1 btns-section2" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>  

                <button class="btn btn-sm btn-primary float-end btn-next-block4 btns-section3" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <button class="btn btn-sm btn-primary btn-prev-block2 btns-section3" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>  

                <button class="btn btn-sm btn-primary float-end btn-next-block5 btns-section4" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <button class="btn btn-sm btn-primary btn-prev-block3 btns-section4" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>  

                <button class="btn btn-sm btn-primary float-end btn-next-block6 btns-section5" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Suivant</button>  
                <button class="btn btn-sm btn-primary btn-prev-block4 btns-section5" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>

                <button class="btn btn-sm btn-primary float-end btn-next-block7 btns-section6" type="button"> <i class="fas fa-long-arrow-alt-right fa-2"></i> Valider</button>  
                <button class="btn btn-sm btn-primary btn-prev-block5 btns-section6" type="button"> <i class="fas fa-long-arrow-alt-left"></i> Precedent </button>

            </section>

        </div>
    </div>

</form>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script type="text/javascript">  
    $(document).ready(function(){ 

        // block 1
        $(".btn-next-block2").click(function(e){e.preventDefault();  
            $(".section-block1, .btns-section1").fadeOut(10, function(){ $(".section-block2, .btns-section2").fadeIn(50); });  
        })

        $(".btn-prev-block1").click(function(e){e.preventDefault(); 
            $(".section-block2, .btns-section2").fadeOut(10, function(){ $(".section-block1, .btns-section1").fadeIn(50); });  
        })

        // block 2
        $(".btn-next-block3").click(function(e){e.preventDefault();  
            $(".section-block2, .btns-section2").fadeOut(10, function(){ $(".section-block3, .btns-section3").fadeIn(50); });  
        })

        $(".btn-prev-block2").click(function(e){e.preventDefault();  
            $(".section-block3, .btns-section3").fadeOut(10, function(){ $(".section-block2, .btns-section2").fadeIn(50); });  
        })

        // block 3
        $(".btn-next-block4").click(function(e){e.preventDefault();  
            $(".section-block3, .btns-section3").fadeOut(10, function(){ $(".section-block4, .btns-section4").fadeIn(50); });  
        })

        $(".btn-prev-block3").click(function(e){e.preventDefault();  
            $(".section-block4, .btns-section4").fadeOut(10, function(){ $(".section-block3, .btns-section3").fadeIn(50); });   
        })

        // block 4
        $(".btn-next-block5").click(function(e){e.preventDefault();  
            $(".section-block4, .btns-section4").fadeOut(10, function(){ $(".section-block5, .btns-section5").fadeIn(50); });  
        })

        $(".btn-prev-block4").click(function(e){e.preventDefault();  
            $(".section-block5, .btns-section5").fadeOut(10, function(){ $(".section-block4, .btns-section4").fadeIn(50); });
        })

        // block 5
        $(".btn-next-block6").click(function(e){e.preventDefault();  
            $(".section-block5, .btns-section5").fadeOut(10, function(){ $(".section-block6, .btns-section6").fadeIn(50); });  
        })

        $(".btn-prev-block5").click(function(e){e.preventDefault(); 
            $(".section-block6, .btns-section6").fadeOut(10, function(){ $(".section-block5, .btns-section5").fadeIn(50); });  
        })         
      
        $("#inlineCheckboxc1").click(function(e){ 
            $(".div-experience").slideDown(500);  
        })   
        
        $("#inlineCheckboxc2").click(function(e){ 
            $(".div-experience").slideUp(500);  
        })   
        
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
