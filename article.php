<?php  

	require 'header.php';

?>

	<main>

		<!-- 3 LAST ARTICLES BLOCK -->
		<section class="container section-article mt-4 mb-4">
			
			<?php  

				// Création de la connexion à la bdd
				require "includes/dbh.inc.php";
				$idarticle = $_GET['id'];

				// Requête SQL
				$sql = "SELECT item.name, item.short_description, item.long_description, item.date, type.title, type.icon, user.pseudo, image_item.title, image_item.alt, image_item.link FROM item, type, image_item, user WHERE item.type = type.id AND item.author = user.id AND item.image = image_item.id AND item.id = '{$idarticle}'";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

				if ($result->num_rows > 0) {

					// Envoi des données par ligne
					?>
					<h2 class="display-4">Article: <?php echo $row["name"]; ?> </h2>
					<div class="bar"></div>

					<?php  

					echo '<p class="mt-3">'.$row['long_description'].'</p>';

					echo '<img src="'.$row['link'].'" class="img-fluid">';

				}
				
				else {
					header("Location: index.php");
				}

			?>

		</section>

	</main>

<?php  

	require 'footer.php';

?>