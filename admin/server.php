<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'Xmgz5xh96UkTuw', 'website');

	// initialize variables
	$titre = "";
	$progress = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$titre = $_POST['titre'];
		$progress = $_POST['progress'];

		mysqli_query($db, "INSERT INTO competence (titre, progress) VALUES ('$titre', '$progress')"); 
		$_SESSION['message'] = "Competence added"; 
		header('location: competences.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$titre = $_POST['titre'];
		$progress = $_POST['progress'];

		mysqli_query($db, "UPDATE competence SET titre='$titre', progress='$progress' WHERE id=$id");
		$_SESSION['message'] = "Competence updated!"; 
		header('location: competences.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM competence WHERE id=$id");
	$_SESSION['message'] = "Competence deleted!"; 
	header('location: competences.php');
}


	$results = mysqli_query($db, "SELECT * FROM competence");


?>