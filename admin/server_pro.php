<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'Xmgz5xh96UkTuw', 'website');

	// initialize variables
	$titre = "";
    $image = "";
    $description = "";
	$lien = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$titre = $_POST['titre'];
        $image = $_POST['image'];
        $description = $_POST['description'];
		$lien = $_POST['lien'];

		mysqli_query($db, "INSERT INTO projets (titre, image, description, lien) VALUES ('$titre', '$image','$description', '$lien')"); 
		$_SESSION['message'] = "projets added"; 
		header('location: projets.php');
	}


	if (isset($_POST['update'])) {
		$titre = $_POST['titre'];
        $image = $_POST['image'];
        $description = $_POST['description'];
		$lien = $_POST['lien'];

		mysqli_query($db, "UPDATE projets SET titre='$titre', image='$image', description='$description', lien='$lien' WHERE id=$id");
		$_SESSION['message'] = "projets updated!"; 
		header('location: projets.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM projets WHERE id=$id");
	$_SESSION['message'] = "projets deleted!"; 
	header('location: projets.php');
}


	$results = mysqli_query($db, "SELECT * FROM projets");


?>