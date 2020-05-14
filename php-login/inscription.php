<?php

$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');

?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Register</title>
		<link rel="stylesheet" href="ins.css"/>
	</head>

<body>

<header>
	<h1>Inscription</h1>
</header>

</br>
</br>

<div class="form" action="conexion.php">
	<form method="post">
		<input type="text" name="pseudo" placeholder="Pseudo"/>
			</br>
			</br>
		<input type="password" name="pass" placeholder="Mot de passe" />
			</br>
			</br>
		<input type="text" name="email" placeholder="Votre email"/>
			</br>
			</br>
		<input type="submit" value="Valider l'inscription" name="register" class="validate"/>
	</form>
</br>


<?php

$pass = sha1($_POST['pass']);

if (isset($_POST['register']))
{

if (empty($_POST['pseudo']) || empty($_POST['pass']) || empty($_POST['email']))
{
	echo '<em>' . "Veuillez remplir les champs" . '</em>';
}
else
{
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
	{
		$req = $bdd->prepare('INSERT INTO membre (pseudo,pass,email) VALUES (?, ?, ?)');
		$req->execute(array($_POST['pseudo'], $pass, $_POST['email']));
		header("Location: conexion.php");	
	}
	else
	{
		echo '<em>' . "E-mail invalide" . '</em>';
	}
	
}
}

?>

</div>






</body>
</html>