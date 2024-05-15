<?php
/**
 * Created by PhpStorm.
 * User: angeeric
 * Date: 10/11/2016
 * Time: 14:41
 */
?>
<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formulaire de Recrutement -  RGPH23</title>
     <!--<link rel="icon" type="" href="" />-->
    <!-- Latest compiled and minified CSS -->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->
    <link rel="stylesheet" href="<?= base_url() ;?>/assets/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ;?>/assets/css/nprogress.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ;?>/assets/css/common.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ;?>/assets/css/icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ;?>/assets/css/jquery.steps.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ;?>/assets/css/dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url() ;?>/assets/css/recrutement_cssx.css" rel="stylesheet" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->

    <script src="<?= base_url() ;?>/assets/js/jquery-1.9.1.min.js"></script>
    <script src="<?= base_url() ;?>/assets/js/recrutement_jsx.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>

    
    <script type="text/javascript">
        // < ![CDATA[       
        BASE_URL = '<?php echo base_url();?>';
        //]] >
		 
    </script>

    <script>


        $(document).ready(function () {

            $('div#windows').css('display','block');
            $(window).on('scroll', function () {
                var w = $(this).width();
                var scrollNum = Math.max(window.pageYOffset, document.documentElement.scrollTop, document.body.scrollTop);
                if(w >= 960){
                    if(scrollNum >= 10){
                        $('#header_band').css('display','none');
                        $('#header_new').css('display','none');
                        $('#header_new_2').css('display','block');
                    }
                    else{
                        $('#header_band').css('display','block');
                        $('#header_new').css('display','block');
                        $('#header_new_2').css('display','none');
                    }
                }

                console.log(scrollNum);
            });

        });

    </script>

