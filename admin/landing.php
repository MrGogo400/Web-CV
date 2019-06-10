<?php
define('inc_access', TRUE);
include 'includes/header.php';

	$pageMsg="";
	//update table on submit
	if (!empty($_POST)) {
		$site_keywords = filter_var($_POST["site_keywords"], FILTER_SANITIZE_STRING);
		$site_author = filter_var($_POST["site_author"], FILTER_SANITIZE_STRING);
		$site_description = filter_var($_POST["site_description"], FILTER_SANITIZE_STRING);
		$setupUpdate = "UPDATE landing SET titreH1='".$_POST["site_titreH1"][$i]."', titreH2='".$_POST["site_titreH2"][$i]."' WHERE id='$id[$i]";
		mysqli_query($db_conn, $setupUpdate);
		
		$pageMsg="<div class='alert alert-success'>The setup section has been updated.<button type='button' class='close' data-dismiss='alert' onclick=\"window.location.href='setup.php'\">×</button></div>";
	}

	$sqlSetup = mysqli_query($db_conn, "SELECT titreH1, titreH2 FROM landing");
	$row  = mysqli_fetch_array($sqlSetup);

?>
   <div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Landing
				<small></small>
			</h1>
		</div>
	</div>

   <div class="row">
		<div class="col-lg-8">
		<?php
		if ($pageMsg !="") {
			echo $pageMsg;
		}
		?>
			<form role="setupForm" method="post" action="setup.php">

				<div class="form-group">
					<label>Titre</label>
					<input class="form-control" name="site_titreH1" value="<?php echo $row['titreH1']; ?>" placeholder="Titre">
				</div>
				  <div class="form-group">
					<label>Sous-Titre</label>
					<input class="form-control" name="site_titreH2" value="<?php echo $row['titreH2']; ?>" placeholder="Sous-Titre">
				</div>
			

					<button type="submit" class="btn btn-default"><i class='fa fa-fw fa-save'></i> Submit</button>

			</form>

		</div>
	</div>
<?php
include 'includes/footer.php';
?>
