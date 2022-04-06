<!-- Connection à la base de données-->
<?php
    
            try
{
                $bdd = new PDO('mysql:host=localhost;dbname=outils;charset=utf8', 'root', '');
                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
            catch(Exception $e)
{
             die('Erreur : '.$e->getMessage());
}
?>