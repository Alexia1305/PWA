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

	
	


	if (x !== "fr" && x !== "fr ") {
	
		document.getElementById("lla").value = "fr";
 		document.formLa.submit(); 
 	}


 	document.getElementById("buttoncreate").innerHTML = "Créez votre boîte à outils !";



}
function francaisOutils() {
	
	const x = document.getElementById("langueDeBase").innerHTML;

	
	


	if (x !== "fr" && x !== "fr ") {
	
		document.getElementById("lla").value = "fr";
 		document.formLa.submit(); 
 	}



 	document.getElementById("NameTh").innerHTML = "Name";


}

function anglais() {
	
	const x = document.getElementById("langueDeBase").innerHTML;


	if (x !== "en" && x !== "en ") {
	

		document.getElementById("lla").value = "en";
		document.formLa.submit(); 
	}

		document.getElementById("buttoncreate").innerHTML = "MAKE YOUR FIRST TOOLBOX !";
}