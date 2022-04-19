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
        <img src="Images/plus-lg.svg" onclick="ajouterOutil()" aria-hidden="true" style="width:30px;background:#EC81E1  "></i>
      </span>
     <?php 
       $id_cet=$_SESSION['id'];
       $rep= $bdd->query("SELECT DISTINCT outils.* FROM outils JOIN boite ON boite.id_boite=outils.id_boite JOIN posseder ON posseder.id_boite=boite.id_boite JOIN utilisateur ON posseder.id_utilisateur=utilisateur.id_utilisateur WHERE utilisateur.id_utilisateur=$id_cet" ); // Permet d'afficher le tableau avec les différents outils
      
     ?>
     <table id="editableTable" class="table table-bordered  table-striped">
       <thead>
         <tr>
          <th>Id</th>
          <th>Fonction</th>
          <th>Marque</th>
          <th>Type</th>
          <th>Garantie</th>
          <th>Date Achat</th>
          <th>Description</th>
          <th>Etat</th>
          <th>Boite</th>
          <th>Quantitée</th>
          <th>Photo</th>

         </tr>
       </thead>
       <tbody>
         <?php while( $outils = $rep->fetch() ) { ?>
          <tr id="<?php echo $outils ['id_outils']; ?>">
           <td><?php echo $outils['id_outils']; ?></td>
           <td><?php echo $outils ['fonction']; ?></td>
           <td><?php echo $outils ['marque']; ?></td>
           <td><?php echo $outils['type_outils']; ?></td>  
           <td><?php echo $outils['garantie']; ?></td>
           <td><?php echo $outils['date_achat']; ?></td>
           <td><?php echo $outils['description_outils']; ?></td>
           <td><?php echo $outils['etat']; ?></td>
           <td><?php echo $outils['id_boite']; ?></td> 
           <td><?php echo $outils['quantite']; ?></td>
           <td>></td>                                        
          </tr>
        <?php } ?>
      </tbody>
    </table>
 </div>
 <!--  Onglet ajouter outil -->
 <div class="col-lg-5 col-sm-12 " id="createOutils" style="margin-right:auto;margin-left:auto;background-color:#FEC4F8; border-radius: 30px;padding:10px;display:none; ">
    

    <div class="form" id="myOutil">
        <form method="post" action="addOutils.php" class="form-container" >
            <p class="text-danger"  onclick="closeFormOutils()" > X </p>
            <h1 style="text-align: center;"> Nouvel Outil </h1>
            <div class="mb-3">
             <label for="email"class="form-label"><b>Votre ID</b></label>
             <input class="form-control"type="text" name="id_utilisateur" value="<?php echo $_SESSION['id']?>" required>
            </div>
            <div class="mb-3">
              <label for="email"class="form-label"><b>fonction</b></label>
              <input class="form-control"type="text" placeholder="fonction.." name="newfonction" value="" required>
            </div>
            <div class="mb-3">
             <label for="psw"class="form-label"><b>marque</b></label>
             <input class="form-control"type="text" placeholder="marque.." name="newmarque" value="" required>
            </div>
            <div class="mb-3">
             <label for="psw"class="form-label"><b>type</b></label>
             <input class="form-control"type="text" placeholder="type.." name="newtype" required>
            </div>
            <div class="mb-3">
             <label for="psw"class="form-label"><b>garantie</b></label>
             <input class="form-control"type="text" placeholder="garantie.." name="newgarantie" required>
            </div>
            <div class="mb-3">
             <label for="psw"class="form-label"><b>date achat</b></label>
             <input class="form-control"type="text" placeholder="date achat.." name="newdate" >
            </div>
            <div class="mb-3">
             <label for="psw"class="form-label"><b>description</b></label>
             <input class="form-control"type="text" placeholder="description.." name="newdescription" required>
            </div>
            <div class="mb-3">
              <label for="psw"class="form-label"><b>etat</b></label>
              <input class="form-control"type="text" placeholder="etat.." name="newetat" required>
            </div>
            <div class="mb-3">
              <label for="psw"class="form-label"><b>boite</b></label>
              <input class="form-control"type="text" placeholder="boite.." name="newboite" required>
            </div>
            <div class="mb-3">
              <label for="psw"class="form-label"><b>quantite</b></label>
              <input class="form-control"type="text" placeholder="quantite.." name="newquantite" >
            </div>
            <button type="submit" class="btn btn-success" style="margin-right:auto;margin-left:auto" >Valider</button>
        </form>
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


