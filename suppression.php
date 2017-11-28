<?php
	$fichier = fopen('users.csv','r');
	$personnes = [];
		while(($row = fgetcsv($fichier,1000)) !== false){
			$personnes[] = [$row[0], $row[1]];
		}
	fclose($fichier);
	unset($personnes[$_POST['row']]);

	$fichier = fopen('users.csv','w');

	foreach($personnes as $personne){
		fputcsv($fichier, $personne);
	}
	fclose($fichier);
	header('Location: formulaire.php');