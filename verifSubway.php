<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
        <link href="./css/baniere.css" rel="stylesheet" media="all" type="text/css">
	<link href="./css/StyleVerifSub.css" rel="stylesheet" media="all" type="text/css"> 
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

/**********************************************************
Verification du login mdp
***********************************************************/

$connection = $bdd->query("SELECT COUNT(*) as nb1 FROM identi where login='".$login."' AND mdp='".$mdp."'");
$donnees1 = $connection->fetch();

/***********************************************************
Si login OK
***********************************************************/

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
/********************************************************
si commande deja passe
********************************************************/
$menu1 = $bdd->query("select count(*) as com from subway where nom='".$login."'");
$donnees1 = $menu1->fetch();
if ($donnees1['com']!=0) {
	?>	
	<div id=page>
			<div id=text>
				vous avez déjà passé une commande
			</div>
			</br>
			<div id=boutonErr onclick="self.location.href='identification.php'">
				ACCUEIL	
			</div>
		</div>		
<?php
}else
{
$menu1->closecursor();
/********************************************************
Si pas de commande Affichage de la page
*********************************************************/
?>
<div id=page>
<?php
if ($_POST['pain']=='' || $_POST['taille']=='' || $_POST['viande']=='' || $_POST['fromage']=='' || $_POST['temperature']=='' || $_POST['sauce']=='') {
    echo "<div class=text>";
	echo "Vous avez une erreur dans votre commande, vous avez oublié un ingrédient";
	echo "<div id=footer>";
	?>
		<a href="javascript:history.back()">RETOUR</a>
	<?php
	echo "</div>";
	echo "</div>";
} 
else {
?>
	<div id=text>
	Voici le résumé de votre commande
	</div>
	<div class=ligne1>
		<div class=col1> PAIN :</div>
		<div class=col2> <?php echo $_POST['pain']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> TAILLE :</div>
		<div class=col2> <?php echo $_POST['taille']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> VIANDE :</div>
		<div class=col2> <?php echo $_POST['viande']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> FROMAGE :</div>
		<div class=col2> <?php echo $_POST['fromage']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> TEMPERATURE :</div>
		<div class=col2> <?php echo $_POST['temperature']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> SAUCE :</div>
		<div class=col2> <?php echo $_POST['sauce']; ?></div>
	</div>
	<div class=ligne1>
		<div class=col1> LEGUMES :</div>
		<div class=col2> <?php echo $_POST['legume1']; ?> </div>
	</div>
	<?php if ($_POST['legume2']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume2'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume3']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume3'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume4']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume4'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume5']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume5'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume6']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume6'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume7']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume7'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume8']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume8'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume9']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume9'];
			echo"</div>";
		echo "</div>";
	}
	 if ($_POST['legume10']!=''){
		echo "<div class=ligne1>";
			echo "<div class=col2b>";
				echo $_POST['legume10'];
			echo"</div>";
		echo "</div>";
	}

?>

	<div class=ligne1>

<?php

if ($_POST['taille']=='30 cm') {
	if ($_POST['viande']=='Teriaky') {
	$prix='7';
	}
	else {
		if ($_POST['viande']=='Tikka') {
		$prix='7';
		}
		else {
			if ($_POST['viande']=='Roastbeef') {
			$prix='7';
			}
			else {
				if ($_POST['viande']=='Dinde') {
				$prix='6';
				}
				else {
					if ($_POST['viande']=='Jambon') {
					$prix='6';
					}
					else {
						if ($_POST['viande']=='MELT') {
						$prix='6,5';
						}	
						else {
							if ($_POST['viande']=='CLUB') {
							$prix='6,5';
							}
							else {
								if ($_POST['viande']=='B.M.T') {
								$prix='6,5';
								}
								else {
									if ($_POST['viande']=='Dinde Jambon') {
									$prix='6';
									}
									else {
										if ($_POST['viande']=='Thon') {
										$prix='7';
										}
										else {
											if ($_POST['viande']=='Steack vegetarien') {
											$prix='6,5';
											}
											else {
												if ($_POST['viande']=='Meatball') {
												$prix='7';
												}
												else {
													 if ($_POST['viande']=='Steak & cheese') {
													 $prix='7';
													}
													else {
														if ($_POST['viande']=='Spicy Italien') {
														$prix='6';
														}
													}	
												}
											}	
										}
									}		
								}
							}		
						}
					}		
				}	
			}	
		}	
	}
}


