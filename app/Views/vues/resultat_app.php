<style>
    .h3{ color:black; }
</style>

<!-- <div id="sectionAimprimer" class="container" style="margin:auto; padding-top:30px; padding-bottom:20px;background-color:#f7f7f9; margin-bottom:20px"> -->
<div id="sectionAimprimer" class="container">
    <div class="text-center m-5">
        <button id="imprimerRecepisse-new" class="btn btn-sm btn-primary">&nbsp;TÉLÉCHARGER RECEPISSE &nbsp;&nbsp;</button>
    </div>

    <div id="pimprime">       
        <?php if($hasExiste == true): ?>
            <?php if($data['id_projet'] != 18): ?>                

                <div class="row">
                    <div class="col-xs-12">
                        <?php $sexe_ac = ""; $title = "M."; if($data['sexe']==2){ $sexe_ac = "e"; $title = "Mme"; } ?>
                        <?php if($data['is_admited'] == 1 && $data['rank'] > 0): ?>
                            <div class="row">
                                <div class="col-xs-12 text-center text-success"> 
                                    <h3 class="h4"> 
                                        <!-- <strong>Félicitation</strong> 
                                        <?= $title ?> <?= strtoupper($data['last_name']); ?>! <br> vous êtes admis <?= $sexe_ac ?> pour la Cartographie comme :  
                                        <strong><?= strtolower($data['NomProjet']) ?></strong>  -->
                                        <div> Félicitations, vous êtes retenus comme agent de terrain pour la réalisation de la cartographie censitaire du RGPH-4.</div>
                                        <div> Vous serez contacté dans un bref délai pour les dispositions pratiques du déploiement sur le terrain. </div>
                                        <div> Merci de votre disponibilité </div>
                                    </h3> 
                                </div>    
                            </div>
                        <?php else: ?>
                            <div class="row">
                                <div class="col-xs-12 text-center text-danger"> 
                                    <h3 class="h4"> 
                                        <!-- <strong>Desolé</strong> <?= $title ?> <?= strtoupper($data['last_name']); ?>! <br> votre candidatrue n'a pas été acceptée  -->
                                        <div>Désolé, vous n'avez pas été retenu comme agent de collecte des données pour la cartographie. En cas de besoin, vous serez contacté par les services des ressources humaines</div>
                                    </h3> 
                                </div>    
                            </div>                           
                        <?php endif; ?>
                    </div>
                </div>
                <div class="top-30 row">
                    <div class="col-sm-7">
                        <div class="row">
                            <div class="col-xs-5"> <h3 class="h3">Matricule</h3> </div>
                            <div class="col-xs-7"> <h3 class="h3"> <?= strtoupper($data['matricule']); ?> </h3> </div>    
                        </div>

                        <div class="row">
                            <div class="col-xs-5"> <h3 class="h3">Prénom (s)</h3> </div>
                            <div class="col-xs-7"> <h3 class="h3"> <?= strtoupper($data['name']); ?> </h3> </div>    
                        </div>

                        <div class="row">
                            <div class="col-xs-5"> <h3 class="h3">Nom de Famille</h3> </div>
                            <div class="col-xs-7"> <h3 class="h3"> <?= strtoupper($data['last_name']); ?> </h3> </div>    
                        </div>

                        <div class="row">
                            <div class="col-xs-5"> <h3 class="h3">Téléphone</h3> </div>
                            <div class="col-xs-7"> <h3 class="h3"> <?= $data['contact1']; ?> </h3> </div>    
                        </div>

                        <div class="row">
                            <div class="col-xs-5"> <h3 class="h3">Email</h3> </div>
                            <div class="col-xs-7"> <h3 class="h3"> <?= strtolower($data['email']); ?> </h3> </div>    
                        </div>

                        <div class="row">
                            <div class="col-xs-5"> <h3 class="h3">N° Pièce</h3> </div>
                            <div class="col-xs-7"> <h3 class="h3"> <?= strtoupper($data['numero_cni']); ?> </h3> </div>    
                        </div>

                        <div class="row">
                            <div class="col-xs-12 text-center"> 
                            
                            <img src="<?= base_url();?>uploads/files/<?= $data['photo'];?>" alt="Loading..." height="100" width="100"> 
                            </div>    
                        </div>         
                            
                        <div class="form-group">
                            <canvas id="canvasTarget" width="150" height="150"></canvas> 
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <h4 class="h4 text-center">
                        <?php if($data['is_admited'] && $data['rank'] > 0) {?>
                            <!-- <span>Veuillez prendre contact avec l'Unité des Ressources Humaines du Bureau Central du Recensement (BCR).</span> -->
                            <span style="color:red">
                                <?php if($data['id_projet'] == 17): ?>                            
                                    <h3 class="" style="color: re;">Centre de Formation</h3>

                                    <h3 class="" style="color: re;"> 
                                        <?= strtoupper($data['comSalle']) ?> /
                                        <?= strtoupper($data['quartSalle']) ?> /
                                        <?= strtoupper($data['adresSalle']) ?> /
                                        <?= strtoupper($data['siteSalle']) ?> /
                                        <?= strtoupper($data['salle']) ?> 
                                    </h3>

                                    <!-- Veuillez-vous présenter, muni de votre récépissé d’admission, à la
                                    cérémonie de lancement de la formation le vendredi 12 janvier 2024 à
                                    partir 08H00 au Chapiteau By Issa, du Palais du Peuple de Conakry.  -->
                                    <br> <br>
                                    <!-- La formation débutera le lundi 15 janvier 2024 à 08H00.  -->
                                    les candidats admis après formation, la date de lancement de la cartographie censitaire sur 
                                    le territoire national vous sera communiqué ultérieurement et vous êtes priés de rester 
                                    mobilisés à Conakry.
                                    <!-- Votre centre de formation vous sera communiqué ultérieurement. -->
                                <?php elseif($data['id_projet'] == 12): ?>
                                    Vous êtes admis à un test d’évaluation dont la date vous sera communiquée ultérieurement.
                                <?php endif; ?>
                            </span>                        
                            <?php if($data['fonction_id'] == 0 && $data['is_admited'] == 1 && $data['rank'] > 0): ?>                        
                                <h4 class="text-danger text-center h2" style="padding:15px;"> <strong>Vous êtes sur la liste d'attente</strong> </h4>						
                            <?php endif; ?>
                        <?php } else{  ?>
                            <!-- <span class="rouge">Désolé, votre candidature n'a pas été acceptée veillez vous préparez pour la prochaine candidature</span> -->
                        <?php } ?>
                            <br>
                            <?php if($data['fonction_id'] == 0 && $data['is_admited'] == 1 && $data['rank'] > 0): ?>                        
                                <h4 class="text-danger text-center h2" style="padding:15px;"> <strong>Vous êtes sur la liste d'attente</strong> </h4>						
                            <?php endif; ?>
                            <h3 class="text-center"> <a href="<?= url_to('index'); ?>" class=""> <i class="fa fa-reply"></i> Terminer </a> </h3> 
                        </h4>
                        <?php if($data['is_admited'] && $data['rank'] > 0) {?>
                            <!-- <div class="text-center m-5">
                                <button id="imprimerRecepisse-new" class="btn btn-sm btn-primary">&nbsp;TÉLÉCHARGER RECEPISSE &nbsp;&nbsp;</button>
                            </div> -->
                            <!-- <h4 class="text-success text-center h2" style="padding:15px;">Prière de venir avec ce récépissé</h4> -->
                        <?php } ?>
                    </div>
                </div>
            <?php else: ?>                    
                <div class="row">
                    <div class="col-xs-12">
                        <h1 class="text-center">
                            Résultat non disponible
                        </h1>
                    </div>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <div class="row"> 
                <div class="col-xs-12 text-center text-danger"> 
                    <h3 class="h2"> Votre candidature n'a pas été retrouvée, veillez verifier votre coordonnée <br> (matricule, numéro de telephone ou email) </h3> 
                </div>              
            </div>              
            <div class="row"> 
                <div class="col-xs-12 text-center"> 
                    <h3> <a href="<?= url_to('checkapp'); ?>" class=""> <i class="fa fa-undo"></i> Réessayez </a> </h3> 
                </div>              
            </div>              
        <?php endif; ?>      
    </div>
