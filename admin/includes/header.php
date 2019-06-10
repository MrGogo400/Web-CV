<?php
if(!defined('inc_access')) {
   die('Direct access not permitted');
}
session_start();
//DB connection string and Global variable
include '../db/dbsetup.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="900; url=index.php" />
    <meta charset="utf-8">
    <title>Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>
<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="">Admin Panel</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
				<li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>  <?php echo $_SESSION["user_name"]?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="../index.php" target="_blank"><i class="fa fa-fw fa-home"></i> View My Site</a>
                        </li>
                        <li>
                            <a href="../logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
             </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="landing.php"><i class="fa fa-fw fa-home"></i> Landing</a>
                    </li>
                    <li>
                        <a href="competences.php"><i class="fa fa-fw fa-paint-brush"></i> Compétences</a>
                    </li>
                    <li>
                        <a href="experiences.php"><i class="fa fa-fw fa-rocket"></i> Experiences</a>
                    </li>
                    <li>
                        <a href="projets.php"><i class="fa fa-fw fa-table"></i> Projets</a>
                    </li>
                    <li>
                        <a href="formations.php"><i class="fa fa-fw fa-graduation-cap"></i> Formations</a>
                    </li>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
            <div class="container-fluid">
