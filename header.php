<?php
	session_start();
	require('functions.php');
?>
<html>
	<head>
		<link rel="stylesheet" href="css/style.css" />
	</head>
	<body>
		<!--<div id="connexion">
		</div>-->
		<div id="corps">
			<header>
				<div class="article">
					<a href="article.php">
						<h3>Titre 1</h3>
						<p>
							Aenean sit amet nibh eget lacus dictum auctor eu et magna. Nulla egestas varius eros vestibulum feugiat. Duis eros felis, gravida eu posuere in, molestie in elit. Nullam fringilla tortor sed arcu condimentum tincidunt. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce eleifend dignissim ipsum.
						</p>
					</a>
				</div>
				<div class="article">
					<a href="article.php">
						<h3>Titre 2</h3>
						<p>
							Aenean sit amet nibh eget lacus dictum auctor eu et magna. Nulla egestas varius eros vestibulum feugiat. Duis eros felis, gravida eu posuere in, molestie in elit. Nullam fringilla tortor sed arcu condimentum tincidunt. Nulla facilisi. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Fusce eleifend dignissim ipsum.
						</p>
					</a>
				</div>
				<div>
					<?php
						if(isset($_SESSION['login']) && $_SESSION['login']!= null){
							echo "Bonjour ".$_SESSION['login'];
					?>
							<form method="post" action="deconnexion.php">
								<input type="submit" value="Déconnexion">
							</form>
					<?php
						}
						else{
					?>

							<fieldset>
								<legend>
									Connexion
								</legend>
								<form method='post' action='connexion.php'>
									<input type='text' placeholder='Login' name='login'>
									<input type='password' placeholder='Mot de passe' name='pwd'>
									<input type='submit' value='Connexion'>
								</form>
								<?php
									if(isset($_GET['error']) && !empty($_GET['error'])){
										showErrorMessage($_GET['error']);
									}
								?>
							</fieldset>
					<?php

						}
					?>
						
					
				</div>
			</header>
			<div id="body">
				<a href="index.php">
					<h1>Le Journal</h1>
				</a>
				<ul id="menuPrincipal">
					<li><div><a href="index.php"><p>Accueil</p></a></div></li>
					<li><div><a href="article.php"><div><p>Article</p></a></div></li>
					<li><div><a href="inscription.php"><div><p>Inscription</p></a></div></li>
				</ul>