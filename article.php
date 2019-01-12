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
				$sql = "SELECT item.name, item.short_description, item.long_description, item.publish_date, type.title, type.icon, user.pseudo, user.instagram, image_user.image_user, image_item.title, image_item.alt, image_item.link, rank.title FROM item, type, image_item, user, image_user, rank WHERE item.type = type.id AND item.author = user.id AND user.image = image_user.id AND item.image = image_item.id AND user.rank = rank.id AND item.id = '{$idarticle}'";
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

					echo '

					<h3 class="display-4 mt-4 publish_author_title">Publié par :</h3>

					<div class="row publish_author_row">

						<div class="col-md-3 publish_author_col_img">
							<img src="'.$row['image_user'].'" class="img-fluid">
						</div>

						<div class="col-md-9 publish_author_col_data">
							<ul>
								<li><i class="fas fa-user-circle"></i> Pseudo : <span class="op-03">'.$row['pseudo'].'</span></li>
								<li><i class="fas fa-graduation-cap"></i> Grade : <span class="op-03">'.$row['title'].'</span></li>
								<li><i class="fab fa-instagram"></i> Instagram : <span class="op-03">'.$row['instagram'].'</span></li>
							</ul>
						</div>

					</div>';

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