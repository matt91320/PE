<!DOCTYPE htm>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Welcome</title>
	</head>

<body>

<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}

	$req = $bdd->prepare('INSERT INTO minichat (name,texte) VALUES (?, ?)');
	$req = $bdd->execute(array($_POST['name'], $_POST['texte']));

	header('Location: minichat.php')

?>


</body>
</html>