</head>
<body>
    <noscript>
        <meta http-equiv="refresh" runat="server" id="mtaJSCheck" content="0;logon.aspx" />
        <p class="no-js">For full functionality of this site it is necessary to enable JavaScript. Here are the 
        <a href="http://www.enable-javascript.com/fr/" target="_blank">instructions how to enable JavaScript in your web browser</a>.</p>
    </noscript>


    <div id="windows">
        <div id="wrapper" >
            <div id="header_band" class="hidden">
                <div id="contener_norm">
                    <div style="float: left">
                    <a style="color:white;text-decoration: none; border-right:1px solid white; padding-right: 3px"><i class="fa fa-facebook-f"></i> </a>
                    <a style="color:white;text-decoration: none"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div style="float: right">
                        <a href="<?php echo base_url()."contact_view.php" ;?>" style="color:white;text-decoration: none;  padding-right: 3px">Contact </a> |
                        <a href="#" style="color:white;text-decoration: none">Se connecter</a>
                    </div>
                    <div style="clear:both"></div>
                </div>
            </div>
        <div id="header_new">
            <div class="container" style="">
                <div class="logo1">
                    <a href="/"> <img src="<?php echo base_url('assets/images/LOGO_MPCI.png'); ?>" title="Institut National de la Statistique"  /> </a>
                </div>
                <div class="logo2">
                    <a href="/"><img src="<?php echo base_url('assets/images/BRANDING_GUINEE.png'); ?>" title="RP" /></a>
                </div>
                <div class="header_content">
                    <div style=" ">
                    <span style="font-size:18px;">
                        REPUBLIQUE DE GUINEE
                    </span>
                    </div>
                    <div style="padding-top:0px; ">
                    <span style="font-size:13px">
                        Travail - Justice - Solidarité
                    </span>
                    </div>
                    <!--              <div style="padding-top:40px; ">-->
                    <div class="name" style="padding-top:0px;margin-top:10px">
                    <span style="margin-left:-30px; color:white;">
                        <!--4ème RECENSEMENT GÉNÉRAL DE LA POPULATION ET DE L'HABITATION (RGPH4)-->
                        MINISTÈRE DU PLAN ET DE LA COOPÉRATION INTERNATIONALE (MPCI)
                    </span> 
                    </div>
                    <!--<div style="margin-top:0px"><span>Nous faire recenser, c'est construire notre avenir </span></div>-->
                </div>
            </div>
        </div>
        <div id="header_new_2">
            <div class="logo3">
                <img src="<?php echo base_url('assets/images/LOGO_MPCI.png'); ?>" title="RP" width="40"  />
            </div>
            <div class="d_contact" style="float: right; margin-right: 10px; line-height: 40px;">
                <a href="<?php  //echo BASE_URL."contact_view.php" ;?>" style="color:black;text-decoration: none;  padding-right: 3px; cursor:pointer">Contact </a> |
                <a href="#" style="color:black;text-decoration: none; cursor:pointer">Se connecter</a>
            </div>
            <div style="margin-top:0px;"><span>Nous faire recenser, c'est construire notre avenir</span></div>
        </div>
        <div id="contener" class="idBack">
            <!--<div id="camenbert_image"></div>-->
            <div class="container">
                <!--<div class="titleDrh">MINISTÈRE DU PLAN ET DE LA COOPÉRATION INTERNATIONALE</div>-->
                <div style="text-align:center"><img src="<?php echo base_url('assets/images/LogoGn3.png'); ?>" title="Institut National de la Statistique"/></div>
                <div class="titleDrh">INSTITUT NATIONAL DE LA STATISTIQUE (INS) </div> 
                <br>
                <div  style="padding-top:0px; text-align: center; font-weight: bold; font-size:18px"  >BUREAU CENTRAL DU RECENSEMENT (BCR) </div>
                
                <div class="titleInfoCaaf">4ème RECENSEMENT GÉNÉRAL DE LA POPULATION ET DE L'HABITATION (RGPH4)</div>
                <div class="titleDrh" style="font-style: italic;font-size:16px"><span>Nous faire recenser, c'est construire notre avenir </span></div>
                <div class="titleFormulaire">Plateforme de Recrutement en ligne</div>                        
                <!--close div wrapper-->
            </div>
    <!--close div container -->
    </div>
    <!--clase div  contener-->
    </div>
    <!--close div windows-->
    </div>



    <!-- popup message bienvenue -->
    <!--<div id="m_plateforme">
        <div id="pop_up"></div>
        <div id="login_pag_popup">
            <div style="position:relative; margin:0">
                <div class="title_pop_up">BIENVENUE SUR LA PLATEFORME DE RECRUTEMENT EN LIGNE DU RGPH-4 
                    <div id="closePopM" style="position:absolute;top:0;right:10px;font-size:30px; color:#c3c3c3; cursor:pointer">x</div>
                </div>
                <div class="l_email" style="margin-top:20px;font-size:20px; color:black;font-weight:bold;padding-bottom:2px;border-left: 2px solid rgba(198, 232, 194, 0.58);border-right: 2px solid rgba(198, 232, 194, 0.58);">
                    Pour postuler veuillez cliquer sur le bouton "<span style='color:red'>postuler</span>". 
                <div style="margin-top:30px;">
                        <img src="<?php echo base_url('assets/images/imgPopup.png'); ?>" />
                </div>
                </div>
            </div>

        </div>
    </div> -->

    <!--- end message -->


    <div id="p_u_inscript">
        <div id="pop_up"></div>
        <div id="login_pag_popup">
            <div style="position:relative; margin:0">
                <div class="title_pop_up">RECRUTEMENT EN LIGNE </div>
                <div jsname="paFcre">
                    <div class="jXeDnc" jsname="tJHJj" jscontroller="S9352b" jsaction="JIbuQc:pKJJqe(af8ijd);PIbeAb:pKJJqe">
                        <h1 data-a11y-title-piece="" id="headingText" jsname="r4nke">
                            <content>Lire attentivement le message avant de commencer...</content>
                        </h1>
                    </div>
                </div>
                <div class="l_email" style="background-color:#ace0b81f; padding-bottom:2px;border-left: 2px solid rgba(198, 232, 194, 0.58);border-right: 2px solid rgba(198, 232, 194, 0.58);">
                        
                    <div class="form-group" style="color:#05054c; font-weight:bold; font-family:Arial; text-align:justify">
                        - UN NUMÉRO D'INSCRIPTION SERA G&Eacute;N&Eacute;R&Eacute; A LA FIN DE L'INSCRIPTION. 
                        VEUILLEZ LE NOTER ET LE CONSERVER.
                    </div>
                    
                    <div class="form-group" style="color:#05054c; font-weight:bold; font-family:Arial; text-align:justify">
                        - EN CAS D'OUBLI OU DE PERTE DE VOTRE NUMERO D'INSCRIPTION, VOUS POUVEZ LE RECUPERER SUR LA PAGE D'ACCEUIL 
                        A PARTIR DU LIEN "Recupérer mon numéro d'inscription".
                    </div>
                    <div class="form-group" style="color:#05054c; font-weight:bold; font-family:Arial; text-align:justify">
                            - LA TAILLE DE CHAQUE FICHIER À CHARGER DOIT ÊTRE DE DEUX (2) Mo AU MAXIMUM.
                        </div>
                        <div class="form-group" style="color:#05054c; font-weight:bold; font-family:Arial; text-align:justify">
                            - VEUILLEZ RENSEIGNER DES INFORMATIONS CORRECTES
                        </div>                    

                        <div>
                            <button id="submitpopupmsg" type="submit" class="btn btn-primary css_btn">J'ai bien lu le message et je m'inscris</button>
                        </div>
                </div>
            </div>

        </div>
    </div>


    <div class="ec-modal-loading">
        <div class="ec-modal-loading-inner">
            <div class="ec-modal-loading-msg">
                <span>CHARGEMENT DES DONNEES</span>
            </div>
        </div>
    </div>

    <div id="footerMsg" style="position:fixed;bottom:0px; left:0px;right:15px; background-color:rgba(7, 8, 7,1);height:40px;z-index:3">
        <div style="float:left;background-color:#abc598;; color:white;line-height:40px;font-weight:bold;padding:0 10px;">INFORMATIONS </div>
        <div style="margin-left:150px; height:40px; line-height:40px color:white;margin-right:20px;">
            <marquee style="margin-top:10px;">
            <p style="color:white">
                <span style="font-size:18px;">Seul le profil de l'agent de collecte de la cartographie censitaire pilote est actuellement recherché.  </span>
            </p>
            </marquee>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('div#closePopM').on('click',function(e){
            $('div#m_plateforme').css('display','none'); 
            })
        });
    </script>

</body>
</html>
