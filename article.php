<?php  

	require 'header.php';

?>

	<main>

		<!-- 3 LAST ARTICLES BLOCK -->
		<section class="container section-article mt-4 mb-4">
			
			<?php  

			require "includes/dbh.inc.php";
			$idarticle = $_GET['id'];

			$sql = "SELECT * FROM items WHERE idItem = '{$idarticle}'";
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();

			if ($result->num_rows > 0) {

			?>

				<h2 class="display-4">Article: <?php echo $row["nameItem"]; ?> </h2>
				<div class="bar"></div>

			<?php  

				echo '<p class="mt-3">'.$row['long_descriptionItem'].'</p>';

				echo '<img src="'.$row['imageItem'].'" class="img-fluid">';

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