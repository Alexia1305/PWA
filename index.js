// Permet d'aller dans les différents sous-menu
function ajouterOutils() {

	document.getElementById("createOutils").style.display = "block";
	

}
function closeFormOutils() {
	document.getElementById("createOutils").style.display = "none";	
}
// Permet de changer la langue

function francais() {
	const x = document.getElementById("langueDeBase").innerHTML;
	// acceuil
	document.getElementById("paraa").innerHTML = "Paramètres";
    document.getElementById("acceuil").innerHTML = "Bienvenue sur ToolBox";
	document.getElementById("conseil").innerHTML = "Parcourez les différents menu pour créer votre première boite à outils.";
	// navbar 
	document.getElementById("nav_outils").innerHTML = "Vos Outils";
	document.getElementById("nav_boites").innerHTML = "Vos boîtes à outils";
    document.getElementById("nav_para").innerHTML = "Paramètres";
	document.getElementById("nav_rech").innerHTML = "Rechercher";
	document.getElementById("nav_co").innerHTML = "Connexion";
	// outils
	document.getElementById("table_nom").innerHTML = "Nom";
	document.getElementById("table_marque").innerHTML = "Marque";
	document.getElementById("table_etat").innerHTML = "Etat";
	document.getElementById("table_boite").innerHTML = "Boite";
	document.getElementById("table_q").innerHTML = "Quantitée";

    //ajout outils 
	document.getElementById("aj_nom").innerHTML = "Nom";
	document.getElementById("aj_marque").innerHTML = "Marque";
	document.getElementById("aj_garantie").innerHTML = "Garantie";
	document.getElementById("aj_etat").innerHTML = "Etat";
	document.getElementById("aj_neuf").innerHTML = "Neuf";
	document.getElementById("aj_bon").innerHTML = "Bon état";
	document.getElementById("aj_mauv").innerHTML = "Mauvais état";
	document.getElementById("aj_nf").innerHTML = "Non fonctionnel";
	document.getElementById("aj_date").innerHTML = "Date d'achat";
	document.getElementById("aj_q").innerHTML = "Quantitée";
	document.getElementById("aj_photo").innerHTML = "Photo";
	document.getElementById("aj_f").innerHTML = "Votre fichier";
	document.getElementById("aj_des").innerHTML = "Description complémentaire";

	document.getElementById("lla").value = "fr";


	if (x !== "fr") {
	

 		document.formLa.submit(); }

}

function anglais() {

	const x = document.getElementById("langueDeBase").innerHTML;
	// acceuil
	document.getElementById("paraa").innerHTML = "Settings";
    document.getElementById("acceuil").innerHTML = "Welcome on ToolBox";
    document.getElementById("conseil").innerHTML = "Go through the different menus to create your first toolbox.";
	// navbar
	document.getElementById("nav_outils").innerHTML = "Your tools";
	document.getElementById("nav_boites").innerHTML = "Your toolboxes";
    document.getElementById("nav_para").innerHTML = "Settings";
	document.getElementById("nav_rech").innerHTML = "Search";
	document.getElementById("nav_co").innerHTML = "Login";
// outils 
	document.getElementById("table_nom").innerHTML = "Name";
	document.getElementById("table_marque").innerHTML = "Brand";
	document.getElementById("table_etat").innerHTML = "State";
	document.getElementById("table_boite").innerHTML = "Box";
	document.getElementById("table_q").innerHTML = "Quantity";

//ajout outils 
	document.getElementById("aj_nom").innerHTML = "Name";
	document.getElementById("aj_marque").innerHTML = "Brand";
	document.getElementById("aj_garantie").innerHTML = "Guarantee";
	document.getElementById("aj_etat").innerHTML = "State";
	document.getElementById("aj_neuf").innerHTML = "New";
	document.getElementById("aj_bon").innerHTML = "Good State";
	document.getElementById("aj_mauv").innerHTML = "Poor State";
	document.getElementById("aj_nf").innerHTML = "Not functional ";
	document.getElementById("aj_date").innerHTML = "Date of purchase ";
	document.getElementById("aj_q").innerHTML = "Quantity";
	document.getElementById("aj_photo").innerHTML = "Picture";
	document.getElementById("aj_f").innerHTML = "File";
	document.getElementById("aj_des").innerHTML = "Additional Description ";
	
	document.getElementById("aj_des").innerHTML = "Additional Description ";



	document.getElementById("nomOutils"). = "en";


	if (x !== "en") {
	


		document.formLa.submit(); }
}