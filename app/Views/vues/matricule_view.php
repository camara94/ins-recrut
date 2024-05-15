<?php
session_start();
$data = $_SESSION['data'];
$statusMsg = $_SESSION["statusMsg"];

$code_projet = $data['code_projet'];
$id_pers =  $data['id_pers'];

require_once('views/part_left.php');

?>


<div>
<div style="margin-top:40px;text-align:center;font-size:20px;font-weight: bold">
    Votre Matricule de candidature est : <span style="color:red;"><?php echo $code_projet."_".$id_pers; ?></span>
</div>
<div style="margin-top:20px;text-align:center;font-size:14px;color:red">
    Ce code doit &ecirc;tre utilis&eacute; pour soumettre vos pièces jointes et Télécharger votre bordereau de candidature.
</div>
</div>