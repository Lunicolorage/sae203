<?php
require_once __DIR__.'/bootstrap.php';

$id = $_GET['id'];

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$mysqli = mysqli_connect('localhost', 'root', '', 'dbmagasin');
        
$sql = "SELECT * FROM produit WHERE idProduit=$id";
$result = mysqli_query($mysqli, $sql);
$produits = mysqli_fetch_all($result, MYSQLI_ASSOC);


if ($result == false) {
    echo "error";
} else {
    foreach ($produits as $produit) {
        $id = $produit["idProduit"];
        $type = $produit["type"];
        $nom = $produit["nom"];
        $description = $produit["description"]; 
        $prix = $produit["prix"]; 
        $quantite = $produit["quantite"];
    }
}

echo $twig->render('formulaire-actualiser-produit.twig.html', ['id' => $id, 'type' => $type, 'nom' => $nom, 'description' => $description, 'prix' => $prix,  'quantite' => $quantite] );

?>