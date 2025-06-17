<?php
$id = $_POST['idProduit'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect('localhost', 'root', '', 'dbmagasin');

$sql = "DELETE FROM produit WHERE idProduit=$id";
$result = mysqli_query($mysqli, $sql);

if ($result == true){
    header('Location: afficher-produits.php');
}

else{
    echo("Cette catégorie ne peux pas être supprimé car une commande a déjà été passé contenant ce produit.");
}

?>