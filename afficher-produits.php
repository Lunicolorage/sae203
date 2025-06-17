<?php
require_once __DIR__.'/bootstrap.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'root', '', 'dbmagasin');

$result = mysqli_query($mysqli, "SELECT produit.idProduit, produit.nom, categorie.nom as 'categorie', produit.description, produit.prix, produit.quantite FROM produit JOIN categorie ON produit.type = categorie.idCategorie");

$produits = mysqli_fetch_all($result, MYSQLI_ASSOC);

$result2 = mysqli_query($mysqli, "SELECT COUNT(*) as icount FROM produit");

$nbtotal = (mysqli_fetch_all($result2, MYSQLI_ASSOC))[0]['icount'];

$result3 = mysqli_query($mysqli, "SELECT COUNT(*) as ancount FROM produit JOIN categorie ON produit.type = categorie.idCategorie WHERE categorie.type='animal'");

$nbanimal = (mysqli_fetch_all($result3, MYSQLI_ASSOC))[0]['ancount'];

$result4 = mysqli_query($mysqli, "SELECT COUNT(*) as flcount FROM produit JOIN categorie ON produit.type = categorie.idCategorie WHERE categorie.type='plante'");

$nbfleur = (mysqli_fetch_all($result4, MYSQLI_ASSOC))[0]['flcount'];

//print_r($nbtotal[0]['icount']);

echo $twig->render('afficher-produits.twig.html', ['produits' => $produits, 'nbtotal' => $nbtotal, 'nbanimal' => $nbanimal, 'nbfleur' => $nbfleur] );
?>