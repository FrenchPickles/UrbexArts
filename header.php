
<?php  
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<title></title>
</head>

<body>


	<header>	
		<nav class="navbar navbar-expand-lg navbar-dark bg-mynavgradient">

			<a href="index.php" class="navbar-brand">
				<img src="assets/images/logo-urbexarts-white.png" class="urbexarts-logo" alt="logo" height="50">
			</a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav">
					<li class="nav-item"><a class="nav-link" href="urbex.php"><i class="fas fa-house-damage"></i> Urbex</a></li>
					<li class="nav-item"><a class="nav-link" href="souterrains.php"><i class="fas fa-dungeon"></i> Souterrains</a></li>
				</ul>
			</div>

			<div class="form-inline">
				<?php  

				  if (isset($_SESSION['userId'])) {
				  	echo '<form class="form-inline" action="includes/logout.inc.php" method="post">
					<button class="btn btn-outline-warning rounded-0 my-2 my-sm-0" type="submit" name="logout-submit"><i class="fa fa-sign-out-alt"></i> Déconnexion</button>
					<a href="profil.php" class="btn btn-warning rounded-0 my-2 my-sm-0"><i class="fas fa-user-circle"></i> Profil</a>
				</form>';
				  } else {
				  	echo '<form class="" action="includes/login.inc.php" method="post">
					<input class="form-control border-0 rounded-0" type="text" name="mailuid" placeholder="Pseudo">
					<input class="form-control border-0 rounded-0" type="password" name="pwd" placeholder="Mot de passe">
					<button class="btn btn-outline-warning rounded-0" type="submit" name="login-submit"><i class="fa fa-plug"></i> Connexion</button>
				</form>

				<a class="btn btn-warning rounded-0" href="signup.php">Inscription</a>';
				  }

				?>

			</div>
		</nav>
	</header>

