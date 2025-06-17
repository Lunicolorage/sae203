<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formulaire.css">
    <title>Commande</title>
</head>
<body>
    <form action="passer-commande.php" method="post">
        <div>
            <label for="client">Client :</label>
            <select name="client" id="client">
            <?php
                mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

                $mysqli = mysqli_connect('localhost', 'root', '', 'dbmagasin');
                
                $sql_client = "SELECT idClient, nom FROM client";
                $result_client = mysqli_query($mysqli, $sql_client);
                $tab_clients = mysqli_fetch_all($result_client, MYSQLI_ASSOC);

                foreach ($tab_clients as $tab_client) {
                    echo ("<option value=" .$tab_client['idClient'].">".$tab_client['nom']."</option>");
                }
            ?>
            </select>
        </div>

        <div class="aligner">
            <div>
                <label for="produit1">Produit 1 :</label>
                <select name="produit1" id="produit1">
                <?php
                    $sql_produit1 = "SELECT idProduit, nom FROM produit";
                    $result_produit1 = mysqli_query($mysqli, $sql_produit1);
                    $tab_produits1 = mysqli_fetch_all($result_produit1, MYSQLI_ASSOC);

                    foreach ($tab_produits1 as $tab_produit1) {
                        echo ("<option value=" .$tab_produit1['idProduit'].">".$tab_produit1['nom']."</option>");
                    }
                ?>
                </select>
            </div>
            <div>
                <label for="quantite1">Quantité :</label>
                <select name="quantite1" id="quantite1">
                <?php
                    for ($compteur=1; $compteur<=10; $compteur+=1){
                        echo ("<option value=".$compteur.">".$compteur. "</option>");
                    }
                ?>
                </select>
            </div>
        </div>

        <div class="aligner">
            <div>
                <label for="produit2">Produit 2 :</label>
                <select name="produit2" id="produit2">
                <?php
                    $sql_produit2 = "SELECT idProduit, nom FROM produit";
                    $result_produit2 = mysqli_query($mysqli, $sql_produit2);
                    $tab_produits2 = mysqli_fetch_all($result_produit2, MYSQLI_ASSOC);

                    foreach ($tab_produits2 as $tab_produit2) {
                        echo ("<option value=" .$tab_produit2['idProduit'].">".$tab_produit2['nom']."</option>");
                    }
                ?>
                </select>
            </div>
            <div>
                <label for="quantite2">Quantité :</label>
                <select name="quantite2" id="quantite2">
                <?php
                    for ($compteur=0; $compteur<=10; $compteur+=1){
                        echo ("<option value=".$compteur.">".$compteur. "</option>");
                    }
                ?>
                </select>
            </div>
        </div>

        <input type="submit" value="Ajouter la commande">
    </form>
</body>
</html>
