<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="./css/StyleNewCpt.css" rel="stylesheet" media="all" type="text/css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
<!--***********************************************************
		ajout des variable de session
************************************************************--!>
<?php
session_start();
if(isset($_SESSION['login']))
{
	$login=$_SESSION['login'];
	$mdp=$_SESSION['mdp'];
}
$connection = $bdd->query("SELECT COUNT(*) as nb1 FROM identi where login='".$login."' AND mdp='".$mdp."'");
$donnees1 = $connection->fetch();
if ($donnees1['nb1']==1) {
	?>
<div id=header>
	<div id=banniere>
		<img src="images/banniere.jpg" />
	</div>
	<div id=connexion>
		<?php
		session_start();
	if(isset($_SESSION['login']))
	{
		$login=$_SESSION['login'];
	}
	echo 'login : '.$login.'';	
	?>
	</div>
	<div id=deco>
			<div id=boutonD onclick="self.location.href='deconnexion.php'">
				déconnexion	
			</div>
	</div>
</div>

<div id=page>
	<div id=titre> CREATION D'UN NOUVEAU COMPTE </div>
	<form action="creationCpt.php" method="post">

<?php

$connection = $bdd->query("SELECT * FROM identi");
$resultat = $connection->fetch();


while ($row = mysql_fetch_assoc($resultat));
{
	echo $resultat['login'];
	foreach ($row as $rows){
		echo $resultat['login'];
	}; 

};

?>
	<div id=footer>

			<div id=bouton1 onclick="self.location.href='identification.php'">
				ACCUEIL
			</div>
		        <input type="submit" value="VALIDER" id="boutonV">
	</div>
	</div>
		</div>
</form>
</div>

<?php
}
else {
	?>
		<div id=header>
			<div id=banniere>
			<img src="images/banniere.jpg" />
			</div>
 		</div>
		<div id=page>
			<div id=text>
			Erreur sur le mdp ou le login
			</div>
			</br>
			<div id=boutonD onclick="self.location.href='deconnexion.php'">
				RETOUR	
			</div>
		</div>		

	<?php
}	

$connection2->closeCursor();
?>


</body>
</html>


