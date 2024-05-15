<div id="sectionAimprimer" style="margin:auto; padding-top:30px; padding-bottom:20px;background-color:#f7f7f9; margin-bottom:20px">
    <?php $data = $_SESSION['data']; ?>

    <?php if(isset($_SESSION['statusMsg'])): ?>
    <!-- <p  class="error_widget " style="background-color: green"><?php echo $_SESSION['statusMsg']; ?></p> -->
    <?php endif; ?>
    <?php //echo validation_errors('<div class="error">', '</div>'); ?>

    <div class="text-center" style="margin:10px;"> 
        <button id="imprimerRecepisse-new" class="btn btn- btn-primary">&nbsp;TÉLÉCHARGER RECEPISSE &nbsp;&nbsp;</button> 
    </div>

    <div class="row">
        <div class="col-sm-3"> &nbsp; </div>
        <div class="col-sm-6">
            <div id="pimprime">

                <div class="top-10">
                    <div id="recap_logo1">
                        <img src="<?php echo base_url('assets/images/login_insg.png'); ?>" alt="Institut National de la Statistique" style="border-radius: 10px;" />
                    </div>
                    <div id="recap_logo2">
                        <img src="<?php echo base_url('assets/images/logo-rgph4.jpg'); ?>" alt="Logo RGPH-4" style="border-radius: 10px;" />
                    </div>
                    <div style="clear:both"></div>
                </div>

                <div style="margin-left:50px; margin-bottom: 3px;" class="top-10 tdate">Date : <span></span></div>

                <!-- <div style="width: 600px; margin:auto"> -->
                <div class="">
                    <?php if($_SESSION['data']): ?>
                    <div class="top-3">
                        <div style="font-weight: bold;margin-left:-0px; margin-bottom: 5px; text-align:left">
                            <!-- RECAPITULATIF -->
                            <h1 class="" style="font-weight: bold; font-size:30px; color: #000000; margin-left:30px;">RECEPISSE D'INSCRIPTION</h1>
                        </div>            

                        <div class="form-group" style="margin-left:30px;">
                            <label for="inputPassword3" class="control-label text-bold">PROFIL : <?php echo strtoupper($data['projet']);?></label>
                        </div>
                    
                        <div class="form-group" style="margin-left:30px;">
                            <?php if($data['departement'] != null):?>
                                <?php $dept = $data['departement']['CodDep'];?>
                                <?php $sp = $data['sousprefecture']['CodSp'];?>
                            <img src="<?php echo base_url();?>uploads/files/<?php echo $dept."/".$sp."/".$data['photo'];?>" alt="Loading..." height="100px" width="100px" />
                            <?php else:?>
                            <img src="<?php echo base_url();?>uploads/files/<?php echo $data['photo'];?>" alt="Loading..." height="100px" width="100px" />
                            <?php endif;?>
                        </div>

                        <div class="form-group" style="margin-left:30px;">
                            <label for="inputPassword3" class="control-label text-bold">  NUMERO D'INSCRIPTION : <?php echo strtoupper($data['matricule']);?></label>
                        </div>
                        <div id="matricule_div" style="display:none"><?php echo strtoupper($data['matricule']);?></div>
                        <div class="form-group" style="margin-left:30px;">
                            <label for="inputPassword3" class=" control-label text-bold"> NOM : <?php echo strtoupper($data['nom']);?></label>
                        </div>
                        <div class="form-group" style="margin-left:30px;">
                            <label for="inputPassword3" class=" control-label text-bold"> PRENOMS : <?php echo strtoupper($data['prenoms']);?></label>
                        </div>
                        <div class="form-group" style="margin-left:30px;">
                            <label for="inputPassword3" class=" control-label text-bold"> PHONE : <?php echo $data['contact'];?></label>
                        </div>
                        <div class="form-group" style="margin-left:30px;">
                            <!-- <label for="inputPassword3" class=" control-label text-bold"> COMMUNE / SP : <?php // strtoupper($data['departement3'])." - ".strtoupper($data['sousprefecture3']) ?></label> -->
                            <label for="inputPassword3" class=" control-label text-bold"> 
                                COMMUNE / SP : <?= strtoupper($data['departement3']['NomDep'])." - ".strtoupper($data['sousprefecture3']['NomSp']) ?>
                            </label>
                        </div>
                        <?php if ($data['id_projet'] == 11 || $data['id_projet'] == 9): ?>                
                        <div class="form-group" style="margin-left:30px;">
                            <?php $departement = $data['departement']; ?>
                            <label for="inputPassword3" class=" control-label text-bold"> 1ÈRE PREFECTURE DE D'AFFECTATION : <?php echo strtoupper($departement['NomDep']);?></label>
                        </div>
                            
                        <?php if ($data['id_projet'] == 9 ): ?>
                        <div class="form-group" style="margin-left:30px;">
                            <?php $sousprefecture = $data['sousprefecture']; ?>
                            <label for="inputPassword3" class=" control-label text-bold"> 1ÈRE SOUS PREFEFCTURE D'AFFECTATION : <?php echo strtoupper($sousprefecture['NomSp']);?></label>
                        </div>                    
                        <?php endif; ?>
                        <?php endif; ?>
                        <div class="form-group" style="margin-left:30px;">
                            <div id="barcodeTarget" class="barcodeTarget"></div>
                            <canvas id="canvasTarget" width="150" height="150"></canvas> 
                        </div>
                    </div>
                <?php endif; ?>
                <!--
                    <?php if ($data['id_projet'] == 11 || $data['id_projet'] == 9 ): ?>
                    <div class="form-group top-30" style="text-align:center; color:red;font-weight: bold">
                        Ce document doit être déposé à la sous-préfecture de votre choix pour finalisation.
                    </div>
                <?php endif; ?>
                    -->
                </div>

                <?php if ($data['id_projet'] == 18){ ?>
                    <div class="text-danger text-center" style=" font-size:25px; ">
                        <!-- Ce recepisse ne vous donne pas le droit à la formation avant la pre-selection.  -->
                        Ceci est un récepissé d'inscription, un autre récepissé vous sera delivré si vous êtes pré-selectioné pour la suite.
                    </div>
                <?php }else /* if ($data['id_projet'] == 18)*/{ ?>
                    <div class="text-danger text-center" style=" font-size:25px; ">
                        Ceci est un récepissé d'inscription, un autre récepissé vous sera delivré si vous êtes pré-selectioné pour la formation.
                    </div>
                    
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>


<!--<script
	src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.3/jspdf.min.js"></script>-->
<script src="<?php echo base_url('assets/js/jspdf.js') ?>"></script>
<script
	src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

 <script src="<?php echo base_url('assets/js/jquery-barcode.js') ?>"></script>

<script>
	$(document).ready(function() {
		$('div#m_plateforme').css('display','none');
	});
	
  function imprimer(divName){
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;
             document.body.innerHTML = printContents;
             window.print();
             document.body.innerHTML = originalContents;
      }

      $(document).ready(function(){
        var value = $("#matricule_div").html();
        var btype = "code128";
        var renderer = "css";

        var settings = {
          output:renderer,
          bgColor: "#FFFFFF",
          color: "#000000",
          barWidth: 1,
          barHeight: 50,
          moduleSize: 5,
          posX: 10,
          posY: 20,
          addQuietZone: 1
        };
        if ($("#rectangular").is(':checked') || $("#rectangular").attr('checked')){
          value = {code:value, rect: true};
        }
        if (renderer == 'canvas'){
          clearCanvas();
          $("#barcodeTarget").hide();
          $("#canvasTarget").show().barcode(value, btype, settings);
        } else {
          $("#canvasTarget").hide();
          $("#barcodeTarget").html("").show().barcode(value, btype);
        }

          //affichage de la date sur le recepissé
        var da = new Date();
        var m = (da.getMonth()+1);
        if(m < 10){
           m = "0"+m;
        }
        var strDate = da.getDate()+" / "+ m +" / "+da.getFullYear() ;
        $('div.tdate span').html(strDate);

      });


</script>

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
	
			for (var i = 1; i <= pageCount; i++) {
				doc.addPage(pdfWidth, pdfHeight);
				doc.addImage(image, 'PNG', 15, -(pdfHeight * i)+15, htmlWidth, htmlHeight);
			}
			
		    doc.save("recepisse.pdf");
		});
	});
});
</script>