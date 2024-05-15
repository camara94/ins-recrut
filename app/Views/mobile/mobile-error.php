<?= $this->extend('mobile/base') ?>

<?= $this->section('title') ?>
    RGPH4 - Recapitulatif
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
    <div class="offset-sm-4 col-sm-4">
        <section class="section-block1 section">
            <div class="display-6 p-2 text-center text-danger"> Erreur d'Inscription </div> 
        </section>

        <section class="section-block2 container" id="div-print">
            <div class="row">
                <div class="col-12">
                    <p class="">
                        Une erreur est survenue lors de votre inscription assurez-vous que l’un de vos identifiants n’ont pas encore été inscrit auparavant sur ce poste 
                        (adresse mail, numéro de téléphone ou numéro de votre pièce d’identité).
                    </p>

                    <p class="list-group">  
                        <a href="<?= url_to('index') ?>" class="list-group-item list-group-item-action"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Cliquer ici pour revenir à l'Accueil</a>
                        <a href="<?= url_to('mrecepisse') ?>" class="list-group-item list-group-item-action"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Cliquer ici pour recupérer votre recipissé</a>
                        <a href="<?= url_to('mcheckapp') ?>" class="list-group-item list-group-item-action"> <i class="fa fa-arrow-right" aria-hidden="true"></i> Cliquer ici pour voir votre resultat</a> 
                    </p>       
            
                </div>
            </div> 
        </section>

    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/polyfills.umd.js"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="<?php echo base_url('assets/js/jquery-barcode.js') ?>"></script>

<script type="text/javascript">  
    
    $(document).ready(function(){ 

        $("#btn-print").click(function(){
            
            var htmlWidth = $("#div-print").width();
            var htmlHeight = $("#div-print").height();
            var pdfWidth = htmlWidth + (15 * 2);
            var pdfHeight = (pdfWidth * 1.5) + (15 * 2);
            
            var doc = new jsPDF('p', 'pt', [pdfWidth, pdfHeight]);	
            var pageCount = Math.ceil(htmlHeight / pdfHeight) - 1;	
        
            html2canvas($("#div-print")[0], { allowTaint: true }).then(function(canvas) {
                canvas.getContext('2d');
        
                var image = canvas.toDataURL("image/png", 1.0);
                doc.addImage(image, 'PNG', 15, 15, htmlWidth, htmlHeight);	
        
                for (var i = 1; i <= pageCount; i++) {
                    doc.addPage(pdfWidth, pdfHeight);
                    doc.addImage(image, 'PNG', 15, -(pdfHeight * i)+15, htmlWidth, htmlHeight);
                } 
                
                doc.save("Recepisse-"+$(".tableMatricule").text().trim()+"-"+$(".tableNom").text().trim()+"-"+(new Date()).getTime()+".pdf");
            });      
        })

        // ------------------------ Impression code barre -----------------------------
        // var value = $("#tableMatricule").html();
        // var btype = "code128";
        // var renderer = "css";

        // var settings = {
        //     output:renderer,
        //     bgColor: "#FFFFFF",
        //     color: "#000000",
        //     barWidth: 1,
        //     barHeight: 50,
        //     moduleSize: 5,
        //     posX: 10,
        //     posY: 20,
        //     addQuietZone: 1
        // };       
        
        
        // if (renderer == 'canvas'){
        //     clearCanvas();
        //     $("#barcodeTarget").hide();
        //     $("#canvasTarget").show().barcode(value, btype, settings);
        // } else {
        //     alert("no-canvas");
            
        //     $("#canvasTarget").hide();
        //     $("#barcodeTarget").html("").show().barcode(value, btype);
        // }
        
        
    })   
        
    // //Create PDf from HTML...
    // function CreatePDFfromHTML() {
    //     var HTML_Width = $(".html-content").width();
    //     var HTML_Height = $(".html-content").height();
    //     var top_left_margin = 15;
    //     var PDF_Width = HTML_Width + (top_left_margin * 2);
    //     var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    //     var canvas_image_width = HTML_Width;
    //     var canvas_image_height = HTML_Height;

    //     var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    //     html2canvas($(".html-content")[0]).then(function (canvas) {
    //         var imgData = canvas.toDataURL("image/jpeg", 1.0);
    //         var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
    //         pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
    //         for (var i = 1; i <= totalPDFPages; i++) { 
    //             pdf.addPage(PDF_Width, PDF_Height);
    //             pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
    //         }
    //         pdf.save("Your_PDF_Name.pdf");
    //         $(".html-content").hide();
    //     });
    // }

</script>
<?= $this->endSection() ?>
