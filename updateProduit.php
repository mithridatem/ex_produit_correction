<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <title>Mise à jour d'un produit</title>
</head>
<body>
    <?php
        //menu
        include 'menu.php';
    ?>
    <h3>Mettre à jour les informations du produit:</h3>
    <form action="" method="post">
        <p>Mettre à jour le nom :</p>
        <input type="text" name="nom_produit">
        <p>Mettre à jour le contenu :</p>
        <textarea name="contenu_produit" cols="30" rows="10">
        </textarea>
        <p><input type="submit" value="Modifier"></p>
    </form>
    <?php
        //fichier de connexion à la BDD
        include 'connectBdd.php';
        //function requête SQL
        include 'function.php';
        //récupération de la super globale $_GET['id']
        if(isset($_GET['id']) AND $_GET['id'] != ""){
            $value = $_GET['id'];
        }
        //si elle n'existe pas redirection vers la page showProduit.php
        else{
            header('Location: showProduit.php?error'); 
        }
        //test si les champs existent et sont remplis
        if(isset($_POST['nom_produit'])AND isset($_POST['contenu_produit']) AND
        $_POST['nom_produit'] != "" AND $_POST['contenu_produit'] !=""){
            //variable qui récupérent les super globales POST
            $nom = $_POST['nom_produit'];
            $content = $_POST['contenu_produit'];
            //fonction mise à jour de l'article
            updateProduit($bdd, $value, $nom, $content);
            //affichage de l'article mis à jour
            echo "<p>L'article : $nom à été mis à jour en BDD</p>";
        }
        //test si les champs du formulaire sont vides
        else{
            echo '<p>Veuillez remplir les champs du  formulaire</p>';
        }
    ?>
</body>
</html>