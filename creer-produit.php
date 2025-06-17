<?php
$type = $_POST["type"];
$nom = $_POST["nom"];
$description = $_POST["description"];
$prix = $_POST["prix"];
$quantite = $_POST["quantite"];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'root', '', 'dbmagasin');

$sql = "INSERT INTO produit (type, nom, description, prix, quantite) VALUES ('$type', '$nom', '$description', '$prix','$quantite')";

$result =mysqli_query($mysqli, $sql);
if ($result == true){
    header('Location: afficher-produits.php');
}
else{
    echo("erreur");
}

?>