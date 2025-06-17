<?php
require_once __DIR__.'/bootstrap.php';

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect('localhost', 'root', '', 'dbmagasin');

$result = mysqli_query($mysqli,
"SELECT commande.idCommande, commande.dateHeure, client.nom as 'client' , pivot.quantite, produit.nom, commande.prixTotal
FROM commande
JOIN client 
ON commande.idClient = client.idClient
JOIN pivot
ON commande.idCommande = pivot.idCommande
JOIN produit
On pivot.idProduit= produit.idProduit
ORDER BY commande.idCommande");

$commandes = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo $twig->render('afficher-commande.twig.html', ['commandes' => $commandes] );
?>