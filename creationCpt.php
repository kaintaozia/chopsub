<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="./css/StyleCreatCpt.css" rel="stylesheet" media="all" type="text/css">
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
				deconnexion	
			</div>
	</div>
</div>

<?php $connection->closeCursor(); ?>

<div id=page>
<?php
$nlogin=$_POST['nlogin'];
$nmdp=md5($_POST['nmdp']);
$connection2 = $bdd->query("SELECT COUNT(*) as nb1 FROM identi where login='".$nlogin."'");
$donnees2 = $connection2->fetch();
if ($donnees2['nb1'] !=0) {
?>
	<div class=text> login deja existant </div>
		<div id=footer>
			<div id=boutonV onclick="self.location.href='newCpt.php'">
				RETOUR	
			</div>
		</div>
<?php
}
else {
	$connection2->closeCursor();
	if ($_POST['nlogin'] !='' and $_POST['nmdp'] !='')
	{
		$req="insert into identi (login, mdp) values ('".$nlogin."','".$nmdp."')";
		$bdd->exec($req);
		?>
		<div class=text> Creation du compte effectué. </div>
			<div id=footer>
				<div id=boutonV onclick="self.location.href='identification.php'">
					ACCUEIL
				</div>
			</div>
		<?php
	}
	else 
	{
	?>
		<div class=text> Erreur dans la saisie du login ou mdp </div>
		<?php
		echo $_POST['nlogin'];
		echo $_POST['nmdp']
?>
		<div id=footer>
			<div id=boutonV onclick="self.location.href='newCpt.php'">
				ACCUEIL	
			</div>
		</div>
		<?php
		
	}


}
echo "</div>";
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

?>
</body>
</html>


