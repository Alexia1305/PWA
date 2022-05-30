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
	
	document.getElementById("paraa").innerHTML = "Paramètres";





	document.getElementById("lla").value = "fr";


	if (x !== "fr") {
	

 		document.formLa.submit(); }

}

function anglais() {

	const x = document.getElementById("langueDeBase").innerHTML;
	document.getElementById("paraa").innerHTML = "Settings";


	document.getElementById("lla").value = "en";


	if (x !== "en") {
	


		document.formLa.submit(); }
}