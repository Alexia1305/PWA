<?php session_start() ?>
<?php
<<<<<<< HEAD
if(isset($_SESSION['id'])){
header('Location: detailsBoite.php'); 
 try
{
=======
if(isset($_SESSION['pseudo'])){
  header('Location: boite.php'); 
 try{
>>>>>>> 978c41dc374dd3e3bcba53987e74e2b0962c355b
                $bdd = new PDO('mysql:host=localhost;dbname=outils;charset=utf8', 'root', '');
 }
 catch(Exception $e){
             die('Erreur : '.$e->getMessage());

<<<<<<< HEAD
=======
 }

 if(isset($_POST['newfonction'])){
  $fonction = htmlspecialchars($_POST['newfonction']);
  $marque = htmlspecialchars($_POST['newmarque']);
  $type_outils = htmlspecialchars($_POST['newtype']);
  $garantie = htmlspecialchars($_POST['newgarantie']);
  if($_POST['newdate'] !== ""){
  $date_achat = htmlspecialchars($_POST['newdate']);
  }else{
  $date_achat = date('d-m-y');;
  }
  if($_POST['newdescription'] !== ""){
  $description= htmlspecialchars($_POST['newdescription']);
  }else{
  $description= " bo";
  }
=======

$etat = htmlspecialchars($_POST['newetat']);
$boite = htmlspecialchars($_POST['newboite']);
$quantite = htmlspecialchars($_POST['newquantite']);
$id_outils=NULL;
>>>>>>> 978c41dc374dd3e3bcba53987e74e2b0962c355b

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



<<<<<<< HEAD


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

=======
>>>>>>> 978c41dc374dd3e3bcba53987e74e2b0962c355b


<<<<<<< HEAD
} }
=======
$req = $bdd->prepare('INSERT INTO outils(id_outils,fonction,marque,type_outils,garantie,date_achat,description_outils,etat,boite,quantite) VALUES(:id_outils,:fonction, :marque, :type_outils, :garantie, :date_achat, :description_outils, :etat, :boite, :quantite)');

$req->execute(array(
    'id_outils' => $id_outils,
    'fonction' => $fonction,
    'marque'=> $marque,
    'type_outils'=> $type_outils,
    'garantie'=> $garantie,
    'date_achat'=> $date_achat,
    'description_outils'=> $description,
    'etat'=> $etat,
    'boite'=> $boite,
    'quantite'=> $quantite


    )); 

 } }


>>>>>>> 978c41dc374dd3e3bcba53987e74e2b0962c355b



 ?>