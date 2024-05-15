<?= $this->extend('mobile/base') ?>

<?= $this->section('title') ?>
    RGPH4 - Résultat
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


</style>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<div class="row py-3">
    <div class="col-sm-4 order-1 order-sm-2">
        <section class="section-block1 container">            
            <div class="row">
                <div class="col-xs-12">
                    <div class="text-center" style="margin:10px;"> 
                        <button id="imprimerRecepisse-new" class="btn btn-sm btn-primary">&nbsp;TÉLÉCHARGER RECEPISSE &nbsp;&nbsp;</button> 
                    </div>
                </div>
            </div>
        </section>

        <section class="section-block2 container" id="pimprime">
            <?php if($hasExiste == true): ?>
                
                <?php if($data['id_projet'] != 18): ?>
                          
                    <div class="row">
                        <div class="col-xs-12">
                            <?php $sexe_ac = ""; $title = "M."; if($data['sexe']==2){ $sexe_ac = "e"; $title = "Mme"; } ?>
                            <?php if($data['is_admited'] == 1): ?>
                                <div class="row">
                                    <div class="col-xs-12 text-center text-success"> 
                                        <h6 class="h6"> <strong>Félicitation</strong> 
                                        <?= $title ?> <?= strtoupper($data['last_name']); ?>! <br> vous êtes admis<?= $sexe_ac ?> pour la formation de :  
                                        <strong><?= ucfirst(strtolower($data['NomProjet'])); ?></strong>. </h6> 
                                    </div>    
                                </div>
                            <?php else: ?>
                                <div class="row">
                                    <div class="col-xs-12 text-center text-danger"> 
                                        <h6 class="h6"> <strong>Desolé</strong> <?= $title ?> <?= strtoupper($data['last_name']); ?>! <br> Désolé, votre candidature n'a pas été acceptée veillez vous préparez pour la prochaine candidature </h6> 
                                    </div>    
                                </div>                           
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="top-30 row">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-xs-5"> <h6 class="h6">Matricule</h6> </div>
                                <div class="col-xs-7"> <h6 class="h6"> <?= strtoupper($data['matricule']); ?> </h6> </div>    
                            </div>

                            <div class="row">
                                <div class="col-xs-5"> <h6 class="h6">Prénom (s)</h6> </div>
                                <div class="col-xs-7"> <h6 class="h6"> <?= strtoupper($data['name']); ?> </h6> </div>    
                            </div>

                            <div class="row">
                                <div class="col-xs-5"> <h6 class="h6">Nom de Famille</h6> </div>
                                <div class="col-xs-7"> <h6 class="h6"> <?= strtoupper($data['last_name']); ?> </h6> </div>    
                            </div>

                            <div class="row">
                                <div class="col-xs-5"> <h6 class="h6">Téléphone</h6> </div>
                                <div class="col-xs-7"> <h6 class="h6"> <?= $data['contact1']; ?> </h6> </div>    
                            </div>

                            <div class="row">
                                <div class="col-xs-5"> <h6 class="h6">Email</h6> </div>
                                <div class="col-xs-7"> <h6 class="h6"> <?= strtolower($data['email']); ?> </h6> </div>    
                            </div>

                            <div class="row">
                                <div class="col-xs-5"> <h6 class="h6">N° Pièce</h6> </div>
                                <div class="col-xs-7"> <h6 class="h6"> <?= strtoupper($data['numero_cni']); ?> </h6> </div>    
                            </div>

                            <div class="row">
                                <div class="col-xs-12 text-center">
                                    <img src="<?= base_url();?>uploads/files/<?= $data['photo'];?>" alt="Loading..." height="100" width="100"> 
                                </div>    
                            </div> 
                        </div>
                        <div class="col-sm-5">
                            <h6 class="h6 text-center text-bold text-danger">
                                <!-- Veuillez prendre contact avec l'Unité des Ressources Humaines du Bureau Central du Recensement (BCR). <br> -->
                                <?php if($data['is_admited'] == 1): ?>     
                                    <?php if($data['id_projet'] == 17): ?>
                                        Veuillez-vous présenter, muni de votre récépissé d’admission, à la
                                        cérémonie de lancement de la formation le vendredi 12 janvier 2024 à
                                        partir 08H00 au Chapiteau By Issa, du Palais du Peuple de Conakry. 
                                        <br> <br>
                                        La formation débutera le lundi 15 janvier 2024. Votre centre de formation 
                                        vous sera communiqué ultérieurement.
                                    <?php elseif($data['id_projet'] == 12): ?>
                                        Vous êtes admis à un test d’évaluation dont la date vous sera communiquée ultérieurement.
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if($data['fonction_id'] == 0 && $data['is_admited'] == 1): ?>                        
                                    <h6 class="text-danger text-center h2" style="padding:15px;"> <strong>Vous êtes sur la liste d'attente</strong> </h6>						
                                <?php endif; ?>
                                <h6 class="text-center"> <a href="<?= url_to('index'); ?>" class=""> <i class="fa fa-reply"></i> Terminer </a> </h6> 
                            </h6>






                        </div>

                    </div>
                    <?php else: ?>
                        <div class="row"> 
                            <div class="col-xs-12 text-center text-danger"> 
                                <h6 class="h2">Désolé, votre candidature n'a pas été acceptée veillez vous préparez pour la prochaine candidature <br> (matricule, numéro de telephone ou email) </h6> 
                            </div>              
                        </div>              
                        <div class="row"> 
                            <div class="col-xs-12 text-center"> 
                                <h6> <a href="<?= url_to('mcheckapp'); ?>" class=""> <i class="fa fa-undo"></i> Reessayez </a> </h6> 
                            </div>              
                        </div>              
                    <?php endif; ?> 

                <?php else: ?>
                    <h2 class="text-center" style="color: red;">
                        Resultat non disponible
                    </h2>
                <?php endif; ?>

        </section>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
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
<?= $this->endSection() ?>
