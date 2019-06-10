<!DOCTYPE html>
<html lang="fr">

<head>

<?php
        include 'db/dbsetup.php';

        session_start();

        $_SESSION["unique_referer"] = generateRandomString();
        
        $sqlLanding = mysqli_query($db_conn, "SELECT titreH1, titreH2 FROM landing");
    $rowLanding  = mysqli_fetch_array($sqlLanding);

    $sqlExperience = mysqli_query($db_conn, "SELECT date, lieu FROM experience");

    $sqlProjets = mysqli_query($db_conn, "SELECT id, titre, image, description, lien FROM projets");

    $sqlInfo = mysqli_query($db_conn, "SELECT discord, email, telephone FROM info");
    $rowInfo  = mysqli_fetch_array($sqlInfo);

    $sqlCompetence = mysqli_query($db_conn, "SELECT titre, progress FROM competence");

    $sqlFormations = mysqli_query($db_conn, "SELECT date, lieu FROM formations");

    
    
    ?>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Hugo Marques</title>

  <!--Easter Egg CSS-->
  <link href="css/xbox.css" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/grayscale.min.css" rel="stylesheet">

</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">À Propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#projets">Projets</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup">Me Contacter</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  


  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase"><?php echo $rowLanding["titreH1"];?></h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5"><?php echo $rowLanding["titreH2"];?></h2>
        <a href="#about" class="btn btn-primary js-scroll-trigger">En Savoir Plus</a>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="about" class="about-section text-center">
    <div class="container">
    <div class="card-heade" style="background-color: transparent">
                            <h2 class="text-white mb-4" style="text-align: center">Formations</h2>
                            <div class="container">
                            <?php
                                  while ($rowFormations  = mysqli_fetch_array($sqlFormations)) {
                                      ?>
                                    <div class="row" style="color: rgba(255,255,255,.5)">
                                      <div class="col-lg-5 col-sm-5 col-md-5">
                                        <p><?php echo $rowFormations["date"]; ?></p>
                                      </div>
                                      <div class="col-lg-7 col-sm-7 col-md-7">
                                        <p><?php echo $rowFormations["lieu"]; ?></p>
                                      </div>
                                    </div>
                                    <?php
                                  }?>
    </div>
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-white mb-4">Compétences</h2>
          <?php
          while ($rowCompetence  = mysqli_fetch_array($sqlCompetence)) {
              ?>
          <h4 class="text-white mb-4"><?php echo $rowCompetence["titre"]; ?></h4>
          <div class="progress">
                    <div class="progress-bar bg-secondary" role="progressbar" style="width: <?php echo $rowCompetence["progress"]; ?>%" aria-valuenow="<?php echo $rowCompetence["progress"]; ?>" aria-valuemin="0"
                      aria-valuemax="100"></div>
                  </div>
                  <br>
                  <?php
          }?>
          <div class="card" style="background-color: transparent; border-style: none">
                        <div class="card-heade" style="background-color: transparent">
                            <h2 class="text-white mb-4" style="text-align: center">Expériences</h2>
                            <div class="container">
                            <?php
                                  while ($rowExperience  = mysqli_fetch_array($sqlExperience)) {
                                      ?>
                                    <div class="row" style="color: rgba(255,255,255,.5)">
                                      <div class="col-lg-5 col-sm-5 col-md-5">
                                        <p><?php echo $rowExperience["date"]; ?></p>
                                      </div>
                                      <div class="col-lg-7 col-sm-7 col-md-7">
                                        <p><?php echo $rowExperience["lieu"]; ?></p>
                                      </div>
                                    </div>
                                    <?php
                                  }?>
    </div>
        </div>
      </div>
  </section>

    <!-- About Section -->
