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


<?php include("navbar.php");  ?>
<?php include("dbconnect.php");  ?>
<script type="text/javascript">
	
</script>
<?php 
      $id_boite = htmlentities($_COOKIE['id_outils'], 7, 'UTF-8');


      $reponse = $bdd->query("SELECT * FROM outils WHERE id_outils='$id_boite'"); 
      while ($donnees = $reponse->fetch()) {
?>

<!-- Boucle ici pour chaque outils-->
<center>
<p style="color: black;" onclick="affDetailsOutils(this)"><b>Nom : </b><?php echo $donnees['fonction'];  ?> </p>
<p style="color: black;" onclick="affDetailsOutils(this)"><b>Marque : </b><?php echo $donnees['marque'];  ?> </p>
<p style="color: black;" onclick="affDetailsOutils(this)"><b>Garantie : </b><?php echo $donnees['garantie'];  ?> </p>
<p style="color: black;" onclick="affDetailsOutils(this)"><b>Date d'achat :</b> <?php echo $donnees['date_achat'];  ?> </p>
<p style="color: black;" onclick="affDetailsOutils(this)"><b>Description :</b> <?php echo $donnees['description'];  ?> </p>
<p style="color: black;" onclick="affDetailsOutils(this)"><b>Etat :</b> <?php echo $donnees['etat'];  ?> </p>
<p style="color: black;" onclick="affDetailsOutils(this)"><b>Quantitée : </b><?php echo $donnees['quantite'];  ?> </p>
<p style="color: black;" onclick="affDetailsOutils(this)"><b>Quantitée : </b><?php echo $donnees['photo'];  ?> </p>
<img src=<?php echo $donnees['photo'];  ?> style="">
	</center
<?php } ?>

</body>
</html>