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
  <script type="text/javascript" src="index.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="index.js"></script>

<?php include("navbar.php");  ?>
<?php include("dbconnect.php");  ?>

<?php if(isset($_SESSION['id'])){ ?>

<?php include("menuAjoutOutils.php");  ?>
 <div id="sectionOutils" >
</div>
    <div class="container-fluid"  style="margin-top: 20px"> <!-- faire une version avec moins d'info pour téléphone -->
      <span class="table-add float-right mb-3 mr-2">
        <div class="iconAddOutils" onclick="addOutils()"><img src="images/wrench.png" width="30vh"></div>
      </span>
     <?php 
       $id_cet=$_SESSION['id'];
       $rep= $bdd->query("SELECT DISTINCT outils.* FROM outils JOIN boite ON boite.id_boite=outils.id_boite JOIN posseder ON posseder.id_boite=boite.id_boite JOIN utilisateur ON posseder.id_utilisateur=utilisateur.id_utilisateur WHERE utilisateur.id_utilisateur=$id_cet" ); // Permet d'afficher le tableau avec les différents outils
      
     ?>
    
	 <div class="table-responsive"> 
     <table id="editableTable" class="table table-bordered   table-striped"style="margin:20px "> 
       <thead> 
         <tr>
          

          <th id="table_nom">Nom</th>
          <th id="table_marque">Marque</th>
          <th id="table_etat">Etat</th>
          <th id="table_boite">Boite</th>
          <th id="table_q">Quantitée</th>

        

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
 </div>
 
</div>

<?php if(isset($_SESSION['langue'])){
    ?><p id="langueDeBase" style="display: none"><?php echo $_SESSION['langue']; ?> </p><?php
 if($_SESSION['langue'] =='fr')  {

     ?>
     <script>francais_outil();</script>

     <?php
   } 
   if($_SESSION['langue']=='en'){

     ?>
     <script>anglais_outil();</script>
     <?php
   }
 }
?>
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