<!DOCTYPE html>
<?php
session_start();
$link=$_SESSION['dl-link'];

	if (!isset($_GET['name'])) {
		header("Location: ramadan-charity");
	}
?>
<html lang="en">
<head>
	<title>Merci <?php echo $_GET['name']?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	<div class="container-contact100">
		<div class="wrap-contact100">
        <h1>Merci pour votre demande <?php echo $_GET['name']?>!</h1>
		<br/>
        <div>Nous vous recontacterons pour la suite.<br/><br/>Veuillez vous munir :
		 <ul>
		 <li> - de votre bon de commande</li>
		 <li> - d'un justificatif attestant votre situation (carte d'étudiant ou avis d'imposition)</li>
		 </ul>
		 </div>
		 <?php 
		 if (isset($_SESSION['dl-link'])) {
			 echo '
			 <div class="container-contact100-form-btn">
			 <div class="wrap-contact100-form-btn">
			 <div class="contact100-form-bgbtn"></div>
			 <a href="download.php">
			 <button type="button" class="contact100-form-btn">
			 <span>
				 Télécharger le reçu
				 <i class="fa fa-save" ></i>
			 </span>
		 	</button>
			 </a>
			 </div>
			 </div>
			 ';
		 }
		 ?>
        </div>
	</div>
</body>
</html>
