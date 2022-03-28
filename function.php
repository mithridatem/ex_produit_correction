<?php
    //requête ajouter un produit :
    function insertProduit($bdd,$nom, $content){
        try{
            $req = $bdd->prepare('INSERT INTO produit(nom_produit, contenu_produit) 
            VALUES(:nom_produit, :contenu_produit)');
            $req->execute(array(
                'nom_produit' => $nom,
                'contenu_produit' =>$content
                ));
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }
    //requête qui affiche tous les produits en BDD(table->produit)
    function showAllProduit($bdd){
        try{
            $req = $bdd->prepare('SELECT * FROM produit');
            $req->execute();
            while ($data = $req->fetch()){
                $id= $data['id_produit'];
                $nameProd = $data['nom_produit'];
                echo '<p><input type="checkbox" name="id_prod[]" value="'.$id.'">
                <a href="updateProduit.php?id='.$id.'">'.$nameProd.'</a></p>';
            }
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }
    //requête qui supprime un produit (table->produit)
    function deleteProduit($bdd, $value){
        try{
            $req = $bdd->prepare('DELETE FROM produit WHERE id_produit = :id_produit');
            $req->execute(array(
                'id_produit' => $value
                ));
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }
    //requête mise à jour d'un produit (nom_produit et contenu_produit) en BDD(table->produit)
    function updateProduit($bdd, $value, $nom, $content){
        try{
            $req = $bdd->prepare('UPDATE produit SET nom_produit= :nom_produit, 
            contenu_produit=:contenu_produit WHERE id_produit=:id_produit');
            $req->execute(array(
                'id_produit' => $value,
                'nom_produit' => $nom,
                'contenu_produit' => $content,
                ));
        }
        catch(Exception $e)
        {
        //affichage d'une exception en cas d’erreur
        die('Erreur : '.$e->getMessage());
        }
    }
?>