if ($_POST['taille']=='15 cm') {
	if ($_POST['viande']=='Teriaky') {
	$prix='4,5';
	}
	else {
		if ($_POST['viande']=='Tikka') {
		$prix='4,5';
		}
		else {
			if ($_POST['viande']=='Roastbeef') {
			$prix='4,5';
			}
			else {
				if ($_POST['viande']=='Dinde') {
				$prix='3,5';
				}
				else {
					if ($_POST['viande']=='Jambon') {
					$prix='3,5';
					}
					else {
						if ($_POST['viande']=='MELT') {
						$prix='4';
						}	
						else {
							if ($_POST['viande']=='CLUB') {
							$prix='4';
							}
							else {
								if ($_POST['viande']=='B.M.T') {
								$prix='4';
								}
								else {
									if ($_POST['viande']=='Dinde Jambon') {
									$prix='3,5';
									}
									else {
										if ($_POST['viande']=='Thon') {
										$prix='4,5';
										}
										else {
											if ($_POST['viande']=='Steack vegetarien') {
											$prix='4';
											}
											else {
												if ($_POST['viande']=='Meatball') {
												$prix='4,5';
												}
												else {
													 if ($_POST['viande']=='Steak & cheese') {
													 $prix='4,5';
													}
													else {
														if ($_POST['viande']=='Spicy Italien') {
														$prix='3,5';
														}
													}	
												}
											}	
										}
									}		
								}
							}		
						}
					}		
				}	
			}	
		}	
	}
}

?>







		<div class=col1> PRIX : </div>
		<div class=col2> <?php echo $prix."€"; ?></div>
	</div>


<?php
echo "<div id=footer>";
$pain=$_POST['pain'];
$taille=$_POST['taille'];
$viande=$_POST['viande'];
$fromage=$_POST['fromage'];
$temperature=$_POST['temperature'];
$legume1=$_POST['legume1'];
$legume2=$_POST['legume2'];
$legume3=$_POST['legume3'];
$legume4=$_POST['legume4'];
$legume5=$_POST['legume5'];
$legume6=$_POST['legume6'];
$legume7=$_POST['legume7'];
$legume8=$_POST['legume8'];
$legume9=$_POST['legume9'];
$legume10=$_POST['legume10'];
$sauce=$_POST['sauce'];
?>
<a href="javascript:history.back()">RETOUR</a>
<?php
echo "<a href='enregSubway.php?pain=".$pain."&taille=".$taille."&viande=".$viande."&fromage=".$fromage."&temperature=".$temperature."&legume1=".$legume1."&legume2=".$legume2."&legume3=".$legume3."&legume4=".$legume4."&legume5=".$legume5."&legume6=".$legume6."&legume7=".$legume7."&legume8=".$legume8."&legume9=".$legume9."&legume10=".$legume10."&sauce=".$sauce."&prix=".$prix."'> ENREGISTER </a>";


/*
echo "<a href='enregCommande.php?pain=".$pain."&taille=".$taille."&viande=".$viande."&fromage=".$fromage."&temperature=".$temperature."&legume1=".$legume1."&legume2=".$legume2."&legume3=".$legume3."&legume4=".$legume4."&legume5=".$legume5."&legume6=".$legume6."&legume7=".$legume7."&legume8=".$legume8."&legume9=".$legume9."&legume10=".$legume10."&sauce=".$sauce."&prix=".$prix."'> <input type='button' value='Enregistrer' id=bouton1></a>";
*/
?>

</div>
</div>
</div>
<?php
}
}

}
else {
?>
<!--***************************************************
Si erreur de login
****************************************************--!>
		<div id=header>
			<div id=banniere>
			<img src="images/banniere.jpg" />
			</div>
 		</div>
		<div id=page>
			<div id=text>
			Erreur sur le mdp ou le login
			</div>
			<div id=boutonD onclick="self.location.href='deconnexion.php'">
				deconnexion	
			</div>
		</div>		
<?php } ?>
</body>
