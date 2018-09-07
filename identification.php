<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
<link href="./css/StyleIdenti.css" rel="stylesheet" media="all" type="text/css">
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



<!--***********************************************************
                Affichage du menu si admin
************************************************************--!>

<?php
	$connection->closeCursor();
        $connection2 = $bdd->query("SELECT admin FROM identi where login='".$login."' AND mdp='".$mdp."'");
        $donnee2 = $connection2->fetch();
        if ($donnee2['admin']==1) {
        	?>
	        <div id=menu>
			<div id=type1>
				 <form action="choixCommande.php" method="post">
					<input type="submit" value="SUBWAY" name="commande" id="choix1">
				</form>
			</div>	

			<div id=type2>
                                 <form action="choixCommande.php" method="post">
                                        <input type="submit" value="PIZZA" name="commande" id="choix2">
                                </form>
                        </div>


			<div id=type3>
                                 <form action="choixCommande.php" method="post">
                                        <input type="submit" value="BURGER" name="commande" id="choix3">
                                </form>
                        </div>
	        </div>
	        <?php
        } ?>


<!-- ***************************************************************
		Affichage des boutons de commandes
****************************************************************** -->


<div id=page>
	<div id=MenuP>

<?php
/*---------------------------------------------
	Si choix subway
-----------------------------------------------*/
	$connection1 = $bdd->query("SELECT choix from choix;");
	$donnees2 = $connection1->fetch();
	if ($donnees2['choix']=='subway'){ 
?>


		<div id=Option1>
			<div id=bouton1 onclick="self.location.href='subway.php'">
				Subway
			</div>
		</div>
                <div id=Option2b>
                        <div id=bouton2b onclick="self.location.href='affichComm.php'">
                                Visualiser ma commande
                        </div>
                </div>
        </div>
<?php
	}

/*---------------------------------------------
        Si choix pizza
-----------------------------------------------*/


        if ($donnees2['choix']=='pizza'){

?>

                <div id=Option1>
                        <div id=bouton1 onclick="self.location.href='pizza.php'">
                                Pizza
                        </div>
                </div>
                <div id=Option2b>
                        <div id=bouton2b onclick="self.location.href='affichComm.php'">
                                Visualiser ma commande
                        </div>
                </div>
        </div>
<?php
	}

/*---------------------------------------------
        Si choix burger
-----------------------------------------------*/


        if ($donnees2['choix']=='burger'){

?>

                <div id=Option1>
                        <div id=bouton1 onclick="self.location.href='burger.php'">
                                burger
                        </div>
                </div>
                <div id=Option2b>
                        <div id=bouton2b onclick="self.location.href='affichComm.php'">
                                Visualiser ma commande
                        </div>
                </div>
        </div>
<?php
        }

/* ---------------------------------------------
	si aucun choix
-----------------------------------------------*/


        if ($donnees2['choix']==''){

?>

              <b>  aucun type de commande a été selectionnée veuillez nous contacter !</b>
	</div>
                
<?php
        }
?>



	<?php
		/*-----------------------------------------------------------------
				Affichage des options Administrateur
		------------------------------------------------------------------*/
	$connection->closeCursor();
	$connection2 = $bdd->query("SELECT admin FROM identi where login='".$login."' AND mdp='".$mdp."'");
	$donnee2 = $connection2->fetch();
	if ($donnee2['admin']==1) {
	?>
	<div id=MenuA>
		<div id=Option3>
			<div id=bouton1 onclick="javascript:window.open('pdf.php')">

				Impression PDF
			</div> 
		</div>
		<div id=Option4>
			<div id=bouton1 onclick="self.location.href='newCpt.php'">
				Créer un compte	
			</div>
		</div>
	</div>
	<div id=MenuA2>
		<div id=Option5>
			<div id=bouton1 onclick="self.location.href='confPurge.php'">

				purger les commandes
			</div> 
		</div>
	</div>
	<?php
		}
	?>
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
