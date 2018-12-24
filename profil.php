<?php  

	require 'header.php';

	if (isset($_SESSION['userId'])) {

?>

	<main>
		<div class="container mt-5">

			<?php

				require "includes/dbh.inc.php";

				$sql = "SELECT * FROM users WHERE idUsers = '{$_SESSION['userId']}'";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					echo '<h1>Profil de '.$row["uidUsers"].'</h1>
						<form action="includes/profil.inc.php" method="post" class="mb-5">
						  <div class="form-group row">
						    <label for="uid" class="col-sm-2 col-form-label">Pseudo</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="uid" name="uid" value="'.$row["uidUsers"].'">
						    </div>
						  </div>

						  <div class="form-group row">
						    <label for="mail" class="col-sm-2 col-form-label">Email</label>
						    <div class="col-sm-10">
						      <input type="text" class="form-control" id="mail" name="mail" value="'.$row["emailUsers"].'">
						    </div>
						  </div>

			  			  <button type="submit" class="btn btn-primary" name="modify-submit">Modifier</button>
						  <button type="reset" class="btn btn-secondary">Annuler</button>

						</form>
					';
				}

				$conn->close();
			?>

		</div>
	</main>

<?php  

	require 'footer.php';

	} else {		
		header("Location: index.php");
		exit();	
	}
?>