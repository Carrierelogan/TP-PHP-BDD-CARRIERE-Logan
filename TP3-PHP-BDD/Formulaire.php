	<html lang="fr">
		<head>
			<title>TEST PHP</title>
			<meta charset="utf-8" />
			<link href="style.css" rel="stylesheet">
		</head>
		<body>
			
			<div class="haut">
				<p>	
				
			</div>
			
			<div id="conteneur">
			
				<div class="gauche">

				</div>
		
			<div class="centre">
			<?php 
			
							$serveur='localhost';
							$db='mydb';
							$utilisateur='root';
							$mot_passe='';
							
							
							$nom = $_POST["nom"];
							$prenom= $_POST["prenom"];
							$phone = $_POST["phone"];
							
							try 
							{
								$connexion = new PDO("mysql:host=$serveur; dbname=$db", $utilisateur, $mot_passe);
							
								if($connexion)
									echo 'Connexion réussie </br>';
							
							}
							catch (PDOException $event)
							{
								die( 'Erreur !:'. $event->getMessage());
							}
							
							//Insérer des valeurs
							
							
							$inserer="INSERT INTO etudiants(Nom, Prenom, Numero_telephone) VALUES ('$nom', '$prenom', '$phone')";
							
							//Executer la requête
							
							$inserer=$connexion->exec($inserer);
							
							//test
							
							if($inserer)
							{
								echo 'Inscription réussie </br>';
								echo 'Nom : '.$_POST["nom"].'<br>';
								echo 'Prenom : '.$_POST["prenom"].'<br>';
								echo 'Telephone : '.$_POST["phone"].'<br>';;
							}
							else
							{
								$table_erreurs=$connexion->errorInfo();
								echo '<p> Erreur : $table_erreurs[2]';
							}
							
							
					
			?>
			</div>
			</div>
		
		</body>
	</html>
