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
<link rel="stylesheet" type="text/css" href="form.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,900' rel='stylesheet' type='text/css'>
	<title>ToolBox</title>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<?php include("navbar.php");  ?>
<?php include("dbconnect.php");  ?>

<?php if(isset($_SESSION['id'])){ ?>
 <div id="sectionOutils">

    <div class="container-lg" style="margin-top: 20px"> <!-- faire une version avec moins d'info pour téléphone -->
      <span class="table-add float-right mb-3 mr-2">
        <div class="iconAddOutils" onclick="addOutils()"><img src="images/wrench.png" width="30vh"></div>
      </span>
     <?php 
       $id_cet=$_SESSION['id'];
       $rep= $bdd->query("SELECT DISTINCT outils.* FROM outils JOIN boite ON boite.id_boite=outils.id_boite JOIN posseder ON posseder.id_boite=boite.id_boite JOIN utilisateur ON posseder.id_utilisateur=utilisateur.id_utilisateur WHERE utilisateur.id_utilisateur=$id_cet" ); // Permet d'afficher le tableau avec les différents outils
      
     ?>
     <table id="editableTable" class="table table-bordered  table-striped">
       <thead>
         <tr>
          
          <th>Nom</th>
          <th>Marque</th>
          <th>Etat</th>
          <th>Boite</th>
          <th>Quantitée</th>
        

         </tr>
       </thead>
       <tbody>
         <?php while( $outils = $rep->fetch() ) { ?>
          <tr onclick="affDetailsOutils(this)" id="<?php echo $outils ['id_outils']; ?>">
           <td><?php echo $outils ['fonction']; ?></td>
           <td><?php echo $outils ['marque']; ?></td>
           <td><?php echo $outils['etat']; ?></td>
           <td><?php echo $outils['id_boite']; ?></td> 
           <td><?php echo $outils['quantite']; ?></td>                                       
          </tr>
        <?php } ?>
      </tbody>
    </table>
 </div>

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
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="form_email">Photo</label> <input id="form_email" type="text" name="photo" class="form-control" placeholder="URL photo "  data-error="Entrez une url valide."> </div>
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





  
  



</div>

<?php }
else{ ?>
<center>
<div class="d-flex justify-content-center col-lg-5 col-sm-12" style="margin-top: 5vh;"><img src="images/toolbox_0.png" width="100%"></div>
</center>

<center>
<div class="col-sm-10 col-lg-8">
<h1 style="font-family: 'Oswald', sans-serif;"> Bienvenue sur ToolBox ! </h1>
<p style="font-family: 'Open Sans', sans-serif;"> Connectez vous pour commencer !</p>
</div>
</center>
<?php } ?>
<script src="js.js"></script>
<script src="index.js"></script>
</body>
</html>


