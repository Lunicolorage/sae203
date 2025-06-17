<?php

print_r($_POST);

$id = $_POST['id'];
$type = $_POST["type"];
$nom = $_POST["nom"];
$description = $_POST["description"];
$prix = $_POST["prix"];
$quantite = $_POST["quantite"];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect('localhost', 'root', '', 'dbmagasin');

$sql = "UPDATE produit SET type='$type', nom='$nom', description='$description', prix='$prix', quantite='$quantite' WHERE idProduit=$id";

$result = mysqli_query($mysqli, $sql);

if ($result == true){
    header('Location: afficher-produits.php');
}
else{
    echo("erreur");
}
?>