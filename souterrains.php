<?php  

	require 'header.php';

?>

	<main>
		<div class="container mt-5">
			<div class="row">

				<?php

					// Création de la connexion à la bdd
					require "includes/dbh.inc.php";

					// Requête SQL
					$sql = 'SELECT image_item.link, item.name, item.id , item.short_description, item.publish_date, image_item.alt, type.title FROM item, image_item, type WHERE item.image = image_item.id AND item.type = type.id AND type.title = "Souterrain" ORDER BY publish_date';
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
										    <a href="article.php?id='.$row['id'].'" class="btn btn-warning rounded-0">Voir plus</a>
										 </div>
									</div>
								</div>';
					    }
					} else {
					    echo "0 results";
					}

				?>		
			</div>
		</div>
	</main>

<?php  

	require 'footer.php';

?>