<?php session_start() ?>
<?php
if(isset($_SESSION['id'])){
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


 $reponse = $bdd->query("SELECT id_boite FROM boite");

while ($donnees = $reponse->fetch()) {
    $id_boite = $donnees['id_boite'];

}

echo $id_boite;
echo $boxFirstOutils;

$req = $bdd->prepare('INSERT INTO outils(fonction, id_boite) VALUES(:fonction, :id_boite)');

$req->execute(array(
    'fonction' => $boxFirstOutils,
    'id_boite' => $id_boite



    )); 

} }



 ?>