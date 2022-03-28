<?php
    //a modifier avec vos paramètres perso (base, login et mdp BDD)
    $bdd = new PDO('mysql:host=localhost;dbname=produits', 'admin',1234, 
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
