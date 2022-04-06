<?php session_start() ?>
<?php
if(isset($_SESSION['pseudo'])){
header('Location: boite.php'); 
 try
{
                $bdd = new PDO('mysql:host=localhost;dbname=outils;charset=utf8', 'root', '');
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
}

if(isset($_POST['boxName'])){
$boxName = htmlspecialchars($_POST['boxName']);
$boxDescription = htmlspecialchars($_POST['boxDescription']);
$boxFirstOutils = htmlspecialchars($_POST['boxFirstOutils']);




$req = $bdd->prepare('INSERT INTO boite(nom, description) VALUES(:nom, :description)');

$req->execute(array(
    'nom' => $boxName,
    'description' => $boxDescription

    )); 

 }

$req = $bdd->prepare('INSERT INTO outils(fonction) VALUES(:fonction)');

$req->execute(array(
    'fonction' => $boxFirstOutils,



    )); 

} }



 ?>