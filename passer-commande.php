<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif de la commande</title>
    <link rel="stylesheet" href="commande.css">
</head>
<body>
<?php

$client = $_POST['client'];
$produit1 = $_POST['produit1'];
$quantite1 = $_POST['quantite1'];
$produit2 = $_POST['produit2'];
$quantite2 = $_POST['quantite2'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect('localhost', 'root', '', 'dbmagasin');

$sql_commande = "INSERT INTO commande (idClient) VALUES ('$client')";
$result_commande = mysqli_query($mysqli, $sql_commande);
$id_commande = mysqli_insert_id($mysqli);

$sql_pivot1 = "INSERT INTO pivot (idProduit, quantite, idCommande) VALUES ('$produit1', '$quantite1', '$id_commande')";
$result_pivot1 = mysqli_query($mysqli, $sql_pivot1);

$nom_produit1 = mysqli_query($mysqli, "SELECT nom FROM produit WHERE idProduit='$produit1'");
$prix_produit1 = mysqli_query($mysqli, "SELECT prix FROM produit WHERE idProduit='$produit1'");

if ($quantite2 > 0){
    $sql_pivot2 = "INSERT INTO pivot (idProduit, quantite, idCommande) VALUES ('$produit2', '$quantite2', '$id_commande')";
    $result_pivot2 = mysqli_query($mysqli, $sql_pivot2);

    $nom_produit2 = mysqli_query($mysqli, "SELECT nom FROM produit WHERE idProduit='$produit2'");
    $prix_produit2 = mysqli_query($mysqli, "SELECT prix FROM produit WHERE idProduit='$produit2'");
}

?>
<div class='all'>
    <h1>Récapitulatif de la commande</h1>
    <p><b><?php echo $quantite1 . " " . mysqli_fetch_all($nom_produit1, MYSQLI_ASSOC)[0]['nom']; ?></b></p>
    <?php if ($quantite2 > 0): ?>
        <p><b><?php echo $quantite2 . " " . mysqli_fetch_all($nom_produit2, MYSQLI_ASSOC)[0]['nom']; ?></b></p>
    <?php endif; ?>
    <div class="total">
        <?php
        $tot = (mysqli_fetch_all($prix_produit1, MYSQLI_ASSOC)[0]['prix'] * $quantite1);
        if ($quantite2 > 0) {
            $tot += (mysqli_fetch_all($prix_produit2, MYSQLI_ASSOC)[0]['prix'] * $quantite2);
        }
        echo "Prix total : " . $tot . " €";
        $sql_total="UPDATE commande SET prixTotal='$tot' WHERE idCommande = $id_commande";
        $result_total = mysqli_query($mysqli, $sql_total);
        ?>
        
    </div>
</div>
<div >
        <a class="ajout" href="afficher-commande.php">Retourner aux commandes</a>
    </div>
</body>
</html>
