<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
	<link href="./css/StyleSub.css" rel="stylesheet" media="all" type="text/css">
	<link href="./css/baniere.css" rel="stylesheet" media="all" type="text/css">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
<!--*********************************************************** -->
<!--		ajout des variable de session -->
<!-- ************************************************************ -->
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
$menu1 = $bdd->query("select count(*) as com from commande where id ='".$login."'");
$donnees1 = $menu1->fetch();
if ($donnees1['com']!=0) {
	?>	
	<div id=page>
			<div id=text>
				vous avez deja passe une commande
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
Si pas de commande
*********************************************************/
?>
<div id=page>
        <div id=formulaire>
        <form action="verifSubway.php" method="post">
	<div id=pain>		
		<div class=titre>
			<b>1 -  Choix du pain : </b>
		</div>		
		<div class=PainL1>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="blanc" id="blanc" />
				</div>
				<div class=TitreP1>
				Blanc
				</div>
			</div>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="italien" id="italien" />	
				</div>
				<div class=TitreP1>
				Italien
				</div>
			</div>		
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Avoine Miel" id="avoine miel" /> 
				</div>
				<div class=TitreP1>
				Avoine/Miel	
				</div>
			</div>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Parmesan Origan" id="P.Origan" />
				</div>
				<div class=TitreP1>
				Parmesan/Origan
				</div>
			</div>

		</div>

		<div class=PainL1>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Complet" id="Complet" />
				</div>
				<div class=TitreP1>
				Complet
				</div>
			</div>
			<!-- <div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Wrap" id="Wrap" />
				</div>
				<div class=TitreP1>
				Wrap
				</div>
			</div> -->
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Flatbread" id="Flatbread" />
				</div>
				<div class=TitreP1>
				Flatbread
				</div>
			</div>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pain" value="Salade" id="Salade" />
				</div>
				<div class=TitreP1>
				Salade
				</div>
			</div>
		</div>
	</div>
	<div id=Taille>
		<div id=titreTaille>
			<b>2 -  Choix de la taille : </b>
		</div>		
		<div id=TailleL1>
				<select name="taille">
					<option value="30 cm">30 cm </option>
					<option value="15 cm">15 cm </option>
				</select>	
		</div>
	</div>
	<div id=Viande>
		<div class=titre>
			<b>3 - Choix de la viande : 15 / 30 cm</b>
		</div>
		<div class=ViandeL1>
			<div class=TypeV1>
				<b> Poulet : </b>
			</div>
			<div class=V1>
				<div class=CocheV1>
					<input type="radio" name="viande" value="Teriaky" id="Teriaki" />
				</div>
				<div class=TitreV1>
					Teriaky
				</div>
				<div class=prix>
					4,5 / 7€
				</div>
			</div>
			<div class=V2>
				<div class=CocheV2>
					<input type="radio" name="viande" value="Tikka" id="Tikka" />
				</div>
				<div class=TitreV2>
					Tikka (paprika curry)
				</div>
				<div class=prix>
					4,5 / 7€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=TypeV1>
				<b>Boeuf : </b>
			</div>
			<div class=V1>
				<div class=CocheV1>
					<input type="radio" name="viande" value="Roastbeef" id="Roastbeef" />
				</div>
				<div class=TitreV1>
					Roastbeef
				</div>
				<div class=prix>
					4,5 / 7€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=TypeV1>
				<b>Charcuterie : </b>
			</div>
			<div class=V1>
				<div class=CocheV1>
				<input type="radio" name="viande" value="Dinde" id="Dinde" />
				</div>
				<div class=TitreV1>
					Dinde
				</div>
				<div class=prix>
					3,5 / 6€
				</div>
			</div>
			<div class=V2>
				<div class=CocheV2>
				<input type="radio" name="viande" value="Jambon" id="Jambon" />
				</div>
				<div class=TitreV2>
					Jambon
				</div>
				<div class=prix>
					3,5 / 6€
				</div>
			</div>
		</div>
		<div class=ViandeL3>
			<div class=TypeV3>
				<b>Combinaisons :</b>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=V3>
				<div class=CocheV3>
				<input type="radio" name="viande" value="Steak & cheese" id="Steak & cheese" />
				</div>
				<div class=TitreV3>
					Steak & cheese (steak, oignons, poivrons, fromage)
				</div>
				<div class=prix>
					4,5 / 7€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=V3>
				<div class=CocheV3>
				<input type="radio" name="viande" value="Spicy Italien" id="Spicy Italien" />
				</div>
				<div class=TitreV3>
					Spicy Italien (salami, pepperoni)
				</div>
				<div class=prix>
					3,5 / 6€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=V3>
				<div class=CocheV3>
					<input type="radio" name="viande" value="MELT" id="MELT" />
				</div>
				<div class=TitreV3>
					MELT (Dinde, Jambon, Bacon)
				</div>			 
				<div class=prix>
					4 / 6,5€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=V3>
				<div class=CocheV3>
					<input type="radio" name="viande" value="CLUB" id="CLUB" />
				</div>
				<div class=TitreV3>
					CLUB (Dinde, Jambon, Roasbeef)
				</div>			 
				<div class=prix>
					4 / 6,5€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=V3>
				<div class=CocheV3>
					<input type="radio" name="viande" value="B.M.T" id="B.M.T" />
				</div>
				<div class=TitreV3>
					B.M.T (jambon, Salami, Pepperoni)
				</div>			 
				<div class=prix>
					4 / 6,5€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=V3>
				<div class=CocheV3>
					<input type="radio" name="viande" value="Dinde Jambon" id="Dinde Jambon" />
				</div>
				<div class=TitreV3>
					Dinde / Jambon
				</div>			 
				<div class=prix>
					3,5 / 6€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=V3>
				<div class=CocheV3>
					<input type="radio" name="viande" value="Thon" id="Thon" />
				</div>
				<div class=TitreV3>
					Thon
				</div>			 
				<div class=prix>
					4,5 / 7€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=V3>
				<div class=CocheV3>
					<input type="radio" name="viande" value="Steack vegetarien" id="Steack vegetarien" />
				</div>
				<div class=TitreV3>
					Steack végétarien
				</div>			 
				<div class=prix>
					4 / 6,5€
				</div>
			</div>
		</div>
		<div class=ViandeL1>
			<div class=V3>
				<div class=CocheV3>
					<input type="radio" name="viande" value="Meatball" id="Meatball" />
				</div>
				<div class=TitreV3>
					MeatBall (boulette de boeuf sauce tomates legerement epicees)
				</div>			 
				<div class=prix>
					4,5 / 7€
				</div>
			</div>
		</div>
		
	</div>
	<div id=Fromage>
		<div id=titreFromage>
			<b>4 -  Choix du fromage : </b>
		</div>		
		 <div id=FromageL1>
                                <select name="fromage">
                                        <option value="Emmental"> Emmental </option>
                                        <option value="Gouda/Cheddar"> Gouda/Cheddar </option>
                                </select>
                </div>
	</div>
	<div id=Temperature>
		<div id=titreTempe>
			<b>5 - Chaud et froid :  </b>
		</div>		
		 <div id=TemperatureL1>
                                <select name="temperature">
                                        <option value="chaud"> chaud </option>
                                        <option value="froid"> froid </option>
                                </select>
                </div>
	</div>
<div id=legume>		
		<div class=titre>
			<b>6 -  Choix des légumes : </b>
		</div>		
		<div class=legumeL1>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume1" value="Salade" id="legume1" />
				</div>
				<div class=TitreLeg1>
				Salade
				</div>
			</div>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume2" value="Tomate" id="Tomate" />
				</div>
				<div class=TitreLeg1>
				Tomate
				</div>
			</div>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume3" value="Oignon" id="Oignon" />				
				</div>
				<div class=TitreLeg1>
				Oignon
				</div>
			</div>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume4" value="Concombre" id="Concombre" />
				</div>
				<div class=TitreLeg1>
				Concombre
				</div>
			</div>
		</div>
		<div class=legumeL1>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume6" value="Poivron" id="Poivron" />	
				</div>
				<div class=TitreLeg1>
				Poivron
				</div>
			</div>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume7" value="Mais" id="Mais" />
				</div>
				<div class=TitreLeg1>
				Mais
				</div>
			</div>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume8" value="Carotte" id="Carotte" />
				</div>
				<div class=TitreLeg1>
				Carotte
				</div>
			</div>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume9" value="Olive" id="Olive" />
				</div>
				<div class=TitreLeg1>
				Olive
				</div>
			</div>
		</div>
		<div class=legumeL1>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume5" value="Piment" id="Piment" />
				</div>
				<div class=TitreLeg1>
				Piment
				</div>
			</div>
			<div class=LegumeP1>
				<div class=CocheLeg1>
				<input type="checkbox" name="legume10" value="Cornichon" id="Cornichon" />	
				</div>
				<div class=TitreLeg1>
				Cornichon
				</div>
			</div>
		</div>
	</div>
	<div id=Sauce>		
		<div class=titre>
			<b>7 -  Choix de la sauce : </b>
		</div>		
		<div class=SauceL1>
			<div class=SauceP1>
				<div class=CocheS1>
				<input type="radio" name="sauce" value="Mayonnaise" id="Mayonnaise" />
				</div>
				<div class=TitreS1>
				Mayonnaise
				</div>
			</div>
			<div class=SauceP1>
				<div class=CocheS1>
				<input type="radio" name="sauce" value="Ketchup" id="Ketchup" /> 
				</div>
				<div class=TitreS1>
				Ketchup
				</div>
			</div>
			<div class=SauceP1>
				<div class=CocheS1>
				<input type="radio" name="sauce" value="Huile/Vinaigre" id="Huile/Vinaigre" />
				</div>
				<div class=TitreS1>
				Huile/Vinaigre
				</div>
			</div>
			<div class=SauceP1>
				<div class=CocheS1>
				<input type="radio" name="sauce" value="Barbecue" id="Barbcue" />
				</div>
				<div class=TitreS1>
				Barbecue
				</div>
			</div>
		</div>
		<div class=SauceL1>
			<div class=SauceP1>
				<div class=CocheS1>
				<input type="radio" name="sauce" value="Moutarde" id="Moutarde" />
				</div>
				<div class=TitreS1>
				Moutarde
				</div>
			</div>
			<div class=SauceP1>
				<div class=CocheS1>
				<input type="radio" name="sauce" value="Chipotle West" id="Chipotle West" /> 
				</div>
				<div class=TitreS1>
				Chipotle West
				</div>
			</div>
			<div class=SauceP1>
				<div class=CocheS1>
				<input type="radio" name="sauce" value="Oignons doux" id="Oignons doux" />
				</div>
				<div class=TitreS1>
				Oignons doux
				</div>
			</div>
			<div class=SauceP1>
				<div class=CocheS1>
				<input type="radio" name="sauce" value="Moutarde/Miel" id="Moutarde/Miel" />
				</div>
				<div class=TitreS1>
				Moutarde/Miel
				</div>
			</div>
		</div>
		<div class=SauceL1>
			<div class=SauceP2>
				<div class=CocheS2>
				<input type="radio" name="sauce" value="Asiago" id="Asiago" />	
				</div>
				<div class=TitreS2>
				Asiago (fromagère)
				</div>
			</div>
			<div class=SauceP2>
				<div class=CocheS2>
				<input type="radio" name="sauce" value="Ranch" id="Ranch" /> 
				</div>
				<div class=TitreS2>
				Ranch (ail et fines herbes)
				</div>
			</div>
			<div class=SauceP2>
				<div class=CocheS2>
				<input type="radio" name="sauce" value="Sans sauce" id="Sans sauce" /> 
				</div>
				<div class=TitreS2>
				Sans sauce
				</div>
			</div>
		</div>
	</div>

	<div id=footer>

			<div id=bouton1 onclick="self.location.href='identification.php'">
				ANNULER
			</div>
		        <input type="submit" value="VALIDER" id="boutonV">
	</div>
	</form>
	</div>

<?php
}
?>
</div>

<?php
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
			</br>
			<div id=boutonErr onclick="self.location.href='deconnexion.php'">
				CONNEXION	
			</div>
		</div>		
<?php } ?>
</body>
</html>
