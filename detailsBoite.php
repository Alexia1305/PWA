<?php session_start() ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo 'css.css?='.time(); ?>"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.googleapis.com">
   
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@700&display=swap" rel="stylesheet"> 

	<title>ToolBox</title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js.js"></script>

<?php include("navbar.php");  ?>
<?php include("dbconnect.php");  ?>

<script>
  var id_boite = localStorage.getItem("clickBoite");
  
  setCookie("id_boite", id_boite,7);
  
  document.getElementById("hiddenInput").value = id_boite
    window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
        }
    }
</script>

<?php 
      $id_boite = htmlentities($_COOKIE['id_boite'], 7, 'UTF-8');
     echo $id_boite;

      $reponse = $bdd->query("SELECT * FROM boite WHERE id_boite =  '$id_boite'"); 
      $donnees = $reponse->fetch()
?>

<div class="iconAddOutils" onclick="addOutils()"><img src="images/wrench.png" width="30vh"></div>
<center><h1 id="titreBoite" class="boiteStyle" ><?php echo strtoupper ( $donnees['nom'] );  ?></h1></center>

<?php 
      $id_boite = htmlentities($_COOKIE['id_boite'], 7, 'UTF-8');


      $reponse = $bdd->query("SELECT DISTINCT outils.* FROM outils WHERE outils.id_boite='$id_boite'"); 
      while ($donnees = $reponse->fetch()) {
?>

<!-- Boucle ici pour chaque outils-->
<a href="detailsOutils.php"><p style="color: black;"> <?php echo $donnees['fonction'];  ?> <p></a>
<?php } ?>

<!-- Menu ajout outils -->
<div class="container" id="addOutils" style="display:none">

    <div class="row ">

        <div class="col-lg-7 mx-auto">
            <div class="card mt-2 mx-auto p-4 bg-light">
                     <p style="display: flex; justify-content: right; font-weight: bold;" onclick="closeAddOutils()"> X</p> 
                <div class="card-body bg-light">
                    <div class="container">
                        <form id="contact-form" role="form" action="addOutils.php" method="post">
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_name">Nom de l'outils *</label> <input id="nomOutils" type="text" name="name" class="form-control" placeholder="Entrez le nom de votre outils *" required="required" data-error="Firstname is required."> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_lastname">Marque</label> <input id="form_lastname" type="text" name="marque" class="form-control" placeholder="Entrez la marque de votre outils" data-error="Lastname is required."> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Garantie</label> <input id="form_email" type="number" name="garantie" class="form-control" placeholder="Date de validitée de la garentie" data-error="Entrez une date valide"> </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_need">Etat</label> <select id="form_need" name="etat" class="form-control" required="required" data-error="Please specify your need.">
                                                <option>Neuf</option>
                                                <option>Bon état</option>
                                                <option>Mauvais état</option>
                                                <option>Non fonctionel</option>
                                             
                                            </select> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Date d'achat</label> <input id="form_email" type="date" name="dateAchat" class="form-control" placeholder="Entrez la date d'achat ici" data-error="Rentrez une date valide"> </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group"> <label for="form_email">Quantitée</label> <input id="form_email" type="number" name="quantite" class="form-control" placeholder="Quantitée "  data-error="Entrez un nombre valide."> </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"> <label for="form_message">Description complémentaire</label> <textarea id="form_message" name="description" class="form-control" placeholder="Entrez la description ici" rows="4" data-error="Please, leave us a message."></textarea> </div>
                                    </div>
                                    <input id="hiddenInput" type="hidden" name="id_boite" class="form-control" placeholder="Quantitée " value="1">
                                    <div class="col-md-12"> <input type="submit" class="btn btn-success btn-send pt-2 btn-block " value="Send Message"> </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- /.8 -->
        </div> <!-- /.row-->
    </div>
</div>
<script type="text/javascript">
    temp = getCookie("id_boite");
    document.getElementById("hiddenInput").value = temp;


</script>
</body>
</html>