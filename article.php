<?php

	require 'header.php';

	if (isset($_SESSION['userId'])) {
		require "includes/dbh.inc.php";

		// Requête SQL
		$sql = "SELECT * from like_system WHERE author = '{$_SESSION['userId']}' AND item = '{$_GET['id']}';";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$liked = true;
		} else {
			$liked = false;
		}
	}
?>

	<main>

		<!-- 3 LAST ARTICLES BLOCK -->
		<section class="container section-article mt-4 mb-4">

			<?php

				// Création de la connexion à la bdd
				require "includes/dbh.inc.php";
				$idarticle = $_GET['id'];

				// Requête SQL
				$sql = "SELECT 
				item.name,
				item.publish_date,
				item.long_description, 
				image_item.link,
				image_item.alt,
				user.pseudo,
				user.instagram,
				rank.title,
				image_user.image_user,
				image_user.alt,
				count(like_system.item) as likes_count
				FROM item 
				 INNER JOIN image_item
						ON item.image = image_item.id
				 INNER JOIN user
						ON item.author = user.id
				 INNER JOIN image_user
						ON user.image = image_user.id
				 INNER JOIN rank
						ON user.rank = rank.id
				 LEFT JOIN like_system
						ON like_system.item = item.id
				AND item.image = image_item.id
				WHERE item = '{$idarticle}'
				GROUP BY
				item.name,
				item.publish_date,
				item.long_description, 
				image_item.link,
				image_item.alt,
				user.pseudo,
				user.instagram,
				rank.title,
				image_user.image_user,
				image_user.alt";

				$result = $conn->query($sql);
				$row = $result->fetch_assoc();

				if ($result->num_rows > 0) {

					// Envoi des données par ligne
					?>
					<h2 class="display-4">Article: <?php echo $row["name"]; ?> </h2>
					<div class="bar"></div>

					<p class="mt-3"><i class="fas fa-clock"></i> <?php echo $row["publish_date"]; ?> <i class="fas fa-heart ml-2"></i> <?php echo $row["likes_count"]; ?></p>

					<?php

					echo '<p class="mt-3">'.$row['long_description'].'</p>';

					echo '<img src="'.$row['link'].'" class="img-fluid">';

					?>

					<div class="mt-3">

						<?php
						
		  					if (isset($_SESSION['userId'])) {
								if ($liked) {
									echo "<a href='includes/like.php?item={$_GET['id']}' class='btn btn-danger rounded-0'><i class='fas fa-heart'></i> Je n'aime plus</a>";
								} else {
									echo "<a href='includes/like.php?item={$_GET['id']}' class='btn btn-outline-danger rounded-0'><i class='far fa-heart'></i> J'aime</a>";
								}
							}
						?>

					</div>

					<?php

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
