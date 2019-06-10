<?php
define('inc_access', TRUE);
include 'includes/header.php'; 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM projets WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$titre = $n['titre'];
            $image = $n['image'];
            $description = $n['description'];
			$lien = $n['lien'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Projets</title>
	<style>
	table {
  border-collapse: collapse;
	width: 100%;
	padding-bottom: 10px;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}
	</style>
</head>
<body>
<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">
				Projets
				<small></small>
			</h1>
		</div>
	</div>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM projets"); ?>

<table>
	<thead>
		<tr>
			<th>Titre</th>
			<th>Image</th>
            <th>Description</th>
            <th>Lien</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['titre']; ?></td>
			<td><?php echo $row['image']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['lien']; ?></td>
			<td>
				<a href="projets.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server_pro.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server_pro.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="form-group">
		<label>Titre</label>
		<input type="text" name="titre" value="<?php echo $titre; ?>">
	</div>
	<div class="form-group">
		<label>Image</label>
		<input type="text" name="image" value="<?php echo $image; ?>">
	</div>
    <div class="form-group">
		<label>description</label>
		<input type="text" name="description" value="<?php echo $description; ?>">
	</div>
    <div class="form-group">
		<label>lien</label>
		<input type="text" name="lien" value="<?php echo $lien; ?>">
	</div>
	<div class="form-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update"  style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Add</button>
		<?php endif ?>
	</div>
</form>
</body>
</html>