</div>

<script src="<?php echo base_url('assets/js/jspdf.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

<script>
$(document).ready(function(){
	$("#imprimerRecepisse-new").click(function(){
		var htmlWidth = $("#pimprime").width();
		var htmlHeight = $("#pimprime").height();
		var pdfWidth = htmlWidth + (15 * 2);
		var pdfHeight = (pdfWidth * 1.5) + (15 * 2);
		
		var doc = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);	
		var pageCount = Math.ceil(htmlHeight / pdfHeight) - 1;	
	
		html2canvas($("#pimprime")[0], { allowTaint: true }).then(function(canvas) {
			canvas.getContext('2d');	
			var image = canvas.toDataURL("image/png", 1.0);
			doc.addImage(image, 'PNG', 15, 15, htmlWidth, htmlHeight);	
			for (var i = 1; i <= pageCount; i++){
				doc.addPage(pdfWidth, pdfHeight);
				doc.addImage(image, 'PNG', 15, -(pdfHeight * i) + 15, htmlWidth, htmlHeight);
			}			

            var currentDate = new Date();
            var year = currentDate.getFullYear();
            var month = ('0' + (currentDate.getMonth() + 1)).slice(-2);  
            var day = ('0' + currentDate.getDate()).slice(-2);
            var hours = ('0' + currentDate.getHours()).slice(-2);
            var minutes = ('0' + currentDate.getMinutes()).slice(-2);
            var seconds = ('0' + currentDate.getSeconds()).slice(-2);
            var dateTimeString = year + '' + month + '' + day + '' + hours + '' + minutes + '' + seconds;
		    doc.save("recepisse"+ dateTimeString +".pdf");
		});
	});
});
</script>