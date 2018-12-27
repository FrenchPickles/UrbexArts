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

					require "includes/dbh.inc.php";

					$sql = "SELECT idItem, nameItem, descriptionItem, imageItem, publishdate FROM items ORDER BY publishdate desc limit 3";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        echo '<div class="col-md-4">
					        		<div class="card mb-4 box-shadow">
					  					<img class="card-img-top" src="'.$row["imageItem"].'" alt="Card image cap" style="height: 225px;">
										<div class="card-body">
											<h5 class="card-title">'.$row["nameItem"].'</h5>
										    <p class="card-text" style="height: 80px;">'.$row["descriptionItem"].'</p>
										    <a href="article?id='.$row['idItem'].'" class="btn btn-warning rounded-0">Voir plus</a>
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

					require "includes/dbh.inc.php";

					$sql = "SELECT idItem, nameItem, descriptionItem, imageItem FROM items ORDER BY rand() desc limit 3";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        echo '<div class="col-md-4">
					        		<div class="card mb-4 box-shadow">
					  					<img class="card-img-top" src="'.$row["imageItem"].'" alt="Card image cap" style="height: 225px;">
										<div class="card-body">
											<h5 class="card-title">'.$row["nameItem"].'</h5>
										    <p class="card-text" style="height: 80px;">'.$row["descriptionItem"].'</p>
										    <a href="article?id='.$row['idItem'].'" class="btn btn-warning rounded-0">Voir plus</a>
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
				        <img src="https://c1.staticflickr.com/9/8763/27620942923_5761de7cd1_b.jpg" alt="Lake">
				        <figure class="u--cardAuthor__caption">
				          <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/512/user-male-icon.png" class="u--cardAuthor__profile">
				          <h2>Steven</h2>
				          <p>Rédacteur et développeur principal de urbexarts.fr</p>
				          <button href="#" class="btn btn-outline-warning rounded-0">Follow</button>
				        </figure>
			    	</article>
				</div>

				<div class="col-md-4">
					<article class="u--cardAuthor">
				        <img src="http://www.bravotv.com/sites/nbcubravotv/files/styles/blog-post--mobile/public/jet-set-urbex.jpg?itok=B5Xv_a5E&timestamp=1486532371" alt="Lake">
				        <figure class="u--cardAuthor__caption">
				          <img src="http://icons.iconarchive.com/icons/paomedia/small-n-flat/512/user-male-icon.png" class="u--cardAuthor__profile">
				          <h2>Théophile</h2>
				          <p>Rédacteur principal de urbexarts.fr, spécialiste souterrains</p>
				          <button href="#" class="btn btn-outline-warning rounded-0">Follow</button>
				        </figure>
			    	</article>
				</div>

			</div>
		</section>

	</main>

<?php  

	require 'footer.php';

?>