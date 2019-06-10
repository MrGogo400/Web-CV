<?php
define('inc_access', TRUE);
include 'includes/header.php'; 
include('server_form.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM formations WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$date = $n['date'];
			$lieu = $n['lieu'];
		}

	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Formations</title>
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
				Formations
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

<?php $results = mysqli_query($db, "SELECT * FROM formations"); ?>

<table>
	<thead>
		<tr>
			<th>Date</th>
			<th>Lieu</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['date']; ?></td>
			<td><?php echo $row['lieu']; ?></td>
			<td>
				<a href="formations.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server_form.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	


<form method="post" action="server_form.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="form-group">
		<label>Date</label>
		<input type="text" name="date" value="<?php echo $date; ?>">
	</div>
	<div class="form-group">
		<label>Lieu</label>
		<input type="text" name="lieu" value="<?php echo $lieu; ?>">
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