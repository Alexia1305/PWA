<?php session_start() ?>
<?php


 try
{
                $bdd = new PDO('mysql:host=localhost;dbname=outils;charset=utf8', 'root', '');
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
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
$etat = htmlspecialchars($_POST['newetat']);
$boite = htmlspecialchars($_POST['newboite']);
$quantite = htmlspecialchars($_POST['newquantite']);
$id_outils=NULL;





$req = $bdd->prepare('INSERT INTO outils(id_outils,fonction,marque,type_outils,garantie,date_achat,description,etat,boite,quantite) VALUES(:id_outils,:fonction, :marque, :type_outils, :garantie, :date_achat, :description, :etat, :boite, :quantite)');

 

} 


 ?>