<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@700&display=swap" rel="stylesheet"> 
<link href="css.css" rel="stylesheet"> 
	<title>ToolBox</title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js.js"></script>

<?php include("navbar.php");  ?>
<?php include("dbconnect.php");  ?>
<style>
  .boiteStyle{
    border: 1px grey solid; border-radius: 1em; margin-top: 2vh; box-shadow: 6px 6px 2px 1px lightgrey;
background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(33,33,85,1) 35%, rgba(0,0,0,1) 100%);
    color: white;
    font-family: 'Oswald', sans-serif;
  }
</style>
<script>
  var id_boite = localStorage.getItem("clickBoite");
  setCookie("id_boite", id_boite,7);
window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
</script>

<?php 
      $id_boite = htmlentities($_COOKIE['id_boite'], 7, 'UTF-8');


      $reponse = $bdd->query("SELECT * FROM boite WHERE id_boite =  '$id_boite'"); 
      $donnees = $reponse->fetch()
?>


<center><h1 id="titreBoite" class="boiteStyle" ><?php echo strtoupper ( $donnees['nom'] );  ?></h1></center>

<?php 
      $id_boite = htmlentities($_COOKIE['id_boite'], 7, 'UTF-8');


      $reponse = $bdd->query("SELECT DISTINCT outils.* FROM outils WHERE outils.id_boite='$id_boite'"); 
      while ($donnees = $reponse->fetch()) {
?>

<!-- Boucle ici pour chaque outils-->
<a href="detailsOutils.php"><p style="color: black;"> <?php echo $donnees['fonction'];  ?> <p></a>
<?php } ?>

<script>

  
 

</script>
</body>
</html>