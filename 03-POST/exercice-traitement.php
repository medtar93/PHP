<?php

$message = '';

// var_dump($_POST);

if (!empty($_POST)) {   // est équivalent à if($_POST) : signifie que $_POST n'est pas vide, donc que le formulaire a été soumis

	$message = '<p>Ville : '. $_POST['ville'] .'</p>';
	$message .= '<p>Code postal : '. $_POST['cp'] .'</p>';
	$message .= '<p>Adresse : '. $_POST['adresse'] .'</p>';
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Votre formulaire</title>
</head>
<body>
	<h1>Vous avez indiqué :</h1>
	<?php echo $message; ?>

</body>
</html>