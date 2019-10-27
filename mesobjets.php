<?php
session_start();
//sleep(10);
require_once("../controleur/leControleur.php");
$unControleur = new leControleur("localhost","maternelle","root","");
$id_enfant = $_SESSION['id_enfant'];
$result = $unControleur->selectObjetsByChild($id_enfant);
if(isset($_POST["ajout"]))
{
		$id = $_POST['id_objet'];
         $unControleur->updateObjet($id);
		 header('Location: mesobjets.php');
	  }
if(isset($_POST["ajouter"]))
      {
         $envoi = array ("Nom"=>$_POST['Nom'], 
         "Prix"=>$_POST['Prix'],
         "Img"=>'/img/'.$_POST['Nom'].'_'.$_SESSION['id_enfant'].'.png',
		 "Id_enfant"=>$_SESSION['id_enfant']
        );
         $unControleur->insert("Objet",$envoi);
         
        $NomObj = $_POST["Nom"].'_'.$_SESSION['id_enfant'];
        $image_name1 = $_FILES['Img']['name'];
	$image_type1 = $_FILES['Img']['type'];
	$image_size1 = $_FILES['Img']['size'];
	$image_tmp_name1= $_FILES['Img']['tmp_name'];
        move_uploaded_file($image_tmp_name1,"../img/$NomObj.png");
        header('Location: mesobjets.php');
          exit;
        }
  ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Troc</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="../img/favicon.png" rel="icon">
  <link href="../img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/venobox/venobox.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../css/style.css" rel="stylesheet">
</head>
<body>
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <a href="#intro" class="scrollto"><img src="../img/logo.png" alt="" title=""></a>
      </div>

    <?php
    require_once("NavBar.php");
    ?>
    </div>
  </header>
<div>
  <?php 

      require_once("affichage/vueMesObjets.php");
  ?>
</div>
<footer id="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>Orange</strong>.All Rights Reserved
      </div>
      <div class="credits">
        Designed by<a href="">Cfa insta</a>
      </div>
    </div>
  </footer>
<?php require_once("modal.php"); ?>
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/jquery/jquery-migrate.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/superfish/hoverIntent.js"></script>
<script src="../lib/superfish/superfish.min.js"></script>
<script src="../lib/wow/wow.min.js"></script>
<script src="../lib/venobox/venobox.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../contactform/contactform.js"></script>
<script src="../js/main.js"></script>
</body>
</html>



