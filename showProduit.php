<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>afficher la liste des produits</title>
</head>
<body>
    <?php
        //menu
        include 'menu.php';
    ?>
    <h3>Liste des produits :</h3>
    <form action="" method="post">
    <?php
        //fichier de connexion à la BDD
        include 'connectBdd.php';
        //function requête SQL
        include 'function.php';
        //fonction affiche la liste des produits (lien + checkbox)
        showAllProduit($bdd);
    ?>
        <input type="submit" value="Supprimer">
    </form>
    <?php
        //vérification de la super globale $_POST['id_prod']
        if(isset($_POST['id_prod'])){
            //boucle pour parcourir chaque case cochés ($value équivaut à value en HTML)
            foreach($_POST['id_prod'] as $value){
                //fonction supprimer produit
                deleteProduit($bdd, $value);
                //affichage des articles supprimés
                echo "<p>Suppression de l'article $value</p>";
            }
            //Script JS pour redirection vers showProduit.php dans 1500 ms 
            echo '<script>
            setTimeout(()=>{
                document.location.href="showProduit.php"; 
            }, 1500);</script>';
        }
        //gestion des erreurs
        else{
            //si $_GET['error'] existe
            if(isset($_GET['error'])){
                echo '<p>Veuillez sélectionner un produit à modifier</p>';
            }
            else{
                echo "<p>Veuillez cocher un ou plusieurs produits à supprimer</p>";
            }
        }
    ?>
</body>
</html>