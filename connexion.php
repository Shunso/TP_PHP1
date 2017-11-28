<?php
	require('functions.php');

	//Test si les valeurs sont bien instanciées
	if(isset($_POST['login']) && isset($_POST['pwd'])){

		//Test si les valeurs sont différentes de NULL
		if(!empty($_POST['login']) && !empty($_POST['pwd'])){

			//Test si l'utilisateur existe
			$find = isCorrect($_POST['login'],$_POST['pwd']);

			//Si oui démarre la session
			if($find == true){
				session_start();
				$_SESSION['login'] = $_POST['login'];
				header('Location: index.php');
			//Si non renvoies à l'accueil
			}else{
				header('Location: index.php?error=2');
			}
		//Si un champs est manquant renvoies à l'accueil
		}else{
			header('Location: index.php?error=1');
		}
	}
