<?php

// // Fonction pour générer le lien de partage WhatsApp
// function generateWhatsAppLink($phoneNumber, $message) {
//     // Format du lien de partage WhatsApp
//     $link = "https://wa.me/{$phoneNumber}?text=" . urlencode($message);
//     return $link;
// }

// // Numéro de téléphone du destinataire (ajoutez le code pays sans le signe plus)
// // $phoneNumber = "123456789";
// $phoneNumber = "+224621342156";

// // Message à partager
// $message = "Salut, regarde cette information intéressante !";

// // Générer le lien de partage WhatsApp
// $whatsappLink = generateWhatsAppLink($phoneNumber, $message);


?>



<?php

// Fonction pour générer le lien de partage WhatsApp
function generateWhatsAppLink($phoneNumber, $message) {
    // Format du lien de partage WhatsApp
    $link = "https://wa.me/{$phoneNumber}?text=" . urlencode($message);
    return $link;
}

// Liste des numéros de téléphone
$phoneNumbers = array("+224621342156", "+22598557085", "+224624201460");

// Message à partager
$message = "Salut, regarde cette information intéressante DIATAS !";

// Générer et afficher les liens de partage WhatsApp
foreach ($phoneNumbers as $number) {
    $whatsappLink = generateWhatsAppLink($number, $message);
    echo "<a href=\"$whatsappLink\" target=\"_blank\">Envoyer sur WhatsApp à $number</a><br>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partager via WhatsApp</title>
</head>
<body>

    <h1>Partager via WhatsApp</h1>

    <p>Cliquez sur le lien ci-dessous pour partager l'information via WhatsApp :</p>

    <a href="<?php echo $whatsappLink; ?>" target="_blank">Partager sur WhatsApp</a>

</body>
</html>