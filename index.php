<?php  

	require 'header.php';

?>

	<main>

		<!-- JUMBOTRON EN-TETE -->
		<section class="jumbotron">

		  <?php

		  if (isset($_SESSION['userId'])) {
		  	echo '<h1 class="display-4">Bonjour, '.$_SESSION['userUid'].'!</h1>';
		  	echo '<p class="lead">Vous êtes connecté!</p>';
		  } else {
		  	echo '<h1 class="display-4">Bonjour, visiteur!</h1>';
		  	echo '<p class="lead">Vous êtes déconnecté, connectez-vous ou inscrivez-vous pour accéder à plus de contenu !</p>';
		  	echo '<a href="signup.php" class="btn btn-outline-warning rounded-0">Inscription</a>';
		  }

		  ?>
		</section>

		<!-- 3 LAST ARTICLES BLOCK -->
		<section class="container mt-4 mb-4">
			
			<h2 class="display-4">Articles récents</h2>
			<div class="bar"></div>

			<div class="row mt-3">

				<?php

					// Création de la connexion à la bdd
					require "includes/dbh.inc.php";

					// Requête SQL
					$sql = "SELECT image_item.link, image_item.alt, item.id, item.name, item.short_description, item.publish_date FROM item, image_item WHERE item.image = image_item.id ORDER BY publish_date desc limit 3";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {

					    // Envoi des données par ligne
					    while($row = $result->fetch_assoc()) {
					        echo '<div class="col-md-4">
					        		<div class="card mb-4 box-shadow">
					  					<img class="card-img-top" src="'.$row["link"].'" alt="'.$row["alt"].'" style="height: 225px;">
										<div class="card-body">
											<h5 class="card-title">'.$row["name"].'</h5>
										    <p class="card-text" style="height: 80px;">'.$row["short_description"].'</p>
										    <a href="article?id='.$row['id'].'" class="btn btn-warning rounded-0">Voir plus</a>
										 </div>
									</div>
								</div>';
					    }
					} else {
					    echo "0 results";
					}

				?>		
			</div>
		</section>

		<!-- 3 RANDOM ARTICLES BLOCK -->
		<section class="container mt-4 mb-4">
			
			<h2 class="display-4">Articles aléatoires</h2>
			<div class="bar"></div>

			<div class="row mt-3">

				<?php

					// Création de la connexion à la bdd
					require "includes/dbh.inc.php";

					// Requête SQL
					$sql = "SELECT image_item.link, image_item.alt, item.id, item.name, item.short_description, item.publish_date FROM item, image_item WHERE item.image = image_item.id  ORDER BY rand() desc limit 3";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {

					    // Envoi des données par ligne
					    while($row = $result->fetch_assoc()) {
					        echo '<div class="col-md-4">
					        		<div class="card mb-4 box-shadow">
					  					<img class="card-img-top" src="'.$row["link"].'" alt="'.$row["alt"].'" style="height: 225px;">
										<div class="card-body">
											<h5 class="card-title">'.$row["name"].'</h5>
										    <p class="card-text" style="height: 80px;">'.$row["short_description"].'</p>
										    <a href="article?id='.$row['id'].'" class="btn btn-warning rounded-0">Voir plus</a>
										 </div>
									</div>
								</div>';
					    }
					} else {
					    echo "0 results";
					}

				?>		
			</div>
		</section>

		<!-- AUTHORS SECTION -->
 		<section class="container authors mb-4">

			<h2 class="display-4">Les auteurs</h2>
			<div class="bar"></div>

			<div class="row">
				<div class="col-md-4">
					<article class="u--cardAuthor">
				        <img src="assets/images/picklesbg.jpg" alt="Lake">
				        <figure class="u--cardAuthor__caption">
				          <img src="assets/images/pickles.jpg" class="u--cardAuthor__profile">
				          <h2>Steven</h2>
				          <p>Rédacteur et développeur principal de urbexarts.fr</p>
				          <a href="https://www.instagram.com/steven.fr.dlt/" class="btn btn-outline-warning rounded-0">Follow</a>
				        </figure>
			    	</article>
				</div>

				<div class="col-md-4">
					<article class="u--cardAuthor">
				        <img src="assets/images/coyotebg.jpg" alt="Lake">
				        <figure class="u--cardAuthor__caption">
				          <img src="assets/images/coyote.jpg" class="u--cardAuthor__profile">
				          <h2>Théophile</h2>
				          <p>Rédacteur principal de urbexarts.fr, spécialiste souterrains</p>
				          <a href="https://www.instagram.com/underground_coyote/" class="btn btn-outline-warning rounded-0">Follow</a>
				        </figure>
			    	</article>
				</div>

			</div>
		</section>

	</main>

<?php  

	require 'footer.php';

?>