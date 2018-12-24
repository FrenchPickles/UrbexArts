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
										    <a href="#" class="btn btn-warning rounded-0">Voir plus</a>
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

					$sql = "SELECT nameItem, descriptionItem, imageItem FROM items ORDER BY rand() desc limit 3";
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
										    <a href="#" class="btn btn-warning rounded-0">Voir plus</a>
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
<!-- 		<section class="container authors mb-4">

			<h2 class="display-4">Les auteurs</h2>
			<div class="bar"></div>

			<div class="row mt-3">

				<div class="col-md-6">

					<div class="bg-dark card-entete">
						<i class="fas fa-code"></i> Développeur et rédacteur
					</div>
					
					<div class="card-body text-center">
						<h5 class="card-title">Steven</h5>
						<p class="card-text">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>

						<a class="btn btn-outline-dark" href="#">Instagram</a>
						<a class="btn btn-outline-primary" href="#">Facebook</a>

					</div>
					<div class="card-bottom">
						<div class="card-age pt-3 bg-dark">
							<div>20</div>
							<div><p>Ans</p></div>
						</div>
						<div class="card-articles pt-3 bg-warning">
							<div>20</div>
							<div><p>Articles posté(s)</p></div>
						</div>
					</div>
				</div>

				<div class="col-md-6">

					<div class="bg-dark card-entete">
						<i class="fas fa-feather-alt"></i> Rédacteur
					</div>

					<div class="card-body text-center">
						<h5 class="card-title">Théophile</h5>
						<p class="card-text">tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodoconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>

						<a class="btn btn-outline-dark" href="#">Instagram</a>
						<a class="btn btn-outline-primary" href="#">Facebook</a>

					</div>
					<div class="card-bottom">
						<div class="card-age pt-3 bg-dark">
							<div>21</div>
							<div><p>Ans</p></div>
						</div>
						<div class="card-articles pt-3 bg-warning">
							<div>2</div>
							<div><p>Articles posté(s)</p></div>
						</div>
					</div>
				</div>

			</div>
		</section> -->

	</main>

<?php  

	require 'footer.php';

?>