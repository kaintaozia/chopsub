<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<?php
include "connexion.php";
$bdd = connexion();
?>
<head>
	<link href="./css/StylePizza.css" rel="stylesheet" media="all" type="text/css">
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
        <form action="verifPizza.php" method="post">
	<div id=pizza>		
		<div class=titre>
			<b> Basique : </b>
		</div>		
		<div class=ligne>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pizza" value="margherita" id="blanc" />
				</div>
				<div class=TitreP1>
				<b>Margherita</b> (sauce tomate, double mozzarella)
				</div>
			</div>
		</div>

		<div class=ligne>
			<div class=P1>
				<div class=CocheP1>
				<input type="radio" name="pizza" value="Reine" id="Complet" />
				</div>
				<div class=TitreP1>
				<b>Reine</b> (sauce tomate, mozzarella, champignons, jambon)
				</div>
			</div>
		</div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="hawaienne" id="Complet" />
                                </div>
                                <div class=TitreP1>
                                <b>Hawaienne</b> (sauce tomate, mozzarella, jambon, ananas)
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="chorizo" id="Complet" />
                                </div>
                                <div class=TitreP1>
                                <b>chorizo</b> (sauce tomate, mozzarella, chorizo)
                                </div>
                        </div>
                </div>


                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="bolognaise" id="Complet" />
                                </div>
                                <div class=TitreP1>
                                <b>Bolognaise</b> (sauce tomate, mozzarella, oignons, boeuf, crème fraiche, herbes de provence)
                                </div>
                        </div>
                </div>


                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="végétarienne" id="Complet" />
                                </div>
                                <div class=TitreP1>
                                <b>Végétarienne</b> (sauce tomate, mozzarella, oignons, poivrons, tomates fraiches, origan)
                                </div>
                        </div>
                </div>


                <div class=titre>
                        <b> Original : </b>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Chicago Groove" id="Complet" />
                                </div>
				<div class=TitreP1>
				<b> Chicago Groove</b> (crème, mozzarella, oignons, poulet, lardon, fourme d'ambert)
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Chicago Breakfast" id="Complet" />
                                </div>
                                <div class=TitreP1>
                                <b> Chicago Breakfast</b> (crème, mozzarella, oignons, poulet, bacon, sauce BBQ)
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Addranchie" id="Complet" />
                                </div>
                                <div class=TitreP1>
                                <b>Affranchie</b> (sauce BBQ, mozzarella, oignon, merguez, poulet, cheddar )
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="infernale" id="Complet" />
                                </div>
                                <div class=TitreP1>
                                <b>Infernale</b> (sauce tomate, mozzarella, poulet, chorizo, merguez, huile pimentée)
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="5 fromages" id="Complet" />
                                </div>
                                <div class=TitreP1>
                                <b>5 fromages</b> (sauce tomate, mozzarella, chèvre, fourne d'ambert, reblochon, cheddar)
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Chicago Burger" id="Complet" />
                                </div>
                                <div class=TitreP1>
                                <b>Chicago Burger</b> (sauce tomate, mozzarella, oignons, boeuf, cheddar, sauce burger)
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Dallas BBQ" />
                                </div>
                                <div class=TitreP1>
                                <b>Dallas BBQ</b> (sauce BBQ, mozzarella, oignons, boeuf, lardon, bacon)
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Al Capone" />
                                </div>
                                <div class=TitreP1>
                                <b>Al Capone</b> (sauce tomate, mozzarella, jambon, chorizo, merguez)
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Forestière" />
                                </div>
                                <div class=TitreP1>
                                <b>Forestiere</b> (crème mozzarella, champignons, oignons, jambon, lardons, origan)
                                </div>
                        </div>
                </div>

                <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Savoyarde" />
                                </div>
                                <div class=TitreP1>
                                <b>Savoyarde</b> (crème, mozzarella, oignons, lardons, pommes de terre, reblochon)
                                </div>
                        </div>
                </div>


               <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Chèvre-miel" />
                                </div>
                                <div class=TitreP1>
                                <b>Chèvre-miel</b> (crème, mozzarella, chèvre, miel, herbes de provence)
                                </div>
                        </div>
                </div>


               <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Kebab" />
                                </div>
                                <div class=TitreP1>
                                <b>Kebab</b> (souce tomate, mozzarella, oignons, poivrons, emincé de kebab, sauce blanche)
                                </div>
                        </div>
                </div>
               <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Fajitas" />
                                </div>
                                <div class=TitreP1>
                                <b>Fajitas</b> (Sauce tomate, mozza, oignons, poivrons, poulet, crème fraiche, épices mexicaines)
                                </div>
                        </div>
                </div>

               <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Indienne" />
                                </div>
                                <div class=TitreP1>
                                <b>Indienne</b> (crème, mozzarella, oignons, poulet, curry, ananas)
                                </div>
                        </div>
                </div>

               <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Michigan" />
                                </div>
                                <div class=TitreP1>
                                <b>Michigan</b> (crème, mozzarella, oignons, saumon, aneth)
                                </div>
                        </div>
                </div>

               <div class=ligne>
                        <div class=P1>
                                <div class=CocheP1>
                                <input type="radio" name="pizza" value="Marina Bay" />
                                </div>
                                <div class=TitreP1>
                                <b>Marina Bay</b> (Crème, mozzarella, tomates fraiches, thon, oignons, herbe de provence)
                                </div>
                        </div>
                </div>
	</div>

	<div id=patte>
        	<div id=titrePatte>
                	<b>Patte :  </b>
	         </div>
        	 <div id=PatteL1>
                 	<select name="patte">
                        	<option value="epaisse"> epaisse </option>
                                <option value="fine"> fine </option>
                        </select>
             	 </div>
        </div>


        <div id=patte>
                <div id=titrePatte>
                        <b>Taille :  </b>
                 </div>
                 <div id=PatteL1>
                        <select name="taille">
                                <option value="30 cm"> 30 cm </option>
                                <option value="40 cm"> 40 cm </option>
                        </select>
                 </div>
        </div>











	</div>

	<div id=footer>

			<div id=bouton1 onclick="self.location.href='identification.php'">
				ANNULE
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
