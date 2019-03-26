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
					$sql = 'SELECT 
					item.publish_date, 
					image_item.link,
					image_item.alt, 
					item.id, 
					item.name, 
					item.short_description,
					type.title,
					count(like_system.item) as likes_count
					FROM item 
					 INNER JOIN image_item
							ON item.image = image_item.id
					 INNER JOIN type
							ON item.type = type.id
					 LEFT JOIN like_system
							ON like_system.item = item.id
					AND item.image = image_item.id
					WHERE type.title = "Souterrain"
					GROUP BY
					item.publish_date,
					image_item.link,
					image_item.alt, 
					item.id, 
					item.name, 
					item.short_description,
					type.title
					ORDER BY publish_date desc';

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
											
											<div class="row">
												<div class="col-9">
													<a href="article.php?id='.$row['id'].'" class="btn btn-warning rounded-0">Voir plus</a>
												</div>
												<div class="col-3 like_count">
													<p>'.$row["likes_count"].' <i class="fas fa-heart"></i></p>
												</div>
											</div>

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