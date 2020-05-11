<!DOCTYPE htm>
<html>
	<head>
		<meta charset = "utf-8">
		<title>Welcome</title>
	</head>

<body>

<form method="post" action="mini_chat_POST.php"> 
	<input type="text" placeholder="Mettez votre nom" name="name"/>
</br>
</br>
	<textarea placeholder="votre message ici" name="texte" type="text"></textarea>
</br>
</br>
	<input type="submit" name="envoyer" value="envoyer"/>
</form>

<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
	}

	$reponse = $bdd->query('SELECT name, texte FROM minichat ORDER BY ID DESC LIMIT 0,10')
	$donnees = $reponse->fetch()

	while($donnees = reponse->fetch())
	{
		echo echo htmlspecialchars($donnees['name']) . '      ' . echo htmlspecialchars($donnees['texte'])
	}

	$reponse->closeCursor();
?>

</body>
</html>