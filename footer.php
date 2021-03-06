	
	<!-- NEWSLETTERS -->
	<section class="container-fluid bg-mygrey section-newsletter">
		<div class="row">
	        <div class="col-md-12">
	    		<div class="thumbnail center well well-sm text-center mt-4 mb-4">
	                <h2 class="display-4">Newsletter</h2>
	                
	                <p>S'inscrire et recevoir les nouveaux articles par e-mail :</p>
	                
	                <form action="" method="post" role="form">
						<div class="input-group mb-3">
						  <div class="input-group-prepend">
						    <span class="input-group-text" id="basic-addon1"><i class="fas fa-paper-plane"></i></span>
						  </div>
						  <input type="text" class="form-control" placeholder="Votre e-mail" aria-label="Username" aria-describedby="basic-addon1">
						  <input type="button" class="btn btn-outline-dark rounded-0" name="" value="Valider">
						</div>
	              </form>

	            </div>    
	        </div>
		</div>
	</section>

	<!-- FOOTER -->
	<footer class="container-fluid bg-mydark">

		<!-- Social bar -->
		<div class="row footer-social pt-4">
			<div class="col-sm text-center">
				<a href="https://www.instagram.com/steven.fr.dlt/">
					<span class="fab fa-instagram"></span>
				</a>
				<p>Rejoins nous sur instagram</p>
			</div>
		</div>

		<!-- Button list -->
		<div class="row text-center">
			<div class="col-md-12 mb-3">
				<a class="btn btn-outline-secondary mt-2" href="urbex.php"><i class="fas fa-house-damage"></i> Urbex</a>
				<a class="btn btn-outline-secondary mt-2" href="souterrains.php"><i class="fas fa-dungeon"></i> Souterrains</a>
				<a class="btn btn-outline-secondary mt-2" href="http://map.urbexarts.fr"><i class="fas fa-map-marker-alt"></i> Carte collaborative <span class="badge badge-secondary">Beta</span></a>
			</div>
		</div>

		<!-- Brand logo -->
		<div class="row text-center">
			<div class="col-md-12">
				<a href="index.php">
					<img src="assets/images/logo-urbexarts-white.png" class="urbexarts-logo" alt="logo" height="50">
				</a>
			</div>
		</div>

		<!-- Copyright -->
		<div class="row text-center copyright">
			<div class="col-md-12">
				<p>©2018 - URBEXARTS.fr Tous droits réservés</p>
			</div>
			<div class="col-md-12">
				<p>Toute copie totale ou partielle de ce site est interdite | <i class="fas fa-campground"></i> Made by <a href="http://www.stevendouillet.com">steven douillet</a></p>
			</div>
		</div>


	</footer>

	<!-- Importations JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>

	<script type="text/javascript">
		$(document).ready( function () {
		    $('#user_table').DataTable({
        		"language": {
				    "sProcessing":     "Traitement en cours...",
				    "sSearch":         "Rechercher&nbsp;:",
				    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
				    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
				    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
				    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
				    "sInfoPostFix":    "",
				    "sLoadingRecords": "Chargement en cours...",
				    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
				    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
				    "oPaginate": {
				        "sFirst":      "Premier",
				        "sPrevious":   "Pr&eacute;c&eacute;dent",
				        "sNext":       "Suivant",
				        "sLast":       "Dernier"
				    },
				    "oAria": {
				        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
				        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
				    },
				    "select": {
				            "rows": {
				                _: "%d lignes séléctionnées",
				                0: "Aucune ligne séléctionnée",
				                1: "1 ligne séléctionnée"
				            } 
				    }
				}
    		});
		});
	</script>
</body>
</html>