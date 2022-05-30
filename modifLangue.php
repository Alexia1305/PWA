<?php session_start() ?>
<?php
if(isset($_SESSION['pseudo'])){

header('Location: secret.php'); 


 try
{
                $bdd = new PDO('mysql:host=localhost;dbname=cancia;charset=utf8', 'root', '');
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
}










$langue = htmlspecialchars($_POST['langueUser']);
$id_cet=$_SESSION['id'];








$req = $bdd->prepare("UPDATE utilisateur SET langue = :langue  WHERE WHERE utilisateur.id_utilisateur=$id_cet");

$req->execute(array(

    'langue' => $langue,
    

    ));



}






   



 




 ?>