	<!DOCTYPE html>
	<?php
	session_start();
	$_SESSION['dl-link'] = null;
	?>
	<html lang="en">

	<head>
		<title>Formulaire de demande de colis alimentaire - Association Avicenne Rouffach</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--===============================================================================================-->
		<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
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
				<form method="post" action="php/submit.php" id="demand-form" class="contact100-form validate-form">
					<img class="center" src="images/avicenne_logo.png" alt="association avicenne rouffach logo" width="300" height="200">
					<span class="contact100-form-title">
						Association Avicenne Rouffach<br>Inscription colis alimentaire
					</span>

					<?php
					if (isset($_GET['1']) || isset($_GET['2']) || isset($_GET['3']) || isset($_GET['4']) || isset($_GET['5']) || isset($_GET['6']) || isset($_GET['7'])) {
						echo '<div class="alert alert-danger"><strong>Vous devez renseigner certains champs</strong></div>';
					}
					?>

					<p>
						Simple et rapide. Remplissez les champs pour vous inscrire.<br />
						Après inscription vous recevrez un e-mail pour valider votre inscription, veuillez donc bien indiquer votre e-mail.<br />
						Important : les inscriptions doivent être envoyées au plus tard le <strong>vendredi à 15h.</strong><br />
						Les distributions ont lieu le <strong>dimanche</strong> : vous recevrez l'adresse exacte par e-mail.
					</p>
					<br />
					<br />

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Nom</span>
						<input id="name" class="input100" type="text" name="name" placeholder="Nom" value="<?php if (isset($_SESSION['name'])) {
																												echo htmlentities($_SESSION['name']);
																											} ?>" />
						<span class="focus-input100"></span>
					</div>
					<?php
					if (isset($_GET['1'])) {
						echo '<div class="alert alert-danger"><strong>' . $_GET['1'] . '</strong></div>';
					}
					?>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Prénom</span>
						<input id="firstname" class="input100" type="text" name="firstname" placeholder="Prénom" value="<?php if (isset($_SESSION['firstname'])) {
																															echo htmlentities($_SESSION['firstname']);
																														} ?>" />
						<span class="focus-input100"></span>
					</div>
					<?php
					if (isset($_GET['7'])) {
						echo '<div class="alert alert-danger"><strong>' . $_GET['7'] . '</strong></div>';
					}
					?>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="mail" placeholder="adresse@exemple.com" value="<?php if (isset($_SESSION['mail'])) {
																														echo htmlentities($_SESSION['mail']);
																													} ?>">
						<span class="focus-input100"></span>
					</div>
					<?php
					if (isset($_GET['2'])) {
						echo '<div class="alert alert-danger"><strong>' . $_GET['2'] . '</strong></div>';
					}
					?>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Téléphone</span>
						<input class="input100" type="tel" name="tel" placeholder="0102030405" value="<?php if (isset($_SESSION['tel'])) {
																											echo htmlentities($_SESSION['tel']);
																										} ?>">
						<span class="focus-input100"></span>
					</div>
					<?php
					if (isset($_GET['4'])) {
						echo '<div class="alert alert-danger"><strong>' . $_GET['4'] . '</strong></div>';
					}
					?>

					<div class="wrap-input100 input100-select">
						<span class="label-input100">Choix du type de colis</span>
						<div>
							<select id="packageType" class="selection-2" name="packageType">
								<option>--</option>
								<option value="1">Etudiant</option>
								<option value="2">Famille</option>
								<!-- <option value="3">Autre</option> -->
							</select>
						</div>
						<span class="focus-input100"></span>
					</div>
					<?php
					if (isset($_GET['3'])) {
						echo '<div class="alert alert-danger"><strong>' . $_GET['3'] . '</strong></div>';
					}
					?>

					<div class="wrap-input100 validate-input">
						<span class="label-input100">Lieu souhaité de retrait du colis</span>
						<input class="input100" type="text" name="city" placeholder="Entrez un nom de ville" list="datalistOptions" value="<?php if (isset($_SESSION['city'])) {
																																				echo htmlentities($_SESSION['city']);
																																			} ?>">
						<datalist id="datalistOptions">
							<option value="Rouffach">
							<option value="Guebwiller">
							<option value="Colmar">
							<option value="Mulhouse">
						</datalist>
						<span class="focus-input100"></span>
					</div>

					<?php
					if (isset($_GET['5'])) {
						echo '<div class="alert alert-danger"><strong>' . $_GET['5'] . '</strong></div>';
					}
					?>

					<div class="wrap-input100">
						<span class="label-input100 validate-input">Message</span>
						<textarea class="input100" name="message" placeholder="Entrer un commentaire ou des précisions si besoin..." maxlength="300"><?php if (isset($_SESSION['message'])) {
																																							echo htmlentities($_SESSION['message']);
																																						} ?></textarea>
						<span class="focus-input100"></span>
					</div>

					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" name="checkConsentement" value="true">
						<label class="form-check-label" for="checkConsentement">En cochant cette case, vous consentez à transmettre vos données qui seront utilisées par nos services uniquement dans le cadre du projet de colis alimentaire.</label>
					</div>
					<?php
					if (isset($_GET['6'])) {
						echo '<div class="alert alert-danger"><strong>' . $_GET['6'] . '</strong></div>';
					}
					?>

					<div class="container-contact100-form-btn">
						<div class="wrap-contact100-form-btn">
							<div class="contact100-form-bgbtn"></div>
							<button id="submit-btn" type="submit" class="contact100-form-btn" title="Un mail nous sera envoyé et nous vous recontacterons.">
								<span>
									Envoyer
									<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
								</span>
							</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div id="dropDownSelect1"></div>
		<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
		<!--===============================================================================================-->
		<script src="vendor/countdowntime/countdowntime.js"></script>
		<!--===============================================================================================-->
		<!-- <script src="js/main.js"></script> -->
		<script src="js/custom.js"></script>

		<!-- Global site tag (gtag.js) - Google Analytics
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
		<script>
			window.dataLayer = window.dataLayer || [];

			function gtag() {
				dataLayer.push(arguments);
			}
			gtag('js', new Date());

			gtag('config', 'UA-23581568-13');
		</script> -->
	</body>

	</html>