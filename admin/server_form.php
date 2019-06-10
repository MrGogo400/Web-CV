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

		mysqli_query($db, "INSERT INTO formations (date, lieu) VALUES ('$date', '$lieu')"); 
		$_SESSION['message'] = "formations added"; 
		header('location: formations.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$date = $_POST['date'];
		$lieu = $_POST['lieu'];

		mysqli_query($db, "UPDATE formations SET date='$date', lieu='$lieu' WHERE id=$id");
		$_SESSION['message'] = "formations updated"; 
		header('location: formations.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM formations WHERE id=$id");
	$_SESSION['message'] = "formations deleted"; 
	header('location: formations.php');
}


	$results = mysqli_query($db, "SELECT * FROM formations");

?>