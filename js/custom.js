const studentPackage = [
	{
		name: 'Paquet de riz 300g',
		amount: 2,
	},
	{
		name: 'Oeuf',
		amount: 6,
	},
	{
		name: 'Sucre en poudre 200g',
		amount: 2,
	},
];
const familyPackage = [
	{
		name: "Bouteille d'eau",
		amount: 6,
	},
	{
		name: 'Paquet de pâtes 400g',
		amount: 6,
	},
	{
		name: 'Pomme',
		amount: 6,
	},
];
const otherPackage = [
	{
		name: 'Paquet de riz 300g',
		amount: 2,
	},
	{
		name: 'Oeuf',
		amount: 6,
	},
	{
		name: 'Sucre en poudre 200g',
		amount: 2,
	},
];

function displayPackageContents(package) {
	// Récupération d'une référence à la table
	const tableId = 'table-container';
	const submitButtonId = 'submit-btn';
	const refTable = document.getElementById(tableId);
	const refSubmitButton = document.getElementById(submitButtonId);

	// Affiche le tableau
	refTable.style.display = '';

	for (const object of package) {
		const rowNumber = refTable.rows.length - 1;
		const newLine = refTable.insertRow(rowNumber + 1);
		newLine.setAttribute('id', 'table-row-item-' + rowNumber);

		// Type de produit
		newLine.insertCell(0).appendChild(document.createTextNode(object.name));
		// Quantité
		newLine.insertCell(1).appendChild(document.createTextNode(object.amount));
	}
}

function isFormValid() {
	const nameEl = document.getElementById('name');
	const contactEl = document.getElementById('contact');
	const packageTypeEl = document.getElementById('packageType');

	return (
		nameEl &&
		nameEl.value &&
		contactEl &&
		contactEl.value &&
		packageTypeEl &&
		packageTypeEl.value
	);
}

function validateForm() {
	if (isFormValid) {
		$('#submit-btn').show();
	} else {
		$('#submit-btn').hide();
	}
}

$('.selection-2').select2({
	minimumResultsForSearch: 20,
	dropdownParent: $('#dropDownSelect1'),
});

$(function () {
	$('#table-container').css('display', 'none');
	$('#name').tooltip();
	$('#submit-btn').tooltip();
});

$('#packageType').change(function () {
	if ($(this).val() != '--') {
		if ($(this).val() === '2') {
			//$('#packageType').after();
		}
	}
});

/* $('#packageType').change(function () {
	$('#table-container tr').remove();
	if ($(this).val() != '--') {
		$('#table-container thead').after(
			'<tr><th scope="col">Produit</th><th scope="col">Quantité</th></tr>'
		);
		if ($(this).val() === '1') {
			displayPackageContents(studentPackage);
		}
		if ($(this).val() === '2') {
			displayPackageContents(familyPackage);
		}
		if ($(this).val() === '3') {
			displayPackageContents(otherPackage);
		}
	}
}); */

// $(document).ready(function () {
// 	$('#name').change(function () {
// 		validateForm();
// 	});
// 	$('#contact').change(function () {
// 		validateForm();
// 	});
// 	$('#packageType').change(function () {
// 		validateForm();
// 	});
// });
