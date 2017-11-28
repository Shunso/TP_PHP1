<?php
	session_start();
	require('functions.php');
	isConnected();
?>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<p>Bonjour <?php echo $_SESSION['login']; ?> !</br></p>
		<form method="post" action="deconnexion.php">
			<input type="submit" value="Déconnexion">
		</form>
		<form method="post" action="traitement.php">
			<input placeholder="Login" type="text" name="login">
			<input placeholder="Mot de passe" type="password" name="pwd">
			<input type="submit" value="Inscrire">
		</form>
		<?php
			if(filesize("users.csv")>0){
				showUsers();
			}
		?>
	</body>
</html>