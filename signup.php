<?php  

	require 'header.php';
	
	if (!isset($_SESSION['userId'])) {
?>

	<main style="background-color: #e9ecef;">
		<div class="container">

			<div class="jumbotron mb-0">
			  	<h1 class="display-4" style="text-align: center;">S'inscrire!</h1>
				<form action="includes/signup.inc.php" method="post">
					<label for="uid">Pseudo</label>
				  	<input type="text" class="form-control" name="uid" id="uid" placeholder="Pseudo">

				  	<label for="mail" class="mt-2">E-mail</label>
				  	<input type="text" class="form-control" name="mail" id="mail" placeholder="exemple@gmail.com">

				  	<label for="pwd" class="mt-2">Mot de passe</label>
				  	<input type="password" class="form-control" name="pwd" id="pwd" placeholder="Votre mot de passe">

				  	<label for="pwd-repeat" class="mt-2">Confirmation du mot de passe</label>
				  	<input type="password" class="form-control" name="pwd-repeat" id="pwd-repeat" placeholder="Votre mot de passe">

				  	<button type="submit" class="btn btn-warning rounded-0 mt-4" name="signup-submit">Valider l'inscription</button>
				</form>
			</div>
			
		</div>
	</main>

<?php 
	
	} else {

?>
	<main style="background-color: #e9ecef;">
		<div class="container">
			<div class="jumbotron mb-0">
				<h1 class="display-4">Bonjour, <?php echo $_SESSION['userUid']; ?>!</h1>
				<p class="lead">Vous êtes déjà inscrit sur UrbexArts.fr !</p>
			</div>
		</div>
	</main>

<?php 

	}

	require 'footer.php';

?>