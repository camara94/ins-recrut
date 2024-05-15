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
    <div class="col-sm-4 order-1 order-sm-2">
        <section class="section-block1 section">
            <div class="display-6 p-2 text-center"> Recapitulatif du Recepissé </div>
            <div class="p-2 text-center">
                <button class="btn btn-primary btn-sm" id="btn-print"><i class="fa fa-download" aria-hidden="true"></i> Télécharger le Recipicié</button>
            </div>
        </section>

        <section class="section-block2 container" id="div-print">
            <div class="row">
                <div class="col-6"> <img src="<?= base_url('assets/images/login_insg.png') ?>" alt="Institut National de la Statistique" width="100" /> </div>
                <div class="col-6 text-end"> <img src="<?= base_url('assets/images/logo-rgph4.jpg') ?>" alt="Logo RGPH-4" width="100" /> </div>
            </div>


            <?php if(isset($_SESSION['data'])){ $data = $_SESSION['data']; ?>            
            <div class="row">
                <div class="col-12">  
                    <h6 class="text-center p-3 fw-bold"> <?= strtoupper($data['projet']) ?> </h6>
                    <table class="table table-sm">
                        <tbody>
                            <tr> <th scope="row">MATRICULE </th> <td class="tableMatricule"> <?= strtoupper($data['matricule']) ?> </td></tr>  
                            <tr> <th scope="row">PRENOMS</th> <td class="tablePrenom"> <?= strtoupper($data['prenoms']) ?> </td></tr> 
                            <tr> <th scope="row">NOM</th> <td class="tableNom"> <?= strtoupper($data['nom']) ?> </td> </tr>
                            <tr> <th scope="row">PHONE</th> <td class="tableLieuNaissance"> <?= strtoupper($data['contact']) ?> </td> </tr>
                            <tr> 
                                <th scope="row"class="text-center"> <img class="rounded-3" src="<?= base_url() ?>uploads/files/<?= $data['photo'] ?>" alt="Logo RGPH-4" width="100" /> </th> 
                                <td class="tableCB">  
                                    <div id="barcodeTarget" class="barcodeTarget"></div>
                                    <canvas id="canvasTarget" width="150" height="150"></canvas>                                   
                                </td>  
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
		    <?php } ?>
                     


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
