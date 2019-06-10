<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', 'Xmgz5xh96UkTuw', 'website');

	// initialize variables
	$date = "";
	$lieu = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$date = $_POST['date'];
		$lieu = $_POST['lieu'];

		mysqli_query($db, "INSERT INTO experience (date, lieu) VALUES ('$date', '$lieu')"); 
		$_SESSION['message'] = "Experience added"; 
		header('location: experiences.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$date = $_POST['date'];
		$lieu = $_POST['lieu'];

		mysqli_query($db, "UPDATE experience SET date='$date', lieu='$lieu' WHERE id=$id");
		$_SESSION['message'] = "Experience updated"; 
		header('location: experiences.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM experience WHERE id=$id");
	$_SESSION['message'] = "Experience deleted"; 
	header('location: experiences.php');
}


	$results = mysqli_query($db, "SELECT * FROM experience");

?>