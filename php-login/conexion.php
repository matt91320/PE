<?php

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf_8"/>
		<title>Conexion</title>
		<link rel="stylesheet" href="co.css"/>
	</head>

<body>

<header>
	<h1>Connexion</h1>
</header>

</br>
</br>

<div class="form">
	<form method="post">
		<input type="text" name="pseudo" placeholder="Pseudo"/>
			</br>
			</br>
		<input type="password" name="pass" placeholder="Mot de passe" />
			</br>
			</br>
		<input type="submit" value="Conexion" name="connect" class="validate"/>
	</form>

</br>

<?php

$passe = sha1($_POST['pass']);

if (isset($_POST['connect']))
{
	if (empty($_POST['pseudo']) || empty($_POST['pass']))
	{
		echo '<em>' . "Veuillez remplir les champs" . '</em>';
	}
	else
	{
		$requser = $bdd->prepare('SELECT * FROM membre WHERE pseudo = ? AND pass = ?');
		$requser->execute(array($_POST['pseudo'], $passe));
		$userexist = $requser->rowCount();
		if ($userexist == 1)
		{
			$donnees = $requser->fetch();
			$_SESSION['id'] = $donnees['id'];
			$_SESSION['pseudo'] = $donnees['pseudo'];
			$_SESSION['email'] = $donnees['email'];
			header("Location: deconexion.php");
		}
		else
		{
			echo '<em>' . "Identifiant ou mot de passe incorrect." . '</em>';
		}
	}
}

?>

</br>


</div>


</body>
</html>