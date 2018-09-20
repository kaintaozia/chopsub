<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
error_reporting(E_ALL);
?>
<head>
<link href="./css/StyleAffichComm.css" rel="stylesheet" media="all" type="text/css">
<link href="./css/baniere.css" rel="stylesheet" media="all" type="text/css">
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
        <div id=typecom>
        <?php
	/*
                $connection->closeCursor();
                $connection3 = $bdd->query("SELECT * FROM choix;");
                $donnee3 = $connection3->fetch();
                echo "Commande :";
                echo "</br>";
                echo "<div id=resultat>";
                echo $donnee3['choix'];
                echo "</div>";
                echo "</br>";
                echo "Selectionné le ";
                echo "</br>";
                echo "<div id=resultat>";
                echo $donnee3['jour'];
                echo "</div>";
	*/
        ?>
        </div>
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
			<div id=boutonDH onclick="self.location.href='deconnexion.php'">
				déconnexion	
			</div>
	</div>
</div>
	<?php
	$connection->closeCursor();
	?>




<div id=page>
<!--***********************************************************
                Verificatin s'il y a une commande
************************************************************--!>
	<?php
	$menu1 = $bdd->query("SELECT COUNT(*) as com FROM commande where id='".$login."'");
	$donnees1 = $menu1->fetch();
	if ($donnees1['com']==0) {
	?>
		Vous n'avez pas passé de commande
	<div id=footer2>
			<div id=boutonErr onclick="self.location.href='identification.php'">
				ACCUEIL	
			</div>
	</div>
</div>

<?php
}else
/*--------------------------------------------------------------
		Si commande subway affichage
----------------------------------------------------------------*/
{

$menu1b = $bdd->query("SELECT type FROM commande where id='".$login."'");
        $donnees1b = $menu1b->fetch();
        if ($donnees1b['type']=='subway') {        
			$menu1b->closeCursor();
			$menu2 = $bdd->query("SELECT * FROM subway where nom='".$login."'");
			$donnees2 = $menu2->fetch();
?>
			<div id=text>
				Voici le résumé de votre commande
			</div>
			<div class=ligne1>
				<div class=col1> PAIN :</div>
				<div class=col2> <?php echo $donnees2['pain']; ?></div>
			</div>
			<div class=ligne1>
				<div class=col1> TAILLE :</div>
				<div class=col2> <?php echo $donnees2['taille']; ?></div>
			</div>
			<div class=ligne1>
				<div class=col1> VIANDE :</div>
				<div class=col2> <?php echo $donnees2['viande']; ?></div>
			</div>
			<div class=ligne1>
				<div class=col1> FROMAGE :</div>
				<div class=col2> <?php echo $donnees2['fromage']; ?></div>
			</div>
			<div class=ligne1>
				<div class=col1> TEMPERATURE :</div>
				<div class=col2> <?php echo  $donnees2['temperature']; ?></div>
			</div>
			<div class=ligne1>
				<div class=col1> SAUCE :</div>
				<div class=col2> <?php echo  $donnees2['sauce']; ?></div>
			</div>
			<div class=ligne1>
				<div class=col1> LEGUMES :</div>
				<div class=col2> <?php echo  $donnees2['legume1']; ?> </div>
			</div>
<?php 
				if ($donnees2['legume2']!=''){
					echo "<div class=ligne1>";
						echo "<div class=col2b>";
							echo  $donnees2['legume2'];
						echo"</div>";
					echo "</div>";
				}
				if ($donnees2['legume3']!=''){
					echo "<div class=ligne1>";
						echo "<div class=col2b>";
							echo  $donnees2['legume3'];
						echo"</div>";
					echo "</div>";
				}
				if ($donnees2['legume4']!=''){
					echo "<div class=ligne1>";
						echo "<div class=col2b>";
							echo  $donnees2['legume4'];
						echo"</div>";
					echo "</div>";
				}
				if ($donnees2['legume5']!=''){
					echo "<div class=ligne1>";
						echo "<div class=col2b>";
							echo  $donnees2['legume5'];
						echo"</div>";
					echo "</div>";
				}
				if ($donnees2['legume6']!=''){
					echo "<div class=ligne1>";
						echo "<div class=col2b>";
							echo  $donnees2['legume6'];
						echo"</div>";
					echo "</div>";
				}
				if ($donnees2['legume7']!=''){
					echo "<div class=ligne1>";
						echo "<div class=col2b>";
							echo  $donnees2['legume7'];
						echo"</div>";
					echo "</div>";
				}
				if ($donnees2['legume8']!=''){
					echo "<div class=ligne1>";
						echo "<div class=col2b>";
							echo  $donnees2['legume8'];
						echo"</div>";
					echo "</div>";
				}
				if ($donnees2['legume9']!=''){
					echo "<div class=ligne1>";
						echo "<div class=col2b>";
							echo  $donnees2['legume9'];
						echo"</div>";
					echo "</div>";
				}
				if ($donnees2['legume10']!=''){
					echo "<div class=ligne1>";
						echo "<div class=col2b>";
							echo  $donnees2['legume10'];
						echo"</div>";
					echo "</div>";
				}

?>
			<div class=ligne1>
				<div class=col1> PRIX:</div>
				<div class=col2> <?php echo $donnees2['prix']."€"; ?> </div>
			</div>
<?php
		}
/*-----------------------------------------------------------------------------
                              vérificaiton si pizza
---------------------------------------------------------------------------*/


	$menu3 = $bdd->query("SELECT type FROM commande where id='".$login."'");
	$donnees3= $menu3->fetch();
	        if ($donnees3['type']=='pizza') {
	                $menu3b = $bdd->query("SELECT * FROM pizza where nom='".$login."'");
                        $donnees3b = $menu3b->fetch();

?>
			<div id=text>
					Voici le résumé de votre commande
					</div>
					<div class=ligne1>
							<div class=col1> PIZZA :</div>
							<div class=col2> <?php echo $donnees3b['pizza']; ?></div>
					</div>
					<div class=ligne1>
							<div class=col1> TAILLE :</div>
							<div class=col2> <?php echo $donnees3b['taille']; ?></div>
					</div>
					<div class=ligne1>
							<div class=col1> PATTE :</div>
							<div class=col2> <?php echo utf8_encode($donnees3b['patte']); ?></div>
					</div>
					<div class=ligne1>
							<div class=col1> PRIX : </div>
							<div class=col2> <?php echo $donnees3b['prix']."€"; ?></div>
					</div>
<?php
		}

/*-----------------------------------------------------------------------------
                              vérificaiton si burger
---------------------------------------------------------------------------*/


        $menu3 = $bdd->query("SELECT type FROM commande where id='".$login."'");
        $donnees3= $menu3->fetch();
                if ($donnees3['type']=='burger') {
                        $menu3b = $bdd->query("SELECT * FROM burger where nom='".$login."'");
                        $donnees3b = $menu3b->fetch();

?>
                        <div id=text>
                                        Voici le résumé de votre commande
                                        </div>
                                        <div class=ligne1>
                                                        <div class=col1> BURGER :</div>
                                                        <div class=col2> <?php echo $donnees3b['burger']; ?></div>
                                        </div>
                                        <div class=ligne1>
                                                        <div class=col1> FORMULE :</div>
                                                        <div class=col2> <?php echo $donnees3b['formule']; ?></div>
                                        </div>
                                        <div class=ligne1>
                                                        <div class=col1> PRIX : </div>
                                                        <div class=col2> <?php echo $donnees3b['prix']."€"; ?></div>
                                        </div>
<?php
                }
?>











	
<div id=footer>
			<div id=bouton1 onclick="self.location.href='identification.php'">
				ACCUEIL
			</div>
			<div id=bouton1 onclick="self.location.href='suppcomm.php'">
				SUPPRESSION
			</div>
</div>
<?php
echo "</div>";

}
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
