<?php
	if(!empty($_POST['login']) && !empty($_POST['pwd'])){
		$fichier = fopen('users.csv','a+');
		$personne = array($_POST['login'],hash('md5',$_POST['pwd']));
		fputcsv($fichier, $personne);
		fclose($fichier);
		header('Location: formulaire.php');
	}
	else{
		header('Location: formulaire.php');
	}