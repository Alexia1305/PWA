<?php session_start() ?>
<?php
if(isset($_SESSION['id'])){
header('Location: detailsBoite.php'); 
 try
{
                $bdd = new PDO('mysql:host=localhost;dbname=outils;charset=utf8', 'root', '');
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
}


if(isset($_POST['name'])){
    
$fonction = htmlspecialchars($_POST['name']);
$marque = htmlspecialchars($_POST['marque']);
$garantie = htmlspecialchars($_POST['garantie']);
$date_achat = htmlspecialchars($_POST['dateAchat']);
$description = htmlspecialchars($_POST['description']);
$etat = htmlspecialchars($_POST['etat']);
$id_boite = htmlspecialchars($_POST['id_boite']);
$quantite = htmlspecialchars($_POST['quantite']);
$photo = htmlspecialchars($_POST['photo']);





$req = $bdd->prepare('INSERT INTO outils(fonction, marque, garantie, date_achat, description, etat, id_boite, quantite,photo ) VALUES(:fonction, :marque, :garantie, :date_achat, :description, :etat, :id_boite, :quantite,:photo)');

$req->execute(array(
    'fonction' => $fonction,
    'marque' => $marque,
    'garantie' => $garantie,
    'date_achat' => $date_achat,
    'description' => $description,
    'etat' => $etat,
    'id_boite' => $id_boite,
    'quantite' => $quantite,
    'photo' => $photo
    )); 


 

} }



 ?>