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


// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['fichier']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['fichier']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['jpg', 'jpeg', 'gif', 'png'];
                if (in_array($extension, $allowedExtensions))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['fichier']['tmp_name'], 'uploads/' . basename($_FILES['fichier']['name']));
						$fichier = 'uploads/' . basename($_FILES['fichier']['name']); // on stocke le chemin 
                        echo "L'envoi a bien été effectué !";
                }
        }
}




$req = $bdd->prepare('INSERT INTO outils(fonction, marque, garantie, date_achat, description, etat, id_boite, quantite,photo,fichier) VALUES(:fonction, :marque, :garantie, :date_achat, :description, :etat, :id_boite, :quantite,:photo,:fichier)');

$req->execute(array(
    'fonction' => $fonction,
    'marque' => $marque,
    'garantie' => $garantie,
    'date_achat' => $date_achat,
    'description' => $description,
    'etat' => $etat,
    'id_boite' => $id_boite,
    'quantite' => $quantite,
    'photo' => $photo,
	'fichier' => $fichier
    )); 


 

} }



 ?>