<!-- Page Content -->
<section id="projets" class="about-section text-center"></section>
<div class="container" class="about-section text-center">

  <!-- Page Heading -->
  <h1 class="my-4">Projets</h1>

  <!-- Project One -->
  <?php
      while ($rowProjets  = mysqli_fetch_array($sqlProjets)) {
          ?>
  <div class="row">
    <div class="col-md-7">
    <img src="<?php echo $rowProjets["image"]; ?>" style="width: 635px;
    height: 300px;
    background-size: cover;
    background-position: center;
    img{
        width:100%;
        height:100%;">

    </div>
    <div class="col-md-5">
      <h3>
      <?php echo $rowProjets["titre"]; ?></h3>
      <p><?php echo $rowProjets["description"]; ?></p>
      <a class="btn btn-primary" href="<?php echo $rowProjets["lien"]; ?>">Voir le projet</a>
    </div>
  </div>
 
  <hr>
  <?php
      }?>
  <!-- /.row -->





</div>
<!-- /.container -->
</section>  

  <!-- Signup Section -->
  <section id="signup" class="signup-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-lg-8 mx-auto text-center">

          <i class="far fa-paper-plane fa-2x mb-2 text-white"></i>
          <h2 class="text-white mb-5">Me Contacter</h2>

          <form class="form-inline d-flex" style="flex-direction: column !important;" action="https://formspree.io/hugomarques.hugomarques@hugomarques.fr" method="POST">
            <input type="text" name="Nom Prenom"class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" style="width: 450px !important;" id="inputName" placeholder="Nom Prenom">
            <br>
            <input type="email" name="email" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" style="width: 450px !important;" id="inputEmail" placeholder="exemple@domain.com">
            <br>
            <textarea name="textarea" class="form-control flex-fill mr-0 mr-sm-2 mb-3 mb-sm-0" id="textarea" cols="30" rows="10" style="text-transform: uppercase; resize: none; width: 450px !important; height: 300px !important;"></textarea>
            <button type="submit" value="Send" class="btn btn-primary mx-auto" style="margin-top: 20px !important;">Me Contacter</button>
          </form>

        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="contact-section bg-black">
    <div class="container">

      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fab fa-discord text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Discord</h4>
              <hr class="my-4">
              <div class="small text-black-50"><?php echo $rowInfo["discord"];?></div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#"><?php echo $rowInfo["email"];?></a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fas fa-mobile-alt text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50"><?php echo $rowInfo["telephone"];?></div>
            </div>
          </div>
        </div>
      </div>

      <div class="social d-flex justify-content-center">
        <a href="https://www.linkedin.com/in/hugo-marques-026371139/" class="mx-2">
          <i class="fab fa-linkedin-in"></i>
        </a>
        <a href="https://github.com/MrGogo400/" class="mx-2">
          <i class="fab fa-github"></i>
        </a>
      </div>

    </div>
  </section>

  <div class="content">
    <div class="content-settings">
        <div class="content-settings__check">
      </div class="content-settings__button">
        <button hidden id="a_trigger" class="content-settings__button"></button>
    </div>
    <div class="achievement">
        <div class="animation">
            <div class="circle">
                <div class="img trophy_animate trophy_img">
                    <img class="trophy_1" src="https://dl.dropboxusercontent.com/s/k0n14tzcl4q61le/trophy_full.svg"/>
                    <img class="trophy_2" src="https://dl.dropboxusercontent.com/s/cd4k1h6w1c8an9j/trophy_no_handles.svg"/>
                </div>
                <div class="img xbox_img">
                    <img src="https://dl.dropboxusercontent.com/s/uopiulb5yeo1twm/xbox.svg?dl=0"/>
                </div>
                <div class="brilliant-wrap">
                    <div class="brilliant">
                    </div>
                </div>
            </div>
            <div class="banner-outer">
                <div class="banner">
                    <div class="achieve_disp">
                        <span class="unlocked">
                          
                        </span>
                        <div class="score_disp">
                            <div class="gamerscore">
                                <img width="20px" src="https://dl.dropboxusercontent.com/s/gdqf5amvjkx9rfb/G.svg?dl=0"/>
                                <span class="acheive_score"></span>
                            </div>
                            <span class="hyphen_sep">-</span>
                            <span class="achiev_name"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  <!-- Footer -->
  <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright © 2019 hugomarques.fr - Tous droits réservés
    </div>
  </footer>


  <!-- Not so secret javascript-->
  <script src="js/konami.js"></script>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Scripts for scroll -->
  <script src="js/grayscale.min.js"></script>

</body>

</html>
