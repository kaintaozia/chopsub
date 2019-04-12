<!-- connexion bdd -->
	<?php
	function connexion()
		{
			try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=chopsub', 'chopsub', 'chopsub');
				return $bdd;
			}
				catch (Exception $e)
			{
				die('Erreur : ' . $e->getMessage());
			}
		}
	?>
