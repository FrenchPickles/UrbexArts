<?php  

	require 'header.php';

?>

	<main>
		<div class="container mt-5">
			<div class="row">

				<?php

					require "includes/dbh.inc.php";

					$sql = 'SELECT nameItem, descriptionItem, imageItem, type FROM items WHERE type = "Urbex"';
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
		</div>
	</main>

<?php  

	require 'footer.php';

?>