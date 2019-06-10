<?php
if(!defined('inc_access')) {
   die('Direct access not permitted');
}
?>

            </div>
            <!-- /.container-fluid -->


    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<?php
//close all db connections
	mysqli_close($db_conn);
	die();
?>
