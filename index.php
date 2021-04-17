	<!DOCTYPE html>
	<html lang="en">
	<head>
		<title>Formulaire de demande de colis alimentaire - Association Avicenne Rouffach</title>
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
				<form method="post" action="submit.php" class="contact100-form validate-form">
					<img class="center" src="images/avicenne_logo.png" alt="association avicenne rouffach logo" width="300" height="200">
					<span class="contact100-form-title">
						Association Avicenne Rouffach<br>Demande de colis alimentaire
					</span>

					<div class="wrap-input100 validate-input" data-validate="Ce champ est obligatoire">
						<span class="label-input100">Nom ou appellation anonyme</span>
						<input id="name" class="input100" type="text" name="name" placeholder="Nom" title = "Si vous souhaitez rester anonyme, écrivez par exemple 'Famille <?php echo rand(1, 1000);?>'">
						<span class="focus-input100"></span>
					</div>
					
					<div class="wrap-input100 validate-input" data-validate = "Ce champ est obligatoire">
						<span class="label-input100">Contact</span>
						<input class="input100" type="text" name="contact" placeholder="Mail ou Téléphone">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 input100-select">
						<span class="label-input100">Choix du produit à l'unité (bouteille, paquet...)</span>
						<div>
							<select id="product" class="selection-2" name="product">
								<option>Lait</option>
								<option>Pain</option>
								<option>Sucre</option>
								<option>Eau</option>
								<option>Pâtes</option>
								<option>Riz</option>
								<option>Sel</option>
								<option>Pommes de terre</option>
								<option>Fruits/Légumes</option>
							</select>
						</div>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 input100-select">
						<span class="label-input100">Choix du produit à l'unité (bouteille, paquet...)</span>
						<div>
							<select id="product" class="selection-2" name="product">
								<option>Lait</option>
								<option>Pain</option>
								<option>Sucre</option>
								<option>Eau</option>
								<option>Pâtes</option>
								<option>Riz</option>
								<option>Sel</option>
								<option>Pommes de terre</option>
								<option>Fruits/Légumes</option>
							</select>
						</div>
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 input100-select">
						<span class="label-input100">Quantité</span>
						<div>
							<select id="amount" class="selection-2" name="amount">
								<?php 
								for ($i = 1; $i <= 10; $i++) {
									echo('<option>'.$i.'</option>');
								}
								?>
							</select>
						</div>
						<span class="focus-input100"></span>
					</div>

					<div class="container-contact100-form-btn">
						<div class="wrap-contact100-form-btn">
							<div class="contact100-form-bgbtn"></div>
							<button id="add-item-btn" type="button" class="contact100-form-btn" onclick="addItem()">
								<span>
	Ajouter au panier <i class="fa fa-shopping-cart" aria-hidden="true"></i>
								</span>
							</button>
						</div>
					</div>
					<br>
					

	<div>
	<table id="table-container" class="table">
	<thead class="table-dark">
		<tr>
		<th scope="col">Produit</th>
		<th scope="col">Quantité</th>
		<th scope="col"></th>
		</tr>
	</thead>
	<tbody>
	<tr></tr>
	</tbody>
	</table>
	</div>
					<div class="wrap-input100">
						<span class="label-input100 validate-input">Message</span>
						<textarea class="input100" name="message" placeholder="Entrer un commentaire ou des précisions si besoin..."></textarea>
						<span class="focus-input100"></span>
					</div>

					<div class="container-contact100-form-btn">
						<div class="wrap-contact100-form-btn">
							<div class="contact100-form-bgbtn"></div>
							<button id="submit-btn" type="submit" class="contact100-form-btn" title = "Un mail nous sera envoyé et nous vous recontacterons.">
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
	<script type="text/javascript">

	function addItem() {
		// Récupération d'une référence à la table
		const tableId = 'table-container';
		const addItemButtonId = 'add-item-btn';
		const submitButtonId = 'submit-btn';
		const refTable = document.getElementById(tableId);
		const refAddItemButton = document.getElementById(addItemButtonId);
		const refSubmitButton = document.getElementById(submitButtonId);

		// Affiche le tableau
		refTable.style.display = '';

		// Insère une ligne dans la table
		const rowNumber = refTable.rows.length - 1;
		const newLine = refTable.insertRow(rowNumber + 1);
		newLine.setAttribute('id', 'table-row-item-' + rowNumber);
		
		// Produit
		const produit = document.getElementById('product').value;
		newLine.insertCell(0).appendChild(document.createTextNode(produit));
		
		// Quantité
		const amount = document.getElementById('amount').value;
		newLine.insertCell(1).appendChild(document.createTextNode(amount));
		// Supprimer
		const deleteElement = document.createElement('i');
		
		deleteElement.setAttribute('class', 'fa fa-trash fa-lg');
		deleteElement.setAttribute('title', 'Supprimer la ligne');
		deleteElement.setAttribute('aria-hidden', 'true');
		deleteElement.setAttribute('onclick', 'deleteItem(\'table-row-item-' + rowNumber + '\')');
		deleteElement.setAttribute('style', 'color: red; cursor: pointer;');
		newLine.insertCell(2).appendChild(deleteElement);
	}

	function deleteItem(rowÌd) {
		const rowElement = document.getElementById(rowÌd);
		rowElement.remove();
	}
	</script>

	<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
		<script>
			$(".selection-2").select2({
				minimumResultsForSearch: 20,
				dropdownParent: $('#dropDownSelect1')
			});
			$(function() {
				$("#table-container").css("display", "none");
				$("#name").tooltip();
				$("#submit-btn").tooltip();
			});
		</script>
	<!--===============================================================================================-->
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="js/main.js"></script>

		<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'UA-23581568-13');
	</script>
	</body>
	</html>
