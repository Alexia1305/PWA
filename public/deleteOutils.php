<?php session_start() ?>
<?php
if(isset($_SESSION['id'])){

 try
{
                $bdd = new PDO('mysql:host=localhost;dbname=outils;charset=utf8', 'root', '');
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
}



if(isset($_POST['idDeLOutilDelete'])){
$deleteIdd = htmlspecialchars($_POST['idDeLOutilDelete']);



$req = $bdd->prepare('DELETE FROM outils WHERE id_outils = :deleteId');
$valid = $req->execute(array(
    'deleteId' => $deleteIdd




    )); 

$bdd->query('ALTER TABLE outils AUTO_INCREMENT=0');

}

}

header('Location: detailsBoite.php?valid='.$valid); 

 ?>