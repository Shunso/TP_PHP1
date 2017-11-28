<?php
	
	//Vérifie si l'utilisateur est bien authentifié, sinon renvoies sur la page d'accueil
	function isConnected(){
		if(!isset($_SESSION['login'])){
			header('Location: index.php?error=3');
		}
	}

	//Vérifie si les informations saisies par l'utilisateur sont correctes et retourne un booléen
	function isCorrect($typedLogin,$typedPwd){

		//Récupération du login et du mdp renseigné par l'utilisateur
		$login=$typedLogin;
		$pwd=hash('md5',$typedPwd);
		
		//Instanciation d'une variable pour rechercher si les informations sont correctes
		$find = false;

		//Ouverture du fichier de logs
		$fichier = fopen('users.csv','r');

		while(($row = fgetcsv($fichier,1000)) !== false && $find == false){
			if($login == $row[0] && $pwd == $row[1]){
				$find = true;
			}
		}

		return $find;
	}

	//Retourne un tableau de tous les utilisateurs enregistrés
	function showUsers(){
		$fichier = fopen("users.csv","r");
		$i=0;
		echo 'Liste : <a href=\'formulaire.php\'>Tout</a> ';

		//Créer la liste pour avoir les utilisateurs par lettre
		foreach(range('A','Z') as $i){
			echo '<a href=\'formulaire.php?lettre='. $i.'\'>'.$i.'</a> ';
		}
		echo "<br/><br/>".
			 "<table border=1>".
				"<tr>".
					"<th>Login</th>".
					"<th>Mot de passe</th>".
				"</tr>";

		//Variable pour savoir si au moins un résultat est présent
		$resultat = false;

		//Vérifie si l'utilisateur a choisi une lettre en particulier
		if(isset($_GET['lettre'])){
			while(($row = fgetcsv($fichier,1000)) !== false){
				//Test si la première lettre de l'utilisateur est correcte et l'affiche si correct
				if( strtolower($_GET['lettre']) == strtolower(substr($row[0],0,1))){
					echo '<form method="post" action="suppression.php">'.
							'<input type="hidden" name="row" value="'.$i.'">'.
							'<tr><td>'.$row[0].'</td>'.
						 	'<td>'.$row[1].'</td>'.
						 	'<td><input type="submit" value="supprimer"></td></tr>'.
						 '</form>';
					$i++;
					$resultat = true;
				}
			}
		//Sinon créer une liste normale contenant tous les utilisateurs
		}else{
			while(($row = fgetcsv($fichier,1000)) !== false){
				
				echo '<form method="post" action="suppression.php">'.
						'<input type="hidden" name="row" value="'.$i.'">'.
						'<tr><td>'.$row[0].'</td>'.
					 	'<td>'.$row[1].'</td>'.
					 	'<td><input type="submit" value="supprimer"></td></tr>'.
					 '</form>';
				$i++;
				$resultat = true;
			}
		}	
		
		//Afficher un message si aucuns résultats est trouvé
		if($resultat == false){
			echo '<tr><td colspan=2>Aucuns résultats trouvés</td></tr>';
		}

		fclose($fichier);
		echo '</table>';
	}

	function showErrorMessage($value){
		switch ($value) {
			case 1:
				echo 'Veuillez renseigner tous les champs !';
				break;
			case 2:
				echo 'Mauvais login et/ou mot de passe !';
				break;
			case 3:
				echo 'Yo tu fais quoi là ?';
				break;
		}

	}